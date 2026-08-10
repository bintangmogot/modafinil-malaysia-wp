<?php
/**
 * Module: Featured Products
 * Matches the original React design exactly
 */

$tag_en = get_sub_field('tag_en') ?: "Our Products";
$tag_ms = get_sub_field('tag_ms') ?: "Produk Kami";

$heading_en = get_sub_field('heading_en') ?: "Modafinil Tablets Available Now";
$heading_ms = get_sub_field('heading_ms') ?: "Tablet Modafinil Tersedia Sekarang";

// Featured product slugs (matching original JS: HOME_PRODUCT_SLUGS)
$featured_slugs = ['modvigil-200mg', 'modalert-100mg', 'modalert-200mg', 'modafinil-200mg'];

$products = get_sub_field('selected_products');
if (!$products) {
    // Fallback: Get by the exact slugs from the original design
    $products = [];
    foreach ($featured_slugs as $slug) {
        $found = get_page_by_path($slug, OBJECT, 'product');
        if ($found) {
            $products[] = wc_get_product($found->ID);
        }
    }
    // If still empty, get latest 4
    if (empty($products)) {
        $products = wc_get_products(array(
            'limit' => 4,
            'status' => 'publish',
        ));
    }
}
?>
<section class="section-padding bg-white" data-testid="featured-products">
    <div class="container-custom">
        <div class="text-center mb-10">
            <span class="inline-block bg-primary-soft text-primary-dark text-xs font-bold uppercase tracking-widest px-3 py-1.5 rounded-full mb-4">
                <?= modmy_t($tag_en, $tag_ms) ?>
            </span>
            <h2 class="font-heading text-2xl md:text-4xl font-black text-ink">
                <?= modmy_t($heading_en, $heading_ms) ?>
            </h2>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-5 md:gap-6">
            <?php 
            if($products):
                foreach($products as $p):
                    // Handle both ACF post objects and wc_get_products instances
                    $product_obj = is_numeric($p) ? wc_get_product($p) : (is_a($p, 'WC_Product') ? $p : wc_get_product($p->ID));
                    if(!$product_obj) continue;
                    
                    $title = $product_obj->get_title();
                    $link = $product_obj->get_permalink();
                    $image = wp_get_attachment_image_url($product_obj->get_image_id(), 'medium') ?: '';
                    $per_tab = $product_obj->get_meta('perTab');
                    $price_from = $product_obj->get_meta('priceFrom');
                    $price_to = $product_obj->get_meta('priceTo');
                    $in_stock = $product_obj->is_in_stock();
            ?>
            <article class="group relative flex flex-col overflow-hidden rounded-xl border border-border hover:border-primary bg-card shadow-card transition-shadow hover:shadow-card-hover">
                <!-- Stock Badge -->
                <?php if ($in_stock): ?>
                <span class="absolute left-4 top-4 z-10 rounded-md bg-primary px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider text-primary-foreground">
                    <?= modmy_t("In Stock", "Ada Stok") ?>
                </span>
                <?php else: ?>
                <span class="absolute left-4 top-4 z-10 rounded-md bg-destructive px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider text-destructive-foreground">
                    <?= modmy_t("Out of Stock", "Habis Stok") ?>
                </span>
                <?php endif; ?>

                <!-- Product Image -->
                <a href="<?= esc_url($link) ?>" class="block bg-surface p-6 pt-14">
                    <img src="<?= esc_url($image) ?>" alt="Buy <?= esc_attr($title) ?> online in Malaysia" loading="lazy" class="mx-auto h-44 w-full object-contain transition-transform duration-300 group-hover:scale-[1.03]">
                </a>

                <!-- Product Info -->
                <div class="flex flex-1 flex-col p-5">
                    <h3 class="font-heading text-base font-bold text-card-foreground">
                        <a href="<?= esc_url($link) ?>">
                            <?= esc_html($title) ?>
                        </a>
                    </h3>

                    <!-- Price Range -->
                    <p class="mt-4 font-heading text-lg font-bold text-price">
                        <?php if ($price_from && $price_to): ?>
                            RM<?= number_format((float)$price_from, 2) ?> - RM<?= number_format((float)$price_to, 2) ?>
                        <?php else: ?>
                            <?= $product_obj->get_price_html() ?>
                        <?php endif; ?>
                    </p>

                    <!-- As low as -->
                    <?php if ($per_tab): ?>
                    <p class="mt-1 text-sm font-medium text-primary-dark">
                        <?= modmy_t("As low as", "Serendah") ?> RM<?= number_format((float)$per_tab, 2) ?>/<?= modmy_t("tab", "biji") ?>
                    </p>
                    <?php endif; ?>

                    <!-- CTA Button -->
                    <div class="mt-5">
                        <?php if ($in_stock): ?>
                        <a href="<?= esc_url($link) ?>" class="flex w-full items-center justify-center rounded-full bg-primary px-2 py-2.5 sm:px-5 sm:py-3 text-[11px] sm:text-sm font-bold uppercase tracking-wider text-primary-foreground shadow-pill transition-colors hover:bg-primary-dark">
                            <?= modmy_t("Buy Now", "Beli Sekarang") ?>
                        </a>
                        <?php else: ?>
                        <span class="flex w-full items-center justify-center rounded-full bg-destructive-soft px-2 py-2.5 sm:px-5 sm:py-3 text-[11px] sm:text-sm font-semibold text-destructive">
                            <?= modmy_t("Out of Stock", "Habis Stok") ?>
                        </span>
                        <?php endif; ?>
                    </div>
                </div>
            </article>
            <?php 
                endforeach;
            endif;
            ?>
        </div>

        <div class="text-center mt-8">
            <a href="<?= wc_get_page_permalink('shop') ?>" class="inline-flex items-center gap-2 border-2 border-primary-light text-primary-dark font-bold px-7 py-3 rounded-full hover:bg-primary-light hover:text-white hover:border-primary-light transition-all uppercase tracking-widest text-sm">
                <?= modmy_t("View All Products", "Lihat Semua Produk") ?>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
            </a>
        </div>
    </div>
</section>
