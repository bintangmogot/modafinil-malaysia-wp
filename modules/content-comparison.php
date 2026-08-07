<?php
/**
 * Module: Comparison Table
 */

$tag_en = get_sub_field('tag_en') ?: "Comparison";
$tag_ms = get_sub_field('tag_ms') ?: "Perbandingan";

$heading_en = get_sub_field('heading_en') ?: "Modafinil vs Coffee vs Energy Drinks";
$heading_ms = get_sub_field('heading_ms') ?: "Modafinil vs Kopi vs Minuman Tenaga";

$desc_en = get_sub_field('description_en') ?: "See why thousands of Malaysian workers choose Modafinil over caffeine.";
$desc_ms = get_sub_field('description_ms') ?: "Lihat mengapa ribuan pekerja Malaysia memilih Modafinil berbanding kafein.";
?>
<section class="section-padding bg-white" data-testid="comparison-table">
    <div class="container-custom max-w-4xl">
        <div class="text-center mb-10">
            <span class="inline-block bg-primary-soft text-primary-dark text-xs font-bold uppercase tracking-widest px-3 py-1.5 rounded-full mb-4">
                <?= modmy_t($tag_en, $tag_ms) ?>
            </span>
            <h2 class="font-heading text-2xl md:text-4xl font-black text-ink mb-3">
                <?= modmy_t($heading_en, $heading_ms) ?>
            </h2>
            <p class="text-muted-foreground">
                <?= modmy_t($desc_en, $desc_ms) ?>
            </p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b-2 border-stone-200">
                        <th class="text-left py-4 px-4 font-heading font-bold text-ink">
                            <?= modmy_t("Feature", "Ciri / Feature") ?>
                        </th>
                        <th class="text-center py-4 px-4 font-heading font-bold text-primary-dark bg-primary-softer rounded-t-lg">
                            Modafinil
                        </th>
                        <th class="text-center py-4 px-4 font-heading font-bold text-ink/70">
                            <?= modmy_t("Coffee", "Kopi") ?>
                        </th>
                        <th class="text-center py-4 px-4 font-heading font-bold text-ink/70">
                            <?= modmy_t("Energy Drink", "Minuman Tenaga") ?>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    <?php 
                    if(have_rows('rows')): 
                        while(have_rows('rows')): the_row();
                    ?>
                    <tr>
                        <td class="py-3.5 px-4 font-medium text-ink/90"><?= modmy_t(get_sub_field('feature_en'), get_sub_field('feature_ms')) ?></td>
                        <td class="py-3.5 px-4 text-center bg-primary-softer/50 font-semibold text-primary-dark"><?= modmy_t(get_sub_field('modafinil_en'), get_sub_field('modafinil_ms')) ?></td>
                        <td class="py-3.5 px-4 text-center text-muted-foreground"><?= modmy_t(get_sub_field('coffee_en'), get_sub_field('coffee_ms')) ?></td>
                        <td class="py-3.5 px-4 text-center text-muted-foreground"><?= modmy_t(get_sub_field('energy_en'), get_sub_field('energy_ms')) ?></td>
                    </tr>
                    <?php 
                        endwhile;
                    else: 
                        // Fallback data
                        $default_rows = [
                            ['Effect Duration', 'Tempoh kesan', '10-15 jam', '10-15 hours', '2-4 jam', '2-4 hours', '1-3 jam', '1-3 hours'],
                            ['Crash Effect', 'Kesan limpahan / crash', 'Tiada', 'None', 'Sederhana', 'Moderate', 'Teruk', 'Severe']
                        ];
                        foreach($default_rows as $r):
                    ?>
                    <tr>
                        <td class="py-3.5 px-4 font-medium text-ink/90"><?= modmy_t($r[0], $r[1]) ?></td>
                        <td class="py-3.5 px-4 text-center bg-primary-softer/50 font-semibold text-primary-dark"><?= modmy_t($r[3], $r[2]) ?></td>
                        <td class="py-3.5 px-4 text-center text-muted-foreground"><?= modmy_t($r[5], $r[4]) ?></td>
                        <td class="py-3.5 px-4 text-center text-muted-foreground"><?= modmy_t($r[7], $r[6]) ?></td>
                    </tr>
                    <?php 
                        endforeach;
                    endif; 
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
