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
 * Filter post content
 */
add_filter('the_content', function($content) {
    if (is_admin() || !is_main_query() || !in_the_loop()) return $content;
    $lang = modmy_get_lang();
    $post_id = get_the_ID();
    $meta_content = get_post_meta($post_id, '_content_' . $lang, true);
    return $meta_content ? $meta_content : $content;
});


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

/**
 * Register ACF Fields for Bilingual Content
 */
if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
        'key' => 'group_bilingual_post',
        'title' => 'Bilingual Post Content (Malay)',
        'fields' => array(
            array(
                'key' => 'field_title_ms',
                'label' => 'Title (MS)',
                'name' => '_title_ms',
                'type' => 'text',
                'instructions' => 'Enter the Malay translation for the post title.',
            ),
            array(
                'key' => 'field_excerpt_ms',
                'label' => 'Excerpt (MS)',
                'name' => '_excerpt_ms',
                'type' => 'textarea',
                'instructions' => 'Enter the Malay translation for the post excerpt.',
                'rows' => 4,
            ),
            array(
                'key' => 'field_category_ms',
                'label' => 'Category (MS)',
                'name' => '_category_ms',
                'type' => 'text',
                'instructions' => 'Enter the Malay translation for the post category.',
            ),
            array(
                'key' => 'field_content_ms',
                'label' => 'Content (MS)',
                'name' => '_content_ms',
                'type' => 'wysiwyg',
                'instructions' => 'Enter the Malay translation for the post content.',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ),
            ),
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => 'Fields for managing bilingual Malay translations on posts and pages.',
    ));
}

/**
 * Auto-Translate to Malay on post save using Stichoza
 */
add_action('acf/save_post', function($post_id) {
    if (!in_array(get_post_type($post_id), ['post', 'page'])) return;
    
    // Avoid running on revisions
    if (wp_is_post_revision($post_id)) return;
    
    // Load composer autoloader
    if (file_exists(get_template_directory() . '/vendor/autoload.php')) {
        require_once get_template_directory() . '/vendor/autoload.php';
    }
    
    if (!class_exists('Stichoza\GoogleTranslate\GoogleTranslate')) return;
    
    try {
        $tr = new \Stichoza\GoogleTranslate\GoogleTranslate('ms', 'en');
        $post = get_post($post_id);
        
        // Check and translate Title
        $title_ms = get_post_meta($post_id, '_title_ms', true);
        if (empty($title_ms) && !empty($post->post_title)) {
            update_post_meta($post_id, '_title_ms', $tr->translate($post->post_title));
        }
        
        // Check and translate Excerpt
        $excerpt_ms = get_post_meta($post_id, '_excerpt_ms', true);
        if (empty($excerpt_ms)) {
            $en_excerpt = !empty($post->post_excerpt) ? $post->post_excerpt : wp_trim_words($post->post_content, 20);
            if (!empty($en_excerpt)) {
                update_post_meta($post_id, '_excerpt_ms', $tr->translate($en_excerpt));
            }
        }
        
        // Helper function to translate HTML safely
        $translate_html = function($html, $translator) {
            if (empty(trim($html))) return $html;
            $dom = new DOMDocument();
            libxml_use_internal_errors(true);
            // Use mb_convert_encoding to ensure UTF-8 is handled properly in DOMDocument
            $html_safe = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
            $dom->loadHTML('<?xml encoding="utf-8" ?>' . $html_safe, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            libxml_clear_errors();
            
            $xpath = new DOMXPath($dom);
            $textNodes = $xpath->query('//text()[normalize-space() != ""]');
            
            $separator = ' |###| ';
            $texts = [];
            foreach ($textNodes as $node) {
                $texts[] = $node->nodeValue;
            }
            
            if (!empty($texts)) {
                $combined = implode($separator, $texts);
                $translated_combined = $translator->translate($combined);
                $translated_texts = explode(trim($separator), $translated_combined);
                
                // Sometimes Stichoza/Google drops spaces around the separator
                $translated_texts = array_map('trim', $translated_texts);
                
                // Fallback if mismatch
                if (count($translated_texts) === count($texts)) {
                    foreach ($textNodes as $index => $node) {
                        $node->nodeValue = htmlspecialchars($translated_texts[$index], ENT_QUOTES, 'UTF-8');
                    }
                } else {
                    // Fallback to raw translation if separator breaks
                    return $translator->translate($html);
                }
            }
            $result = $dom->saveHTML();
            return str_replace(['<?xml encoding="utf-8" ?>', '<html><body>', '</body></html>'], '', $result);
        };
        
        // Check and translate Content Safely
        $content_ms = get_post_meta($post_id, '_content_ms', true);
        if (empty($content_ms) && !empty($post->post_content)) {
            $translated_content = $translate_html($post->post_content, $tr);
            update_post_meta($post_id, '_content_ms', trim($translated_content));
        }
        
        // Check and translate Category (Only for posts)
        if (get_post_type($post_id) === 'post') {
            $cat_ms = get_post_meta($post_id, '_category_ms', true);
            if (empty($cat_ms)) {
                $cats = get_the_category($post_id);
                if (!empty($cats)) {
                    update_post_meta($post_id, '_category_ms', $tr->translate($cats[0]->name));
                }
            }
        }
    } catch (Exception $e) {
        // Silently fail if translation API errors out
        error_log('Auto-translation failed: ' . $e->getMessage());
    }
}, 20);
