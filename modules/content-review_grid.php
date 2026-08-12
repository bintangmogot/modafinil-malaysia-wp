<?php
/**
 * Module: Review Grid
 */

$tag_en = get_sub_field('tag_en') ?: "Customer Reviews";
$tag_ms = get_sub_field('tag_ms') ?: "Ulasan Pelanggan";

$heading_en = get_sub_field('heading_en') ?: "What Malaysian Customers Say";
$heading_ms = get_sub_field('heading_ms') ?: "Apa Kata Pelanggan Malaysia";

$desc_en = get_sub_field('description_en') ?: "Real testimonials from ModafinilMY users across Malaysia.";
$desc_ms = get_sub_field('description_ms') ?: "Testimoni sebenar dari pengguna ModafinilMY di seluruh Malaysia.";

// Fetch reviews from CPT
$reviews = get_posts([
    'post_type' => 'review',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC',
    'meta_query' => array(
        'relation' => 'OR',
        array(
            'key'     => 'linked_product',
            'compare' => 'NOT EXISTS'
        ),
        array(
            'key'     => 'linked_product',
            'value'   => '',
            'compare' => '='
        )
    )
]);
?>
<section class="section-padding bg-white">
    <div class="container-custom max-w-5xl">
        <div class="text-center mb-12">
            <span class="inline-block bg-primary-soft text-primary-dark text-xs font-bold uppercase tracking-widest px-3 py-1.5 rounded-full mb-4">
                <?= modmy_t($tag_en, $tag_ms) ?>
            </span>
            <h1 class="font-heading text-4xl md:text-5xl font-black text-ink mb-4">
                <?= modmy_t($heading_en, $heading_ms) ?>
            </h1>
            <p class="text-muted-foreground max-w-xl mx-auto">
                <?= modmy_t($desc_en, $desc_ms) ?>
            </p>

            <div class="flex items-center justify-center gap-3 mt-5">
                <div class="flex gap-0.5 text-emerald-400">
                    <?php for($i=0; $i<5; $i++): ?>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path></svg>
                    <?php endfor; ?>
                </div>
                <span class="font-heading font-black text-2xl text-ink">4.9</span>
                <span class="text-muted-foreground text-sm">
                    <?= modmy_t("(10+ verified reviews)", "(10+ ulasan disahkan)") ?>
                </span>
            </div>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5">
            <?php 
            if($reviews):
                foreach($reviews as $r):
                    $post_id = is_object($r) ? $r->ID : $r;
                    $title_en = get_the_title($post_id);
                    $title_ms = $title_en;
                    $body_en = get_post_field('post_content', $post_id);
                    $body_ms = $body_en;
                    $reviewer = get_field('name', $post_id) ?: (is_object($r) ? $r->post_title : get_the_title($post_id));
                    $meta = get_field('reviewer_meta', $post_id) ?: "Verified Buyer";
                    $rating_val = get_field('rating', $post_id) ?: 5;
            ?>
            <div class="bg-white border border-stone-200 rounded-xl p-6 hover:border-primary-soft hover:shadow-sm transition-all">
                <div class="flex gap-0.5 mb-3 text-emerald-400">
                    <?php for($i=0; $i < $rating_val; $i++): ?>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path></svg>
                    <?php endfor; ?>
                </div>
                <h4 class="font-heading font-bold text-ink text-sm mb-2"><?= modmy_t($title_en, $title_ms) ?></h4>
                <p class="text-sm text-muted-foreground leading-relaxed mb-4">
                    &ldquo;<?= modmy_t($body_en, $body_ms) ?>&rdquo;
                </p>
                <div class="flex items-center gap-3 pt-3 border-t border-stone-100">
                    <div class="w-8 h-8 rounded-full bg-primary-softer flex items-center justify-center text-primary-dark font-bold text-xs flex-shrink-0">
                        <?= substr($reviewer, 0, 1) ?>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-ink"><?= esc_html($reviewer) ?></p>
                        <p class="text-[11px] text-muted-foreground"><?= esc_html($meta) ?></p>
                    </div>
                </div>
            </div>
            <?php 
                endforeach;
            else:
                echo "<p class='col-span-full text-center text-muted-foreground'>" . modmy_t("No reviews found.", "Tiada ulasan dijumpai.") . "</p>";
            endif; 
            ?>
        </div>
    </div>
</section>
