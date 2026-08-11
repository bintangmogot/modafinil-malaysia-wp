<?php
/**
 * Module: Product Guide
 * "Choosing the Right Modafinil"
 */

$heading_en = get_sub_field('heading_en') ?: "Choosing the Right Modafinil";
$heading_ms = get_sub_field('heading_ms') ?: "Memilih Modafinil Yang Tepat";

$desc_en    = get_sub_field('description_en') ?: "With several brands and dosages available, the right product depends on your experience level, desired effects, and budget. Below is a comparison of our most popular options.";
$desc_ms    = get_sub_field('description_ms') ?: "Dengan pelbagai jenama dan dos yang ada, produk yang tepat bergantung kepada tahap pengalaman, kesan yang dimahukan, dan bajet anda. Di bawah adalah perbandingan pilihan paling popular kami.";
?>
<section class="py-12 md:py-16 bg-stone-50" data-testid="product-guide">
    <div class="container-site max-w-4xl">
        <div class="text-center mb-8">
            <h2 class="font-heading text-2xl md:text-4xl font-black text-ink"><?= modmy_t($heading_en, $heading_ms) ?></h2>
            <p class="mt-3 text-base leading-relaxed text-muted-foreground">
                <?= modmy_t($desc_en, $desc_ms) ?>
            </p>
        </div>
        
        <div class="space-y-6">
            <?php if (have_rows('guide_items')): ?>
                <?php while (have_rows('guide_items')): the_row(); ?>
                <div class="rounded-xl border border-border bg-card p-6 shadow-card">
                    <h3 class="font-heading text-xl font-bold"><?= modmy_t(get_sub_field('title_en'), get_sub_field('title_ms')) ?></h3>
                    <p class="mt-2 text-sm leading-relaxed text-muted-foreground"><?= modmy_t(get_sub_field('description_en'), get_sub_field('description_ms')) ?></p>
                    <p class="mt-3 text-sm font-semibold text-primary-dark"><?= modmy_t(get_sub_field('best_for_en'), get_sub_field('best_for_ms')) ?></p>
                    <?php 
                    $product_link = get_sub_field('product_link');
                    if ($product_link): ?>
                    <a href="<?= esc_url($product_link) ?>" class="mt-4 inline-flex text-sm font-bold text-price hover:underline">
                        <?= modmy_t("View product &rarr;", "Lihat produk &rarr;") ?>
                    </a>
                    <?php endif; ?>
                </div>
                <?php endwhile; ?>
            <?php else: // Fallback content ?>
                <div class="rounded-xl border border-border bg-card p-6 shadow-card">
                    <h3 class="font-heading text-xl font-bold"><?= modmy_t("Modalert 200mg — The Gold Standard", "Modalert 200mg — Standard Emas") ?></h3>
                    <p class="mt-2 text-sm leading-relaxed text-muted-foreground"><?= modmy_t("Manufactured by Sun Pharma, Modalert is the most widely recognised modafinil brand worldwide. Each tablet contains the standard 200mg clinical dose and delivers a clean, sustained boost in focus lasting 10–12 hours.", "Dihasilkan oleh Sun Pharma, Modalert ialah jenama modafinil yang paling diiktiraf di seluruh dunia. Setiap tablet mengandungi dos klinikal 200mg dan memberikan lonjakan fokus yang bersih selama 10–12 jam.") ?></p>
                    <p class="mt-3 text-sm font-semibold text-primary-dark"><?= modmy_t("Best for: First-time users who want a trusted, proven brand.", "Terbaik untuk: Pengguna baru yang mahukan jenama terbukti & dipercayai.") ?></p>
                </div>
                
                <div class="rounded-xl border border-border bg-card p-6 shadow-card">
                    <h3 class="font-heading text-xl font-bold"><?= modmy_t("Modvigil 200mg — Affordable Alternative", "Modvigil 200mg — Alternatif Berpatutan") ?></h3>
                    <p class="mt-2 text-sm leading-relaxed text-muted-foreground"><?= modmy_t("Produced by HAB Pharma with the same 200mg dose as Modalert. Many users report very similar effects at a lower price, with a slightly gentler onset that suits all-day productivity.", "Dihasilkan oleh HAB Pharma dengan dos 200mg yang sama seperti Modalert. Ramai pengguna melaporkan kesan yang hampir sama pada harga yang lebih rendah, dengan permulaan yang lebih perlahan.") ?></p>
                    <p class="mt-3 text-sm font-semibold text-primary-dark"><?= modmy_t("Best for: Budget-conscious buyers or those who want a smoother onset.", "Terbaik untuk: Pembeli yang mementingkan bajet atau mahukan kesan mula yang lebih lancar.") ?></p>
                </div>

                <div class="rounded-xl border border-border bg-card p-6 shadow-card">
                    <h3 class="font-heading text-xl font-bold"><?= modmy_t("Modasmart 400mg — Extended Duration", "Modasmart 400mg — Tempoh Berpanjangan") ?></h3>
                    <p class="mt-2 text-sm leading-relaxed text-muted-foreground"><?= modmy_t("Double the standard dose in a single tablet, designed for experienced users who need longer-lasting cognitive enhancement for extended study sessions or overnight shifts.", "Dua kali ganda dos biasa dalam satu tablet, direka untuk pengguna berpengalaman yang perlukan peningkatan kognitif tahan lama.") ?></p>
                    <p class="mt-3 text-sm font-semibold text-primary-dark"><?= modmy_t("Best for: Experienced users who need 14+ hours of sustained focus.", "Terbaik untuk: Pengguna berpengalaman yang perlukan fokus berterusan 14+ jam.") ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
