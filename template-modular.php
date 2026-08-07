<?php
/**
 * Template Name: Modular Page (ACF Pro)
 *
 * This template displays pages built dynamically using ACF Pro Flexible Content modules.
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php
        while ( have_posts() ) : the_post();

            if ( have_rows('modules') ) :

                while ( have_rows('modules') ) : the_row();
                    $layout_name = get_row_layout();
                    get_template_part( 'modules/content', $layout_name );
                endwhile;

            else :
                ?>
                <div class="container-site py-12 prose max-w-none">
                    <?php the_content(); ?>
                </div>
                <?php
            endif;

        endwhile;
        ?>

    </main>
</div>

<?php
get_footer();
