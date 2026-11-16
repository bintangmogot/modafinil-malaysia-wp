<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 */

defined('ABSPATH') || exit;

get_header('shop');

$shop_page_id = wc_get_page_id('shop');

// Check if ACF modules exist on the Shop page
if (have_rows('modules', $shop_page_id)) {
    echo '<main>';
    while (have_rows('modules', $shop_page_id)) {
        the_row();
        $layout = get_row_layout();
        get_template_part('modules/content', $layout);
    }
    echo '</main>';
} else {
    // Fallback if no ACF modules are configured for the Shop page
?>

<section class="bg-background pt-12 pb-6 text-center border-b border-border">
    <div class="container-site max-w-4xl">
        <h1 class="font-heading text-4xl font-extrabold tracking-tight md:text-5xl">
            <?= modmy_t("Buy Modafinil Online in Malaysia", "Beli Modafinil Online di Malaysia") ?>
        </h1>
        <p class="mx-auto mt-3 max-w-2xl text-base leading-relaxed text-muted-foreground">
            <?= modmy_t("Browse and buy genuine Modafinil tablets online from certified manufacturers. Fast Malaysia-wide delivery on all orders.", "Semak dan beli tablet Modafinil asli secara dalam talian dari pengeluar bertauliah. Penghantaran pantas ke seluruh Malaysia.") ?>
        </p>
    </div>
</section>

<section class="py-10 md:py-16 bg-background">
    <div class="container-site">
        <?php
        if (woocommerce_product_loop()) {
            woocommerce_product_loop_start();

            if (wc_get_loop_prop('total')) {
                while (have_posts()) {
                    the_post();
                    do_action('woocommerce_shop_loop');
                    wc_get_template_part('content', 'product');
                }
            }

            woocommerce_product_loop_end();
        } else {
            do_action('woocommerce_no_products_found');
        }
        ?>
    </div>
</section>

<?php
// Guide Section from React
?>
<section class="py-12 md:py-16 bg-stone-50">
    <div class="container-site max-w-4xl">
        <div class="text-center mb-8">
            <h2 class="font-heading text-2xl md:text-4xl font-black text-ink"><?= modmy_t("Choosing the Right Modafinil", "Memilih Modafinil Yang Tepat") ?></h2>
            <p class="mt-3 text-base leading-relaxed text-muted-foreground">
                <?= modmy_t("With several brands and dosages available, the right product depends on your experience level, desired effects, and budget. Below is a comparison of our most popular options.", "Dengan pelbagai jenama dan dos yang ada, produk yang tepat bergantung kepada tahap pengalaman, kesan yang dimahukan, dan bajet anda. Di bawah adalah perbandingan pilihan paling popular kami.") ?>
            </p>
        </div>
        
        <div class="space-y-6">
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
        </div>
    </div>
</section>

<?php 
} // End ACF check 
?>

<?php get_footer('shop'); ?>
