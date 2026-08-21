<?php
/**
 * Modafinil Malaysia — Theme Functions
 */

// Define constants for easy reference
define('MODMY_THEME_VERSION', '1.0.0');
define('MODMY_THEME_DIR', get_stylesheet_directory());
define('MODMY_THEME_URI', get_stylesheet_directory_uri());

// 1. Language system
require_once MODMY_THEME_DIR . '/inc/i18n.php';

// 2. Theme setup (menus, supports, image sizes)
require_once MODMY_THEME_DIR . '/inc/theme-setup.php';

// 3. Asset enqueues (CSS, JS)
require_once MODMY_THEME_DIR . '/inc/enqueue.php';

// 4. ACF Theme Options (Global settings)
require_once MODMY_THEME_DIR . '/inc/theme-options.php';

// 5. Shortcodes
require_once MODMY_THEME_DIR . '/inc/shortcodes.php';

// 6. WooCommerce customizations
require_once MODMY_THEME_DIR . '/inc/woocommerce.php';

// Custom Dynamic QRIS Gateway
if ( class_exists( 'WooCommerce' ) ) {
    require_once MODMY_THEME_DIR . '/inc/class-wc-gateway-dynamic-qris.php';
}
add_filter( 'woocommerce_payment_gateways', function( $gateways ) {
    $gateways[] = 'WC_Gateway_Dynamic_QRIS';
    return $gateways;
});

// 7. Custom Post Types
require_once MODMY_THEME_DIR . '/inc/post-types.php';


// 7. ACF Fallbacks (prevents fatal errors if ACF is not active)
if (!function_exists('get_field')) {
    function get_field($selector, $post_id = false, $format_value = true) { return false; }
}
if (!function_exists('get_sub_field')) {
    function get_sub_field($selector, $format_value = true) { return false; }
}
if (!function_exists('have_rows')) {
    function have_rows($selector, $post_id = false) { return false; }
}
if (!function_exists('the_row')) {
    function the_row() { return false; }
}

// 9. Enable SVG Uploads in Media Library
add_filter('upload_mimes', function($mimes) {
    if (current_user_can('manage_options')) {
        $mimes['svg'] = 'image/svg+xml';
    }
    return $mimes;
});

// 10. Force precise Homepage Title
add_filter('document_title_parts', function($title) {
    if (is_front_page()) {
        $title['title'] = get_bloginfo('name');
        $title['tagline'] = get_bloginfo('description');
        unset($title['site']);
    }
    return $title;
});
add_filter('document_title_separator', function($sep) {
    if (is_front_page()) { return '|'; }
    return $sep;
});

// 11. Custom Gravity Forms submit button markup with envelope icon
add_filter('gform_submit_button', function($button, $form) {
    if ($form['id'] == 1) {
        $btn_text = function_exists('modmy_t') ? modmy_t("Send Message", "Hantar Mesej") : "Send Message";
        return sprintf(
            '<button type="submit" id="gform_submit_button_%d" class="button gform_button flex items-center justify-center gap-2 w-full md:w-auto">
                <span>%s</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </button>',
            $form['id'],
            esc_html($btn_text)
        );
    }
    return $button;
}, 10, 2);
add_action( "woocommerce_thankyou", "modafinil_add_shipping_note_thankyou", 5 );
function modafinil_add_shipping_note_thankyou( $order_id ) {
    ?>
    <div class="shipping-notice-thankyou mt-8 mb-8 p-6 bg-blue-50 border-l-4 border-blue-500 rounded">
        <h3 class="text-blue-700 font-bold mb-2">Note</h3>
        <p class="text-blue-700">The average shipping time is 10 - 15 days. Please note that delivery may take up to 30 days from the date of dispatch due to potential disruptions in postal services caused by weather issues or natural disaster.</p>
    </div>
    <?php
}


add_action("wp_head", function() {
    if (function_exists("is_checkout") && is_checkout()) {
        echo "<style>
            .woocommerce-terms-and-conditions-checkbox-text a {
                color: #2563eb !important;
                text-decoration: underline !important;
                font-weight: 600;
            }
            .woocommerce-terms-and-conditions-checkbox-text a:hover {
                color: #1d4ed8 !important;
            }
            .woocommerce-privacy-policy-text a {
                color: #2563eb !important;
                text-decoration: underline !important;
                font-weight: 600;
            }
            .woocommerce-privacy-policy-text a:hover {
                color: #1d4ed8 !important;
            }
        </style>";
    }
});


if( function_exists("acf_add_local_field_group") ):
    acf_add_local_field_group(array(
        "key" => "group_review_linked_product",
        "title" => "Additional Review Settings",
        "fields" => array(
            array(
                "key" => "field_review_linked_product",
                "label" => "Linked Product",
                "name" => "linked_product",
                "type" => "post_object",
                "instructions" => "Select a product if this is a Product Review. Leave empty for General Reviews.",
                "required" => 0,
                "post_type" => array(
                    0 => "product",
                ),
                "taxonomy" => "",
                "allow_null" => 1,
                "multiple" => 0,
                "return_format" => "id",
                "ui" => 1,
            ),
            ),
        "location" => array(
            array(
                array(
                    "param" => "post_type",
                    "operator" => "==",
                    "value" => "review",
                ),
            ),
        ),
        "menu_order" => 0,
        "position" => "side",
        "style" => "default",
        "label_placement" => "top",
        "instruction_placement" => "label",
        "hide_on_screen" => "",
        "active" => true,
        "description" => "",
    ));
endif;


// Add Custom Columns to Review CPT
add_filter("manage_review_posts_columns", function($columns) {

    $columns["linked_product"] = "Linked Product";
    return $columns;
});

// Populate Custom Columns
add_action("manage_review_posts_custom_column", function($column, $post_id) {
    if ($column === "review_category") {
        $terms = get_the_terms($post_id, "review_category");
        if ($terms && !is_wp_error($terms)) {
            $term_names = array_map(function($term) { return $term->name; }, $terms);
            echo implode(", ", $term_names);
        } else {
            echo "";
        }
    }
    if ($column === "linked_product") {
        $product_id = get_field("linked_product", $post_id);
        if ($product_id) {
            echo get_the_title($product_id);
        } else {
            echo "";
        }
    }
}, 10, 2);


// Prefill Product FAQs Module with default Modafinil questions
add_filter('acf/load_value/key=field_dsg_624949de81', function($value, $post_id, $field) {
    // Only prefill if it's currently empty or contains only empty rows
    $is_empty = true;
    if (!empty($value) && is_array($value)) {
        foreach ($value as $row) {
            // Check if either English or Malay question is filled
            if (!empty($row['field_dsg_ae5395b1a7']) || !empty($row['field_dsg_f3bbb68d4e'])) {
                $is_empty = false;
                break;
            }
        }
    }

    if ($is_empty) {
        // If we are in the context of ACF layout and the field name is faq_items
        $value = [
            [
                'field_dsg_ae5395b1a7' => 'What is Modanil 200mg used for?',
                'field_dsg_f3bbb68d4e' => 'Apakah kegunaan Modanil 200mg?',
                'field_dsg_4ececabc41' => 'Modanil 200 mg is useful for the improvement of narcolepsy, obstructive sleep apnea, or shift work sleep disorder.',
                'field_dsg_462a8df2cf' => 'Modanil 200 mg berguna untuk pembaikan narkolepsi, apnea tidur obstruktif, atau gangguan tidur kerja syif.'
            ],
            [
                'field_dsg_ae5395b1a7' => 'How does Modanil 200mg work?',
                'field_dsg_f3bbb68d4e' => 'Bagaimanakah Modanil 200mg berfungsi?',
                'field_dsg_4ececabc41' => 'Modanil works by affecting certain chemicals in the brain that regulate the sleep-wake cycle, helping you stay awake and alert.',
                'field_dsg_462a8df2cf' => 'Modanil berfungsi dengan mempengaruhi bahan kimia tertentu di dalam otak yang mengawal selitaran tidur-jaga, membantu anda kekal berjaga dan peka.'
            ],
            [
                'field_dsg_ae5395b1a7' => 'How should I take Modanil 200mg?',
                'field_dsg_f3bbb68d4e' => 'Bagaimanakah cara saya mengambil Modanil 200mg?',
                'field_dsg_4ececabc41' => 'Take one tablet in the morning with a glass of water. Do not exceed the recommended dose.',
                'field_dsg_462a8df2cf' => 'Ambil sebiji tablet pada waktu pagi dengan segelas air. Jangan melebihi dos yang disyorkan.'
            ],
            [
                'field_dsg_ae5395b1a7' => 'Can I take Modanil with food?',
                'field_dsg_f3bbb68d4e' => 'Bolehkah saya mengambil Modanil dengan makanan?',
                'field_dsg_4ececabc41' => 'Yes, it can be taken with or without food.',
                'field_dsg_462a8df2cf' => 'Ya, ia boleh diambil dengan atau tanpa makanan.'
            ],
            [
                'field_dsg_ae5395b1a7' => 'What should I do if I miss a dose?',
                'field_dsg_f3bbb68d4e' => 'Apakah yang harus saya lakukan jika terlepas dos?',
                'field_dsg_4ececabc41' => 'If you miss a dose, take it as soon as you remember. If it is close to your next dose, skip the missed dose. Do not take a double dose.',
                'field_dsg_462a8df2cf' => 'Jika anda terlepas dos, ambil sebaik sahaja anda teringat. Jika ia hampir dengan dos seterusnya, abaikan dos yang terlepas. Jangan ambil dos berganda.'
            ],
            [
                'field_dsg_ae5395b1a7' => 'How long does Modanil 200mg last?',
                'field_dsg_f3bbb68d4e' => 'Berapa lamakah Modanil 200mg bertahan?',
                'field_dsg_4ececabc41' => 'The effects typically last between 12 to 15 hours.',
                'field_dsg_462a8df2cf' => 'Kesannya biasanya bertahan antara 12 hingga 15 jam.'
            ],
            [
                'field_dsg_ae5395b1a7' => 'What are the common side effects of Modanil 200mg?',
                'field_dsg_f3bbb68d4e' => 'Apakah kesan sampingan biasa Modanil 200mg?',
                'field_dsg_4ececabc41' => 'Common side effects include headache, nausea, nervousness, dizziness, or difficulty sleeping.',
                'field_dsg_462a8df2cf' => 'Kesan sampingan biasa termasuk sakit kepala, loya, gementar, pening, atau kesukaran tidur.'
            ]
        ];
    }
    return $value;
}, 10, 3);



// Force default_value on the field config itself to bypass JSON cache issues
add_filter('acf/load_field/key=field_dsg_624949de81', function($field) {
    $field['default_value'] = [
        [
            'field_dsg_ae5395b1a7' => 'What is Modanil 200mg used for?',
            'field_dsg_f3bbb68d4e' => 'Apakah kegunaan Modanil 200mg?',
            'field_dsg_4ececabc41' => 'Modanil 200 mg is useful for the improvement of narcolepsy, obstructive sleep apnea, or shift work sleep disorder.',
            'field_dsg_462a8df2cf' => 'Modanil 200 mg berguna untuk pembaikan narkolepsi, apnea tidur obstruktif, atau gangguan tidur kerja syif.'
        ],
        [
            'field_dsg_ae5395b1a7' => 'How does Modanil 200mg work?',
            'field_dsg_f3bbb68d4e' => 'Bagaimanakah Modanil 200mg berfungsi?',
            'field_dsg_4ececabc41' => 'Modanil works by affecting certain chemicals in the brain that regulate the sleep-wake cycle, helping you stay awake and alert.',
            'field_dsg_462a8df2cf' => 'Modanil berfungsi dengan mempengaruhi bahan kimia tertentu di dalam otak yang mengawal selitaran tidur-jaga, membantu anda kekal berjaga dan peka.'
        ],
        [
            'field_dsg_ae5395b1a7' => 'How should I take Modanil 200mg?',
            'field_dsg_f3bbb68d4e' => 'Bagaimanakah cara saya mengambil Modanil 200mg?',
            'field_dsg_4ececabc41' => 'Take one tablet in the morning with a glass of water. Do not exceed the recommended dose.',
            'field_dsg_462a8df2cf' => 'Ambil sebiji tablet pada waktu pagi dengan segelas air. Jangan melebihi dos yang disyorkan.'
        ],
        [
            'field_dsg_ae5395b1a7' => 'Can I take Modanil with food?',
            'field_dsg_f3bbb68d4e' => 'Bolehkah saya mengambil Modanil dengan makanan?',
            'field_dsg_4ececabc41' => 'Yes, it can be taken with or without food.',
            'field_dsg_462a8df2cf' => 'Ya, ia boleh diambil dengan atau tanpa makanan.'
        ],
        [
            'field_dsg_ae5395b1a7' => 'What should I do if I miss a dose?',
            'field_dsg_f3bbb68d4e' => 'Apakah yang harus saya lakukan jika terlepas dos?',
            'field_dsg_4ececabc41' => 'If you miss a dose, take it as soon as you remember. If it is close to your next dose, skip the missed dose. Do not take a double dose.',
            'field_dsg_462a8df2cf' => 'Jika anda terlepas dos, ambil sebaik sahaja anda teringat. Jika ia hampir dengan dos seterusnya, abaikan dos yang terlepas. Jangan ambil dos berganda.'
        ],
        [
            'field_dsg_ae5395b1a7' => 'How long does Modanil 200mg last?',
            'field_dsg_f3bbb68d4e' => 'Berapa lamakah Modanil 200mg bertahan?',
            'field_dsg_4ececabc41' => 'The effects typically last between 12 to 15 hours.',
            'field_dsg_462a8df2cf' => 'Kesannya biasanya bertahan antara 12 hingga 15 jam.'
        ],
        [
            'field_dsg_ae5395b1a7' => 'What are the common side effects of Modanil 200mg?',
            'field_dsg_f3bbb68d4e' => 'Apakah kesan sampingan biasa Modanil 200mg?',
            'field_dsg_4ececabc41' => 'Common side effects include headache, nausea, nervousness, dizziness, or difficulty sleeping.',
            'field_dsg_462a8df2cf' => 'Kesan sampingan biasa termasuk sakit kepala, loya, gementar, pening, atau kesukaran tidur.'
        ]
    ];
    return $field;
});

// Register Bilingual Product Fields
if( function_exists('acf_add_local_field_group') ):
acf_add_local_field_group(array(
    'key' => 'group_product_bilingual',
    'title' => 'Product Content (Bilingual)',
    'fields' => array(
        array(
            'key' => 'field_short_desc_en',
            'label' => 'Short Description (English)',
            'name' => 'short_desc_en',
            'type' => 'wysiwyg',
            'instructions' => 'Description below the product title.',
            'wrapper' => array(
                'width' => '50',
            ),
        ),
        array(
            'key' => 'field_short_desc_ms',
            'label' => 'Short Description (Malay)',
            'name' => 'short_desc_ms',
            'type' => 'wysiwyg',
            'instructions' => 'Description below the product title.',
            'wrapper' => array(
                'width' => '50',
            ),
        ),
        array(
            'key' => 'field_main_desc_en',
            'label' => 'Main Description (English)',
            'name' => 'main_desc_en',
            'type' => 'wysiwyg',
            'instructions' => 'Full product description (appears below product images/buy section).',
            'wrapper' => array(
                'width' => '50',
            ),
        ),
        array(
            'key' => 'field_main_desc_ms',
            'label' => 'Main Description (Malay)',
            'name' => 'main_desc_ms',
            'type' => 'wysiwyg',
            'instructions' => 'Full product description (appears below product images/buy section).',
            'wrapper' => array(
                'width' => '50',
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'product',
            ),
        ),
    ),
    'menu_order' => 0,
    
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => array('the_content', 'excerpt'),
    'position' => 'high',
));
endif;


// Auto-migrate native WooCommerce descriptions into ACF Bilingual Fields on load
add_filter('acf/load_value/name=main_desc_en', function($value, $post_id, $field) {
    if (empty($value) && $post_id) {
        $post = get_post($post_id);
        if ($post && !empty($post->post_content)) {
            return $post->post_content;
        }
    }
    return $value;
}, 10, 3);

add_filter('acf/load_value/name=short_desc_en', function($value, $post_id, $field) {
    if (empty($value) && $post_id) {
        $post = get_post($post_id);
        if ($post && !empty($post->post_excerpt)) {
            $excerpt = $post->post_excerpt;
            if (preg_match('/<!-- en -->(.+?)<!-- \/en -->/s', $excerpt, $match)) {
                return trim($match[1]);
            }
            // If no tags, return the whole excerpt
            $clean = strip_tags($excerpt, '<p><a><strong><b><i><em><ul><ol><li><br>');
            return trim($clean);
        }
    }
    return $value;
}, 10, 3);

add_filter('acf/load_value/name=short_desc_ms', function($value, $post_id, $field) {
    if (empty($value) && $post_id) {
        $post = get_post($post_id);
        if ($post && !empty($post->post_excerpt)) {
            $excerpt = $post->post_excerpt;
            if (preg_match('/<!-- ms -->(.+?)<!-- \/ms -->/s', $excerpt, $match)) {
                return trim($match[1]);
            }
        }
    }
    return $value;
}, 10, 3);


// Force hide native WooCommerce editors to avoid confusion
add_action('admin_head', function() {
    $screen = get_current_screen();
    if ($screen && $screen->post_type === 'product') {
        echo '<style>
            #postdivrich, #postexcerpt { display: none !important; }
        </style>';
    }
});
