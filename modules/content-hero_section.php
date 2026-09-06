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
                    <?php 
                    $is_whatsapp_secondary = (stripos($secondary_btn_en, 'whatsapp') !== false || stripos($secondary_link, 'wa.me') !== false);
                    $secondary_btn_classes = $is_whatsapp_secondary
                        ? 'inline-flex items-center gap-2 bg-[#25D366] text-white font-bold px-7 py-3.5 rounded-full shadow-lg hover:bg-[#20bd5a] hover:shadow-xl hover:-translate-y-0.5 transition-all text-sm uppercase tracking-wide border-2 border-transparent'
                        : 'inline-flex items-center gap-2 border-2 border-white/40 text-white font-bold px-7 py-3.5 rounded-full hover:bg-white/10 transition-all text-sm uppercase tracking-wide';
                    ?>
                    <a href="<?= esc_url($secondary_link) ?>" class="<?= $secondary_btn_classes ?>">
                        <?php if ($is_whatsapp_secondary): ?>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.67-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                        <?php endif; ?>
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
