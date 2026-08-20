<?php
/**
 * Refund Policy Module
 */

$title_en = get_sub_field('title_en') ?: "Refund Policy & Guarantee";
$title_ms = get_sub_field('title_ms') ?: "Dasar Bayaran Balik";

$subtitle_en = get_sub_field('subtitle_en') ?: "If your order does not arrive, we will reship it for free or issue a full refund.";
$subtitle_ms = get_sub_field('subtitle_ms') ?: "Jika pesanan anda tidak sampai, kami hantar semula secara percuma atau kembalikan wang anda sepenuhnya.";

$default_badges = [
    ['Free Reshipment', 'Penghantaran Semula Percuma'],
    ['Full Refund Guarantee', 'Bayaran Balik Penuh'],
    ['Customs Protection', 'Perlindungan Kastam']
];

$default_sections = [
    [
        'title_en' => 'Delivery Guarantee / Jaminan Penghantaran',
        'title_ms' => 'Jaminan Penghantaran',
        'content_en' => 'Every order is protected. If your package is lost in transit, damaged, or seized by Malaysian customs, we will reship your order at no extra cost — or issue a full refund if you prefer.',
        'content_ms' => 'Jika pesanan anda tidak tiba dalam tempoh 25 hari bekerja (Semenanjung) atau 30 hari bekerja (Sabah/Sarawak) dari tarikh penghantaran, kami akan menghantar semula atau membuat bayaran balik sepenuhnya. Ini adalah jaminan kami kepada setiap pelanggan Malaysia.'
    ],
    [
        'title_en' => 'Customs Protection / Kehilangan di Kastam',
        'title_ms' => 'Kehilangan di Kastam',
        'content_en' => 'In the rare event that your package is detained or confiscated by customs, we will reship your order free of charge. We maintain an exceptional delivery track record into Malaysia.',
        'content_ms' => 'Dalam kes yang jarang berlaku di mana pesanan anda ditahan atau dirampas oleh pihak kastam, kami akan menghantar semula pesanan anda secara percuma. Kami mempunyai rekod penghantaran yang sangat baik ke Malaysia.'
    ],
    [
        'title_en' => 'Eligibility Criteria / Bila Anda Layak',
        'title_ms' => 'Kelayakan Bayaran Balik',
        'content_en' => "• Order has not arrived after 20 working days (Peninsular) or 25 working days (Sabah & Sarawak).\n• Package arrives damaged, opened, or incomplete.\n• Order detained or seized by customs.\n• Wrong product sent by mistake.",
        'content_ms' => "• Pesanan tidak sampai selepas 25 hari bekerja (Semenanjung) atau 30 hari (Sabah & Sarawak).\n• Bungkusan sampai dalam keadaan rosak atau tidak lengkap.\n• Pesanan ditahan atau dirampas oleh kastam.\n• Produk yang salah dihantar."
    ],
    [
        'title_en' => 'Non-Eligible Cases / Produk Tidak Layak',
        'title_ms' => 'Bila Anda Tidak Layak',
        'content_en' => "• Incorrect or incomplete delivery address provided by the customer.\n• Package marked as delivered by Pos Malaysia tracking.\n• Change of mind after the order has been dispatched.\n• Personal side effects — please consult a doctor prior to use.",
        'content_ms' => "• Produk yang telah dibuka atau digunakan.\n• Pesanan dengan alamat penghantaran yang salah disebabkan kesilapan pelanggan.\n• Perubahan fikiran selepas pesanan diproses."
    ],
    [
        'title_en' => 'How to Make a Claim / Cara Membuat Tuntutan',
        'title_ms' => 'Cara Membuat Tuntutan',
        'content_en' => 'Contact us via WhatsApp (+60 18-575 4182) with your order number and tracking details. We will verify your status within 48 hours and process your reshipment or refund to your original bank account within 5-10 business days.',
        'content_ms' => 'Hubungi kami melalui WhatsApp (+60 18-575 4182) dengan nombor pesanan anda. Kami akan memproses tuntutan dalam masa 2-3 hari bekerja.'
    ]
];
?>
<section class="bg-slate-900 text-white py-16 text-center relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-emerald-950/40 to-slate-900 pointer-events-none"></div>
    <div class="container-custom max-w-3xl relative z-10">
        <span class="inline-block bg-emerald-500/20 text-emerald-300 text-xs font-bold uppercase tracking-widest px-3.5 py-1.5 rounded-full mb-4 border border-emerald-500/30">
            <?= modmy_t("Guarantee & Refunds", "Jaminan & Bayaran Balik") ?>
        </span>
        <h1 class="font-heading text-4xl md:text-5xl font-black mb-4 tracking-tight">
            <?= modmy_t($title_en, $title_ms) ?>
        </h1>
        <p class="text-slate-300 max-w-2xl mx-auto leading-relaxed text-base md:text-lg mb-8">
            <?= modmy_t($subtitle_en, $subtitle_ms) ?>
        </p>

        <!-- Badge Pills -->
        <div class="flex flex-wrap justify-center gap-3">
            <?php if (have_rows('badges')): ?>
                <?php while (have_rows('badges')): the_row(); ?>
                <span class="inline-flex items-center gap-1.5 bg-slate-800/80 border border-slate-700 text-emerald-400 text-xs font-bold px-4 py-2 rounded-full shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-emerald-400" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                    <?= modmy_t(get_sub_field('badge_en'), get_sub_field('badge_ms')) ?>
                </span>
                <?php endwhile; ?>
            <?php else: ?>
                <?php foreach ($default_badges as $b): ?>
                <span class="inline-flex items-center gap-1.5 bg-slate-800/80 border border-slate-700 text-emerald-400 text-xs font-bold px-4 py-2 rounded-full shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-emerald-400" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                    <?= modmy_t($b[0], $b[1]) ?>
                </span>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="section-padding bg-white">
    <div class="container-custom max-w-3xl space-y-8">
        <?php if (have_rows('sections')): ?>
            <?php while (have_rows('sections')): the_row();
                $s_title_en = get_sub_field('title_en');
                $s_title_ms = get_sub_field('title_ms');
                $s_content_en = get_sub_field('content_en');
                $s_content_ms = get_sub_field('content_ms');
                $content = modmy_t($s_content_en, $s_content_ms);
            ?>
            <div class="bg-stone-50/70 border border-stone-200 rounded-2xl p-6 md:p-8 hover:border-emerald-200 transition-all">
                <h2 class="font-heading font-black text-xl text-slate-900 mb-4 pb-2 border-b border-stone-200 flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 inline-block"></span>
                    <?= modmy_t($s_title_en, $s_title_ms) ?>
                </h2>
                <div class="text-slate-600 text-sm leading-relaxed whitespace-pre-line space-y-3">
                    <?= esc_html($content) ?>
                </div>
            </div>
            <?php endwhile; ?>
        <?php else: ?>
            <?php foreach ($default_sections as $sec):
                $content = modmy_t($sec['content_en'], $sec['content_ms']);
            ?>
            <div class="bg-stone-50/70 border border-stone-200 rounded-2xl p-6 md:p-8 hover:border-emerald-200 transition-all">
                <h2 class="font-heading font-black text-xl text-slate-900 mb-4 pb-2 border-b border-stone-200 flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 inline-block"></span>
                    <?= modmy_t($sec['title_en'], $sec['title_ms']) ?>
                </h2>
                <div class="text-slate-600 text-sm leading-relaxed whitespace-pre-line">
                    <?= esc_html($content) ?>
                </div>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <!-- Support Box -->
        <div class="mt-12 bg-emerald-600 text-white rounded-2xl p-8 text-center shadow-lg">
            <h2 class="font-heading font-extrabold text-2xl mb-3">
                <?= modmy_t("Need to submit a claim?", "Perlu membuat tuntutan?") ?>
            </h2>
            <p class="text-emerald-100 text-sm mb-6 max-w-lg mx-auto leading-relaxed">
                <?= modmy_t("Contact our customer support team via WhatsApp with your order details for instant assistance.", "Hubungi pasukan sokongan pelanggan kami melalui WhatsApp dengan butiran pesanan anda untuk bantuan serta-merta.") ?>
            </p>
            <a href="https://wa.me/60185754182" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 bg-white text-emerald-800 font-bold px-7 py-3.5 rounded-full hover:bg-emerald-50 transition-colors shadow-md text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-emerald-600" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"></path>
                </svg>
                <?= modmy_t("Contact Support Team", "Hubungi Pasukan Sokongan") ?>
            </a>
        </div>
    </div>
</section>
