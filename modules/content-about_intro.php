<?php
/**
 * Module: About Intro
 */
$tag_en = get_sub_field('tag_en') ?: "About Us";
$tag_ms = get_sub_field('tag_ms') ?: "Tentang Kami";
$heading_en = get_sub_field('heading_en') ?: "Malaysia's Trusted Modafinil Supplier";
$heading_ms = get_sub_field('heading_ms') ?: "Pembekal Modafinil Dipercayai Malaysia";
$desc_en = get_sub_field('desc_en') ?: "ModafinilMY serves students, professionals, and shift workers across Malaysia — from Kuala Lumpur to Kota Kinabalu.";
$desc_ms = get_sub_field('desc_ms') ?: "ModafinilMY berkhidmat untuk pelajar, profesional, dan pekerja syif di seluruh Malaysia — dari Kuala Lumpur ke Kota Kinabalu.";
?>
<section class="bg-white pt-6 pb-2 md:pt-12 md:pb-8">
    <div class="container-custom max-w-4xl">
        <div class="text-center">
            <span class="inline-block bg-emerald-100 text-emerald-800 text-xs font-bold uppercase tracking-widest px-3 py-1.5 rounded-full mb-4">
                <?= modmy_t($tag_en, $tag_ms) ?>
            </span>
            <h1 class="font-heading text-2xl sm:text-3xl md:text-5xl font-black text-slate-900 mb-4 leading-tight">
                <?= modmy_t($heading_en, $heading_ms) ?>
            </h1>
            <p class="text-base sm:text-lg text-slate-500 max-w-2xl mx-auto whitespace-pre-line"><?= modmy_t($desc_en, $desc_ms) ?></p>
        </div>
    </div>
</section>
