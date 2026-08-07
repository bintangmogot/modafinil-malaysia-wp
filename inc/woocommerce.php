<?php
/**
 * WooCommerce Customizations (WhatsApp Checkout)
 */

if (!class_exists('WooCommerce')) {
    return;
}

// 1. Remove standard Add to Cart buttons
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);

// 2. Add Custom "Buy via WhatsApp" button on Single Product
add_action('woocommerce_single_product_summary', 'modmy_whatsapp_buy_button', 30);
function modmy_whatsapp_buy_button() {
    global $product;
    if (!$product) return;
    
    $whatsapp = get_field('whatsapp_number', 'option') ?: '601116284532';
    // Remove non-numeric chars
    $whatsapp = preg_replace('/[^0-9]/', '', $whatsapp);
    
    // Default message
    $message = "Hi ModafinilMY, I'm interested in buying " . $product->get_name();
    $url = "https://wa.me/" . $whatsapp . "?text=" . urlencode($message);

    $btn_text = modmy_t("Order via WhatsApp", "Pesan melalui WhatsApp");

    echo '<div class="mt-8">';
    echo '<a href="' . esc_url($url) . '" target="_blank" rel="noopener noreferrer" class="flex w-full items-center justify-center gap-2 rounded-full bg-primary px-8 py-4 text-base font-bold text-primary-foreground shadow-pill transition-colors hover:bg-primary-dark sm:w-auto">';
    echo '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>';
    echo $btn_text;
    echo '</a>';
    echo '<p class="mt-3 text-center text-xs text-muted-foreground">' . modmy_t("No credit card needed. Secure bank transfer via WhatsApp.", "Tiada kad kredit diperlukan. Pindahan bank selamat melalui WhatsApp.") . '</p>';
    echo '</div>';
}

// 3. Remove unnecessary WooCommerce Elements
add_action('wp', 'modmy_remove_wc_elements');
function modmy_remove_wc_elements() {
    // Remove breadcrumbs
    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
    // Remove sidebar
    remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
    // Remove sorting and result count
    remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
    remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
    // Remove related products (we'll add our own if needed)
    remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
}

// 4. Disable Cart & Checkout pages redirect
add_action('template_redirect', 'modmy_redirect_cart_checkout');
function modmy_redirect_cart_checkout() {
    if (is_cart() || is_checkout()) {
        wp_redirect(wc_get_page_permalink('shop'));
        exit;
    }
}
