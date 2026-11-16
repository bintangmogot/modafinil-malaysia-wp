<?php
/**
 * Module: FAQs
 *
 * Every part comes from the module fields. A blank part is hidden, and the whole section is
 * hidden when nothing is filled in. The starting text is seeded into the fields by inc/content-seed.php.
 */

$eyebrow = get_sub_field('show_eyebrow') !== false ? modmy_pick(get_sub_field('eyebrow_en'), get_sub_field('eyebrow_ms')) : '';
$heading = modmy_pick(get_sub_field('heading_en'), get_sub_field('heading_ms'));

$link_text = get_sub_field('show_full_faq_link') !== false ? modmy_pick(get_sub_field('link_text_en'), get_sub_field('link_text_ms')) : '';
$link_url  = trim((string) get_sub_field('link_url'));
if ('' === $link_url) {
    $link_text = '';
}

$faqs = array();
foreach ((array) get_sub_field('faq_items') as $row) {
    $question = modmy_pick($row['question_en'] ?? '', $row['question_ms'] ?? '');
    $answer   = modmy_pick($row['answer_en'] ?? '', $row['answer_ms'] ?? '');
    if ('' !== $question && '' !== $answer) {
        $faqs[] = array($question, $answer);
    }
}

if ('' === $heading && !$faqs) {
    return;
}
?>
<section class="section-padding bg-white" data-testid="faq-strip">
    <div class="container-custom max-w-3xl">
        <?php if ('' !== $eyebrow || '' !== $heading): ?>
        <div class="text-center mb-10">
            <?php if ('' !== $eyebrow): ?>
            <span class="inline-block bg-primary-soft text-primary-dark text-xs font-bold uppercase tracking-widest px-3 py-1.5 rounded-full mb-4">
                <?= $eyebrow ?>
            </span>
            <?php endif; ?>
            <?php if ('' !== $heading): ?>
            <h2 class="font-heading text-2xl md:text-4xl font-black text-ink <?= '' === $eyebrow ? 'mb-3' : '' ?>">
                <?= $heading ?>
            </h2>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <?php if ($faqs): ?>
        <div class="space-y-4">
            <?php foreach ($faqs as $faq): ?>
            <details class="group border border-stone-200 rounded-xl">
                <summary class="flex items-center justify-between gap-4 p-5 cursor-pointer list-none">
                    <h3 class="font-heading font-bold text-ink text-sm">
                        <?= $faq[0] ?>
                    </h3>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary flex-shrink-0 group-open:rotate-180 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
                </summary>
                <div class="px-5 pb-5 text-sm text-muted-foreground leading-relaxed border-t border-stone-100 pt-4">
                    <?= $faq[1] ?>
                </div>
            </details>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <?php if ('' !== $link_text): ?>
        <div class="text-center mt-8">
            <a href="<?= esc_url($link_url) ?>" class="inline-flex items-center gap-1 font-bold text-primary hover:text-primary-dark transition-colors text-sm">
                <?= $link_text ?> &rarr;
            </a>
        </div>
        <?php endif; ?>
    </div>
</section>
