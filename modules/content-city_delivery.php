<?php
/**
 * City Delivery Landing Page Module
 */

$city_name = get_sub_field('city_name');
$region = get_sub_field('region');
$population = get_sub_field('population');
$delivery_days = get_sub_field('delivery_days');

$demographic_en = get_sub_field('demographic_en');
$demographic_ms = get_sub_field('demographic_ms');
$industry_en = get_sub_field('industry_en');
$industry_ms = get_sub_field('industry_ms');

$hero_desc_en = get_sub_field('hero_desc_en');
$hero_desc_ms = get_sub_field('hero_desc_ms');
$desc_en = get_sub_field('desc_en');
$desc_ms = get_sub_field('desc_ms');

$features = get_sub_field('features') ?: [];
$reviews = get_sub_field('reviews') ?: [];

$popular_products = get_posts([
    'post_type' => 'product',
    'post_status' => 'publish',
    'posts_per_page' => 4,
    'orderby' => 'menu_order',
    'order' => 'ASC'
]);

$trust_badges = [
    ['en' => '100% Guaranteed Delivery', 'ms' => 'Penghantaran 100% Terjamin'],
    ['en' => 'Discreet Packaging', 'ms' => 'Pembungkusan Diskret'],
    ['en' => 'Tracked Shipping', 'ms' => 'Penghantaran Berjejak'],
    ['en' => 'Genuine Products', 'ms' => 'Produk Tulen'],
];

$city_faqs = [
    [
        'q_en' => "How long does delivery to {$city_name} take?",
        'q_ms' => "Berapa lama penghantaran Modafinil ke {$city_name}?",
        'a_en' => "Orders to {$city_name} arrive within {$delivery_days} business days via Pos Malaysia.",
        'a_ms' => "Pesanan ke {$city_name} tiba dalam masa {$delivery_days} hari bekerja melalui Pos Malaysia."
    ],
    [
        'q_en' => "Is packaging discreet for {$city_name} deliveries?",
        'q_ms' => "Adakah pembungkusan diskret untuk penghantaran ke {$city_name}?",
        'a_en' => "Yes — every order to {$city_name} is shipped in plain packaging without any branding, product names, or identifying marks. Your neighbors and the postman will not know what's inside.",
        'a_ms' => "Ya — setiap pesanan ke {$city_name} dihantar dalam pembungkusan biasa tanpa jenama, nama produk, atau maklumat yang mengenal pasti kandungannya. Jiran anda dan posmen tidak akan tahu apa yang ada di dalam bungkusan."
    ],
    [
        'q_en' => "Do many people in {$city_name} use Modafinil?",
        'q_ms' => "Ramai orang di {$city_name} menggunakan Modafinil?",
        'a_en' => "Yes, {$city_name} is one of our most active delivery areas. {$demographic_en} and {$industry_en} regularly order from us to maintain high performance.",
        'a_ms' => "Ya, {$city_name} adalah salah satu kawasan penghantaran kami yang paling aktif. {$demographic_ms} dan {$industry_ms} secara berkala memesan dari kami untuk mengekalkan prestasi tinggi."
    ],
    [
        'q_en' => "What happens if my order to {$region} doesn't arrive?",
        'q_ms' => "Apa yang berlaku jika pesanan saya ke {$region} tidak tiba?",
        'a_en' => "In the rare event your order is lost or severely delayed beyond the expected delivery window, we offer a free reshipment. Contact us via WhatsApp for the fastest resolution.",
        'a_ms' => "Dalam kes yang jarang berlaku di mana pesanan anda hilang atau lambat melebihi tempoh penghantaran yang dijangkakan, kami menawarkan penghantaran semula percuma. Hubungi kami via WhatsApp untuk penyelesaian paling cepat."
    ]
];
?>

<!-- Hero Section -->
<section class="bg-gradient-to-br from-emerald-700 to-emerald-600 py-14 text-white md:py-20 relative overflow-hidden">
    <div class="absolute inset-0 bg-black/10"></div>
    <div class="container-custom max-w-4xl relative z-10">
        <nav class="mb-6 flex items-center gap-1.5 text-xs text-emerald-200">
            <a href="/" class="transition-colors hover:text-white"><?= modmy_t("Home", "Laman Utama") ?></a>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
            <a href="/sitemap/" class="transition-colors hover:text-white"><?= modmy_t("Locations", "Lokasi") ?></a>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
            <span class="font-medium text-white"><?= esc_html($city_name) ?></span>
        </nav>

        <div class="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
            <div>
                <span class="mb-4 inline-flex items-center gap-1.5 rounded-full bg-white/20 px-3 py-1.5 text-xs font-bold uppercase tracking-widest text-white backdrop-blur">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                    <?= esc_html($region) ?> &middot; <?= esc_html($population) ?>
                </span>
                <h1 class="mb-4 font-heading text-4xl font-black leading-[1.08] md:text-5xl drop-shadow-sm">
                    <?= modmy_t("Buy Modafinil", "Beli Modafinil") ?><br/>
                    <?= modmy_t("in {$city_name}", "di {$city_name}") ?>
                </h1>
                <p class="max-w-xl text-lg leading-relaxed text-emerald-50">
                    <?= modmy_t($hero_desc_en, $hero_desc_ms) ?>
                </p>
            </div>
            
            <div class="shrink-0">
                <div class="min-w-[160px] rounded-2xl bg-white/15 p-5 text-center backdrop-blur border border-white/10 shadow-lg">
                    <p class="mb-1 text-4xl font-black text-white"><?= esc_html($delivery_days) ?></p>
                    <p class="text-xs font-medium uppercase tracking-wider text-emerald-200">
                        <?= modmy_t("Delivery Days", "Hari Penghantaran") ?>
                    </p>
                    <p class="mt-1 text-xs text-emerald-300">via Pos Malaysia</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features & SEO Text -->
<section class="section-padding bg-white relative">
    <div class="container-custom max-w-4xl">
        <div class="mb-10 grid gap-5 md:grid-cols-2">
            <?php 
            $icons = [
                '<svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-5 w-5 shrink-0 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path></svg>',
                '<svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-5 w-5 shrink-0 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>',
                '<svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-5 w-5 shrink-0 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>',
                '<svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-5 w-5 shrink-0 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>',
            ];
            foreach($features as $idx => $feat): 
                $icon = $icons[$idx % count($icons)];
            ?>
            <div class="flex items-start gap-3 rounded-xl border border-emerald-100 bg-emerald-50/50 p-4 shadow-sm">
                <?= $icon ?>
                <span class="text-sm font-semibold text-slate-800 leading-snug">
                    <?= modmy_t($feat['feat_en'], $feat['feat_ms']) ?>
                </span>
            </div>
            <?php endforeach; ?>
        </div>
        
        <div class="prose prose-slate max-w-none text-sm md:text-base leading-relaxed text-slate-600">
            <p><?= modmy_t($desc_en, $desc_ms) ?></p>
        </div>
    </div>
</section>

<!-- Products -->
<section class="section-padding bg-stone-50 border-t border-stone-200">
    <div class="container-custom max-w-5xl">
        <h2 class="mb-10 text-center font-heading text-2xl font-black text-slate-900 md:text-3xl tracking-tight">
            <?= modmy_t("Modafinil Available for Delivery to {$city_name}", "Modafinil Tersedia untuk Penghantaran ke {$city_name}") ?>
        </h2>
        <div class="grid grid-cols-2 gap-4 md:grid-cols-4 md:gap-6">
            <?php foreach ($popular_products as $product): ?>
                <div class="group relative flex flex-col overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-stone-200 transition-all hover:-translate-y-1 hover:shadow-xl hover:ring-emerald-500">
                    <a href="<?= get_permalink($product->ID) ?>" class="absolute inset-0 z-10">
                        <span class="sr-only">View <?= esc_html($product->post_title) ?></span>
                    </a>
                    <div class="relative aspect-square overflow-hidden bg-stone-100 p-4">
                        <?= get_the_post_thumbnail($product->ID, 'medium', ['class' => 'h-full w-full object-contain transition-transform duration-500 group-hover:scale-105']) ?>
                    </div>
                    <div class="flex flex-1 flex-col p-4">
                        <h3 class="font-heading text-lg font-black text-slate-900">
                            <?= esc_html($product->post_title) ?>
                        </h3>
                        <p class="mt-1 text-xs font-semibold text-emerald-600">In Stock</p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="mt-10 text-center relative z-20">
            <a href="/products/" class="inline-flex rounded-full px-8 py-3.5 text-sm font-bold uppercase tracking-wider transition-all border-2 border-emerald-600 text-emerald-700 hover:bg-emerald-600 hover:text-white shadow-sm hover:shadow-md">
                <?= modmy_t("View All Products", "Lihat Semua Produk") ?>
            </a>
        </div>
    </div>
</section>

<!-- Trust Badges -->
<section class="border-y border-stone-200 bg-white">
    <div class="container-custom py-8">
        <div class="grid grid-cols-2 gap-6 md:grid-cols-4">
            <?php foreach ($trust_badges as $b): ?>
                <div class="flex flex-col items-center gap-3 rounded-xl px-2 text-center">
                    <div class="text-emerald-500 bg-emerald-50 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <p class="text-xs font-bold uppercase leading-tight tracking-wider text-slate-700">
                        <?= modmy_t($b['en'], $b['ms']) ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- City Reviews -->
<?php if (!empty($reviews)): ?>
<section class="section-padding bg-stone-50">
    <div class="container-custom max-w-3xl">
        <div class="mb-10 text-center">
            <span class="inline-block text-xs font-bold uppercase tracking-widest text-emerald-600 mb-2"><?= modmy_t("Customer Reviews", "Ulasan Pelanggan") ?></span>
            <h2 class="font-heading text-3xl font-black text-slate-900 tracking-tight">
                <?= modmy_t("Customer Reviews from {$city_name}", "Ulasan Pelanggan dari {$city_name}") ?>
            </h2>
            <div class="mt-4 flex items-center justify-center gap-2">
                <div class="flex text-amber-400">
                    <?php for($i=0; $i<5; $i++): ?>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                    <?php endfor; ?>
                </div>
                <span class="text-sm font-semibold text-slate-600">
                    <?= modmy_t("4.5 out of 5 (" . count($reviews) . " reviews)", "4.5 dari 5 (" . count($reviews) . " ulasan)") ?>
                </span>
            </div>
        </div>

        <div class="space-y-5">
            <?php foreach ($reviews as $review): ?>
            <div class="rounded-2xl border border-stone-200 bg-white p-6 shadow-sm">
                <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                    <div class="flex gap-4">
                        <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-emerald-100 font-heading text-lg font-black text-emerald-700">
                            <?= esc_html(substr($review['author'], 0, 1)) ?>
                        </span>
                        <div>
                            <div class="flex items-center gap-2">
                                <p class="font-bold text-slate-900"><?= esc_html($review['author']) ?></p>
                                <span class="flex items-center gap-1 text-[10px] font-bold uppercase tracking-wider text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                                    Verified
                                </span>
                            </div>
                            <p class="text-xs font-medium text-slate-500 mt-0.5"><?= modmy_t($review['date_en'], $review['date_ms']) ?></p>
                        </div>
                    </div>
                    <div class="flex text-amber-400">
                        <?php for($i=0; $i<5; $i++): ?>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 <?= $i < $review['rating'] ? 'fill-current' : 'text-stone-200 fill-current' ?>" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                        <?php endfor; ?>
                    </div>
                </div>
                <p class="mt-4 text-sm leading-relaxed text-slate-600">
                    <?= modmy_t($review['text_en'], $review['text_ms']) ?>
                </p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- City FAQs -->
<section class="section-padding bg-white">
    <div class="container-custom max-w-3xl">
        <div class="mb-12 text-center">
            <h2 class="font-heading text-3xl font-black text-slate-900 tracking-tight">
                <?= modmy_t("Frequently Asked Questions — {$city_name}", "Soalan Lazim — {$city_name}") ?>
            </h2>
        </div>

        <div class="space-y-4">
            <?php foreach ($city_faqs as $i => $faq): ?>
                <details class="group rounded-2xl border border-stone-200 bg-white p-6 shadow-sm open:bg-emerald-50/30 open:border-emerald-200 transition-colors cursor-pointer" <?= $i === 0 ? 'open' : '' ?>>
                    <summary class="flex items-center justify-between gap-4 font-heading text-lg font-bold text-slate-900 marker:content-none">
                        <?= modmy_t($faq['q_en'], $faq['q_ms']) ?>
                        <span class="ml-4 shrink-0 rounded-full bg-stone-100 p-1.5 text-stone-500 group-open:bg-emerald-100 group-open:text-emerald-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform duration-300 group-open:-rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
                        </span>
                    </summary>
                    <p class="mt-4 text-sm leading-relaxed text-slate-600 pr-8">
                        <?= modmy_t($faq['a_en'], $faq['a_ms']) ?>
                    </p>
                </details>
            <?php endforeach; ?>
        </div>
    </div>
</section>
