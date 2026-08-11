<?php
/**
 * Module: About Products
 */
$heading_en = get_sub_field('heading_en') ?: "Products We Sell";
$heading_ms = get_sub_field('heading_ms') ?: "Produk Yang Kami Jual";
$desc_en = get_sub_field('desc_en') ?: "We specialize in the two most trusted Modafinil brands globally:";
$desc_ms = get_sub_field('desc_ms') ?: "Kami mengkhususkan diri dalam dua jenama Modafinil yang paling dipercayai secara global:";
?>
<section class="bg-white py-4 md:py-8">
    <div class="container-custom max-w-4xl">
        <h2 class="font-heading font-black text-xl sm:text-2xl text-slate-900 mb-4">
            <?= modmy_t($heading_en, $heading_ms) ?>
        </h2>
        <p class="text-sm sm:text-base text-slate-600 mb-6 whitespace-pre-line"><?= modmy_t($desc_en, $desc_ms) ?></p>

        <div class="grid md:grid-cols-2 gap-5">
            <?php if(have_rows('products')): ?>
                <?php while(have_rows('products')): the_row(); ?>
                    <div class="border border-stone-200 rounded-xl p-5">
                        <h3 class="font-heading font-bold text-slate-900 mb-2 mt-0">
                            <?= esc_html(get_sub_field('title')) ?>
                        </h3>
                        <p class="text-sm text-slate-500 mb-0 whitespace-pre-line"><?= modmy_t(get_sub_field('desc_en'), get_sub_field('desc_ms')) ?></p>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <!-- Default products if repeater empty -->
                <div class="border border-stone-200 rounded-xl p-5">
                    <h3 class="font-heading font-bold text-slate-900 mb-2 mt-0">
                        Modalert 200 (Sun Pharma)
                    </h3>
                    <p class="text-sm text-slate-500 mb-0 whitespace-pre-line">
                        <?= modmy_t("Produced by Sun Pharmaceuticals — one of the largest pharmaceutical companies in the world. Modalert is the top choice for those needing sharp focus for 10-15 hours.", "Dihasilkan oleh Sun Pharmaceuticals — salah satu syarikat farmaseutikal terbesar di dunia. Modalert adalah pilihan utama untuk mereka yang memerlukan fokus tajam selama 10-15 jam.") ?>
                    </p>
                </div>
                <div class="border border-stone-200 rounded-xl p-5">
                    <h3 class="font-heading font-bold text-slate-900 mb-2 mt-0">
                        Modvigil 200 (HAB Pharma)
                    </h3>
                    <p class="text-sm text-slate-500 mb-0 whitespace-pre-line">
                        <?= modmy_t("Produced by HAB Pharmaceuticals. Modvigil offers a smoother profile compared to Modalert, suitable for first-time users or those sensitive to stimulants.", "Dihasilkan oleh HAB Pharmaceuticals. Modvigil menawarkan profil yang lebih lembut berbanding Modalert, sesuai untuk pengguna pertama kali atau mereka yang sensitif terhadap perangsang.") ?>
                    </p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
