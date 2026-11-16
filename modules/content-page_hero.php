<?php
/**
 * Module: Page Hero (Inner Pages)
 *
 * Every part comes from the module fields on the page. A blank part is hidden:
 * no subtitle text, no bullets, nothing is filled in from the theme.
 * The title is the exception: a hero needs an H1, so a blank title uses the page title.
 */

$title    = modmy_pick(get_sub_field('title_en'), get_sub_field('title_ms')) ?: get_the_title();
$subtitle = modmy_pick(get_sub_field('subtitle_en'), get_sub_field('subtitle_ms'));

$bullets = array();
foreach ((array) get_sub_field('bullets') as $row) {
    $text = modmy_pick($row['bullet_en'] ?? '', $row['bullet_ms'] ?? '');
    if ('' !== $text) {
        $bullets[] = $text;
    }
}
?>
<section class="bg-ink text-ink-foreground" data-testid="page-hero">
    <div class="container-site py-12 md:py-20">
        <h1 class="font-heading text-3xl font-extrabold tracking-tight md:text-[2.75rem] md:leading-[1.1]">
            <?= $title ?>
        </h1>

        <?php if ('' !== $subtitle): ?>
        <p class="mt-4 max-w-2xl text-base leading-relaxed text-ink-foreground/75">
            <?= $subtitle ?>
        </p>
        <?php endif; ?>

        <?php if ($bullets): ?>
        <ul class="mt-6 flex flex-wrap gap-x-8 gap-y-2">
            <?php foreach ($bullets as $bullet): ?>
            <li class="flex items-center gap-2 text-sm text-ink-foreground/85">
                <svg class="h-4 w-4 text-primary-light" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
                <?= $bullet ?>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
    </div>
</section>
