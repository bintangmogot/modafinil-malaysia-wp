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
