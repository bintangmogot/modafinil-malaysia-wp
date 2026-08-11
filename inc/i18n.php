<?php
/**
 * Bilingual System (EN/MS Toggle)
 * 
 * We use a custom PHP+JS cookie-based approach instead of a heavy plugin like WPML.
 * The active language is stored in the 'site_lang' cookie (set by JS).
 */

/**
 * Get current language (defaults to 'ms')
 * @return string 'en' or 'ms'
 */
function modmy_get_lang() {
    // Check URL parameter first (e.g. ?lang=en)
    if (isset($_GET['lang']) && in_array($_GET['lang'], ['en', 'ms'])) {
        return $_GET['lang'];
    }
    
    // Then check cookie
    if (isset($_COOKIE['site_lang']) && $_COOKIE['site_lang'] === 'en') {
        return 'en';
    }
    
    return 'ms'; // Default to Malay
}

/**
 * Output translated text based on active language
 * @param string $en Text in English
 * @param string $ms Text in Malay
 * @return string Active text
 */
function modmy_t($en, $ms) {
    return modmy_get_lang() === 'en' ? $en : $ms;
}

/**
 * Filter post title to respect active language
 */
add_filter('the_title', function($title, $id = null) {
    if (is_admin() || !$id) return $title;
    $lang = modmy_get_lang();
    $meta_title = get_post_meta($id, '_title_' . $lang, true);
    return $meta_title ? $meta_title : $title;
}, 10, 2);

/**
 * Filter post excerpt
 */
add_filter('get_the_excerpt', function($excerpt, $post = null) {
    if (is_admin()) return $excerpt;
    $post_id = is_object($post) ? (isset($post->ID) ? $post->ID : 0) : get_the_ID();
    if (!$post_id) return $excerpt;
    $lang = modmy_get_lang();
    $meta_excerpt = get_post_meta($post_id, '_excerpt_' . $lang, true);
    return $meta_excerpt ? $meta_excerpt : $excerpt;
}, 10, 2);

/**
 * Get category name with bilingual fallback
 */
function modmy_get_post_category($post_id = null) {
    $post_id = $post_id ?: get_the_ID();
    $lang = modmy_get_lang();
    $meta_cat = get_post_meta($post_id, '_category_' . $lang, true);
    if ($meta_cat) return $meta_cat;
    
    $categories = get_the_category($post_id);
    if (!empty($categories)) {
        return $categories[0]->name;
    }
    return '';
}
