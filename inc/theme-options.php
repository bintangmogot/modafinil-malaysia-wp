<?php
/**
 * ACF Theme Options Page
 */

if (function_exists('acf_add_options_page')) {
    add_action('acf/init', function() {
        acf_add_options_page(array(
            'page_title'    => 'Theme General Settings',
            'menu_title'    => 'Theme Settings',
            'menu_slug'     => 'theme-general-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false,
            'icon_url'      => 'dashicons-admin-generic',
            'position'      => 30
        ));
    });
}

// Register Footer ACF Fields dynamically
if( function_exists('acf_add_local_field_group') ):
    acf_add_local_field_group(array(
        'key' => 'group_theme_footer_settings',
        'title' => 'Footer Settings',
        'fields' => array(
            array(
                'key' => 'field_footer_description_en',
                'label' => 'Footer Description (EN)',
                'name' => 'footer_description_en',
                'type' => 'textarea',
                'default_value' => 'Modafinil Malaysia provides genuine Modafinil for performance, vitality, and fast-acting results. Enjoy discreet online ordering and reliable delivery across Malaysia in 7-10 days.',
            ),
            array(
                'key' => 'field_footer_description_ms',
                'label' => 'Footer Description (MS)',
                'name' => 'footer_description_ms',
                'type' => 'textarea',
                'default_value' => 'Modafinil Malaysia menyediakan Modafinil asli untuk prestasi, kecergasan, dan hasil bertindak pantas. Nikmati pesanan dalam talian diskret dan penghantaran yang boleh dipercayai di seluruh Malaysia dalam 7-10 hari.',
            ),
            array(
                'key' => 'field_footer_address_en',
                'label' => 'Address (EN)',
                'name' => 'footer_address_en',
                'type' => 'text',
                'default_value' => 'Level 33, Ilham Tower No. 8, Jalan Binjai 50450 Kuala Lumpur Malaysia',
            ),
            array(
                'key' => 'field_footer_address_ms',
                'label' => 'Address (MS)',
                'name' => 'footer_address_ms',
                'type' => 'text',
                'default_value' => 'Aras 33, Menara Ilham No. 8, Jalan Binjai 50450 Kuala Lumpur Malaysia',
            ),
            array(
                'key' => 'field_footer_email',
                'label' => 'Email Address',
                'name' => 'footer_email',
                'type' => 'email',
                'default_value' => 'orders@modafinil-malaysia.com',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'theme-general-settings',
                ),
            ),
        ),
    ));
endif;
