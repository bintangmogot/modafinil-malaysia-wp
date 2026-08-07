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
