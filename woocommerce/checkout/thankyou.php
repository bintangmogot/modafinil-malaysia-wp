<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * All visible text comes from Theme Settings -> Checkout & Emails (EN/MS pairs),
 * read with modmy_checkout_t() / modmy_checkout_text() from inc/content-seed.php.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.1.0
 *
 * @var WC_Order $order
 */

defined( 'ABSPATH' ) || exit;

// SVG paths for the icon selects (Theme Settings -> Checkout & Emails). Keys match the select values.
$modmy_icon_paths = array(
	'check'   => 'M5 13l4 4L19 7',
	'clock'   => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
	'mail'    => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
	'package' => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4',
	'cross'   => 'M6 18L18 6M6 6l12 12',
	'warning' => 'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z',
);
$modmy_icon_path = function ( $field, $fallback ) use ( $modmy_icon_paths ) {
	$choice = modmy_checkout_text( $field );
	return isset( $modmy_icon_paths[ $choice ] ) ? $modmy_icon_paths[ $choice ] : $modmy_icon_paths[ $fallback ];
};

// Order email address for the payment instructions text: Theme Settings -> Brand & Contact -> Footer Email.
$modmy_order_email = function_exists( 'get_field' ) ? trim( (string) get_field( 'footer_email', 'option' ) ) : '';
?>

<div class="woocommerce-order max-w-3xl mx-auto py-8 lg:py-12">

	<?php
	if ( $order ) :

		do_action( 'woocommerce_before_thankyou', $order->get_id() );
		?>

		<?php if ( $order->has_status( 'failed' ) ) : ?>

            <div class="text-center mb-10">
                <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-destructive-soft text-destructive mb-6">
                    <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo esc_attr( $modmy_icon_path( 'thankyou_failed_icon', 'cross' ) ); ?>"></path></svg>
                </div>
                <h1 class="font-heading text-3xl font-extrabold text-foreground mb-4"><?php echo esc_html( modmy_checkout_t( 'thankyou_failed_title' ) ); ?></h1>
                <p class="text-muted-foreground mb-8"><?php echo esc_html( modmy_checkout_t( 'thankyou_failed_text' ) ); ?></p>

                <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions flex justify-center gap-4">
                    <a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay px-8 py-3 rounded-full bg-primary text-white font-bold hover:bg-primary-dark transition-colors"><?php echo esc_html( modmy_checkout_t( 'thankyou_failed_pay' ) ); ?></a>
                    <?php if ( is_user_logged_in() ) : ?>
                        <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay px-8 py-3 rounded-full border-2 border-primary text-primary font-bold hover:bg-primary-softer transition-colors"><?php echo esc_html( modmy_checkout_t( 'thankyou_failed_account' ) ); ?></a>
                    <?php endif; ?>
                </p>
            </div>

		<?php else : ?>

            <div class="text-center mb-10">
                <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-primary-softer text-primary mb-6">
                    <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo esc_attr( $modmy_icon_path( 'thankyou_icon', 'check' ) ); ?>"></path></svg>
                </div>
                <h1 class="font-heading text-4xl font-extrabold text-foreground mb-3"><?php echo esc_html( modmy_checkout_t( 'thankyou_title' ) ); ?></h1>
                <p class="text-muted-foreground text-lg"><?php echo esc_html( modmy_checkout_t( 'thankyou_intro' ) ); ?></p>
            </div>

            <div class="bg-card border border-border rounded-2xl shadow-sm p-6 md:p-8 mb-10">
                <h2 class="font-heading text-xl font-bold text-foreground mb-6 pb-4 border-b border-border"><?php echo esc_html( modmy_checkout_t( 'thankyou_summary_heading' ) ); ?></h2>

                <ul class="woocommerce-order-overview grid grid-cols-2 md:grid-cols-4 gap-6 mb-0 list-none p-0">

                    <li class="woocommerce-order-overview__order order flex flex-col gap-1">
                        <span class="text-sm text-muted-foreground"><?php echo esc_html( modmy_checkout_t( 'thankyou_label_order' ) ); ?></span>
                        <strong class="text-foreground text-lg"><?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
                    </li>

                    <li class="woocommerce-order-overview__date date flex flex-col gap-1">
                        <span class="text-sm text-muted-foreground"><?php echo esc_html( modmy_checkout_t( 'thankyou_label_date' ) ); ?></span>
                        <strong class="text-foreground text-lg"><?php echo wc_format_datetime( $order->get_date_created() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
                    </li>

                    <li class="woocommerce-order-overview__total total flex flex-col gap-1">
                        <span class="text-sm text-muted-foreground"><?php echo esc_html( modmy_checkout_t( 'thankyou_label_total' ) ); ?></span>
                        <strong class="text-primary text-lg"><?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
                    </li>

                    <?php if ( $order->get_payment_method_title() ) : ?>
                        <li class="woocommerce-order-overview__payment-method method flex flex-col gap-1">
                            <span class="text-sm text-muted-foreground"><?php echo esc_html( modmy_checkout_t( 'thankyou_label_payment' ) ); ?></span>
                            <strong class="text-foreground text-lg"><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
                        </li>
                    <?php endif; ?>

                </ul>

                <?php if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>
                    <div class="mt-6 pt-4 border-t border-border flex flex-col gap-1">
                        <span class="text-sm text-muted-foreground"><?php echo esc_html( modmy_checkout_t( 'thankyou_label_email' ) ); ?></span>
                        <strong class="text-foreground"><?php echo $order->get_billing_email(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
                    </div>
                <?php endif; ?>
            </div>

        <?php if ( '' !== modmy_checkout_t( 'payment_instructions_heading' ) || '' !== modmy_checkout_t( 'payment_instructions_text' ) ) : ?>
        <div class="bg-[#F0F7FF] border border-[#BDE0FF] rounded-2xl p-6 md:p-8 mb-10 text-center">
            <h3 class="font-heading text-xl font-bold text-foreground mb-4"><?php echo esc_html( modmy_checkout_t( 'payment_instructions_heading' ) ); ?></h3>
            <p class="mb-0 text-foreground text-lg leading-relaxed">
                <?php
                $modmy_email_link = '' !== $modmy_order_email
                    ? '<a href="mailto:' . esc_attr( $modmy_order_email ) . '" class="text-primary hover:underline font-bold">' . esc_html( $modmy_order_email ) . '</a>'
                    : '';
                echo str_replace( '{email}', $modmy_email_link, esc_html( modmy_checkout_t( 'payment_instructions_text' ) ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                ?>
            </p>
        </div>
        <?php endif; ?>

		<?php endif; ?>

        <div class="thank-you-hooks-wrapper">
		    <?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
		    <?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>
        </div>

	<?php else : ?>

		<?php wc_get_template( 'checkout/order-received.php', array( 'order' => false ) ); ?>

	<?php endif; ?>

</div>
