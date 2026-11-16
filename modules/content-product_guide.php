<?php
/**
 * Module: Product Guide
 * "Choosing the Right Modafinil"
 *
 * Every part comes from the module fields. A blank part is hidden, and the whole section is
 * hidden when nothing is filled in. The starting text is seeded into the fields by inc/content-seed.php.
 */

$heading = modmy_pick(get_sub_field('heading_en'), get_sub_field('heading_ms'));
$desc    = modmy_pick(get_sub_field('description_en'), get_sub_field('description_ms'));

$items = array();
foreach ((array) get_sub_field('guide_items') as $row) {
    $item = array(
        'title'    => modmy_pick($row['title_en'] ?? '', $row['title_ms'] ?? ''),
        'desc'     => modmy_pick($row['description_en'] ?? '', $row['description_ms'] ?? ''),
        'best_for' => modmy_pick($row['best_for_en'] ?? '', $row['best_for_ms'] ?? ''),
        'link'     => trim((string) ($row['product_link'] ?? '')),
    );
    if ('' !== $item['title'] || '' !== $item['desc'] || '' !== $item['best_for']) {
        $items[] = $item;
    }
}

if ('' === $heading && '' === $desc && !$items) {
    return;
}
?>
<section class="py-12 md:py-16 bg-stone-50" data-testid="product-guide">
    <div class="container-site max-w-4xl">
        <?php if ('' !== $heading || '' !== $desc): ?>
        <div class="text-center mb-8">
            <?php if ('' !== $heading): ?>
            <h2 class="font-heading text-2xl md:text-4xl font-black text-ink"><?= $heading ?></h2>
            <?php endif; ?>
            <?php if ('' !== $desc): ?>
            <p class="mt-3 text-base leading-relaxed text-muted-foreground">
                <?= $desc ?>
            </p>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <?php if ($items): ?>
        <div class="space-y-6">
            <?php foreach ($items as $item): ?>
            <div class="rounded-xl border border-border bg-card p-6 shadow-card">
                <?php if ('' !== $item['title']): ?>
                <h3 class="font-heading text-xl font-bold"><?= $item['title'] ?></h3>
                <?php endif; ?>
                <?php if ('' !== $item['desc']): ?>
                <p class="mt-2 text-sm leading-relaxed text-muted-foreground"><?= $item['desc'] ?></p>
                <?php endif; ?>
                <?php if ('' !== $item['best_for']): ?>
                <p class="mt-3 text-sm font-semibold text-primary-dark"><?= $item['best_for'] ?></p>
                <?php endif; ?>
                <?php if ('' !== $item['link']): ?>
                <a href="<?= esc_url($item['link']) ?>" class="mt-4 inline-flex text-sm font-bold text-price hover:underline">
                    <?= modmy_t("View product &rarr;", "Lihat produk &rarr;") ?>
                </a>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>
