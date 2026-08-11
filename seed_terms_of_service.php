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

// Get or Create Terms of Service Page
$page = get_page_by_path('terms-of-service');

if (!$page) {
    $page_id = wp_insert_post([
        'post_title' => 'Terma & Syarat',
        'post_name' => 'terms-of-service',
        'post_type' => 'page',
        'post_status' => 'publish'
    ]);
} else {
    $page_id = $page->ID;
}

if ($page_id) {
    // Clear default WP post_content sample text
    wp_update_post([
        'ID' => $page_id,
        'post_content' => ''
    ]);
    
    update_post_meta($page_id, '_wp_page_template', 'default');
    
    $badges = [
        ['badge_en' => 'Age 18+ Verification', 'badge_ms' => 'Kelayakan 18+ Tahun'],
        ['badge_en' => 'Poisons Act 1952 Compliance', 'badge_ms' => 'Pematuhan Akta Racun 1952'],
        ['badge_en' => 'Personal Use Only', 'badge_ms' => 'Kegunaan Peribadi Sahaja']
    ];

    $sections = [
        [
            'title_en' => '1. Eligibility & Age Restriction',
            'title_ms' => '1. Penerimaan Syarat & Kelayakan',
            'content_en' => "You must be at least 18 years of age to access this site and place an order. By completing an order, you confirm that products ordered are strictly for your personal use and not for unauthorized commercial resale.",
            'content_ms' => "Dengan menggunakan laman web ModafinilMY (modafinil-malaysia.com), anda bersetuju untuk mematuhi terma dan syarat ini. Anda mengesahkan anda berumur sekurang-kurangnya 18 tahun. Produk yang dijual adalah untuk kegunaan peribadi sahaja dan bukan untuk dijual semula."
        ],
        [
            'title_en' => '2. Medical Disclaimer',
            'title_ms' => '2. Penafian Perubatan',
            'content_en' => "All content on this site is provided for educational purposes only. Modafinil is a prescription medication in Malaysia regulated under the Poisons Act 1952. We are not licensed medical providers. Always consult a licensed medical practitioner before use.",
            'content_ms' => "Maklumat di laman web ini adalah untuk tujuan pendidikan sahaja. Kami bukan pengamal perubatan berlesen dan tidak menyediakan nasihat perubatan. Sila berunding dengan doktor berlesen sebelum menggunakan mana-mana produk yang kami jual."
        ],
        [
            'title_en' => '3. Orders & Pricing',
            'title_ms' => '3. Pembayaran dan Harga',
            'content_en' => "All prices are displayed in Malaysian Ringgit (MYR/RM) and are subject to change without prior notice. We reserve the right to decline or cancel any order suspected of fraud, abuse, or violation of these terms. Orders are dispatched only after payment is confirmed.",
            'content_ms' => "Semua harga dalam Ringgit Malaysia (RM) dan tertakluk kepada perubahan tanpa notis. Pesanan hanya akan diproses selepas pembayaran penuh diterima dan disahkan."
        ],
        [
            'title_en' => '4. Shipping & Delivery',
            'title_ms' => '4. Penghantaran Pos Malaysia',
            'content_en' => "Deliveries are fulfilled via Pos Malaysia — taking 7-12 working days for Peninsular Malaysia and 10-16 working days for Sabah & Sarawak. Timeframes are estimated. Free shipping applies to orders RM399 and above.",
            'content_ms' => "Penghantaran dilakukan melalui Pos Malaysia — 7-12 hari bekerja untuk Semenanjung dan 10-16 hari untuk Sabah & Sarawak. Tempoh ini adalah anggaran dan tidak dijamin. Penghantaran percuma untuk pesanan RM399 ke atas."
        ],
        [
            'title_en' => '5. Customer Responsibility',
            'title_ms' => '5. Tanggungjawab Pelanggan',
            'content_en' => "You are responsible for providing an accurate and complete delivery address upon checkout. Orders that fail to deliver due to incorrect address information provided by the customer are not eligible for automatic refunds.",
            'content_ms' => "Anda bertanggungjawab memberikan alamat penghantaran yang tepat dan lengkap. Pesanan yang gagal dihantar akibat alamat salah tidak layak untuk bayaran balik automatik."
        ],
        [
            'title_en' => '6. Limitation of Liability',
            'title_ms' => '6. Had Liabiliti',
            'content_en' => "ModafinilMY accepts no liability for personal side effects, damages, or losses resulting from product use. Our maximum financial liability is strictly limited to the purchase amount paid for the specific order.",
            'content_ms' => "ModafinilMY tidak bertanggungjawab ke atas sebarang kerosakan langsung atau tidak langsung yang timbul daripada penggunaan produk kami. Anda menggunakan produk kami atas risiko anda sendiri selepas mendapat nasihat perubatan yang sewajarnya."
        ],
        [
            'title_en' => '7. Terms Modifications',
            'title_ms' => '7. Perubahan Terma',
            'content_en' => "We reserve the right to revise or update these terms at any time. Continued use of the website following changes constitutes acceptance of the modified terms.",
            'content_ms' => "Kami boleh mengemas kini terma ini dari semasa ke semasa. Versi terkini sentiasa dipaparkan di halaman ini."
        ]
    ];

    $module_data = [
        [
            'acf_fc_layout' => 'terms_of_service',
            'title_en' => 'Terms & Conditions',
            'title_ms' => 'Terma & Syarat',
            'subtitle_en' => 'By accessing this website and placing an order, you agree to the terms below.',
            'subtitle_ms' => 'Dengan menggunakan laman ini dan membuat pesanan, anda bersetuju dengan terma di bawah.',
            'badges' => $badges,
            'sections' => $sections
        ]
    ];

    update_field('modules', $module_data, $page_id);
    echo "Successfully seeded Terms of Service page at /terms-of-service/";
} else {
    echo "Failed to seed Terms of Service page.";
}
