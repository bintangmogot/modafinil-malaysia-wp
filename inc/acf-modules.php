<?php
/**
 * Register ACF Flexible Content Field Group for Page Modules
 */

if (function_exists('acf_add_local_field_group')) {
    add_action('acf/init', function() {
        acf_add_local_field_group(array(
            'key' => 'group_page_modules',
            'title' => 'Page Modules',
            'fields' => array(
                array(
                    'key' => 'field_modules',
                    'label' => 'Modules',
                    'name' => 'modules',
                    'type' => 'flexible_content',
                    'button_label' => 'Add Module',
                    'layouts' => array(
                        // 1. Hero Section
                        'layout_hero_section' => array(
                            'key' => 'layout_hero_section',
                            'name' => 'hero_section',
                            'label' => 'Hero Section',
                            'display' => 'block',
                            'sub_fields' => array(
                                array('key' => 'field_hero_bg', 'label' => 'Background Image', 'name' => 'background_image', 'type' => 'image', 'return_format' => 'array'),
                                array('key' => 'field_hero_loc_en', 'label' => 'Location Text (EN)', 'name' => 'location_text_en', 'type' => 'text'),
                                array('key' => 'field_hero_loc_ms', 'label' => 'Location Text (MS)', 'name' => 'location_text_ms', 'type' => 'text'),
                                array('key' => 'field_hero_heading_en', 'label' => 'Heading (EN)', 'name' => 'heading_en', 'type' => 'text'),
                                array('key' => 'field_hero_heading_ms', 'label' => 'Heading (MS)', 'name' => 'heading_ms', 'type' => 'text'),
                                array('key' => 'field_hero_sub_en', 'label' => 'Subtitle (EN)', 'name' => 'subtitle_en', 'type' => 'text'),
                                array('key' => 'field_hero_sub_ms', 'label' => 'Subtitle (MS)', 'name' => 'subtitle_ms', 'type' => 'text'),
                                array('key' => 'field_hero_desc_en', 'label' => 'Description (EN)', 'name' => 'description_en', 'type' => 'textarea', 'rows' => 3),
                                array('key' => 'field_hero_desc_ms', 'label' => 'Description (MS)', 'name' => 'description_ms', 'type' => 'textarea', 'rows' => 3),
                                array('key' => 'field_hero_btn1_en', 'label' => 'Primary Button (EN)', 'name' => 'primary_button_text_en', 'type' => 'text'),
                                array('key' => 'field_hero_btn1_ms', 'label' => 'Primary Button (MS)', 'name' => 'primary_button_text_ms', 'type' => 'text'),
                                array('key' => 'field_hero_btn1_link', 'label' => 'Primary Button Link', 'name' => 'primary_button_link', 'type' => 'url'),
                                array('key' => 'field_hero_btn2_en', 'label' => 'Secondary Button (EN)', 'name' => 'secondary_button_text_en', 'type' => 'text'),
                                array('key' => 'field_hero_btn2_ms', 'label' => 'Secondary Button (MS)', 'name' => 'secondary_button_text_ms', 'type' => 'text'),
                                array('key' => 'field_hero_btn2_link', 'label' => 'Secondary Button Link', 'name' => 'secondary_button_link', 'type' => 'url'),
                            ),
                        ),
                        // 2. Trust Strip
                        'layout_trust_strip' => array(
                            'key' => 'layout_trust_strip',
                            'name' => 'trust_strip',
                            'label' => 'Trust Strip',
                            'display' => 'block',
                            'sub_fields' => array(
                                array(
                                    'key' => 'field_trust_strip_msg',
                                    'label' => 'Message',
                                    'name' => 'message',
                                    'type' => 'message',
                                    'message' => 'The Trust Strip automatically pulls from the Trust Badges defined in the Theme Settings. No configuration needed here!',
                                )
                            ),
                        ),
                        // 3. Featured Products
                        'layout_featured_products' => array(
                            'key' => 'layout_featured_products',
                            'name' => 'featured_products',
                            'label' => 'Featured Products',
                            'display' => 'block',
                            'sub_fields' => array(
                                array('key' => 'field_fp_title_en', 'label' => 'Title (EN)', 'name' => 'title_en', 'type' => 'text'),
                                array('key' => 'field_fp_title_ms', 'label' => 'Title (MS)', 'name' => 'title_ms', 'type' => 'text'),
                                array('key' => 'field_fp_products', 'label' => 'Select Products', 'name' => 'products', 'type' => 'relationship', 'post_type' => array('product'), 'return_format' => 'id'),
                            ),
                        ),
                        // 4. Why Choose Us
                        'layout_why_choose_us' => array(
                            'key' => 'layout_why_choose_us',
                            'name' => 'why_choose_us',
                            'label' => 'Why Choose Us',
                            'display' => 'block',
                            'sub_fields' => array(
                                array('key' => 'field_wcu_title_en', 'label' => 'Title (EN)', 'name' => 'title_en', 'type' => 'text'),
                                array('key' => 'field_wcu_title_ms', 'label' => 'Title (MS)', 'name' => 'title_ms', 'type' => 'text'),
                                array(
                                    'key' => 'field_wcu_features',
                                    'label' => 'Features',
                                    'name' => 'features',
                                    'type' => 'repeater',
                                    'sub_fields' => array(
                                        array('key' => 'field_wcu_f_icon', 'label' => 'Lucide Icon', 'name' => 'icon', 'type' => 'text'),
                                        array('key' => 'field_wcu_f_title_en', 'label' => 'Title (EN)', 'name' => 'title_en', 'type' => 'text'),
                                        array('key' => 'field_wcu_f_title_ms', 'label' => 'Title (MS)', 'name' => 'title_ms', 'type' => 'text'),
                                        array('key' => 'field_wcu_f_desc_en', 'label' => 'Desc (EN)', 'name' => 'description_en', 'type' => 'textarea', 'rows' => 2),
                                        array('key' => 'field_wcu_f_desc_ms', 'label' => 'Desc (MS)', 'name' => 'description_ms', 'type' => 'textarea', 'rows' => 2),
                                    )
                                )
                            ),
                        ),
                        // 5. Reviews Carousel
                        'layout_reviews_carousel' => array(
                            'key' => 'layout_reviews_carousel',
                            'name' => 'reviews_carousel',
                            'label' => 'Reviews Carousel',
                            'display' => 'block',
                            'sub_fields' => array(
                                array('key' => 'field_rc_title_en', 'label' => 'Title (EN)', 'name' => 'title_en', 'type' => 'text'),
                                array('key' => 'field_rc_title_ms', 'label' => 'Title (MS)', 'name' => 'title_ms', 'type' => 'text'),
                                array('key' => 'field_rc_reviews', 'label' => 'Select Reviews', 'name' => 'reviews', 'type' => 'relationship', 'post_type' => array('review'), 'return_format' => 'id'),
                            ),
                        ),
                        // 6. FAQs
                        'layout_faqs' => array(
                            'key' => 'layout_faqs',
                            'name' => 'faqs',
                            'label' => 'FAQs',
                            'display' => 'block',
                            'sub_fields' => array(
                                array(
                                    'key' => 'field_faq_mod_msg',
                                    'label' => 'Message',
                                    'name' => 'message',
                                    'type' => 'message',
                                    'message' => 'The FAQs module automatically pulls the Global FAQs defined in Theme Settings. No configuration needed here!',
                                )
                            ),
                        ),
                        // 7. CTA
                        'layout_cta' => array(
                            'key' => 'layout_cta',
                            'name' => 'cta',
                            'label' => 'Call to Action',
                            'display' => 'block',
                            'sub_fields' => array(
                                array('key' => 'field_cta_title_en', 'label' => 'Title (EN)', 'name' => 'title_en', 'type' => 'text'),
                                array('key' => 'field_cta_title_ms', 'label' => 'Title (MS)', 'name' => 'title_ms', 'type' => 'text'),
                                array('key' => 'field_cta_btn_en', 'label' => 'Button Text (EN)', 'name' => 'button_text_en', 'type' => 'text'),
                                array('key' => 'field_cta_btn_ms', 'label' => 'Button Text (MS)', 'name' => 'button_text_ms', 'type' => 'text'),
                                array('key' => 'field_cta_btn_url', 'label' => 'Button URL', 'name' => 'button_url', 'type' => 'url'),
                            ),
                        ),
                    ),
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'page',
                    ),
                ),
            ),
        ));
    });
}
