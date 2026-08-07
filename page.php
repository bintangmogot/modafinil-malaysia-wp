<?php
/**
 * The template for displaying all pages
 */

get_header();
?>

<div class="bg-background pt-16 pb-8 text-center border-b border-border">
    <div class="container-site max-w-4xl">
        <h1 class="mt-4 font-heading text-4xl font-extrabold tracking-tight md:text-5xl">
            <?php the_title(); ?>
        </h1>
    </div>
</div>

<div class="section-padding bg-background min-h-[50vh]">
    <div class="container-site max-w-4xl">
        <div class="prose prose-slate max-w-none prose-a:text-primary hover:prose-a:text-primary-dark prose-headings:font-heading prose-headings:font-bold">
            <?php
            while (have_posts()) :
                the_post();
                the_content();
            endwhile; // End of the loop.
            ?>
        </div>
    </div>
</div>

<?php
get_footer();
