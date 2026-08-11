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

// Get or Create Refund Policy Page
$page = get_page_by_path('refund-policy');

if (!$page) {
    $page_id = wp_insert_post([
        'post_title' => 'Dasar Bayaran Balik',
        'post_name' => 'refund-policy',
        'post_type' => 'page',
        'post_status' => 'publish'
    ]);
} else {
    $page_id = $page->ID;
}

if ($page_id) {
    update_post_meta($page_id, '_wp_page_template', 'default');
    
    $badges = [
        ['badge_en' => 'Free Reshipment', 'badge_ms' => 'Penghantaran Semula Percuma'],
        ['badge_en' => 'Full Refund Guarantee', 'badge_ms' => 'Bayaran Balik Penuh'],
        ['badge_en' => 'Customs Protection', 'badge_ms' => 'Perlindungan Kastam']
    ];

    $sections = [
        [
            'title_en' => 'Delivery Guarantee',
            'title_ms' => 'Jaminan Penghantaran',
            'content_en' => "Every order is protected. If your package is lost in transit, damaged, or seized by Malaysian customs, we will reship your order at no extra cost — or issue a full refund if you prefer.",
            'content_ms' => "Jika pesanan anda tidak tiba dalam tempoh 25 hari bekerja (Semenanjung) atau 30 hari bekerja (Sabah/Sarawak) dari tarikh penghantaran, kami akan menghantar semula atau membuat bayaran balik sepenuhnya. Ini adalah jaminan kami kepada setiap pelanggan Malaysia."
        ],
        [
            'title_en' => 'Customs Seizure',
            'title_ms' => 'Kehilangan di Kastam',
            'content_en' => "In the rare event that your package is detained or confiscated by customs, we will reship your order free of charge. We maintain an exceptional delivery track record into Malaysia.",
            'content_ms' => "Dalam kes yang jarang berlaku di mana pesanan anda ditahan atau dirampas oleh pihak kastam, kami akan menghantar semula pesanan anda secara percuma. Kami mempunyai rekod penghantaran yang sangat baik ke Malaysia."
        ],
        [
            'title_en' => 'Damaged or Wrong Products',
            'title_ms' => 'Produk Rosak atau Salah',
            'content_en' => "If you receive a damaged or incorrect product, contact us within 7 days of receipt. We will send a replacement at no additional cost.",
            'content_ms' => "Jika anda menerima produk yang rosak atau bukan yang anda pesan, hubungi kami dalam masa 7 hari dari tarikh penerimaan. Kami akan menghantar penggantian tanpa sebarang kos tambahan."
        ],
        [
            'title_en' => 'Non-Eligible Products / Cases',
            'title_ms' => 'Produk Tidak Layak untuk Bayaran Balik',
            'content_en' => "• Products that have been opened or used.\n• Orders with incorrect delivery addresses provided by customer error.\n• Change of mind after the order has been processed.",
            'content_ms' => "• Produk yang telah dibuka atau digunakan.\n• Pesanan dengan alamat penghantaran yang salah disebabkan kesilapan pelanggan.\n• Perubahan fikiran selepas pesanan diproses."
        ],
        [
            'title_en' => 'How to Make a Claim',
            'title_ms' => 'Cara Membuat Tuntutan',
            'content_en' => "Contact us via WhatsApp (+60 11-1628 4532) or email with your order number. We will process your claim within 2-3 business days.",
            'content_ms' => "Hubungi kami melalui WhatsApp (+60 11-1628 4532) atau emel dengan nombor pesanan anda. Kami akan memproses tuntutan dalam masa 2-3 hari bekerja."
        ]
    ];

    $module_data = [
        [
            'acf_fc_layout' => 'refund_policy',
            'title_en' => 'Refund Policy & Guarantee',
            'title_ms' => 'Dasar Bayaran Balik',
            'subtitle_en' => 'If your order does not arrive, we will reship it for free or issue a full refund.',
            'subtitle_ms' => 'Jika pesanan anda tidak sampai, kami hantar semula secara percuma atau kembalikan wang anda sepenuhnya.',
            'badges' => $badges,
            'sections' => $sections
        ]
    ];

    update_field('modules', $module_data, $page_id);
    echo "Successfully seeded Refund Policy page at /refund-policy/";
} else {
    echo "Failed to seed Refund Policy page.";
}
