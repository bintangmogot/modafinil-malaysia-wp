<?php
/**
 * Module: Delivery Cities (Shipping Map)
 */

$tag_en = get_sub_field('tag_en') ?: "Local Delivery";
$tag_ms = get_sub_field('tag_ms') ?: "Penghantaran Tempatan";

$heading_en = get_sub_field('heading_en') ?: "Delivery Across Malaysia";
$heading_ms = get_sub_field('heading_ms') ?: "Penghantaran ke Seluruh Malaysia";

$desc_en = get_sub_field('description_en') ?: "Pos Malaysia to all postcodes — from Kuala Lumpur to Kota Kinabalu, Penang to Johor Bahru.";
$desc_ms = get_sub_field('description_ms') ?: "Pos Malaysia ke semua poskod — dari Kuala Lumpur ke Kota Kinabalu, Penang ke Johor Bahru.";
?>
<section class="section-padding bg-stone-50" data-testid="city-spotlight">
    <div class="container-custom">
        <div class="text-center mb-10">
            <span class="inline-block bg-primary-soft text-primary-dark text-xs font-bold uppercase tracking-widest px-3 py-1.5 rounded-full mb-4">
                <?= modmy_t($tag_en, $tag_ms) ?>
            </span>
            <h2 class="font-heading text-2xl md:text-4xl font-black text-ink mb-3">
                <?= modmy_t($heading_en, $heading_ms) ?>
            </h2>
            <p class="text-muted-foreground max-w-xl mx-auto">
                <?= modmy_t($desc_en, $desc_ms) ?>
            </p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5 mb-8">
            <?php 
            if(have_rows('featured_cities')): 
                while(have_rows('featured_cities')): the_row();
                    $name = get_sub_field('city_name');
                    $slug = sanitize_title($name);
            ?>
            <a href="<?= home_url('/buy-modafinil/' . $slug) ?>" class="group flex items-center gap-4 bg-white border border-stone-200 rounded-xl p-5 hover:border-primary hover:shadow-md transition-all">
                <div class="w-12 h-12 rounded-xl bg-primary-dark text-white flex items-center justify-center flex-shrink-0 font-heading font-black text-sm group-hover:bg-primary transition-colors">
                    <?= get_sub_field('days') ?>
                </div>
                <div>
                    <h3 class="font-heading font-bold text-ink group-hover:text-primary-dark transition-colors">
                        <?= $name ?>
                    </h3>
                    <p class="text-xs text-muted-foreground">
                        <?= modmy_t(get_sub_field('region_en'), get_sub_field('region_ms')) ?> &middot; <?= get_sub_field('days') ?> <?= modmy_t("working days", "hari bekerja") ?>
                    </p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-slate-300 ml-auto group-hover:text-primary transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
            </a>
            <?php 
                endwhile;
            else:
                // Fallback default featured cities
                $defaults = [
                    ['Kuala Lumpur', '7-9', 'Klang Valley', 'Lembah Klang'],
                    ['Petaling Jaya', '7-9', 'Klang Valley', 'Lembah Klang'],
                    ['Subang Jaya', '7-9', 'Klang Valley', 'Lembah Klang'],
                    ['Penang', '8-11', 'Northern Region', 'Wilayah Utara'],
                    ['Johor Bahru', '8-11', 'Southern Region', 'Wilayah Selatan'],
                    ['Kuching', '10-14', 'East Malaysia', 'Malaysia Timur']
                ];
                foreach($defaults as $city):
                    $slug = sanitize_title($city[0]);
            ?>
            <a href="<?= home_url('/buy-modafinil/' . $slug) ?>" class="group flex items-center gap-4 bg-white border border-stone-200 rounded-xl p-5 hover:border-primary hover:shadow-md transition-all">
                <div class="w-12 h-12 rounded-xl bg-primary-dark text-white flex items-center justify-center flex-shrink-0 font-heading font-black text-sm group-hover:bg-primary transition-colors">
                    <?= $city[1] ?>
                </div>
                <div>
                    <h3 class="font-heading font-bold text-ink group-hover:text-primary-dark transition-colors">
                        <?= $city[0] ?>
                    </h3>
                    <p class="text-xs text-muted-foreground">
                        <?= modmy_t($city[2], $city[3]) ?> &middot; <?= $city[1] ?> <?= modmy_t("working days", "hari bekerja") ?>
                    </p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-slate-300 ml-auto group-hover:text-primary transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
            </a>
            <?php 
                endforeach;
            endif; 
            ?>
        </div>

        <div class="flex flex-wrap justify-center gap-2">
            <?php 
            $more_cities = get_sub_field('more_cities_comma_separated');
            if(!$more_cities) {
                $more_cities = "Shah Alam, Klang, Melaka, Ipoh, Seremban, Kota Kinabalu, Putrajaya, Cyberjaya, Alor Setar, Kuantan, Kuala Terengganu, Miri, Sandakan";
            }
            $cities_arr = explode(',', $more_cities);
            foreach($cities_arr as $c):
                $c = trim($c);
                if(empty($c)) continue;
                $slug = sanitize_title($c);
            ?>
            <a href="<?= home_url('/buy-modafinil/' . $slug) ?>" class="text-xs border border-stone-200 text-muted-foreground px-3 py-1.5 rounded-full hover:border-primary hover:text-primary transition-colors">
                <?= esc_html($c) ?>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
