<?php
/**
 * Module: Page Hero (Inner Pages)
 */

$title_en    = get_sub_field('title_en') ?: get_the_title();
$title_ms    = get_sub_field('title_ms') ?: get_the_title();

$subtitle_en = get_sub_field('subtitle_en');
$subtitle_ms = get_sub_field('subtitle_ms');

$bullets     = get_sub_field('bullets'); // Assuming repeater with 'bullet_en' and 'bullet_ms'
?>
<section class="bg-ink text-ink-foreground" data-testid="page-hero">
    <div class="container-site py-12 md:py-20">
        <h1 class="font-heading text-3xl font-extrabold tracking-tight md:text-[2.75rem] md:leading-[1.1]">
            <?= modmy_t($title_en, $title_ms) ?>
        </h1>
        
        <?php if ($subtitle_en || $subtitle_ms): ?>
        <p class="mt-4 max-w-2xl text-base leading-relaxed text-ink-foreground/75">
            <?= modmy_t($subtitle_en, $subtitle_ms) ?>
        </p>
        <?php endif; ?>

        <?php if ($bullets): ?>
        <ul class="mt-6 flex flex-wrap gap-x-8 gap-y-2">
            <?php foreach ($bullets as $b): 
                if (empty($b['bullet_en']) && empty($b['bullet_ms'])) continue;
            ?>
            <li class="flex items-center gap-2 text-sm text-ink-foreground/85">
                <svg class="h-4 w-4 text-primary-light" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
                <?= modmy_t($b['bullet_en'], $b['bullet_ms']) ?>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php else: // Fallback if no bullets added in backend ?>
        <ul class="mt-6 flex flex-wrap gap-x-8 gap-y-2">
            <li class="flex items-center gap-2 text-sm text-ink-foreground/85">
                <svg class="h-4 w-4 text-primary-light" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
                <?= modmy_t("Free Shipping Over RM399", "Penghantaran Percuma atas RM399") ?>
            </li>
            <li class="flex items-center gap-2 text-sm text-ink-foreground/85">
                <svg class="h-4 w-4 text-primary-light" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
                <?= modmy_t("100% Genuine", "100% Asli") ?>
            </li>
            <li class="flex items-center gap-2 text-sm text-ink-foreground/85">
                <svg class="h-4 w-4 text-primary-light" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
                <?= modmy_t("Fast Malaysian Delivery", "Penghantaran Tempatan Pantas") ?>
            </li>
        </ul>
        <?php endif; ?>
    </div>
</section>
