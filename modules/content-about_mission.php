<?php
/**
 * Module: About Mission & Vision
 */
$m_head_en = get_sub_field('mission_heading_en') ?: "Our Mission";
$m_head_ms = get_sub_field('mission_heading_ms') ?: "Misi Kami";
$m_desc_en = get_sub_field('mission_desc_en') ?: "We exist to ensure Malaysians have access to high-quality, genuine Modafinil — delivered fast, discreetly, and reliably across Peninsular, Sabah, and Sarawak.";
$m_desc_ms = get_sub_field('mission_desc_ms') ?: "Kami wujud untuk memastikan rakyat Malaysia mempunyai akses kepada Modafinil asli berkualiti tinggi — dihantar dengan pantas, diskret, dan boleh dipercayai ke seluruh Semenanjung, Sabah, dan Sarawak.";

$v_head_en = get_sub_field('vision_heading_en') ?: "Why Choose Us?";
$v_head_ms = get_sub_field('vision_heading_ms') ?: "Kenapa Pilih Kami?";
$v_desc_en = get_sub_field('vision_desc_en') ?: "Thousands of Malaysian customers have trusted ModafinilMY since we began operations. We stock genuine Modalert and Modvigil from licensed Indian pharmaceutical manufacturers.";
$v_desc_ms = get_sub_field('vision_desc_ms') ?: "Ribuan pelanggan Malaysia telah mempercayai ModafinilMY sejak kami mula beroperasi. Kami menyimpan Modalert dan Modvigil asli dari pengeluar farmaseutikal berlesen India.";
?>
<section class="bg-white py-2 md:py-4">
    <div class="container-custom max-w-4xl">
        <div class="grid md:grid-cols-2 gap-6 items-start">
            <div class="bg-emerald-50 border border-emerald-200 rounded-xl p-5 md:p-6">
                <h2 class="font-heading font-black text-xl text-slate-900 mb-2 mt-0">
                    <?= modmy_t($m_head_en, $m_head_ms) ?>
                </h2>
                <p class="text-slate-600 text-sm leading-relaxed mb-0 whitespace-pre-line"><?= modmy_t($m_desc_en, $m_desc_ms) ?></p>
            </div>
            <div class="bg-stone-50 border border-stone-200 rounded-xl p-6">
                <h2 class="font-heading font-black text-xl text-slate-900 mb-2 mt-0">
                    <?= modmy_t($v_head_en, $v_head_ms) ?>
                </h2>
                <p class="text-slate-600 text-sm leading-relaxed mb-0 whitespace-pre-line"><?= modmy_t($v_desc_en, $v_desc_ms) ?></p>
            </div>
        </div>
    </div>
</section>
