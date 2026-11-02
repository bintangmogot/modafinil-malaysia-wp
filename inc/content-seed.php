<?php
/**
 * Content Seeder
 *
 * ACF values live in the database, not in git. When the theme is pulled to another
 * environment (e.g. live), this writes the content below into the WP admin fields.
 * It runs once per version: bump MODMY_CONTENT_SEED_VERSION and add/replace entries in
 * modmy_content_seeds() to push new content to every environment on the next page load.
 * Running it overwrites the listed fields with the values below.
 */

const MODMY_CONTENT_SEED_VERSION = 2;

function modmy_content_seeds() {
    return array(
        // Brand & Contact
        'site_tagline_en'       => 'Sharper Focus. Higher Performance.',
        'site_tagline_ms'       => 'Fokus Lebih Tajam. Perform Lebih Tinggi.',
        'whatsapp_number'       => 'https://wa.me/60185754182',

        // Trust Bar & Shipping
        'trust_bar_long_en'     => 'Free Shipping Over RM399 &nbsp;&middot;&nbsp; 100% Genuine',
        'trust_bar_long_ms'     => 'Penghantaran Percuma RM399+ &nbsp;&middot;&nbsp; 100% Asli',
        'trust_bar_short_en'    => '🚚 Free Shipping RM399+',
        'trust_bar_short_ms'    => '🚚 Percuma Penghantaran RM399+',
        'free_shipping_threshold' => 'RM399',

        // Footer
        'footer_description_en' => 'Modafinil Malaysia provides genuine Modafinil for performance, vitality, and fast-acting results. Enjoy discreet online ordering and reliable delivery across Malaysia in 7-10 days.',
        'footer_description_ms' => 'Modafinil Malaysia menyediakan Modafinil asli untuk prestasi, kecergasan, dan hasil bertindak pantas. Nikmati pesanan dalam talian diskret dan penghantaran yang boleh dipercayai di seluruh Malaysia dalam 7-10 hari.',
        'footer_address_en'     => 'Level 33, Ilham Tower No. 8, Jalan Binjai 50450 Kuala Lumpur Malaysia',
        'footer_address_ms'     => 'Aras 33, Menara Ilham No. 8, Jalan Binjai 50450 Kuala Lumpur Malaysia',
        'footer_email'          => 'orders@modafinil-malaysia.com',

        // Shop Page
        'shop_hero_title_en'    => 'Shop Modafinil Online',
        'shop_hero_title_ms'    => 'Beli Modafinil Online',
        'shop_hero_subtitle_en' => 'Browse and buy genuine Modafinil tablets online from certified manufacturers. Fast Malaysia-wide delivery on all orders.',
        'shop_hero_subtitle_ms' => 'Semak dan beli tablet Modafinil asli secara dalam talian dari pengeluar bertauliah. Penghantaran pantas ke seluruh Malaysia.',
        'shop_hero_bullets'     => array(
            array('bullet_en' => 'Free Shipping Over RM870', 'bullet_ms' => 'Penghantaran Percuma atas RM870'),
            array('bullet_en' => '100% Genuine', 'bullet_ms' => '100% Asli'),
            array('bullet_en' => 'Fast Malaysian Delivery', 'bullet_ms' => 'Penghantaran Tempatan Pantas'),
        ),
    );
}

add_action('acf/init', function () {
    if ((int) get_option('modmy_content_seed_version', 0) >= MODMY_CONTENT_SEED_VERSION) {
        return;
    }
    foreach (modmy_content_seeds() as $field => $value) {
        update_field($field, $value, 'option');
    }
    update_option('modmy_content_seed_version', MODMY_CONTENT_SEED_VERSION);
}, 20);
