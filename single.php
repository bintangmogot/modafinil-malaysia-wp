<?php
/**
 * The template for displaying all single posts
 */

get_header();
?>

<div class="bg-background pt-16 pb-8 border-b border-border">
    <div class="container-site max-w-3xl">
        <div class="mb-4 text-sm text-muted-foreground">
            <a href="<?= home_url('/') ?>" class="hover:text-primary"><?= modmy_t("Home", "Utama") ?></a>
            <span>/</span>
            <a href="<?= get_permalink(get_option('page_for_posts')) ?>" class="hover:text-primary"><?= modmy_t("Blog", "Blog") ?></a>
            <span>/</span>
            <span class="text-foreground"><?php the_title(); ?></span>
        </div>
        <h1 class="font-heading text-3xl md:text-5xl font-extrabold tracking-tight mt-2 mb-4">
            <?php the_title(); ?>
        </h1>
        <div class="text-sm text-muted-foreground flex flex-wrap items-center gap-3">
            <span><?= get_the_date() ?></span>
            <span>&middot;</span>
            <span><?= get_the_author() ?></span>
            <span>&middot;</span>
            <span>
                <?= esc_html(modmy_get_post_category()) ?>
            </span>
        </div>
    </div>
</div>

<div class="section-padding bg-background min-h-[50vh]">
    <div class="container-site max-w-3xl">
        <?php if (has_post_thumbnail()) : ?>
            <div class="mb-8 rounded-2xl overflow-hidden shadow-sm">
                <?php the_post_thumbnail('large', ['class' => 'w-full h-auto object-cover']); ?>
            </div>
        <?php endif; ?>

        <div class="prose prose-slate max-w-none prose-a:text-primary hover:prose-a:text-primary-dark prose-headings:font-heading prose-headings:font-bold">
            <?php
            while (have_posts()) :
                the_post();
                the_content();
            endwhile; // End of the loop.
            ?>
        </div>
        
        <div class="mt-12 pt-8 border-t border-border">
            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            ?>
        </div>
    </div>
</div>

<?php
get_footer();
