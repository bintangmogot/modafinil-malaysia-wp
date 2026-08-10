<?php
/**
 * The template for displaying product content within loops
 * Matches the original React ProductCard.tsx design exactly
 */

defined('ABSPATH') || exit;

global $product;

// Ensure we have a proper WC_Product object
if (!is_a($product, 'WC_Product')) {
    $product = wc_get_product(get_the_ID());
}

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}

$title = $product->get_title();
$link = $product->get_permalink();
$image = wp_get_attachment_image_url($product->get_image_id(), 'medium') ?: '';
$per_tab = get_field('price_per_unit', $product->get_id()); // From ACF
$in_stock = $product->is_in_stock();
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
    <a href="<?= esc_url($link) ?>" class="relative block aspect-square overflow-hidden bg-surface">
        <img src="<?= esc_url($image) ?>" alt="Buy <?= esc_attr($title) ?> online in Malaysia" loading="lazy" class="h-full w-full object-contain transition-transform duration-500 group-hover:scale-110">
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
            <?= $product->get_price_html() ?>
        </p>

        <!-- As low as -->
        <?php if ($per_tab): ?>
        <p class="mt-1 text-sm font-medium text-primary-dark">
            <?= modmy_t("As low as", "Serendah") ?> <?= esc_html($per_tab) ?>/<?= modmy_t("tab", "biji") ?>
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
