<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'C:/laragon/www/modafinil-malaysia/wp-load.php';

echo "Testing shortcode output...\n";
$output = do_shortcode('[woocommerce_cart]');
echo "Length: " . strlen($output) . "\n";
echo "Output: \n" . $output . "\n";
