<?php
/**
 * The main template file
 */

get_header();
?>

<div class="bg-background pt-16 pb-8 text-center border-b border-border">
    <div class="container-site max-w-4xl">
        <h1 class="mt-4 font-heading text-4xl font-extrabold tracking-tight md:text-5xl">
            <?php 
            if (is_home() && !is_front_page()) {
                single_post_title();
            } elseif (is_archive()) {
                the_archive_title();
            } elseif (is_search()) {
                echo modmy_t("Search Results for: ", "Hasil Carian untuk: ") . '<span>' . get_search_query() . '</span>';
            } else {
                echo modmy_t("Blog", "Blog");
            }
            ?>
        </h1>
    </div>
</div>

<div class="section-padding bg-background min-h-[50vh]">
    <div class="container-site max-w-4xl">
        <?php if (have_posts()) : ?>
            <div class="grid gap-8 md:grid-cols-2">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('bg-white border border-border rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow'); ?>>
                        <h2 class="font-heading text-xl font-bold mb-3 hover:text-primary transition-colors">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <div class="text-sm text-muted-foreground mb-4 flex items-center gap-2">
                            <span><?= get_the_date() ?></span>
                            <span>&middot;</span>
                            <span><?= get_the_author() ?></span>
                        </div>
                        <div class="text-muted-foreground text-sm line-clamp-3">
                            <?php the_excerpt(); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="inline-block mt-4 text-sm font-semibold text-primary hover:text-primary-dark hover:underline">
                            <?= modmy_t("Read More &rarr;", "Baca Seterusnya &rarr;") ?>
                        </a>
                    </article>
                <?php endwhile; ?>
            </div>
            
            <div class="mt-12">
                <?php
                the_posts_pagination(array(
                    'mid_size'  => 2,
                    'prev_text' => modmy_t('Previous', 'Sebelumnya'),
                    'next_text' => modmy_t('Next', 'Seterusnya'),
                ));
                ?>
            </div>
        <?php else : ?>
            <div class="text-center">
                <p class="text-muted-foreground mb-4">
                    <?= modmy_t("It seems we can't find what you're looking for.", "Nampaknya kami tidak dapat mencari apa yang anda cari.") ?>
                </p>
                <?php get_search_form(); ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php
get_footer();
