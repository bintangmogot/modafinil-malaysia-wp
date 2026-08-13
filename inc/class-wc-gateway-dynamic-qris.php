<?php
/**
 * Dynamic QRIS Payment Gateway
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WC_Gateway_Dynamic_QRIS extends WC_Payment_Gateway {

	public $instructions;
	public $static_qris;

	/**
	 * Constructor for the gateway.
	 */
	public function __construct() {
		$this->id                 = 'dynamic_qris';
		$this->icon               = ''; // Optional URL to an icon
		$this->has_fields         = false;
		$this->method_title       = __( 'Dynamic QRIS', 'woocommerce' );
		$this->method_description = __( 'Generates a dynamic QRIS code with the exact nominal amount for the customer to scan.', 'woocommerce' );

		// Load the settings.
		$this->init_form_fields();
		$this->init_settings();

		// Define user set variables
		$this->title            = $this->get_option( 'title' );
		$this->description      = $this->get_option( 'description' );
		$this->instructions     = $this->get_option( 'instructions' );
		$this->static_qris      = $this->get_option( 'static_qris' );

		// Actions
		add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );
		add_action( 'woocommerce_thankyou_' . $this->id, array( $this, 'thankyou_page' ) );
		
		// Customer Emails
		add_action( 'woocommerce_email_before_order_table', array( $this, 'email_instructions' ), 10, 3 );
	}

	/**
	 * Initialize Gateway Settings Form Fields
	 */
	public function init_form_fields() {
		$this->form_fields = array(
			'enabled' => array(
				'title'   => __( 'Enable/Disable', 'woocommerce' ),
				'type'    => 'checkbox',
				'label'   => __( 'Enable Dynamic QRIS Payment', 'woocommerce' ),
				'default' => 'yes'
			),
			'title' => array(
				'title'       => __( 'Title', 'woocommerce' ),
				'type'        => 'text',
				'description' => __( 'This controls the title which the user sees during checkout.', 'woocommerce' ),
				'default'     => __( 'QRIS (E-Wallet / DuitNow)', 'woocommerce' ),
				'desc_tip'    => true,
			),
			'description' => array(
				'title'       => __( 'Description', 'woocommerce' ),
				'type'        => 'textarea',
				'description' => __( 'Payment method description that the customer will see on your checkout.', 'woocommerce' ),
				'default'     => __( 'Scan the QRIS code on the next page using your e-Wallet or Banking App (DuitNow). The exact amount will be automatically inputted.', 'woocommerce' ),
				'desc_tip'    => true,
			),
			'static_qris' => array(
				'title'       => __( 'Static QRIS String', 'woocommerce' ),
				'type'        => 'textarea',
				'description' => __( 'Scan your physical QRIS using a barcode scanner app and paste the raw text here.', 'woocommerce' ),
				'default'     => '00020101021126660016COM.GO-JEK.WWW01189360091433240224210214476123165314050312351440014ID.CO.QRIS.WWW0215ID10231362095060315ID10231362095065204581253033605802ID5914DUMMY MERCHANT6007JAKARTA61051234562520108A02010460538050414000323ID102313620950604107106095060505100000703A0163044439', // Dummy string
			),
			'instructions' => array(
				'title'       => __( 'Instructions', 'woocommerce' ),
				'type'        => 'textarea',
				'description' => __( 'Instructions that will be added to the thank you page and emails.', 'woocommerce' ),
				'default'     => __( 'Please scan the QR code below to complete your payment. The exact nominal will be filled automatically.', 'woocommerce' ),
				'desc_tip'    => true,
			),
		);
	}

	/**
	 * Process the payment and return the result
	 */
	public function process_payment( $order_id ) {
		$order = wc_get_order( $order_id );

		// Mark as on-hold (we're awaiting the payment)
		$order->update_status( 'on-hold', __( 'Awaiting QRIS payment', 'woocommerce' ) );

		// Reduce stock levels
		wc_reduce_stock_levels( $order_id );

		// Remove cart
		WC()->cart->empty_cart();

		// Return thankyou redirect
		return array(
			'result'   => 'success',
			'redirect' => $this->get_return_url( $order )
		);
	}

	/**
	 * Fetch live real-time conversion rate from open.er-api.com
	 * Caches result for 12 hours. Falls back to static setting.
	 */
	private function get_live_conversion_rate() {
		$rate = get_transient( 'wc_dynamic_qris_myr_idr_rate' );
		
		if ( false === $rate ) {
			$response = wp_remote_get( 'https://open.er-api.com/v6/latest/MYR', array( 'timeout' => 5 ) );
			
			if ( ! is_wp_error( $response ) && wp_remote_retrieve_response_code( $response ) === 200 ) {
				$body = wp_remote_retrieve_body( $response );
				$data = json_decode( $body, true );
				
				if ( isset( $data['rates']['IDR'] ) ) {
					$rate = floatval( $data['rates']['IDR'] );
					set_transient( 'wc_dynamic_qris_myr_idr_rate', $rate, 12 * HOUR_IN_SECONDS );
				}
			}
		}
		
		if ( empty( $rate ) ) {
			// Fallback rate if the API completely fails
			$rate = 4350;
		}
		
		return $rate;
	}

	/**
	 * CRC16-CCITT Calculation for EMVCo QR
	 */
	private function calculate_qris_crc( $payload ) {
		$crc = 0xFFFF;
		for ( $i = 0; $i < strlen( $payload ); $i++ ) {
			$x = ( ( $crc >> 8 ) ^ ord( $payload[ $i ] ) ) & 0xFF;
			$x ^= $x >> 4;
			$crc = ( ( $crc << 8 ) ^ ( $x << 12 ) ^ ( $x << 5 ) ^ $x ) & 0xFFFF;
		}
		return strtoupper( str_pad( dechex( $crc ), 4, '0', STR_PAD_LEFT ) );
	}

	/**
	 * Inject Transaction Amount (Tag 54) into Static QRIS
	 */
	private function generate_dynamic_qris( $static_qris, $amount ) {
		$amount_str = (string) round( $amount );
		
		// Create Tag 54 (ID 54 + Length + Amount)
		$tag54 = '54' . str_pad( strlen( $amount_str ), 2, '0', STR_PAD_LEFT ) . $amount_str;
		
		// We assume the static QRIS string ends with Tag 63 (CRC) which is "6304" followed by 4 chars.
		$pos = strrpos( $static_qris, '6304' );
		
		if ( $pos === false ) {
			// Malformed string, fallback
			return $static_qris;
		}
		
		// Remove the old CRC and Tag 63 from the end
		$payload_without_crc = substr( $static_qris, 0, $pos );
		
		// Fix for standard QRIS: Must change Tag 01 from 11 (Static) to 12 (Dynamic)
		// Otherwise strict banking apps will reject the injected price.
		$payload_without_crc = str_replace( '010211', '010212', $payload_without_crc );

		// Construct new payload: Old Data + Tag 54 + Tag 6304
		$new_payload = $payload_without_crc . $tag54 . '6304';
		
		// Calculate new CRC16
		$new_crc = $this->calculate_qris_crc( $new_payload );
		
		return $new_payload . $new_crc;
	}

	/**
	 * Output for the order received page.
	 */
	public function thankyou_page( $order_id ) {
		$order = wc_get_order( $order_id );
		if ( ! $order ) return;
		
		if ( $this->instructions ) {
			echo wpautop( wptexturize( wp_kses_post( $this->instructions ) ) );
		}

		$total_rm = $order->get_total();
		$rate = $this->get_live_conversion_rate();
		$total_idr = $total_rm * $rate;
		
		$static_qris = trim( $this->static_qris );
		
		if ( ! empty( $static_qris ) ) {
			$dynamic_qris = $this->generate_dynamic_qris( $static_qris, $total_idr );
			
			// Generate QR Code Image URL using a public API
			$qr_url = 'https://api.qrserver.com/v1/create-qr-code/?size=300x300&margin=10&data=' . urlencode( $dynamic_qris );
			
			?>
			<div class="qris-payment-box mt-6 p-6 border-2 border-primary rounded-xl bg-primary-softer flex flex-col items-center justify-center text-center">
				<h3 class="font-heading font-bold text-xl mb-2 text-foreground">Scan to Pay with QRIS</h3>
				<p class="text-muted-foreground mb-6">Total Amount: <strong>IDR <?php echo number_format( $total_idr, 0, ',', '.' ); ?></strong> (Converted from <?php echo wp_kses_post( $order->get_formatted_order_total() ); ?> @ RM 1 = IDR <?php echo number_format( $rate, 0, ',', '.' ); ?>)</p>
				
				<div class="bg-white p-4 rounded-lg shadow-sm border border-border inline-block mb-4">
					<img src="<?php echo esc_url( $qr_url ); ?>" alt="QRIS Code" class="w-[250px] h-[250px] object-contain mx-auto" />
				</div>
				
				<p class="text-sm font-bold text-primary mt-2">Exact nominal will be inputted automatically!</p>
			</div>
			<?php
		} else {
			echo '<p class="text-destructive font-bold">QRIS string is missing. Please configure it in the WooCommerce settings.</p>';
		}
	}

	/**
	 * Add content to the email before the order table.
	 */
	public function email_instructions( $order, $sent_to_admin, $plain_text = false ) {
		if ( $this->instructions && ! $sent_to_admin && $this->id === $order->get_payment_method() && $order->has_status( 'on-hold' ) ) {
			echo wpautop( wptexturize( wp_kses_post( $this->instructions ) ) ) . PHP_EOL;
		}
	}
}
