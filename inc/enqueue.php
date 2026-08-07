<?php
/**
 * Enqueue scripts and styles
 */

function modmy_enqueue_scripts() {
    // 1. Google Fonts
    wp_enqueue_style(
        'modmy-fonts',
        'https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap',
        array(),
        null
    );

    // 2. Main Tailwind CSS
    // Check if main.css exists in assets/css
    $css_path = MODMY_THEME_DIR . '/assets/css/main.css';
    $css_url  = MODMY_THEME_URI . '/assets/css/main.css';
    
    if (file_exists($css_path)) {
        wp_enqueue_style('modmy-style', $css_url, array(), filemtime($css_path));
    } else {
        // Fallback to style.css if Tailwind hasn't run yet
        wp_enqueue_style('modmy-style-fallback', get_stylesheet_uri(), array(), MODMY_THEME_VERSION);
    }

    // 3. Main JavaScript
    wp_enqueue_script(
        'modmy-main-js',
        MODMY_THEME_URI . '/assets/js/main.js',
        array('jquery'),
        file_exists(MODMY_THEME_DIR . '/assets/js/main.js') ? filemtime(MODMY_THEME_DIR . '/assets/js/main.js') : MODMY_THEME_VERSION,
        true
    );

    // 4. i18n logic
    wp_enqueue_script(
        'modmy-i18n-js',
        MODMY_THEME_URI . '/assets/js/i18n.js',
        array(),
        file_exists(MODMY_THEME_DIR . '/assets/js/i18n.js') ? filemtime(MODMY_THEME_DIR . '/assets/js/i18n.js') : MODMY_THEME_VERSION,
        false // Load in head so it can redirect quickly if ?lang= is present
    );
}
add_action('wp_enqueue_scripts', 'modmy_enqueue_scripts');
