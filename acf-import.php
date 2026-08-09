<?php
require_once 'C:/laragon/www/modafinil-malaysia/wp-load.php';

// 1. Delete existing ACF field groups to avoid duplicates
$existing_groups = get_posts(array(
    'post_type' => 'acf-field-group',
    'numberposts' => -1,
    'post_status' => 'any'
));
foreach ($existing_groups as $group) {
    wp_delete_post($group->ID, true);
}

// 2. Import Theme Options
acf_import_field_group(array(
    'key' => 'group_theme_settings',
    'title' => 'Theme Global Settings',
    'fields' => array(
        array('key' => 'field_tab_brand', 'label' => 'Brand Details', 'type' => 'tab'),
        array('key' => 'field_site_tagline_en', 'label' => 'Site Tagline (EN)', 'name' => 'site_tagline_en', 'type' => 'text', 'default_value' => 'Sharper Focus. Higher Performance.'),
        array('key' => 'field_site_tagline_ms', 'label' => 'Site Tagline (MS)', 'name' => 'site_tagline_ms', 'type' => 'text', 'default_value' => 'Fokus Lebih Tajam. Perform Lebih Tinggi.'),
        array('key' => 'field_whatsapp_number', 'label' => 'WhatsApp Number URL', 'name' => 'whatsapp_number', 'type' => 'url', 'default_value' => 'https://wa.me/601116284532'),
        array('key' => 'field_tab_trust_bar', 'label' => 'Trust Bar', 'type' => 'tab'),
        array('key' => 'field_trust_bar_long_en', 'label' => 'Long Text (EN)', 'name' => 'trust_bar_long_en', 'type' => 'text', 'default_value' => 'Free Shipping Over RM399 &middot; 100% Genuine'),
        array('key' => 'field_trust_bar_long_ms', 'label' => 'Long Text (MS)', 'name' => 'trust_bar_long_ms', 'type' => 'text', 'default_value' => 'Penghantaran Percuma RM399+ &middot; 100% Asli'),
        array('key' => 'field_trust_bar_short_en', 'label' => 'Short Text (EN)', 'name' => 'trust_bar_short_en', 'type' => 'text', 'default_value' => '🚚 Free Shipping RM399+'),
        array('key' => 'field_trust_bar_short_ms', 'label' => 'Short Text (MS)', 'name' => 'trust_bar_short_ms', 'type' => 'text', 'default_value' => '🚚 Percuma Penghantaran RM399+'),
        array('key' => 'field_free_shipping_threshold', 'label' => 'Free Shipping Threshold', 'name' => 'free_shipping_threshold', 'type' => 'text', 'default_value' => 'RM399'),
        array('key' => 'field_tab_footer', 'label' => 'Footer', 'type' => 'tab'),
        array('key' => 'field_disclaimer_en', 'label' => 'Disclaimer (EN)', 'name' => 'disclaimer_en', 'type' => 'textarea', 'default_value' => 'The information on this site is for educational purposes only. Modafinil is a prescription medication in Malaysia. Please consult a licensed medical practitioner before using any cognitive enhancement products.'),
        array('key' => 'field_disclaimer_ms', 'label' => 'Disclaimer (MS)', 'name' => 'disclaimer_ms', 'type' => 'textarea', 'default_value' => 'Maklumat yang disediakan di laman web ini adalah untuk tujuan pendidikan sahaja dan tidak boleh dianggap sebagai nasihat perubatan. Modafinil adalah ubat preskripsi di Malaysia. Sila berunding dengan pengamal perubatan berlesen sebelum menggunakan sebarang produk peningkatan kognitif.'),
        array('key' => 'field_tab_badges', 'label' => 'Badges', 'type' => 'tab'),
        array('key' => 'field_trust_badges', 'label' => 'Trust Badges', 'name' => 'trust_badges', 'type' => 'repeater', 'sub_fields' => array(
            array('key' => 'field_tb_icon', 'label' => 'Icon Name', 'name' => 'icon', 'type' => 'text', 'default_value' => 'shield-check'),
            array('key' => 'field_tb_text_en', 'label' => 'Text (EN)', 'name' => 'text_en', 'type' => 'text'),
            array('key' => 'field_tb_text_ms', 'label' => 'Text (MS)', 'name' => 'text_ms', 'type' => 'text'),
        )),
        array('key' => 'field_footer_badges', 'label' => 'Footer Badges', 'name' => 'footer_badges', 'type' => 'repeater', 'sub_fields' => array(
            array('key' => 'field_fb_icon', 'label' => 'Icon Name', 'name' => 'icon', 'type' => 'text', 'default_value' => 'shield-check'),
            array('key' => 'field_fb_text_en', 'label' => 'Text (EN)', 'name' => 'text_en', 'type' => 'text'),
            array('key' => 'field_fb_text_ms', 'label' => 'Text (MS)', 'name' => 'text_ms', 'type' => 'text'),
        )),
        array('key' => 'field_tab_faqs', 'label' => 'Global FAQs', 'type' => 'tab'),
        array('key' => 'field_faqs_list', 'label' => 'FAQs', 'name' => 'faqs_list', 'type' => 'repeater', 'sub_fields' => array(
            array('key' => 'field_faq_category', 'label' => 'Category', 'name' => 'category', 'type' => 'select', 'choices' => array('Legal Status' => 'Legal Status', 'Delivery' => 'Delivery', 'Payment' => 'Payment', 'Products' => 'Products')),
            array('key' => 'field_faq_q_en', 'label' => 'Question (EN)', 'name' => 'question_en', 'type' => 'text'),
            array('key' => 'field_faq_q_ms', 'label' => 'Question (MS)', 'name' => 'question_ms', 'type' => 'text'),
            array('key' => 'field_faq_a_en', 'label' => 'Answer (EN)', 'name' => 'answer_en', 'type' => 'textarea'),
            array('key' => 'field_faq_a_ms', 'label' => 'Answer (MS)', 'name' => 'answer_ms', 'type' => 'textarea'),
        )),
    ),
    'location' => array(array(array('param' => 'options_page', 'operator' => '==', 'value' => 'theme-general-settings'))),
));

// 3. Import Review Details
acf_import_field_group(array(
    'key' => 'group_review_data',
    'title' => 'Review Details',
    'fields' => array(
        array('key' => 'field_rev_author_name', 'label' => 'Author Name', 'name' => 'author_name', 'type' => 'text'),
        array('key' => 'field_rev_author_meta', 'label' => 'Author Meta', 'name' => 'author_meta', 'type' => 'text', 'default_value' => 'Verified Buyer'),
        array('key' => 'field_rev_rating', 'label' => 'Rating', 'name' => 'rating', 'type' => 'number', 'default_value' => 5),
        array('key' => 'field_rev_title_en', 'label' => 'Title (EN)', 'name' => 'title_en', 'type' => 'text'),
        array('key' => 'field_rev_title_ms', 'label' => 'Title (MS)', 'name' => 'title_ms', 'type' => 'text'),
        array('key' => 'field_rev_body_en', 'label' => 'Body (EN)', 'name' => 'body_en', 'type' => 'textarea'),
        array('key' => 'field_rev_body_ms', 'label' => 'Body (MS)', 'name' => 'body_ms', 'type' => 'textarea'),
    ),
    'location' => array(array(array('param' => 'post_type', 'operator' => '==', 'value' => 'review'))),
));

// 4. Import City Page Details
acf_import_field_group(array(
    'key' => 'group_city_data',
    'title' => 'City Page Details',
    'fields' => array(
        array('key' => 'field_city_region_en', 'label' => 'Region (EN)', 'name' => 'region_en', 'type' => 'text'),
        array('key' => 'field_city_region_ms', 'label' => 'Region (MS)', 'name' => 'region_ms', 'type' => 'text'),
        array('key' => 'field_city_population', 'label' => 'Population', 'name' => 'population', 'type' => 'text'),
        array('key' => 'field_city_days', 'label' => 'Delivery Days', 'name' => 'days', 'type' => 'text'),
        array('key' => 'field_city_demographic_en', 'label' => 'Target Demographic (EN)', 'name' => 'demographic_en', 'type' => 'text'),
        array('key' => 'field_city_demographic_ms', 'label' => 'Target Demographic (MS)', 'name' => 'demographic_ms', 'type' => 'text'),
        array('key' => 'field_city_industry_en', 'label' => 'Key Industry (EN)', 'name' => 'industry_en', 'type' => 'text'),
        array('key' => 'field_city_industry_ms', 'label' => 'Key Industry (MS)', 'name' => 'industry_ms', 'type' => 'text'),
        array('key' => 'field_city_hero_desc_en', 'label' => 'Hero Description (EN)', 'name' => 'hero_description_en', 'type' => 'textarea'),
        array('key' => 'field_city_hero_desc_ms', 'label' => 'Hero Description (MS)', 'name' => 'hero_description_ms', 'type' => 'textarea'),
        array('key' => 'field_city_desc_en', 'label' => 'Long Description (EN)', 'name' => 'description_en', 'type' => 'wysiwyg'),
        array('key' => 'field_city_desc_ms', 'label' => 'Long Description (MS)', 'name' => 'description_ms', 'type' => 'wysiwyg'),
        array('key' => 'field_city_features', 'label' => 'Feature Cards', 'name' => 'features', 'type' => 'repeater', 'sub_fields' => array(
            array('key' => 'field_city_feat_icon', 'label' => 'Icon Name', 'name' => 'icon', 'type' => 'text'),
            array('key' => 'field_city_feat_en', 'label' => 'Text (EN)', 'name' => 'text_en', 'type' => 'text'),
            array('key' => 'field_city_feat_ms', 'label' => 'Text (MS)', 'name' => 'text_ms', 'type' => 'text'),
        )),
        array('key' => 'field_city_reviews', 'label' => 'Featured Reviews', 'name' => 'city_reviews', 'type' => 'relationship', 'post_type' => array('review')),
    ),
    'location' => array(array(array('param' => 'post_type', 'operator' => '==', 'value' => 'city'))),
));

// 5. Import Page Modules (Flexible Content)
acf_import_field_group(array(
    'key' => 'group_page_modules',
    'title' => 'Page Modules',
    'fields' => array(
        array(
            'key' => 'field_modules',
            'label' => 'Modules',
            'name' => 'modules',
            'type' => 'flexible_content',
            'layouts' => array(
                'layout_hero_section' => array(
                    'key' => 'layout_hero_section', 'name' => 'hero_section', 'label' => 'Hero Section', 'display' => 'block',
                    'sub_fields' => array(
                        array('key' => 'field_hero_bg', 'label' => 'Background Image', 'name' => 'background_image', 'type' => 'image', 'return_format' => 'array'),
                        array('key' => 'field_hero_loc_en', 'label' => 'Location (EN)', 'name' => 'location_text_en', 'type' => 'text'),
                        array('key' => 'field_hero_loc_ms', 'label' => 'Location (MS)', 'name' => 'location_text_ms', 'type' => 'text'),
                        array('key' => 'field_hero_heading_en', 'label' => 'Heading (EN)', 'name' => 'heading_en', 'type' => 'text'),
                        array('key' => 'field_hero_heading_ms', 'label' => 'Heading (MS)', 'name' => 'heading_ms', 'type' => 'text'),
                        array('key' => 'field_hero_sub_en', 'label' => 'Subtitle (EN)', 'name' => 'subtitle_en', 'type' => 'text'),
                        array('key' => 'field_hero_sub_ms', 'label' => 'Subtitle (MS)', 'name' => 'subtitle_ms', 'type' => 'text'),
                        array('key' => 'field_hero_desc_en', 'label' => 'Desc (EN)', 'name' => 'description_en', 'type' => 'textarea'),
                        array('key' => 'field_hero_desc_ms', 'label' => 'Desc (MS)', 'name' => 'description_ms', 'type' => 'textarea'),
                        array('key' => 'field_hero_btn1_en', 'label' => 'Btn1 (EN)', 'name' => 'primary_button_text_en', 'type' => 'text'),
                        array('key' => 'field_hero_btn1_ms', 'label' => 'Btn1 (MS)', 'name' => 'primary_button_text_ms', 'type' => 'text'),
                        array('key' => 'field_hero_btn1_link', 'label' => 'Btn1 Link', 'name' => 'primary_button_link', 'type' => 'url'),
                        array('key' => 'field_hero_btn2_en', 'label' => 'Btn2 (EN)', 'name' => 'secondary_button_text_en', 'type' => 'text'),
                        array('key' => 'field_hero_btn2_ms', 'label' => 'Btn2 (MS)', 'name' => 'secondary_button_text_ms', 'type' => 'text'),
                        array('key' => 'field_hero_btn2_link', 'label' => 'Btn2 Link', 'name' => 'secondary_button_link', 'type' => 'url'),
                    )
                ),
                'layout_trust_strip' => array('key' => 'layout_trust_strip', 'name' => 'trust_strip', 'label' => 'Trust Strip', 'display' => 'block', 'sub_fields' => array(array('key' => 'field_trust_strip_msg', 'label' => 'Msg', 'name' => 'message', 'type' => 'message', 'message' => 'Pulls automatically'))),
                'layout_featured_products' => array('key' => 'layout_featured_products', 'name' => 'featured_products', 'label' => 'Featured Products', 'display' => 'block', 'sub_fields' => array(
                    array('key' => 'field_fp_title_en', 'label' => 'Title (EN)', 'name' => 'title_en', 'type' => 'text'),
                    array('key' => 'field_fp_title_ms', 'label' => 'Title (MS)', 'name' => 'title_ms', 'type' => 'text'),
                    array('key' => 'field_fp_products', 'label' => 'Products', 'name' => 'products', 'type' => 'relationship', 'post_type' => array('product'))
                )),
                'layout_why_choose_us' => array('key' => 'layout_why_choose_us', 'name' => 'why_choose_us', 'label' => 'Why Choose Us', 'display' => 'block', 'sub_fields' => array(
                    array('key' => 'field_wcu_title_en', 'label' => 'Title (EN)', 'name' => 'title_en', 'type' => 'text'),
                    array('key' => 'field_wcu_title_ms', 'label' => 'Title (MS)', 'name' => 'title_ms', 'type' => 'text'),
                    array('key' => 'field_wcu_features', 'label' => 'Features', 'name' => 'features', 'type' => 'repeater', 'sub_fields' => array(
                        array('key' => 'field_wcu_f_icon', 'label' => 'Icon', 'name' => 'icon', 'type' => 'text'),
                        array('key' => 'field_wcu_f_title_en', 'label' => 'Title (EN)', 'name' => 'title_en', 'type' => 'text'),
                        array('key' => 'field_wcu_f_title_ms', 'label' => 'Title (MS)', 'name' => 'title_ms', 'type' => 'text'),
                        array('key' => 'field_wcu_f_desc_en', 'label' => 'Desc (EN)', 'name' => 'description_en', 'type' => 'textarea'),
                        array('key' => 'field_wcu_f_desc_ms', 'label' => 'Desc (MS)', 'name' => 'description_ms', 'type' => 'textarea'),
                    ))
                )),
                'layout_reviews_carousel' => array('key' => 'layout_reviews_carousel', 'name' => 'reviews_carousel', 'label' => 'Reviews Carousel', 'display' => 'block', 'sub_fields' => array(
                    array('key' => 'field_rc_title_en', 'label' => 'Title (EN)', 'name' => 'title_en', 'type' => 'text'),
                    array('key' => 'field_rc_title_ms', 'label' => 'Title (MS)', 'name' => 'title_ms', 'type' => 'text'),
                    array('key' => 'field_rc_reviews', 'label' => 'Reviews', 'name' => 'reviews', 'type' => 'relationship', 'post_type' => array('review'))
                )),
                'layout_faqs' => array('key' => 'layout_faqs', 'name' => 'faqs', 'label' => 'FAQs', 'display' => 'block', 'sub_fields' => array(array('key' => 'field_faq_mod_msg', 'label' => 'Msg', 'name' => 'message', 'type' => 'message', 'message' => 'Pulls automatically'))),
                'layout_cta' => array('key' => 'layout_cta', 'name' => 'cta', 'label' => 'Call to Action', 'display' => 'block', 'sub_fields' => array(
                    array('key' => 'field_cta_title_en', 'label' => 'Title (EN)', 'name' => 'title_en', 'type' => 'text'),
                    array('key' => 'field_cta_title_ms', 'label' => 'Title (MS)', 'name' => 'title_ms', 'type' => 'text'),
                    array('key' => 'field_cta_btn_en', 'label' => 'Btn (EN)', 'name' => 'button_text_en', 'type' => 'text'),
                    array('key' => 'field_cta_btn_ms', 'label' => 'Btn (MS)', 'name' => 'button_text_ms', 'type' => 'text'),
                    array('key' => 'field_cta_btn_url', 'label' => 'Btn URL', 'name' => 'button_url', 'type' => 'url'),
                )),
            ),
        ),
    ),
    'location' => array(array(array('param' => 'post_type', 'operator' => '==', 'value' => 'page'))),
));

echo "ACF Field Groups successfully imported to database!";
