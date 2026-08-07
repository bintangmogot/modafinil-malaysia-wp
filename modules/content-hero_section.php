<?php
/**
 * Module: Hero Section
 */

$bg_image     = get_sub_field('background_image');
$bg_url       = $bg_image ? $bg_image['url'] : MODMY_THEME_URI . '/assets/images/hero-banner.png';

$location_en  = get_sub_field('location_text_en') ?: "Fast Delivery &bull; Penghantaran Pantas";
$location_ms  = get_sub_field('location_text_ms') ?: "Penghantaran Pantas &bull; Fast Delivery";

$heading_en   = get_sub_field('heading_en') ?: "Modafinil Malaysia";
$heading_ms   = get_sub_field('heading_ms') ?: "Modafinil Malaysia";

$subtitle_en  = get_sub_field('subtitle_en') ?: "Sharper Focus. Higher Performance.";
$subtitle_ms  = get_sub_field('subtitle_ms') ?: "Fokus Lebih Tajam. Prestasi Lebih Tinggi.";

$desc_en      = get_sub_field('description_en') ?: "Genuine Modafinil for university students, corporate professionals, and shift workers across Malaysia. Delivered discreetly to every postcode via Pos Malaysia.";
$desc_ms      = get_sub_field('description_ms') ?: "Modafinil tulen untuk pelajar universiti, profesional korporat, dan pekerja syif di seluruh Malaysia. Dihantar secara berhemah ke setiap poskod melalui Pos Malaysia.";

$primary_btn_en = get_sub_field('primary_button_text_en') ?: "Shop Now";
$primary_btn_ms = get_sub_field('primary_button_text_ms') ?: "Beli Sekarang";
$primary_link   = get_sub_field('primary_button_link') ?: wc_get_page_permalink('shop');

$secondary_btn_en = get_sub_field('secondary_button_text_en') ?: "Learn More";
$secondary_btn_ms = get_sub_field('secondary_button_text_ms') ?: "Ketahui Lebih Lanjut";
$secondary_link   = get_sub_field('secondary_button_link') ?: home_url('/faq');
?>

<section data-testid="hero-section">
    <div class="min-h-[520px] w-full overflow-hidden">
        <div class="relative flex items-center px-6 md:px-12 lg:px-16 py-16 lg:py-20 overflow-hidden">
            <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('<?= esc_url($bg_url) ?>')"></div>
            <div class="absolute inset-0 bg-gradient-to-br from-primary/90 via-primary/85 to-primary-dark/90"></div>
            
            <div class="relative z-10 max-w-lg">
                <span class="inline-flex items-center gap-1.5 bg-white/20 backdrop-blur text-white text-xs font-bold uppercase tracking-widest px-3 py-1.5 rounded-full mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    <?= modmy_t($location_en, $location_ms) ?>
                </span>
                
                <h1 class="font-heading text-4xl md:text-5xl lg:text-[3.5rem] font-black text-white leading-[1.08] mb-2">
                    <?= modmy_t($heading_en, $heading_ms) ?>
                </h1>
                
                <p class="font-heading text-2xl md:text-3xl font-bold text-white/90 mb-5">
                    <?= modmy_t($subtitle_en, $subtitle_ms) ?>
                </p>
                
                <p class="text-lg text-white/90 font-medium mb-8 leading-relaxed">
                    <?= modmy_t($desc_en, $desc_ms) ?>
                </p>
                
                <div class="flex flex-wrap gap-3 mb-8">
                    <a href="<?= esc_url($primary_link) ?>" class="inline-flex items-center gap-2 bg-white text-primary-dark font-bold px-7 py-3.5 rounded-full shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition-all text-sm uppercase tracking-wide">
                        <?= modmy_t($primary_btn_en, $primary_btn_ms) ?>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                    <a href="<?= esc_url($secondary_link) ?>" class="inline-flex items-center gap-2 border-2 border-white/40 text-white font-bold px-7 py-3.5 rounded-full hover:bg-white/10 transition-all text-sm uppercase tracking-wide">
                        <?= modmy_t($secondary_btn_en, $secondary_btn_ms) ?>
                    </a>
                </div>
                
                <?php if(have_rows('stats')): ?>
                <div class="flex flex-wrap gap-4">
                    <?php while(have_rows('stats')): the_row(); ?>
                    <div class="bg-white/15 backdrop-blur rounded-lg px-4 py-2.5 text-center">
                        <p class="text-xl font-black text-white"><?= get_sub_field('value') ?></p>
                        <p class="text-[11px] text-white/80 font-medium uppercase tracking-wider"><?= modmy_t(get_sub_field('label_en'), get_sub_field('label_ms')) ?></p>
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php else: // Default fallback stats ?>
                <div class="flex flex-wrap gap-4">
                    <div class="bg-white/15 backdrop-blur rounded-lg px-4 py-2.5 text-center">
                        <p class="text-xl font-black text-white">2,000+</p>
                        <p class="text-[11px] text-white/80 font-medium uppercase tracking-wider"><?= modmy_t("MY Customers", "Pelanggan MY") ?></p>
                    </div>
                    <div class="bg-white/15 backdrop-blur rounded-lg px-4 py-2.5 text-center">
                        <p class="text-xl font-black text-white">7-14</p>
                        <p class="text-[11px] text-white/80 font-medium uppercase tracking-wider"><?= modmy_t("Days Delivery", "Hari Penghantaran") ?></p>
                    </div>
                    <div class="bg-white/15 backdrop-blur rounded-lg px-4 py-2.5 text-center">
                        <p class="text-xl font-black text-white">RM0</p>
                        <p class="text-[11px] text-white/80 font-medium uppercase tracking-wider"><?= modmy_t("Over RM399", "Atas RM399") ?></p>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
