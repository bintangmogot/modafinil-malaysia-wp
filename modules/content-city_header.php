<?php
/**
 * Module: City Header (SEO Pages)
 */

$city_name = get_sub_field('city_name') ?: "Kuala Lumpur";
$state_name = get_sub_field('state_name') ?: "W.P. Kuala Lumpur";

$heading_en = get_sub_field('heading_en') ?: "Buy Modafinil in {$city_name}, {$state_name}";
$heading_ms = get_sub_field('heading_ms') ?: "Beli Modafinil di {$city_name}, {$state_name}";

$desc_en = get_sub_field('description_en') ?: "Fast, discreet delivery of genuine Modafinil to all areas in {$city_name}. Tracked shipping via Pos Malaysia.";
$desc_ms = get_sub_field('description_ms') ?: "Penghantaran pantas dan diskret Modafinil asli ke semua kawasan di {$city_name}. Penghantaran dijejaki melalui Pos Malaysia.";
?>
<section class="bg-background pt-16 pb-8 text-center border-b border-border">
    <div class="container-site max-w-4xl">
        <span class="inline-block rounded-full bg-primary-softer px-4 py-1.5 text-xs font-bold uppercase tracking-wider text-primary">
            <?= modmy_t("Local Delivery", "Penghantaran Tempatan") ?>
        </span>
        <h1 class="mt-4 font-heading text-4xl font-extrabold tracking-tight md:text-5xl">
            <?= modmy_t($heading_en, $heading_ms) ?>
        </h1>
        <p class="mx-auto mt-4 max-w-2xl text-base leading-relaxed text-muted-foreground">
            <?= modmy_t($desc_en, $desc_ms) ?>
        </p>
    </div>
</section>
