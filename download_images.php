<?php
/**
 * download_images.php
 *
 * Reads the WooCommerce import CSV, downloads product images, stores them locally,
 * updates the Images column with local URLs, and writes a new CSV.
 */
$inputCsv = 'C:/laragon/www/Armodafinil-Australia-Direct/final_woocommerce_import.csv';
$outputCsv = __DIR__ . '/final_woocommerce_import_with_images.csv';
$imageDir = __DIR__ . '/wp-content/uploads/product_images';
$siteUrl = 'https://armodafinil-australia-direct.test'; // adjust if needed

if (!file_exists($inputCsv)) {
    die("Input CSV not found: $inputCsv\n");
}
if (!is_dir($imageDir)) {
    mkdir($imageDir, 0755, true);
}

$inHandle = fopen($inputCsv, 'r');
$outHandle = fopen($outputCsv, 'w');
if ($inHandle === false || $outHandle === false) {
    die("Failed to open CSV files.\n");
}

$header = fgetcsv($inHandle);
if ($header === false) {
    die("Empty CSV file.\n");
}
// Ensure columns for Original_Images
if (!in_array('Original_Images', $header)) {
    $header[] = 'Original_Images';
}
$imagesIdx = array_search('Images', $header);
$origIdx = array_search('Original_Images', $header);
// Write header
fputcsv($outHandle, $header);

$failedLog = __DIR__ . '/failed_images.log';
file_put_contents($failedLog, "Failed image downloads:\n");

while (($row = fgetcsv($inHandle)) !== false) {
    $originalUrls = [];
    $localUrls = [];
    $imagesField = $row[$imagesIdx] ?? '';
    // Split by commas (ignore whitespace)
    $urls = array_filter(array_map('trim', explode(',', $imagesField)));
    foreach ($urls as $url) {
        if (empty($url)) continue;
        $originalUrls[] = $url;
        $filename = basename(parse_url($url, PHP_URL_PATH));
        // sanitize filename
        $filename = preg_replace('/[^A-Za-z0-9._-]/', '_', $filename);
        $localPath = $imageDir . '/' . $filename;
        // Download if not exists
        if (!file_exists($localPath)) {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0 Safari/537.36');
            $data = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            if ($httpCode == 200 && $data !== false) {
                file_put_contents($localPath, $data);
            } else {
                // log failure and keep original URL
                file_put_contents($failedLog, "$url => HTTP $httpCode\n", FILE_APPEND);
                $localUrls[] = $url; // fallback to original
                continue;
            }
        }
        // Build local URL (relative to site)
        $localUrl = $siteUrl . '/wp-content/uploads/product_images/' . $filename;
        $localUrls[] = $localUrl;
    }
    // Update row
    $row[$imagesIdx] = implode(', ', $localUrls);
    $row[$origIdx] = implode(', ', $originalUrls);
    fputcsv($outHandle, $row);
}

fclose($inHandle);
fclose($outHandle);

echo "Image processing completed. Output CSV: $outputCsv\n";
?>
