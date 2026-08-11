<?php
/**
 * The Template for displaying all single products
 * Matches the live Astro site design exactly (https://modafinil-malaysia.com/product/modvigil-200mg/)
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
$per_tab = get_field('price_per_unit', $product->get_id()); // ACF field
$summary_raw = $product->get_short_description();

// Parse bilingual summary from <!-- en -->...<!-- /en --><!-- ms -->...<!-- /ms --> format
preg_match('/<!-- en -->(.+?)<!-- \/en -->/s', $summary_raw, $en_match);
preg_match('/<!-- ms -->(.+?)<!-- \/ms -->/s', $summary_raw, $ms_match);
$summary_en = !empty($en_match[1]) ? trim($en_match[1]) : strip_tags($summary_raw);
$summary_ms = !empty($ms_match[1]) ? trim($ms_match[1]) : $summary_en;

$image = wp_get_attachment_image_url($product->get_image_id(), 'large') ?: '';

// Fetch variations if it's a variable product
$variations = [];
if ($product->is_type('variable')) {
    $variations = $product->get_available_variations();
}

$text_under_image = get_field('text_under_product_image', $product->get_id()); // ACF field
?>

<div class="container-site py-4">
    <nav class="flex items-center gap-2 text-sm text-slate-500" data-testid="breadcrumb">
        <a href="<?= home_url('/') ?>" class="hover:text-slate-900 transition-colors"><?= modmy_t("Home", "Utama") ?></a>
        <span>/</span>
        <a href="<?= wc_get_page_permalink('shop') ?>" class="hover:text-slate-900 transition-colors"><?= modmy_t("Products", "Produk") ?></a>
        <span>/</span>
        <span class="text-slate-900"><?= esc_html($product->get_name()) ?></span>
    </nav>
</div>

<section class="container-site pb-12">
    <div class="grid md:grid-cols-2 gap-8 lg:gap-12">
        <!-- Left Column: Image Area -->
        <div>
            <div class="rounded-md overflow-hidden bg-white border border-slate-200 p-4 flex items-center justify-center" data-testid="product-image">
                <img src="<?= esc_url($image) ?>" alt="<?= esc_attr($product->get_name()) ?> - Buy online Malaysia from ModafinilMY" class="max-w-full max-h-[500px] object-contain">
            </div>

            <!-- ACF: Text under product image -->
            <?php if (!empty($text_under_image)): ?>
                <div class="mt-8 prose prose-slate prose-sm max-w-none rounded-xl border border-slate-200 bg-white p-6">
                    <?= $text_under_image ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Right Column: Info Area -->
        <div>
            <h1 class="font-heading text-2xl md:text-3xl font-extrabold mb-3 text-slate-900" data-testid="text-product-title">
                <?= esc_html($product->get_name()) ?>
            </h1>

            <div class="mb-4">
                <span class="text-2xl font-extrabold text-primary" data-testid="text-product-price">
                    <?php 
                    if ($product->is_type('variable')) {
                        echo "From RM" . number_format($product->get_variation_price('min'), 2);
                    } else {
                        echo $product->get_price_html();
                    }
                    ?>
                </span>
            </div>

            <div class="prose prose-sm text-slate-600 mb-6 max-w-none" data-testid="text-product-description">
                <?= modmy_t($summary_en, $summary_ms) ?>
            </div>

            <?php if ($product->is_in_stock() && !empty($variations)): ?>
                
                <form class="mb-6 cart custom-variations-form" action="" method="post" enctype='multipart/form-data'>
                    
                    <div class="space-y-4" data-testid="variation-selector">
                        <div>
                            <label class="text-sm font-medium text-foreground mb-2 block"><?= modmy_t("Select Option", "Pilih Pilihan") ?></label>
                            
                            <div class="space-y-2" id="variation-rows">
                                <?php foreach ($variations as $i => $variation): 
                                    // Extract numeric quantity from "30 Tabs"
                                    $qty_str = $variation['attributes']['attribute_pa_quantity']; 
                                    preg_match('/\d+/', $qty_str, $matches);
                                    $qty_num = !empty($matches[0]) ? $matches[0] : 0;
                                    $price_num = (float) $variation['display_price'];
                                    $per_tab_price = $qty_num > 0 ? $price_num / $qty_num : 0;
                                    $is_active = ($i === 1); // Default to 2nd variation (usually 30 tablets)
                                ?>
                                    <button type="button" 
                                        class="variation-row-btn w-full flex items-center justify-between gap-4 px-4 py-3 rounded-md border text-left transition-colors <?php echo $is_active ? 'border-primary bg-primary-softer text-primary-dark active-row' : 'border-slate-200 bg-white text-slate-700 hover:border-primary/50'; ?>"
                                        data-id="<?= esc_attr($variation['variation_id']) ?>"
                                        data-qty="<?= esc_attr($qty_num) ?>"
                                        data-price="<?= esc_attr($price_num) ?>"
                                        data-per-tab="<?= esc_attr($per_tab_price) ?>"
                                        data-val="<?= esc_attr($qty_str) ?>">
                                        
                                        <span class="text-sm font-semibold"><?= esc_html($qty_str) ?></span>
                                        <span class="text-right shrink-0">
                                            <span class="text-sm font-extrabold text-primary block leading-snug">RM<?= number_format($price_num, 2) ?></span>
                                            <span class="text-[10px] text-emerald-600 block leading-none -mt-px">
                                                RM<?= number_format($per_tab_price, 2) ?> / <?= modmy_t("tab", "biji") ?>
                                            </span>
                                        </span>
                                    </button>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Quantity Selector -->
                        <div class="flex items-center gap-3">
                            <label class="text-sm font-medium text-foreground"><?= modmy_t("Quantity", "Kuantiti") ?></label>
                            <div class="flex items-center border border-slate-200 rounded-md bg-white">
                                <button type="button" id="qty-dec" class="w-9 h-9 flex items-center justify-center text-muted-foreground hover:text-foreground transition-colors font-bold">-</button>
                                <span id="qty-val" class="w-10 text-center text-sm font-bold">1</span>
                                <button type="button" id="qty-inc" class="w-9 h-9 flex items-center justify-center text-muted-foreground hover:text-foreground transition-colors font-bold">+</button>
                            </div>
                        </div>

                        <!-- Hidden WooCommerce fields required for cart -->
                        <input type="hidden" name="add-to-cart" value="<?= absint($product->get_id()) ?>" />
                        <input type="hidden" name="product_id" value="<?= absint($product->get_id()) ?>" />
                        <input type="hidden" name="variation_id" class="variation_id" value="<?= esc_attr($variations[1]['variation_id']) ?>" />
                        <input type="hidden" name="attribute_pa_quantity" class="attribute_pa_quantity" value="<?= esc_attr($variations[1]['attributes']['attribute_pa_quantity']) ?>" />
                        <input type="hidden" name="quantity" class="form-quantity" value="1" />

                        <!-- Checkout Button -->
                        <button type="submit" class="w-full flex items-center justify-center gap-2 rounded-md bg-primary px-8 py-3.5 text-sm font-bold uppercase tracking-wider text-primary-foreground shadow-sm transition-colors hover:bg-primary-dark disabled:opacity-50">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                            <span id="submit-btn-text">
                                <?= modmy_t("ADD TO CART", "TAMBAHKAN KE KOTAK") ?> - RM<?= number_format((float)$variations[1]['display_price'], 2) ?>
                            </span>
                        </button>
                    </div>
                </form>

                <!-- Script to handle variation row selection & quantity calculation -->
                <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const rows = document.querySelectorAll('.variation-row-btn');
                    const inputVarId = document.querySelector('input.variation_id');
                    const inputAttr = document.querySelector('input.attribute_pa_quantity');
                    const inputQty = document.querySelector('input.form-quantity');
                    
                    const qtyVal = document.getElementById('qty-val');
                    const btnDec = document.getElementById('qty-dec');
                    const btnInc = document.getElementById('qty-inc');
                    const btnText = document.getElementById('submit-btn-text');

                    let selectedPrice = parseFloat(rows[1].dataset.price); // Default to 30 tabs
                    let quantity = 1;

                    function updateBtnText() {
                        const total = selectedPrice * quantity;
                        btnText.innerHTML = '<?= modmy_t("Checkout & Pay (QRIS)", "Beli & Bayar (QRIS)") ?> - RM' + total.toLocaleString('en-MY', {minimumFractionDigits: 2, maximumFractionDigits: 2});
                    }

                    rows.forEach(row => {
                        row.addEventListener('click', function() {
                            // Update UI states
                            rows.forEach(r => {
                                r.className = "variation-row-btn w-full flex items-center justify-between gap-4 px-4 py-3 rounded-md border text-left transition-colors border-slate-200 bg-white text-slate-700 hover:border-primary/50";
                            });
                            this.className = "variation-row-btn active-row w-full flex items-center justify-between gap-4 px-4 py-3 rounded-md border-2 border-primary bg-primary-softer text-primary-dark text-left transition-colors";

                            // Update Hidden inputs
                            inputVarId.value = this.dataset.id;
                            inputAttr.value = this.dataset.val;

                            // Update local variables
                            selectedPrice = parseFloat(this.dataset.price);
                            updateBtnText();
                        });
                    });

                    // Quantity listeners
                    btnDec.addEventListener('click', function() {
                        if (quantity > 1) {
                            quantity--;
                            qtyVal.innerText = quantity;
                            inputQty.value = quantity;
                            updateBtnText();
                        }
                    });

                    btnInc.addEventListener('click', function() {
                        quantity++;
                        qtyVal.innerText = quantity;
                        inputQty.value = quantity;
                        updateBtnText();
                    });
                });
                </script>

            <?php else: ?>
                <div class="mb-6">
                    <span class="w-full flex items-center justify-center rounded-md bg-destructive-soft px-8 py-3.5 text-sm font-bold uppercase tracking-wider text-destructive">
                        <?= modmy_t("Out of Stock", "Kehabisan Stok") ?>
                    </span>
                </div>
            <?php endif; ?>

            <!-- Trust features grid (4 columns) -->
            <div class="grid grid-cols-2 gap-3 border-t border-slate-200 pt-6">
                <div class="flex items-center gap-2 text-sm text-slate-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    <span><?= modmy_t("100% Genuine", "100% Asli") ?></span>
                </div>
                <div class="flex items-center gap-2 text-sm text-slate-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    <span><?= modmy_t("Discreet Packaging", "Pembungkusan Diskret") ?></span>
                </div>
                <div class="flex items-center gap-2 text-sm text-slate-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span><?= modmy_t("7-12 Day MY Delivery", "Penghantaran MY 7-12 Hari") ?></span>
                </div>
                <div class="flex items-center gap-2 text-sm text-slate-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                    <span><?= modmy_t("Secure Payment", "Pembayaran Selamat") ?></span>
                </div>
            </div>


            
        </div>
    </div>
    <!-- ACF: Extra Tabs -->
    <?php if (have_rows('extra_tabs', $product->get_id())): ?>
        <div class="mt-10 lg:mt-15" id="product-tabs">
            <!-- Tab Headers -->
            <div class="flex flex-wrap border-b-0 md:border-b border-slate-200" role="tablist">
                <?php 
                $tab_index = 0;
                while (have_rows('extra_tabs', $product->get_id())): the_row(); 
                    $tab_title = get_sub_field('tab_title');
                ?>
                    <button 
                        type="button" 
                        role="tab" 
                        aria-selected="<?= $tab_index === 0 ? 'true' : 'false' ?>"
                        aria-controls="tab-panel-<?= $tab_index ?>"
                        id="tab-<?= $tab_index ?>"
                        class="tab-btn whitespace-nowrap text-xs md:text-sm font-bold transition-colors focus:outline-none border rounded-md md:rounded-none md:border-t-0 md:border-x-0 md:border-b-2 px-3.5 py-2 md:py-3 md:px-5 mr-2 mb-2 md:mr-0 md:mb-0 <?= $tab_index === 0 ? 'bg-primary text-white border-primary md:bg-transparent md:text-primary md:border-primary' : 'bg-white text-slate-500 border-slate-200 md:bg-transparent md:text-slate-500 md:border-transparent hover:text-slate-800 hover:border-slate-300' ?>"
                        data-index="<?= $tab_index ?>"
                    >
                        <?= esc_html($tab_title) ?>
                    </button>
                <?php 
                $tab_index++;
                endwhile; ?>
            </div>

            <!-- Tab Panels -->
            <div class="pt-6">
                <?php 
                $tab_index = 0;
                while (have_rows('extra_tabs', $product->get_id())): the_row(); 
                    $tab_content = get_sub_field('tab_content');
                ?>
                    <div 
                        id="tab-panel-<?= $tab_index ?>" 
                        role="tabpanel" 
                        aria-labelledby="tab-<?= $tab_index ?>"
                        class="tab-panel prose prose-sm prose-slate max-w-none <?= $tab_index === 0 ? 'block' : 'hidden' ?>"
                    >
                        <?= $tab_content ?>
                    </div>
                <?php 
                $tab_index++;
                endwhile; ?>
            </div>
        </div>

        <!-- Tabs Script -->
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabBtns = document.querySelectorAll('#product-tabs .tab-btn');
            const tabPanels = document.querySelectorAll('#product-tabs .tab-panel');

            tabBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const index = this.dataset.index;
                    
                    // Reset all
                    tabBtns.forEach(b => {
                        b.setAttribute('aria-selected', 'false');
                        b.className = "tab-btn whitespace-nowrap text-xs md:text-sm font-bold transition-colors focus:outline-none border rounded-md md:rounded-none md:border-t-0 md:border-x-0 md:border-b-2 px-3.5 py-2 md:py-3 md:px-5 mr-2 mb-2 md:mr-0 md:mb-0 bg-white text-slate-500 border-slate-200 md:bg-transparent md:text-slate-500 md:border-transparent hover:text-slate-800 hover:border-slate-300";
                    });
                    tabPanels.forEach(p => {
                        p.className = "tab-panel prose prose-sm prose-slate max-w-none hidden";
                    });

                    // Activate clicked
                    this.setAttribute('aria-selected', 'true');
                    this.className = "tab-btn whitespace-nowrap text-xs md:text-sm font-bold transition-colors focus:outline-none border rounded-md md:rounded-none md:border-t-0 md:border-x-0 md:border-b-2 px-3.5 py-2 md:py-3 md:px-5 mr-2 mb-2 md:mr-0 md:mb-0 bg-primary text-white border-primary md:bg-transparent md:text-primary md:border-primary";
                    document.getElementById('tab-panel-' + index).className = "tab-panel prose prose-sm prose-slate max-w-none block";
                });
            });
        });
        </script>
    <?php endif; ?>
</section>

<!-- Reviews Section -->
<section class="section-padding border-t border-slate-200 bg-white" data-testid="section-reviews">
    <?php
    $reviews = get_posts([
        'post_type' => 'review',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC'
    ]);
    $review_count = count($reviews);
    ?>
    <div class="container-site max-w-4xl">
        <div class="text-center mb-8">
            <h2 class="font-heading text-2xl md:text-3xl font-extrabold text-slate-900 mb-2">
                <?= modmy_t("Customer Reviews", "Ulasan Pelanggan") ?>
            </h2>
            <div class="flex items-center justify-center gap-2">
                <div class="flex items-center gap-0.5 text-emerald-400">
                    <?php for($i=0; $i<5; $i++): ?>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path></svg>
                    <?php endfor; ?>
                </div>
                <span class="text-sm font-semibold text-slate-600">
                    <?= sprintf(modmy_t("4.8 out of 5 (%d reviews)", "4.8 daripada 5 (%d ulasan)"), $review_count ?: 6) ?>
                </span>
            </div>
        </div>

        <div class="space-y-4">
            <?php 
            if($reviews):
                foreach($reviews as $i => $r):
                    $post_id = $r->ID;
                    $title_en = get_field('title_en', $post_id);
                    $title_ms = get_field('title_ms', $post_id) ?: $title_en;
                    $body_en = get_field('body_en', $post_id);
                    $body_ms = get_field('body_ms', $post_id) ?: $body_en;
                    $reviewer = $r->post_title;
                    $meta = get_field('reviewer_meta', $post_id) ?: "Verified Buyer";
                    $rating_val = get_field('rating', $post_id) ?: 5;
            ?>
                <div class="bg-white border-2 border-slate-200 rounded-md p-5" data-testid="review-<?= $i ?>">
                    <div class="flex items-center justify-between mb-2">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center font-bold text-sm uppercase">
                                <?= substr($reviewer, 0, 1) ?>
                            </div>
                            <div>
                                <p class="font-bold text-sm text-slate-900 flex items-center gap-1.5 whitespace-nowrap">
                                    <?= esc_html($reviewer) ?>
                                    <span class="inline-flex items-center gap-0.5 text-[10px] font-bold text-green-600 leading-none" data-testid="badge-verified-buyer">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                                        <?= modmy_t("Verified Buyer", "Pembeli Sah") ?>
                                    </span>
                                </p>
                                <p class="text-[10px] text-slate-500 font-semibold mt-0.5"><?= esc_html($meta) ?></p>
                            </div>
                        </div>
                        <div class="flex items-center gap-0.5 text-emerald-400">
                            <?php for($stars=0; $stars<5; $stars++): ?>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 <?= ($stars < $rating_val) ? 'text-emerald-400' : 'text-slate-200' ?>" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path></svg>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <p class="font-bold text-sm text-slate-900 mb-1 leading-snug">
                        <?= modmy_t($title_en, $title_ms) ?>
                    </p>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        &ldquo;<?= modmy_t($body_en, $body_ms) ?>&rdquo;
                    </p>
                </div>
            <?php 
                endforeach;
            else:
                echo "<p class='text-center text-muted-foreground'>" . modmy_t("No reviews found.", "Tiada ulasan dijumpai.") . "</p>";
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Dosage Guide Banner -->
<section class="py-8 bg-white border-t border-slate-200" data-testid="product-dosage-guide-banner">
    <div class="container-site max-w-4xl">
        <a href="<?= home_url('/modafinil-dosage-guide') ?>" class="group flex flex-col sm:flex-row items-center gap-4 bg-emerald-50 border-2 border-emerald-200 rounded-md p-5 hover:border-emerald-400 transition-colors" data-testid="link-dosage-guide-banner">
            <div class="w-12 h-12 rounded-md bg-emerald-500 text-white flex items-center justify-center flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
            </div>
            <div class="text-center sm:text-left flex-1">
                <h3 class="font-heading font-extrabold text-slate-900 group-hover:text-emerald-700 transition-colors">
                    <?= modmy_t("Modafinil Dosage Guide", "Panduan Dos Modafinil") ?>
                </h3>
                <p class="text-slate-600 text-sm mt-1">
                    <?= modmy_t("Not sure which dose is right for you? Read our complete dosage guide with recommendations, timing tips, and brand comparisons.", "Tidak pasti dos mana yang sesuai? Baca panduan dos lengkap kami untuk cadangan, tips masa, dan perbandingan jenama.") ?>
                </p>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-emerald-500 flex-shrink-0 hidden sm:block transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path></svg>
        </a>
    </div>
</section>

<!-- FAQs Section -->
<section class="section-padding bg-slate-50 border-t border-slate-200" data-testid="product-faq">
    <div class="container-site max-w-4xl">
        <h2 class="font-heading text-2xl md:text-3xl font-extrabold text-slate-900 mb-6 text-center">
            <?= modmy_t("Frequently Asked Questions", "Soalan Lazim") ?>
        </h2>
        <div class="space-y-3">
            <?php
            $faqs = [
                [
                    'q_en' => 'What is Modafinil?',
                    'q_ms' => 'Apakah itu Modafinil?',
                    'a_en' => 'Modafinil is a wakefulness-promoting agent (eugeroic) widely used as a cognitive enhancer by students, professionals, and shift workers to improve focus, concentration, and mental clarity. It was originally developed to treat narcolepsy and sleep disorders.',
                    'a_ms' => 'Modafinil ialah agen penggalak kewaspadaan (eugeroic) yang digunakan secara meluas sebagai pengingkat kognitif oleh pelajar, profesional, dan pekerja syif untuk meningkatkan fokus, kepekatan, dan kejelasan mental. Ia pada asalnya dibangunkan untuk merawat narkolepsi dan gangguan tidur.'
                ],
                [
                    'q_en' => 'What is the recommended dosage?',
                    'q_ms' => 'Apakah dos yang disyorkan?',
                    'a_en' => 'The standard recommended dose is 200mg taken once in the morning. Beginners should start with 100mg (half a tablet) to assess tolerance. Read our complete dosage guide for detailed recommendations.',
                    'a_ms' => 'Dos disyorkan standard ialah 200mg diambil sekali pada waktu pagi. Pemula harus bermula dengan 100mg (separuh tablet) untuk menilai toleransi. Baca panduan dos lengkap kami untuk cadangan terperinci.'
                ],
                [
                    'q_en' => 'Are your products genuine?',
                    'q_ms' => 'Adakah produk anda asli?',
                    'a_en' => '100%. We source all our Modafinil exclusively from certified, reputable manufacturers including Sun Pharma (Modalert, Waklert), HAB Pharma (Modvigil, Artvigil), and other trusted pharmaceutical companies. Every product is genuine and pharmaceutical grade.',
                    'a_ms' => '100% asli. Kami mendapatkan semua Modafinil kami secara eksklusif dari pengeluar bertauliah dan bereputasi tinggi termasuk Sun Pharma (Modalert, Waklert), HAB Pharma (Modvigil, Artvigil), dan syarikat farmaseutikal dipercayai yang lain. Setiap produk adalah asli.'
                ],
                [
                    'q_en' => 'How long does delivery take?',
                    'q_ms' => 'Berapa lamakah masa penghantaran?',
                    'a_en' => 'Semenanjung Malaysia (KL, Selangor, Penang, Johor, dll.) biasanya menerima pesanan dalam masa 7-12 hari bekerja. Sabah dan Sarawak mengambil 10-16 hari bekerja. Semua pesanan dilengkapi penjejakan dan penghantaran percuma atas RM399.',
                    'a_ms' => 'Semenanjung Malaysia (KL, Selangor, Penang, Johor, dll.) biasanya menerima pesanan dalam masa 7-12 hari bekerja. Sabah dan Sarawak mengambil 10-16 hari bekerja. Semua pesanan dilengkapi penjejakan dan penghantaran percuma atas RM399.'
                ],
                [
                    'q_en' => 'Is the packaging discreet?',
                    'q_ms' => 'Adakah pembungkusan diskret?',
                    'a_en' => 'Absolutely. All orders are shipped in plain, unmarked packaging with no indication of the contents. There is no branding or product information visible on the outside of the package. Your privacy is our priority.',
                    'a_ms' => 'Sangat diskret. Semua pesanan dihantar dalam bungkusan biasa tanpa sebarang tanda kandungan. Tiada jenama atau maklumat produk kelihatan di luar bungkusan. Privasi anda ialah keutamaan kami.'
                ]
            ];
            foreach($faqs as $i => $faq):
            ?>
                <details class="group bg-white border-2 border-slate-200 rounded-md hover:border-emerald-300 transition-colors [&_summary::-webkit-details-marker]:hidden" data-testid="faq-item-product-<?= $i ?>">
                    <summary class="flex items-center justify-between gap-4 p-4 cursor-pointer">
                        <span class="font-heading font-extrabold text-slate-900 text-sm md:text-base">
                            <?= modmy_t($faq['q_en'], $faq['q_ms']) ?>
                        </span>
                        <span class="transition-transform group-open:rotate-180 text-emerald-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path></svg>
                        </span>
                    </summary>
                    <div class="border-t border-slate-100 p-4 text-sm text-slate-600 leading-relaxed">
                        <?= modmy_t($faq['a_en'], $faq['a_ms']) ?>
                    </div>
                </details>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Related Products -->
<section class="section-padding bg-slate-50 border-t border-slate-200">
    <div class="container-site">
        <h2 class="font-heading text-2xl md:text-3xl font-extrabold text-slate-900 text-center mb-8">
            <?= modmy_t("Related Products", "Produk Berkaitan") ?>
        </h2>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
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
