<?php
/**
 * Module: Reviews Carousel
 */

$tag_en = get_sub_field('tag_en') ?: "Reviews";
$tag_ms = get_sub_field('tag_ms') ?: "Ulasan";

$heading_en = get_sub_field('heading_en') ?: "What Malaysian Customers Say";
$heading_ms = get_sub_field('heading_ms') ?: "Apa Kata Pelanggan Malaysia";

// We can either pull specific reviews selected in ACF, or just get the latest 5 reviews from CPT
$reviews = get_sub_field('selected_reviews');
if (!$reviews) {
    $reviews = get_posts([
        'post_type' => 'review',
        'posts_per_page' => 5,
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
}
?>
<section class="section-padding bg-stone-50" data-testid="testimonials">
    <div class="container-custom">
        <div class="text-center mb-10">
            <span class="inline-block bg-primary-soft text-primary-dark text-xs font-bold uppercase tracking-widest px-3 py-1.5 rounded-full mb-4">
                <?= modmy_t($tag_en, $tag_ms) ?>
            </span>
            <h2 class="font-heading text-2xl md:text-4xl font-black text-ink mb-3">
                <?= modmy_t($heading_en, $heading_ms) ?>
            </h2>
        </div>

        <div class="flex gap-5 overflow-x-auto pb-4 snap-x snap-mandatory scrollbar-hide">
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
            <div class="bg-white border border-stone-200 rounded-xl p-6 flex-shrink-0 w-[320px] snap-start">
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
                        <p class="text-xs font-bold text-ink"><?= $reviewer ?></p>
                        <p class="text-[11px] text-muted-foreground"><?= $meta ?></p>
                    </div>
                </div>
            </div>
            <?php 
                endforeach;
            else:
            ?>
            <!-- Placeholder if no reviews exist yet -->
            <div class="bg-white border border-stone-200 rounded-xl p-6 flex-shrink-0 w-[320px] snap-start">
                <div class="flex gap-0.5 mb-3 text-emerald-400">
                    <?php for($i=0; $i<5; $i++): ?>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path></svg>
                    <?php endfor; ?>
                </div>
                <h4 class="font-heading font-bold text-ink text-sm mb-2">Life-changing focus</h4>
                <p class="text-sm text-muted-foreground leading-relaxed mb-4">
                    &ldquo;Helped me get through my finals. Delivery was surprisingly fast!&rdquo;
                </p>
                <div class="flex items-center gap-3 pt-3 border-t border-stone-100">
                    <div class="w-8 h-8 rounded-full bg-primary-softer flex items-center justify-center text-primary-dark font-bold text-xs flex-shrink-0">A</div>
                    <div>
                        <p class="text-xs font-bold text-ink">Ahmad F.</p>
                        <p class="text-[11px] text-muted-foreground">Kuala Lumpur</p>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>

        <div class="text-center mt-8">
            <a href="<?= home_url('/reviews') ?>" class="inline-flex items-center gap-2 border-2 border-primary-light text-primary-dark font-bold px-7 py-3 rounded-full hover:bg-primary-light hover:text-white hover:border-primary-light transition-all uppercase tracking-widest text-sm">
                <?= modmy_t("Read All Reviews", "Baca Semua Ulasan") ?>
            </a>
        </div>
    </div>
</section>
