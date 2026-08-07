<?php
/**
 * The template for displaying product content within loops
 */

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}

$price = $product->get_price_html();
$image = wp_get_attachment_image_url($product->get_image_id(), 'medium') ?: MODMY_THEME_URI . '/assets/images/placeholder.jpg';
$title = $product->get_title();
$link = $product->get_permalink();
$brand = get_field('brand', $product->get_id()) ?: "HAB Pharma";
$dosage = get_field('dosage', $product->get_id()) ?: "200mg";
?>
<div class="group relative flex flex-col bg-white border border-stone-200 rounded-2xl overflow-hidden hover:shadow-xl hover:border-primary-light transition-all duration-300">
    <div class="relative aspect-square p-6 bg-stone-50 flex items-center justify-center overflow-hidden">
        <img src="<?= esc_url($image) ?>" alt="<?= esc_attr($title) ?>" class="w-full h-auto object-contain drop-shadow-md group-hover:scale-105 transition-transform duration-500">
    </div>
    
    <div class="flex flex-col flex-grow p-5 border-t border-stone-100">
        <div class="flex items-center justify-between mb-2">
            <span class="text-[11px] font-bold tracking-widest uppercase text-muted-foreground"><?= esc_html($brand) ?></span>
            <span class="text-[11px] font-bold text-primary px-2 py-0.5 bg-primary-softer rounded-full"><?= esc_html($dosage) ?></span>
        </div>
        
        <h3 class="font-heading font-black text-ink text-lg leading-tight mb-4 group-hover:text-primary transition-colors">
            <a href="<?= esc_url($link) ?>" class="after:absolute after:inset-0">
                <?= esc_html($title) ?>
            </a>
        </h3>
        
        <div class="mt-auto flex items-center justify-between">
            <span class="font-bold text-ink">
                <?= $price ?>
            </span>
            <div class="w-8 h-8 rounded-full bg-stone-100 flex items-center justify-center text-ink group-hover:bg-primary group-hover:text-white transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path></svg>
            </div>
        </div>
    </div>
</div>
