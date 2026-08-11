<?php
/**
 * The template for displaying all pages
 */

get_header();
?>

<main>
    <?php
    // If the page uses ACF Flexible Content Modules, render them:
    if (have_rows('modules')) {
        while (have_rows('modules')) {
            the_row();
            $layout = get_row_layout();
            // This will look for modules/content-{layout_name}.php
            get_template_part('modules/content', $layout);
        }
    } 
    // Otherwise, render a standard text page:
    else {
        ?>
        <?php if ( ! ( class_exists( 'WooCommerce' ) && ( is_cart() || is_checkout() || is_account_page() ) ) ) : ?>
        <div class="bg-background pt-16 pb-8 text-center border-b border-border">
            <div class="container-site max-w-4xl">
                <h1 class="mt-4 font-heading text-4xl font-extrabold tracking-tight md:text-5xl">
                    <?php the_title(); ?>
                </h1>
            </div>
        </div>
        <?php endif; ?>

        <?php if ( class_exists( 'WooCommerce' ) && ( is_cart() || is_checkout() || is_account_page() ) ) : ?>
        <div class="section-padding bg-background min-h-[50vh]">
            <div class="container-custom max-w-7xl">
                <?php
                while (have_posts()) :
                    the_post();
                    the_content();
                endwhile;
                ?>
            </div>
        </div>
        <?php else : ?>
        <div class="section-padding bg-background min-h-[50vh]">
            <div class="container-custom max-w-4xl">
                <div class="prose prose-slate max-w-none prose-a:text-primary hover:prose-a:text-primary-dark prose-headings:font-heading prose-headings:font-bold">
                    <?php
                    while (have_posts()) :
                        the_post();
                        the_content();
                    endwhile;
                    ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php
    }
    ?>
</main>

<?php
get_footer();
