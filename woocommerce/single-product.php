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

// Fetch variations if it's a variable product
$variations = [];
if ($product->is_type('variable')) {
    $variations = $product->get_available_variations();
}
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
        <!-- Image Area -->
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

        <!-- Info Area -->
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
                <?php if ($price_from && $price_to): ?>
                    RM<?= number_format((float)$price_from, 2) ?> - RM<?= number_format((float)$price_to, 2) ?>
                <?php else: ?>
                    <?= $price_html ?>
                <?php endif; ?>
            </p>
            <p class="mt-1 text-sm font-semibold text-primary-dark">
                <?php if ($per_tab): ?>
                    <?= modmy_t("As low as", "Serendah") ?> RM<?= number_format((float)$per_tab, 2) ?>/<?= modmy_t("tab", "biji") ?>
                <?php endif; ?>
            </p>

            <?php if ($product->is_in_stock() && !empty($variations)): ?>
                
                <form class="mt-8 cart custom-variations-form" action="<?= esc_url( wc_get_checkout_url() ) ?>" method="post" enctype='multipart/form-data'>
                    <p class="text-sm font-bold uppercase tracking-wider"><?= modmy_t("Select Quantity", "Pilih Kuantiti") ?></p>
                    
                    <div class="mt-3 flex flex-wrap gap-2.5" id="variation-pills">
                        <?php foreach ($variations as $i => $variation): 
                            // Extract numeric quantity from "30 Tabs"
                            $qty_str = $variation['attributes']['attribute_pa_quantity']; 
                            preg_match('/\d+/', $qty_str, $matches);
                            $qty_num = !empty($matches[0]) ? $matches[0] : 0;
                            $price_num = (float) $variation['display_price'];
                            $per_tab_price = $qty_num > 0 ? $price_num / $qty_num : 0;
                        ?>
                            <button type="button" 
                                class="variation-pill rounded-lg border px-5 py-2.5 text-sm font-semibold transition-colors <?php echo $i === 1 ? 'border-2 border-primary bg-primary-softer text-primary-dark active-pill' : 'border-border bg-card text-muted-foreground hover:border-primary'; ?>"
                                data-id="<?= esc_attr($variation['variation_id']) ?>"
                                data-qty="<?= esc_attr($qty_num) ?>"
                                data-price="<?= esc_attr($price_num) ?>"
                                data-per-tab="<?= esc_attr($per_tab_price) ?>"
                                data-val="<?= esc_attr($qty_str) ?>">
                                <?= esc_html($qty_str) ?>
                            </button>
                        <?php endforeach; ?>
                    </div>

                    <!-- Hidden WooCommerce fields required for cart -->
                    <input type="hidden" name="add-to-cart" value="<?= absint($product->get_id()) ?>" />
                    <input type="hidden" name="product_id" value="<?= absint($product->get_id()) ?>" />
                    <input type="hidden" name="variation_id" class="variation_id" value="<?= esc_attr($variations[1]['variation_id']) ?>" />
                    <input type="hidden" name="attribute_pa_quantity" class="attribute_pa_quantity" value="<?= esc_attr($variations[1]['attributes']['attribute_pa_quantity']) ?>" />

                    <!-- Estimated Price Box -->
                    <div class="mt-6 rounded-xl border border-border bg-surface p-5">
                        <div class="flex items-baseline justify-between">
                            <span class="text-sm text-muted-foreground"><?= modmy_t("Estimated Price", "Anggaran Harga") ?></span>
                            <span class="font-heading text-2xl font-extrabold text-price" id="estimated-price">
                                RM<?= number_format((float)$variations[1]['display_price'], 2) ?>
                            </span>
                        </div>
                        <p class="mt-1 text-right text-xs text-muted-foreground" id="estimated-per-tab">
                            ≈ RM<?= number_format((float)($variations[1]['display_price'] / 30), 2) ?> / <?= modmy_t("tablet", "tablet") ?>
                        </p>
                    </div>

                    <!-- Checkout Button -->
                    <div class="mt-6 flex flex-wrap gap-3">
                        <button type="submit" class="inline-flex flex-1 items-center justify-center gap-2 rounded-full bg-primary px-8 py-4 text-sm font-bold uppercase tracking-wider text-primary-foreground shadow-pill transition-colors hover:bg-primary-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                            <?= modmy_t("Checkout & Pay (QRIS)", "Beli & Bayar (QRIS)") ?>
                        </button>
                    </div>
                </form>

                <!-- Script to handle variation pill clicks -->
                <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const pills = document.querySelectorAll('.variation-pill');
                    const inputVarId = document.querySelector('input.variation_id');
                    const inputAttr = document.querySelector('input.attribute_pa_quantity');
                    const priceDisplay = document.getElementById('estimated-price');
                    const perTabDisplay = document.getElementById('estimated-per-tab');

                    pills.forEach(pill => {
                        pill.addEventListener('click', function() {
                            // Update UI
                            pills.forEach(p => {
                                p.className = "variation-pill rounded-lg border border-border bg-card px-5 py-2.5 text-sm font-semibold text-muted-foreground transition-colors hover:border-primary";
                            });
                            this.className = "variation-pill active-pill rounded-lg border-2 border-primary bg-primary-softer px-5 py-2.5 text-sm font-bold text-primary-dark transition-colors";

                            // Update Hidden Inputs
                            inputVarId.value = this.dataset.id;
                            inputAttr.value = this.dataset.val;

                            // Update Price
                            const priceNum = parseFloat(this.dataset.price);
                            const perTabNum = parseFloat(this.dataset.perTab);
                            
                            priceDisplay.innerHTML = 'RM' + priceNum.toLocaleString('en-MY', {minimumFractionDigits: 2, maximumFractionDigits: 2});
                            perTabDisplay.innerHTML = '≈ RM' + perTabNum.toLocaleString('en-MY', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' / <?= modmy_t("tablet", "tablet") ?>';
                        });
                    });
                });
                </script>

            <?php else: ?>
                <div class="mt-6 flex flex-wrap gap-3">
                    <span class="inline-flex flex-1 items-center justify-center rounded-full bg-destructive-soft px-8 py-4 text-sm font-bold uppercase tracking-wider text-destructive">
                        <?= modmy_t("Out of Stock", "Kehabisan Stok") ?>
                    </span>
                </div>
            <?php endif; ?>

            <!-- Trust features -->
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

<!-- Related Products -->
<section class="section-padding bg-background border-t border-border">
    <div class="container-site">
        <h2 class="font-heading text-2xl md:text-3xl font-black text-ink text-center mb-10">
            <?= modmy_t("Related Products", "Produk Berkaitan") ?>
        </h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-5 md:gap-6">
            <?php
            $related_products = wc_get_related_products($product->get_id(), 4);
            foreach ($related_products as $related_product_id) {
                $post_object = get_post($related_product_id);
                setup_postdata($GLOBALS['post'] =& $post_object);
                wc_get_template_part('content', 'product');
            }
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>

<?php get_footer('shop'); ?>
