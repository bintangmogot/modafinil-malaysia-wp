<?php
// Boot WordPress
$possible_paths = [
    __DIR__ . '/../../../wp-load.php',
    __DIR__ . '/../../../../wp-load.php',
    'C:/laragon/www/modafinil-malaysia/wp-load.php',
    'C:/laragon/www/modafinil-malaysia-wp/wp-load.php',
    dirname(dirname(dirname(__DIR__))) . '/wp-load.php'
];

$wp_loaded = false;
foreach ($possible_paths as $path) {
    if (file_exists($path)) {
        require_once($path);
        $wp_loaded = true;
        break;
    }
}
if (!$wp_loaded) die("Could not find wp-load.php");

// Get or Create FAQ Page
$page = get_page_by_path('faq');

if (!$page) {
    $page_id = wp_insert_post([
        'post_title' => 'Soalan Lazim / FAQ',
        'post_name' => 'faq',
        'post_type' => 'page',
        'post_status' => 'publish'
    ]);
} else {
    $page_id = $page->ID;
}

if ($page_id) {
    update_post_meta($page_id, '_wp_page_template', 'default');
    update_field('modules', [['acf_fc_layout' => 'faq_page']], $page_id);
    echo "Successfully seeded FAQ page at /faq/";
} else {
    echo "Failed to seed FAQ page.";
}
