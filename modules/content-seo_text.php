<?php
/**
 * Module: SEO Text with CTA
 */

$content_en = get_sub_field('content_en');
$content_ms = get_sub_field('content_ms');

$show_cta = get_sub_field('show_cta') !== false; // Default true
$cta_title_en = get_sub_field('cta_title_en') ?: "Modafinil Dosage Guide";
$cta_title_ms = get_sub_field('cta_title_ms') ?: "Panduan Dos Modafinil";
$cta_desc_en = get_sub_field('cta_desc_en') ?: "Not sure which dose is right for you? Read our complete dosage guide with recommendations, timing tips, and brand comparisons.";
$cta_desc_ms = get_sub_field('cta_desc_ms') ?: "Tidak pasti dos mana yang sesuai untuk anda? Baca panduan dos lengkap kami dengan cadangan, tips masa, dan perbandingan jenama.";

$raw_cta_link = get_sub_field('cta_link');
if (is_array($raw_cta_link) && !empty($raw_cta_link['url'])) {
    $cta_link = $raw_cta_link['url'];
} elseif (is_string($raw_cta_link) && !empty(trim($raw_cta_link))) {
    $cta_link = trim($raw_cta_link);
} else {
    $cta_link = home_url('/modafinil-dosage-guide/');
}

// Automatically map legacy /dosage-guide to /modafinil-dosage-guide/
if (strpos($cta_link, '/dosage-guide') !== false && strpos($cta_link, '/modafinil-dosage-guide') === false) {
    $cta_link = str_replace('/dosage-guide', '/modafinil-dosage-guide/', $cta_link);
}
?>
<section class="py-12 md:py-16 bg-background">
    <div class="container-site max-w-4xl">
        <div class="prose prose-slate max-w-none prose-a:text-primary hover:prose-a:text-primary-dark prose-headings:font-heading prose-headings:font-bold">
            <?php 
            $default_seo_html = '<h2 class="font-heading text-2xl md:text-3xl font-extrabold text-slate-900 mb-3">Ordering Modafinil in Malaysia</h2>
            <p class="text-base text-slate-600 leading-relaxed mb-6">We\'ve made the process of buying modafinil online as straightforward as possible. Here\'s what to expect when you place an order with ModafinilMY.</p>
            <h3 class="font-heading text-lg font-bold text-slate-900 mt-6 mb-2">Delivery Timeframes</h3>
            <p class="text-sm text-slate-600 leading-relaxed mb-6">Semua pesanan dihantar dengan cepat ke seluruh Malaysia dengan penjejakan penuh. Bandar-bandar utama Semenanjung seperti KL, Selangor, Penang, dan Johor biasanya menerima pesanan dalam masa 7-12 hari bekerja. Sabah dan Sarawak mengambil 10-16 hari bekerja. Pesanan atas RM399 layak untuk penghantaran percuma.</p>
            <h3 class="font-heading text-lg font-bold text-slate-900 mt-6 mb-2">Customs & Packaging</h3>
            <p class="text-sm text-slate-600 leading-relaxed mb-6">Every order is shipped in plain, unmarked packaging with no indication of the contents. There is no branding or product information visible on the outside. Our shipments are processed through international channels and we maintain a high delivery success rate across all Malaysian states and territories.</p>
            <h3 class="font-heading text-lg font-bold text-slate-900 mt-6 mb-2">What to Expect After Ordering</h3>
            <p class="text-sm text-slate-600 leading-relaxed mb-6">Once your order is placed, you\'ll receive a confirmation email with your order details. Tracking information is provided within 1-2 business days. If you have any questions about your order at any point, our support team is available via our contact page.</p>';

            if ($content_en || $content_ms) {
                echo modmy_t($content_en ?: $default_seo_html, $content_ms ?: $default_seo_html);
            } else {
                echo $default_seo_html;
            }
            ?>
        </div>

        <?php if ($show_cta): ?>
        <a href="<?= esc_url($cta_link) ?>" class="mt-12 group flex flex-col md:flex-row items-start md:items-center gap-5 p-6 rounded-xl border border-primary-light/50 bg-[#f0fdf4] hover:bg-[#e6fcf0] hover:border-primary-light transition-colors">
            <div class="flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-xl bg-primary text-primary-foreground shadow-sm group-hover:scale-105 transition-transform">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                </svg>
            </div>
            <div class="flex-1">
                <h3 class="font-heading font-bold text-slate-900 text-lg"><?= modmy_t($cta_title_en, $cta_title_ms) ?></h3>
                <p class="text-slate-600 text-sm mt-1 leading-relaxed">
                    <?= modmy_t($cta_desc_en, $cta_desc_ms) ?>
                </p>
            </div>
            <div class="hidden md:flex flex-shrink-0 text-primary group-hover:translate-x-1 transition-transform">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </div>
        </a>
        <?php endif; ?>
    </div>
</section>
