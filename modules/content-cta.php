<?php
/**
 * Module: Call to Action (CTA)
 */

$bg_image = get_sub_field('background_image');
$bg_url = $bg_image ? $bg_image['url'] : '';

$heading_en = get_sub_field('heading_en') ?: "Ready to boost your productivity?";
$heading_ms = get_sub_field('heading_ms') ?: "Sedia untuk meningkatkan produktiviti anda?";

$desc_en = get_sub_field('description_en') ?: "Order today and experience the difference Modafinil makes.";
$desc_ms = get_sub_field('description_ms') ?: "Pesan hari ini dan rasai perbezaan yang dibawa oleh Modafinil.";

$btn_en = get_sub_field('button_text_en') ?: "Shop Now";
$btn_ms = get_sub_field('button_text_ms') ?: "Beli Sekarang";
$btn_url = get_sub_field('button_link') ?: wc_get_page_permalink('shop');
?>
<section class="section-padding relative overflow-hidden" data-testid="cta-section">
    <?php if($bg_url): ?>
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('<?= esc_url($bg_url) ?>')"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-primary-dark/95 to-primary/90"></div>
    <?php else: ?>
    <div class="absolute inset-0 bg-gradient-to-r from-primary-dark to-primary"></div>
    <?php endif; ?>
    
    <div class="container-custom relative z-10 text-center py-8">
        <h2 class="font-heading text-3xl md:text-5xl font-black text-white mb-4">
            <?= modmy_t($heading_en, $heading_ms) ?>
        </h2>
        <p class="text-lg text-white/90 mb-8 max-w-2xl mx-auto font-medium">
            <?= modmy_t($desc_en, $desc_ms) ?>
        </p>
        <a href="<?= esc_url($btn_url) ?>" class="inline-flex items-center gap-2 bg-white text-primary-dark font-bold px-8 py-4 rounded-full shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition-all text-sm uppercase tracking-wide">
            <?= modmy_t($btn_en, $btn_ms) ?>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
        </a>
    </div>
</section>
