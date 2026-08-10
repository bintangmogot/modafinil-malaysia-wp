<?php
/**
 * The Template for displaying all single products
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header('shop'); 

global $product;

// Ensure we have a proper WC_Product object
if (!is_a($product, 'WC_Product')) {
    $product = wc_get_product(get_the_ID());
}

if (!$product) {
    get_footer('shop');
    return;
}

$brand = $product->get_meta('brand') ?: 'HAB Pharma';
$per_tab = $product->get_meta('perTab');
$price_from = $product->get_meta('priceFrom');
$price_to = $product->get_meta('priceTo');
$summary_raw = $product->get_short_description();

// Parse bilingual summary from <!-- en -->...<!-- /en --><!-- ms -->...<!-- /ms --> format
preg_match('/<!-- en -->(.+?)<!-- \/en -->/s', $summary_raw, $en_match);
preg_match('/<!-- ms -->(.+?)<!-- \/ms -->/s', $summary_raw, $ms_match);
$summary_en = !empty($en_match[1]) ? trim($en_match[1]) : strip_tags($summary_raw);
$summary_ms = !empty($ms_match[1]) ? trim($ms_match[1]) : $summary_en;

$image = wp_get_attachment_image_url($product->get_image_id(), 'large') ?: '';
$price_html = $product->get_price_html();

$whatsapp = '601116284532';
$message = "Hi ModafinilMY, I'm interested in buying " . $product->get_name();
$whatsapp_url = "https://wa.me/" . $whatsapp . "?text=" . urlencode($message);
?>

<div class="border-b border-border bg-surface">
    <div class="container-site flex gap-2 py-4 text-sm text-muted-foreground">
        <a href="<?= home_url('/') ?>" class="hover:text-primary"><?= modmy_t("Home", "Utama") ?></a>
        <span>/</span>
        <a href="<?= wc_get_page_permalink('shop') ?>" class="hover:text-primary"><?= modmy_t("Shop", "Kedai") ?></a>
        <span>/</span>
        <span class="text-foreground"><?= $product->get_name() ?></span>
    </div>
</div>

<section class="section-y bg-background">
    <div class="container-site grid gap-12 lg:grid-cols-2">
        <div class="relative rounded-2xl border border-border bg-surface p-10">
            <?php if($product->is_in_stock()): ?>
            <span class="absolute left-5 top-5 rounded-md bg-primary px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider text-primary-foreground">
                <?= modmy_t("In Stock", "Ada Stok") ?>
            </span>
            <?php else: ?>
            <span class="absolute left-5 top-5 rounded-md bg-destructive px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider text-destructive-foreground">
                <?= modmy_t("Out of Stock", "Habis Stok") ?>
            </span>
            <?php endif; ?>
            <img src="<?= esc_url($image) ?>" alt="<?= esc_attr($product->get_name()) ?>" class="mx-auto h-80 w-full object-contain" />
        </div>

        <div>
            <p class="text-sm font-semibold uppercase tracking-widest text-primary">
                <?= esc_html($brand) ?>
            </p>
            <h1 class="mt-2 font-heading text-3xl font-extrabold tracking-tight md:text-4xl">
                <?= $product->get_name() ?>
            </h1>
            <p class="mt-4 text-base leading-relaxed text-muted-foreground">
                <?= modmy_t($summary_en, $summary_ms) ?>
            </p>

            <p class="mt-6 font-heading text-2xl font-extrabold text-price">
                <?= $price_html ?>
            </p>
            <p class="mt-1 text-sm font-semibold text-primary-dark">
                <?php if ($per_tab): ?>
                    <?= modmy_t("As low as", "Serendah") ?> RM<?= number_format((float)$per_tab, 2) ?>/<?= modmy_t("tab", "biji") ?>
                <?php endif; ?>
            </p>

            <div class="mt-6 flex flex-wrap gap-3">
                <?php if($product->is_in_stock()): ?>
                <a href="<?= esc_url($whatsapp_url) ?>" target="_blank" rel="noopener noreferrer" class="inline-flex flex-1 items-center justify-center gap-2 rounded-full bg-primary px-8 py-4 text-sm font-bold uppercase tracking-wider text-primary-foreground shadow-pill transition-colors hover:bg-primary-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    <?= modmy_t("Order via WhatsApp", "Pesan melalui WhatsApp") ?>
                </a>
                <?php else: ?>
                <span class="inline-flex flex-1 items-center justify-center rounded-full bg-destructive-soft px-8 py-4 text-sm font-bold uppercase tracking-wider text-destructive">
                    <?= modmy_t("Out of Stock", "Kehabisan Stok") ?>
                </span>
                <?php endif; ?>
            </div>

            <ul class="mt-8 space-y-3 border-t border-border pt-6">
                <li class="flex items-center gap-3 text-sm text-muted-foreground">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" /></svg>
                    <?= modmy_t("Free shipping for orders over RM399", "Penghantaran percuma untuk pesanan atas RM399") ?>
                </li>
                <li class="flex items-center gap-3 text-sm text-muted-foreground">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" /></svg>
                    <?= modmy_t("100% genuine — from certified manufacturers", "100% asli — dari pengeluar bertauliah") ?>
                </li>
                <li class="flex items-center gap-3 text-sm text-muted-foreground">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>
                    <?= modmy_t("Discreet packaging, with tracking number", "Pembungkusan diskret, berserta nombor penjejakan") ?>
                </li>
            </ul>
        </div>
    </div>
</section>

<?php
// Optional: output product tabs or extra info here
do_action('woocommerce_after_single_product_summary');
?>

<?php get_footer('shop'); ?>
