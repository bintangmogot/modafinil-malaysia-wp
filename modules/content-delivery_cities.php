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
            <a href="<?= home_url('/buy-modafinil/' . $slug . '/') ?>" class="group flex items-center gap-4 bg-white border border-stone-200 rounded-xl p-5 hover:border-primary hover:shadow-md transition-all">
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
                // Fallback: Dynamically fetch from the 'city' post type
                $city_query = new WP_Query([
                    'post_type' => 'city',
                    'posts_per_page' => 6,
                    'orderby' => 'menu_order',
                    'order' => 'ASC'
                ]);
                
                if ($city_query->have_posts()):
                    while ($city_query->have_posts()): $city_query->the_post();
                        $days = get_post_meta(get_the_ID(), 'delivery_days', true) ?: '7-9';
                        $region_en = get_post_meta(get_the_ID(), 'region', true) ?: 'Malaysia';
                        $city_name = get_post_meta(get_the_ID(), 'city_name', true);
                        if (!$city_name) {
                            $city_name = str_replace(['Buy Modafinil in ', 'Buy Modafinil '], '', get_the_title());
                        }
                        
                        // We can assume standard translations or just use the region field for both if ms isn't provided
                        $region_ms = $region_en; 
                        if (strpos(strtolower($region_en), 'valley') !== false) $region_ms = 'Lembah Klang';
                        if (strpos(strtolower($region_en), 'north') !== false) $region_ms = 'Wilayah Utara';
                        if (strpos(strtolower($region_en), 'south') !== false) $region_ms = 'Wilayah Selatan';
                        if (strpos(strtolower($region_en), 'east') !== false) $region_ms = 'Malaysia Timur';
            ?>
            <a href="<?= get_permalink() ?>" class="group flex items-center gap-4 bg-white border border-stone-200 rounded-xl p-5 hover:border-primary hover:shadow-md transition-all">
                <div class="w-12 h-12 rounded-xl bg-primary-dark text-white flex items-center justify-center flex-shrink-0 font-heading font-black text-sm group-hover:bg-primary transition-colors">
                    <?= esc_html($days) ?>
                </div>
                <div>
                    <h3 class="font-heading font-bold text-ink group-hover:text-primary-dark transition-colors">
                        <?= esc_html($city_name) ?>
                    </h3>
                    <p class="text-xs text-muted-foreground">
                        <?= modmy_t($region_en, $region_ms) ?> &middot; <?= esc_html($days) ?> <?= modmy_t("working days", "hari bekerja") ?>
                    </p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-slate-300 ml-auto group-hover:text-primary transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
            </a>
            <?php 
                    endwhile;
                    wp_reset_postdata();
                endif;
            endif; 
            ?>
        </div>

        <div class="flex flex-wrap justify-center gap-2">
            <?php 
            $more_cities = get_sub_field('more_cities_comma_separated');
            if($more_cities):
                $cities_arr = explode(',', $more_cities);
                foreach($cities_arr as $c):
                    $c = trim($c);
                    if(empty($c)) continue;
                    $slug = sanitize_title($c);
            ?>
            <a href="<?= home_url('/buy-modafinil/' . $slug . '/') ?>" class="text-xs border border-stone-200 text-muted-foreground px-3 py-1.5 rounded-full hover:border-primary hover:text-primary transition-colors">
                <?= esc_html($c) ?>
            </a>
            <?php 
                endforeach;
            else:
                // Dynamically fetch ALL other cities to list as pills
                $all_cities = get_posts([
                    'post_type' => 'city',
                    'posts_per_page' => -1,
                    'offset' => 6, // Skip the first 6 we just featured
                    'orderby' => 'menu_order',
                    'order' => 'ASC'
                ]);
                foreach($all_cities as $c):
                    $city_name = get_post_meta($c->ID, 'city_name', true);
                    if (!$city_name) {
                        $city_name = str_replace(['Buy Modafinil in ', 'Buy Modafinil '], '', $c->post_title);
                    }
            ?>
            <a href="<?= get_permalink($c->ID) ?>" class="text-xs border border-stone-200 text-muted-foreground px-3 py-1.5 rounded-full hover:border-primary hover:text-primary transition-colors">
                <?= esc_html($city_name) ?>
            </a>
            <?php 
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>
