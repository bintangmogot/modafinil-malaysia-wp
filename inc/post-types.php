<?php
/**
 * Custom Post Types & their ACF fields
 */

function modmy_register_post_types() {
    // 1. Reviews CPT
    $review_labels = array(
        'name'                  => 'Reviews',
        'singular_name'         => 'Review',
        'menu_name'             => 'Reviews',
        'name_admin_bar'        => 'Review',
        'add_new'               => 'Add New',
        'add_new_item'          => 'Add New Review',
        'new_item'              => 'New Review',
        'edit_item'             => 'Edit Review',
        'view_item'             => 'View Review',
        'all_items'             => 'All Reviews',
        'search_items'          => 'Search Reviews',
        'not_found'             => 'No reviews found.',
    );

    $review_args = array(
        'labels'             => $review_labels,
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'review' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-star-filled',
        'supports'           => array( 'title' ), // We will use title for internal reference or author name
    );

    register_post_type( 'review', $review_args );

    // 2. Cities CPT
    $city_labels = array(
        'name'                  => 'Cities',
        'singular_name'         => 'City',
        'menu_name'             => 'Cities',
        'name_admin_bar'        => 'City',
        'add_new'               => 'Add New',
        'add_new_item'          => 'Add New City',
        'new_item'              => 'New City',
        'edit_item'             => 'Edit City',
        'view_item'             => 'View City',
        'all_items'             => 'All Cities',
        'search_items'          => 'Search Cities',
        'not_found'             => 'No cities found.',
    );

    $city_args = array(
        'labels'             => $city_labels,
        'public'             => true, // Cities have their own landing pages
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'buy-modafinil', 'with_front' => false ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 21,
        'menu_icon'          => 'dashicons-location',
        'supports'           => array( 'title', 'thumbnail' ),
    );

    register_post_type( 'city', $city_args );
}
add_action( 'init', 'modmy_register_post_types' );

/**
 * Register ACF Fields for CPTs
 */
if (function_exists('acf_add_local_field_group')) {
    add_action('acf/init', function() {
        
        // --- REVIEWS FIELD GROUP ---
        acf_add_local_field_group(array(
            'key' => 'group_review_data',
            'title' => 'Review Details',
            'fields' => array(
                array(
                    'key' => 'field_rev_author_name',
                    'label' => 'Author Name',
                    'name' => 'author_name',
                    'type' => 'text',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_rev_author_meta',
                    'label' => 'Author Meta (e.g. Verified Buyer)',
                    'name' => 'author_meta',
                    'type' => 'text',
                    'default_value' => 'Verified Buyer',
                ),
                array(
                    'key' => 'field_rev_rating',
                    'label' => 'Rating',
                    'name' => 'rating',
                    'type' => 'number',
                    'min' => 1,
                    'max' => 5,
                    'default_value' => 5,
                ),
                array(
                    'key' => 'field_rev_title_en',
                    'label' => 'Review Title (EN)',
                    'name' => 'title_en',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_rev_title_ms',
                    'label' => 'Review Title (MS)',
                    'name' => 'title_ms',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_rev_body_en',
                    'label' => 'Review Body (EN)',
                    'name' => 'body_en',
                    'type' => 'textarea',
                ),
                array(
                    'key' => 'field_rev_body_ms',
                    'label' => 'Review Body (MS)',
                    'name' => 'body_ms',
                    'type' => 'textarea',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'review',
                    ),
                ),
            ),
        ));

        // --- CITIES FIELD GROUP ---
        acf_add_local_field_group(array(
            'key' => 'group_city_data',
            'title' => 'City Page Details',
            'fields' => array(
                array(
                    'key' => 'field_city_region_en',
                    'label' => 'Region (EN)',
                    'name' => 'region_en',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_city_region_ms',
                    'label' => 'Region (MS)',
                    'name' => 'region_ms',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_city_population',
                    'label' => 'Population',
                    'name' => 'population',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_city_days',
                    'label' => 'Delivery Days (e.g. 7-12)',
                    'name' => 'days',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_city_demographic_en',
                    'label' => 'Target Demographic (EN)',
                    'name' => 'demographic_en',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_city_demographic_ms',
                    'label' => 'Target Demographic (MS)',
                    'name' => 'demographic_ms',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_city_industry_en',
                    'label' => 'Key Industry (EN)',
                    'name' => 'industry_en',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_city_industry_ms',
                    'label' => 'Key Industry (MS)',
                    'name' => 'industry_ms',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_city_hero_desc_en',
                    'label' => 'Hero Description (EN)',
                    'name' => 'hero_description_en',
                    'type' => 'textarea',
                    'rows' => 3,
                ),
                array(
                    'key' => 'field_city_hero_desc_ms',
                    'label' => 'Hero Description (MS)',
                    'name' => 'hero_description_ms',
                    'type' => 'textarea',
                    'rows' => 3,
                ),
                array(
                    'key' => 'field_city_desc_en',
                    'label' => 'Long Description (EN)',
                    'name' => 'description_en',
                    'type' => 'wysiwyg',
                ),
                array(
                    'key' => 'field_city_desc_ms',
                    'label' => 'Long Description (MS)',
                    'name' => 'description_ms',
                    'type' => 'wysiwyg',
                ),
                array(
                    'key' => 'field_city_features',
                    'label' => 'Feature Cards',
                    'name' => 'features',
                    'type' => 'repeater',
                    'layout' => 'table',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_city_feat_icon',
                            'label' => 'Lucide Icon Name',
                            'name' => 'icon',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_city_feat_en',
                            'label' => 'Text (EN)',
                            'name' => 'text_en',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_city_feat_ms',
                            'label' => 'Text (MS)',
                            'name' => 'text_ms',
                            'type' => 'text',
                        ),
                    ),
                ),
                array(
                    'key' => 'field_city_reviews',
                    'label' => 'Featured Reviews for this City',
                    'name' => 'city_reviews',
                    'type' => 'relationship',
                    'post_type' => array('review'),
                    'filters' => array('search'),
                    'return_format' => 'id',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'city',
                    ),
                ),
            ),
        ));
    });
}
