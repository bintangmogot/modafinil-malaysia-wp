<?php
/**
 * The main template file
 * Handles the Blog index (home.php fallback), Archives, and Search Results.
 */

get_header();

$blog_page_id = is_home() ? get_option('page_for_posts') : null;
$has_modules  = $blog_page_id && have_rows('modules', $blog_page_id);

function modmy_render_blog_loop() {
    ?>
    <section class="section-y bg-background min-h-[50vh]">
        <div class="container-site grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>" <?php post_class('group flex flex-col rounded-xl border border-border hover:border-primary bg-card p-6 shadow-card transition-all hover:shadow-card-hover hover:-translate-y-1'); ?>>
                        <div class="flex items-center gap-3">
                            <?php 
                        $cat_name = modmy_get_post_category(get_the_ID());
                        if ($cat_name): 
                        ?>
                            <span class="eyebrow"><?= esc_html($cat_name) ?></span>
                        <?php endif; ?>
                            
                            <time class="text-xs text-muted-foreground" datetime="<?= get_the_date('c') ?>">
                                <?= get_the_date('j M Y') ?>
                            </time>
                        </div>
                        
                        <h2 class="mt-4 font-heading text-lg font-bold leading-snug group-hover:text-primary transition-colors line-clamp-3">
                            <?php the_title(); ?>
                        </h2>
                        
                        <div class="mt-3 flex-1 text-sm leading-relaxed text-muted-foreground line-clamp-3">
                            <?= wp_trim_words(get_the_excerpt(), 20) ?>
                        </div>
                        
                        <span class="mt-5 text-sm font-bold text-price group-hover:underline text-primary transition-colors">
                            <?= modmy_t("Read article &rarr;", "Baca artikel &rarr;") ?>
                        </span>
                    </a>
                <?php endwhile; ?>
            <?php else : ?>
                <div class="col-span-full text-center py-12">
                    <p class="text-muted-foreground mb-4">
                        <?= modmy_t("It seems we can't find what you're looking for.", "Nampaknya kami tidak dapat mencari apa yang anda cari.") ?>
                    </p>
                    <div class="max-w-md mx-auto">
                        <?php get_search_form(); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        
        <?php if (have_posts()) : ?>
        <div class="container-site mt-12 flex justify-center">
            <?php
            $pages = paginate_links(array(
                'mid_size'  => 2,
                'prev_text' => '&larr;',
                'next_text' => '&rarr;',
                'type'      => 'array'
            ));
            
            if (!empty($pages)) {
                echo '<ul class="flex flex-wrap items-center justify-center gap-2">';
                foreach ($pages as $page) {
                    if (strpos($page, 'current') !== false) {
                        $num = strip_tags($page);
                        echo '<li><span class="flex items-center justify-center w-10 h-10 rounded-md font-bold text-sm bg-primary text-primary-foreground shadow-sm pointer-events-none">' . $num . '</span></li>';
                    } elseif (strpos($page, 'dots') !== false) {
                        echo '<li><span class="flex items-center justify-center w-10 h-10 text-muted-foreground font-normal">&hellip;</span></li>';
                    } else {
                        $styled_link = preg_replace(
                            '/class="([^"]*)"/',
                            'class="$1 flex items-center justify-center w-10 h-10 rounded-md font-bold text-sm transition-all bg-card border border-border text-foreground hover:border-primary hover:text-primary hover:shadow-sm"',
                            $page
                        );
                        if (strpos($styled_link, 'class=') === false) {
                            $styled_link = str_replace('<a ', '<a class="flex items-center justify-center w-10 h-10 rounded-md font-bold text-sm transition-all bg-card border border-border text-foreground hover:border-primary hover:text-primary hover:shadow-sm" ', $styled_link);
                        }
                        echo '<li>' . $styled_link . '</li>';
                    }
                }
                echo '</ul>';
            }
            ?>
        </div>
        <?php endif; ?>
    </section>
    <?php
}

if (is_home() && $has_modules) {
    $rendered_loop = false;
    while (have_rows('modules', $blog_page_id)) {
        the_row();
        $layout = get_row_layout();
        
        if ($layout === 'posts_grid' || $layout === 'blog_grid') {
            modmy_render_blog_loop();
            $rendered_loop = true;
        } else {
            get_template_part('modules/content', $layout);
            // Auto-inject blog loop right after page_hero if posts_grid module wasn't explicitly placed
            if ($layout === 'page_hero' && !$rendered_loop) {
                $raw_modules = get_field('modules', $blog_page_id) ?: [];
                $remaining_layouts = array_column($raw_modules, 'acf_fc_layout');
                if (!in_array('posts_grid', $remaining_layouts) && !in_array('blog_grid', $remaining_layouts)) {
                    modmy_render_blog_loop();
                    $rendered_loop = true;
                }
            }
        }
    }
    
    if (!$rendered_loop) {
        modmy_render_blog_loop();
    }
} else {
    // Default render for Archives / Search or Blog without ACF modules
    $title_en = "Blog & Guides";
    $title_ms = "Panduan & Artikel Modafinil Malaysia";
    $subtitle_en = "Practical guides on dosage, brands, shipping, and safe usage of Modafinil in Malaysia.";
    $subtitle_ms = "Sumber maklumat terlengkap tentang Modafinil dalam bahasa Malaysia dan English — dari panduan dos hingga ulasan produk.";

    if (is_archive()) {
        $title_en = get_the_archive_title();
        $title_ms = $title_en;
        $subtitle_en = get_the_archive_description();
        $subtitle_ms = $subtitle_en;
    } elseif (is_search()) {
        $title_en = "Search Results for: " . get_search_query();
        $title_ms = "Hasil Carian untuk: " . get_search_query();
        $subtitle_en = "";
        $subtitle_ms = "";
    }
    ?>
    <section class="bg-background pt-16 pb-8 text-center border-b border-border">
        <div class="container-site max-w-4xl">
            <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl font-black text-foreground tracking-tight mb-4 md:mb-6">
                <?= modmy_t($title_en, $title_ms) ?>
            </h1>
            <?php if ($subtitle_en || $subtitle_ms): ?>
            <p class="text-lg md:text-xl text-muted-foreground leading-relaxed max-w-2xl mx-auto">
                <?= modmy_t($subtitle_en, $subtitle_ms) ?>
            </p>
            <?php endif; ?>
        </div>
    </section>
    <?php
    modmy_render_blog_loop();
}

get_footer();
