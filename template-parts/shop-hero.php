<?php
/**
 * Shop Page Hero — content is managed in Theme Settings > Shop Page Hero.
 */

$title_en    = get_field('shop_hero_title_en', 'option') ?: 'Shop Modafinil Online';
$title_ms    = get_field('shop_hero_title_ms', 'option') ?: 'Beli Modafinil Online';
$subtitle_en = get_field('shop_hero_subtitle_en', 'option') ?: 'Browse and buy genuine Modafinil tablets online from certified manufacturers. Fast Malaysia-wide delivery on all orders.';
$subtitle_ms = get_field('shop_hero_subtitle_ms', 'option') ?: 'Semak dan beli tablet Modafinil asli secara dalam talian dari pengeluar bertauliah. Penghantaran pantas ke seluruh Malaysia.';

$bullets = get_field('shop_hero_bullets', 'option');
if (!$bullets) {
    $bullets = array(
        array('bullet_en' => 'Free Shipping Over RM870', 'bullet_ms' => 'Penghantaran Percuma atas RM870'),
        array('bullet_en' => '100% Genuine', 'bullet_ms' => '100% Asli'),
        array('bullet_en' => 'Fast Malaysian Delivery', 'bullet_ms' => 'Penghantaran Tempatan Pantas'),
    );
}
?>
<section class="bg-ink text-ink-foreground" data-testid="page-hero">
    <div class="container-site py-12 md:py-20">
        <h1 class="font-heading text-3xl font-extrabold tracking-tight md:text-[2.75rem] md:leading-[1.1]">
            <?= modmy_t($title_en, $title_ms) ?>
        </h1>

        <p class="mt-4 max-w-2xl text-base leading-relaxed text-ink-foreground/75">
            <?= modmy_t($subtitle_en, $subtitle_ms) ?>
        </p>

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
    </div>
</section>
