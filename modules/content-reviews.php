<?php
/**
 * Customer Reviews Module
 */

$heading_en = get_sub_field('heading_en') ?: "What Malaysian Customers Say";
$heading_ms = get_sub_field('heading_ms') ?: "Apa Kata Pelanggan Malaysia";
$desc_en = get_sub_field('description_en') ?: "Real testimonials from ModafinilMY users across Malaysia.";
$desc_ms = get_sub_field('description_ms') ?: "Testimoni sebenar dari pengguna ModafinilMY di seluruh Malaysia.";
?>
<section class="section-padding bg-white">
    <div class="container-custom max-w-5xl">
        <div class="text-center mb-12">
            <span class="inline-block bg-emerald-100 text-emerald-800 text-xs font-bold uppercase tracking-widest px-3 py-1.5 rounded-full mb-4">
                <?= modmy_t("Customer Reviews", "Ulasan Pelanggan") ?>
            </span>
            <h1 class="font-heading text-4xl md:text-5xl font-black text-slate-900 mb-4">
                <?= modmy_t($heading_en, $heading_ms) ?>
            </h1>
            <p class="text-slate-500 max-w-xl mx-auto">
                <?= modmy_t($desc_en, $desc_ms) ?>
            </p>

            <div class="flex items-center justify-center gap-3 mt-5">
                <div class="flex gap-0.5 text-emerald-400">
                    <?php for($i = 0; $i < 5; $i++): ?>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                    </svg>
                    <?php endfor; ?>
                </div>
                <span class="font-heading font-black text-2xl text-slate-900">4.9</span>
                <span class="text-slate-500 text-sm">
                    <?= modmy_t("(10+ verified reviews)", "(10+ ulasan disahkan)") ?>
                </span>
            </div>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5">
            <?php if (have_rows('reviews_list')): ?>
                <?php while (have_rows('reviews_list')): the_row(); 
                    $name = get_sub_field('name');
                    $meta = get_sub_field('meta');
                    $title_en = get_sub_field('title_en');
                    $title_ms = get_sub_field('title_ms');
                    $body_en = get_sub_field('body_en');
                    $body_ms = get_sub_field('body_ms');
                    $rating = get_sub_field('rating') ?: 5;
                    $initial = !empty($name) ? mb_substr($name, 0, 1) : 'M';
                ?>
                <div class="bg-white border border-stone-200 rounded-xl p-6 hover:border-emerald-300 hover:shadow-sm transition-all">
                    <div class="flex gap-0.5 mb-3 text-emerald-400">
                        <?php for($i = 0; $i < $rating; $i++): ?>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                        </svg>
                        <?php endfor; ?>
                    </div>
                    <h4 class="font-heading font-bold text-slate-900 text-sm mb-2">
                        <?= modmy_t($title_en, $title_ms) ?>
                    </h4>
                    <p class="text-sm text-slate-500 leading-relaxed mb-4">
                        &ldquo;<?= modmy_t($body_en, $body_ms) ?>&rdquo;
                    </p>
                    <div class="flex items-center gap-3 pt-3 border-t border-stone-100">
                        <div class="w-8 h-8 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-700 font-bold text-xs flex-shrink-0">
                            <?= esc_html($initial) ?>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-slate-900"><?= esc_html($name) ?></p>
                            <p class="text-[11px] text-slate-400"><?= esc_html($meta) ?></p>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-center col-span-full text-slate-500">No reviews found yet.</p>
            <?php endif; ?>
        </div>
    </div>
</section>
