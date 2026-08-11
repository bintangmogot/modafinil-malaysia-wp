<?php
/**
 * Sitemap Module
 */

$title_en = get_sub_field('title_en') ?: "Sitemap";
$title_ms = get_sub_field('title_ms') ?: "Peta Laman";
$subtitle_en = get_sub_field('subtitle_en') ?: "Browse all pages on ModafinilMY. Find exactly what you're looking for.";
$subtitle_ms = get_sub_field('subtitle_ms') ?: "Semua halaman ModafinilMY dalam satu senarai — halaman utama, produk, artikel, dan dasar.";

// Hardcoded Main & Legal Links
$main_links = [
    ['label' => 'Home', 'url' => '/'],
    ['label' => 'Shop All', 'url' => '/products/'],
    ['label' => 'About Us', 'url' => '/about/'],
    ['label' => 'Customer Reviews', 'url' => '/reviews/'],
    ['label' => 'FAQ', 'url' => '/faq/'],
    ['label' => 'Track Your Order', 'url' => '/track-order/'],
    ['label' => 'Contact Us', 'url' => '/contact/']
];

$legal_links = [
    ['label' => 'Terms & Conditions', 'url' => '/terms-of-service/'],
    ['label' => 'Privacy Policy', 'url' => '/privacy-policy/'],
    ['label' => 'Refund Policy', 'url' => '/refund-policy/'],
    ['label' => 'Sitemap', 'url' => '/sitemap/']
];

$delivery_areas = [
    'Kuala Lumpur', 'Petaling Jaya', 'Shah Alam', 'Subang Jaya', 
    'Johor Bahru', 'George Town', 'Ipoh', 'Kota Kinabalu', 
    'Kuching', 'Seremban', 'Melaka', 'Alor Setar', 'Kuantan', 
    'Kota Bharu', 'Klang'
];

// Query WooCommerce Products dynamically
$products = get_posts([
    'post_type' => 'product',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC'
]);

// Query Blog Posts dynamically
$blog_posts = get_posts([
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC'
]);
?>

<section class="bg-slate-900 text-white py-12 md:py-16 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-emerald-950/40 to-slate-900 pointer-events-none"></div>
    <div class="container-custom relative z-10 text-center max-w-3xl mx-auto">
        <h1 class="font-heading text-3xl md:text-5xl font-extrabold mb-4 tracking-tight">
            <?= modmy_t($title_en, $title_ms) ?>
        </h1>
        <p class="text-slate-300 max-w-lg mx-auto text-sm md:text-base leading-relaxed">
            <?= modmy_t($subtitle_en, $subtitle_ms) ?>
        </p>
    </div>
</section>

<section class="section-padding bg-stone-50">
    <div class="container-custom max-w-6xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 lg:gap-8">
            
            <!-- Column 1: Main Pages & Legal -->
            <div>
                <h2 class="font-heading text-lg font-black text-slate-900 mb-4 pb-2 border-b border-stone-200 uppercase tracking-wider">
                    <?= modmy_t("Main Pages", "Halaman Utama") ?>
                </h2>
                <ul class="space-y-3 mb-10">
                    <?php foreach ($main_links as $link): ?>
                        <li>
                            <a href="<?= esc_url($link['url']) ?>" class="text-slate-600 hover:text-emerald-600 font-medium transition-colors text-sm">
                                <?= esc_html($link['label']) ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <h2 class="font-heading text-lg font-black text-slate-900 mb-4 pb-2 border-b border-stone-200 uppercase tracking-wider">
                    <?= modmy_t("Policies", "Dasar & Maklumat") ?>
                </h2>
                <ul class="space-y-3">
                    <?php foreach ($legal_links as $link): ?>
                        <li>
                            <a href="<?= esc_url($link['url']) ?>" class="text-slate-600 hover:text-emerald-600 font-medium transition-colors text-sm">
                                <?= esc_html($link['label']) ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Column 2: Products -->
            <div>
                <h2 class="font-heading text-lg font-black text-slate-900 mb-4 pb-2 border-b border-stone-200 uppercase tracking-wider">
                    <?= modmy_t("Products", "Produk") ?>
                </h2>
                <ul class="space-y-3">
                    <?php if (!empty($products)): ?>
                        <?php foreach ($products as $p): ?>
                            <li>
                                <a href="<?= esc_url(get_permalink($p->ID)) ?>" class="text-slate-600 hover:text-emerald-600 font-medium transition-colors text-sm">
                                    <?= esc_html($p->post_title) ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li class="text-slate-400 text-sm">No products found.</li>
                    <?php endif; ?>
                </ul>
            </div>

            <!-- Column 3: Delivery Areas -->
            <div>
                <h2 class="font-heading text-lg font-black text-slate-900 mb-4 pb-2 border-b border-stone-200 uppercase tracking-wider">
                    <?= modmy_t("Delivery Areas", "Kawasan Penghantaran") ?>
                </h2>
                <ul class="space-y-3">
                    <?php foreach ($delivery_areas as $area): 
                        $slug = strtolower(str_replace(' ', '-', $area));
                    ?>
                        <li>
                            <a href="/buy-modafinil/<?= esc_attr($slug) ?>/" class="text-slate-600 hover:text-emerald-600 font-medium transition-colors text-sm">
                                Buy Modafinil in <?= esc_html($area) ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Column 4: Blog Posts -->
            <div>
                <h2 class="font-heading text-lg font-black text-slate-900 mb-4 pb-2 border-b border-stone-200 uppercase tracking-wider">
                    <?= modmy_t("Blog Articles", "Artikel Blog") ?>
                </h2>
                <ul class="space-y-3">
                    <li>
                        <a href="/blog/" class="text-emerald-600 hover:text-emerald-700 font-bold transition-colors text-sm">
                            <?= modmy_t("View All Articles", "Lihat Semua Artikel") ?> &rarr;
                        </a>
                    </li>
                    <?php if (!empty($blog_posts)): ?>
                        <?php foreach ($blog_posts as $b): ?>
                            <li>
                                <a href="<?= esc_url(get_permalink($b->ID)) ?>" class="text-slate-600 hover:text-emerald-600 font-medium transition-colors text-sm">
                                    <?= esc_html($b->post_title) ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li class="text-slate-400 text-sm">No blog posts found.</li>
                    <?php endif; ?>
                </ul>
            </div>

        </div>
    </div>
</section>
