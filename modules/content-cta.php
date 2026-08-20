<?php
/**
 * Module: Call to Action (CTA)
 */

$heading_en = get_sub_field('heading_en') ?: get_sub_field('title_en') ?: "Contact Us";
$heading_ms = get_sub_field('heading_ms') ?: get_sub_field('title_ms') ?: "Hubungi Kami";

$desc_en = get_sub_field('description_en') ?: "Have questions? Our team speaks English and Malay, ready to help you 7 days a week via WhatsApp.";
$desc_ms = get_sub_field('description_ms') ?: "Ada soalan? Pasukan kami berbahasa Malaysia dan English, siap membantu anda 7 hari seminggu via WhatsApp.";

$btn_en = get_sub_field('button_text_en') ?: "WhatsApp Us";
$btn_ms = get_sub_field('button_text_ms') ?: "WhatsApp Kami";
$wa_number = preg_replace('/[^0-9]/', '', get_field('whatsapp_number', 'option') ?: '60185754182');
$btn_url = get_sub_field('button_url') ?: "https://wa.me/{$wa_number}";

$btn2_en = get_sub_field('secondary_button_text_en') ?: "Contact Form";
$btn2_ms = get_sub_field('secondary_button_text_ms') ?: "Borang Hubungi";
$btn2_url = get_sub_field('secondary_button_url') ?: site_url('/contact');
?>
<section class="py-4 pb-10 bg-white" data-testid="cta-section">
    <div class="container-custom max-w-4xl">
        <div class="bg-emerald-600 text-white rounded-2xl p-8 md:p-10 text-center not-prose shadow-sm">
            <h2 class="font-heading font-black text-2xl md:text-3xl mb-3 text-white">
                <?= modmy_t($heading_en, $heading_ms) ?>
            </h2>
            <p class="text-emerald-100 mb-6 max-w-2xl mx-auto font-medium text-sm md:text-base leading-relaxed">
                <?= modmy_t($desc_en, $desc_ms) ?>
            </p>
            <div class="flex flex-row gap-3 sm:gap-4 justify-center items-center">
                <a href="<?= esc_url($btn_url) ?>" class="inline-flex items-center justify-center gap-2 bg-white text-emerald-700 font-bold px-5 sm:px-7 py-3 rounded-full hover:bg-emerald-50 transition-colors shadow-sm text-xs sm:text-sm whitespace-nowrap">
                    <?= modmy_t($btn_en, $btn_ms) ?>
                </a>
                <a href="<?= esc_url($btn2_url) ?>" class="inline-flex items-center justify-center gap-2 border-2 border-white/40 text-white font-bold px-5 sm:px-7 py-3 rounded-full hover:bg-white/10 transition-colors text-xs sm:text-sm whitespace-nowrap">
                    <?= modmy_t($btn2_en, $btn2_ms) ?>
                </a>
            </div>
        </div>
    </div>
</section>

