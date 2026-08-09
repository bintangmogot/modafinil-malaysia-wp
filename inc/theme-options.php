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

if (function_exists('acf_add_local_field_group')) {
    add_action('acf/init', function() {
        acf_add_local_field_group(array(
            'key' => 'group_theme_settings',
            'title' => 'Theme Global Settings',
            'fields' => array(
                // Tab: Brand Details
                array(
                    'key' => 'field_tab_brand',
                    'label' => 'Brand Details',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_site_tagline_en',
                    'label' => 'Site Tagline (EN)',
                    'name' => 'site_tagline_en',
                    'type' => 'text',
                    'default_value' => 'Sharper Focus. Higher Performance.',
                ),
                array(
                    'key' => 'field_site_tagline_ms',
                    'label' => 'Site Tagline (MS)',
                    'name' => 'site_tagline_ms',
                    'type' => 'text',
                    'default_value' => 'Fokus Lebih Tajam. Perform Lebih Tinggi.',
                ),
                array(
                    'key' => 'field_whatsapp_number',
                    'label' => 'WhatsApp Number URL',
                    'name' => 'whatsapp_number',
                    'type' => 'url',
                    'default_value' => 'https://wa.me/601116284532',
                ),

                // Tab: Trust Bar
                array(
                    'key' => 'field_tab_trust_bar',
                    'label' => 'Trust Bar (Top of Header)',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_trust_bar_long_en',
                    'label' => 'Long Text (Desktop EN)',
                    'name' => 'trust_bar_long_en',
                    'type' => 'text',
                    'default_value' => 'Free Shipping Over RM399 &middot; 100% Genuine',
                ),
                array(
                    'key' => 'field_trust_bar_long_ms',
                    'label' => 'Long Text (Desktop MS)',
                    'name' => 'trust_bar_long_ms',
                    'type' => 'text',
                    'default_value' => 'Penghantaran Percuma RM399+ &middot; 100% Asli',
                ),
                array(
                    'key' => 'field_trust_bar_short_en',
                    'label' => 'Short Text (Mobile EN)',
                    'name' => 'trust_bar_short_en',
                    'type' => 'text',
                    'default_value' => '🚚 Free Shipping RM399+',
                ),
                array(
                    'key' => 'field_trust_bar_short_ms',
                    'label' => 'Short Text (Mobile MS)',
                    'name' => 'trust_bar_short_ms',
                    'type' => 'text',
                    'default_value' => '🚚 Percuma Penghantaran RM399+',
                ),
                array(
                    'key' => 'field_free_shipping_threshold',
                    'label' => 'Free Shipping Threshold',
                    'name' => 'free_shipping_threshold',
                    'type' => 'text',
                    'default_value' => 'RM399',
                ),

                // Tab: Footer
                array(
                    'key' => 'field_tab_footer',
                    'label' => 'Footer',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_disclaimer_en',
                    'label' => 'Medical Disclaimer (EN)',
                    'name' => 'disclaimer_en',
                    'type' => 'textarea',
                    'rows' => 4,
                    'default_value' => 'The information on this site is for educational purposes only. Modafinil is a prescription medication in Malaysia. Please consult a licensed medical practitioner before using any cognitive enhancement products.',
                ),
                array(
                    'key' => 'field_disclaimer_ms',
                    'label' => 'Medical Disclaimer (MS)',
                    'name' => 'disclaimer_ms',
                    'type' => 'textarea',
                    'rows' => 4,
                    'default_value' => 'Maklumat yang disediakan di laman web ini adalah untuk tujuan pendidikan sahaja dan tidak boleh dianggap sebagai nasihat perubatan. Modafinil adalah ubat preskripsi di Malaysia. Sila berunding dengan pengamal perubatan berlesen sebelum menggunakan sebarang produk peningkatan kognitif.',
                ),

                // Tab: Badges
                array(
                    'key' => 'field_tab_badges',
                    'label' => 'Badges',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_trust_badges',
                    'label' => 'Trust Badges (City pages, Checkout)',
                    'name' => 'trust_badges',
                    'type' => 'repeater',
                    'layout' => 'table',
                    'button_label' => 'Add Badge',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_tb_icon',
                            'label' => 'Lucide Icon Name',
                            'name' => 'icon',
                            'type' => 'text',
                            'default_value' => 'shield-check',
                        ),
                        array(
                            'key' => 'field_tb_text_en',
                            'label' => 'Text (EN)',
                            'name' => 'text_en',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_tb_text_ms',
                            'label' => 'Text (MS)',
                            'name' => 'text_ms',
                            'type' => 'text',
                        ),
                    ),
                ),
                array(
                    'key' => 'field_footer_badges',
                    'label' => 'Footer Badges',
                    'name' => 'footer_badges',
                    'type' => 'repeater',
                    'layout' => 'table',
                    'button_label' => 'Add Footer Badge',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_fb_icon',
                            'label' => 'Lucide Icon Name',
                            'name' => 'icon',
                            'type' => 'text',
                            'default_value' => 'shield-check',
                        ),
                        array(
                            'key' => 'field_fb_text_en',
                            'label' => 'Text (EN)',
                            'name' => 'text_en',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_fb_text_ms',
                            'label' => 'Text (MS)',
                            'name' => 'text_ms',
                            'type' => 'text',
                        ),
                    ),
                ),

                // Tab: FAQs
                array(
                    'key' => 'field_tab_faqs',
                    'label' => 'Global FAQs',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_faqs_list',
                    'label' => 'Frequently Asked Questions',
                    'name' => 'faqs_list',
                    'type' => 'repeater',
                    'layout' => 'block',
                    'button_label' => 'Add FAQ',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_faq_category',
                            'label' => 'Category',
                            'name' => 'category',
                            'type' => 'select',
                            'choices' => array(
                                'Legal Status' => 'Legal Status',
                                'Delivery' => 'Delivery',
                                'Payment' => 'Payment',
                                'Products' => 'Products',
                            ),
                        ),
                        array(
                            'key' => 'field_faq_q_en',
                            'label' => 'Question (EN)',
                            'name' => 'question_en',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_faq_q_ms',
                            'label' => 'Question (MS)',
                            'name' => 'question_ms',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_faq_a_en',
                            'label' => 'Answer (EN)',
                            'name' => 'answer_en',
                            'type' => 'textarea',
                            'rows' => 3,
                        ),
                        array(
                            'key' => 'field_faq_a_ms',
                            'label' => 'Answer (MS)',
                            'name' => 'answer_ms',
                            'type' => 'textarea',
                            'rows' => 3,
                        ),
                    ),
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
    });
}
