<?php
/**
 * Privacy Policy Module
 */

$title_en = get_sub_field('title_en') ?: "Privacy Policy";
$title_ms = get_sub_field('title_ms') ?: "Dasar Privasi";

$subtitle_en = get_sub_field('subtitle_en') ?: "We collect the absolute minimum data required to process and deliver your order.";
$subtitle_ms = get_sub_field('subtitle_ms') ?: "Kami mengumpul data sekurang-kurangnya yang diperlukan untuk memproses pesanan anda.";

$default_badges = [
    ['PDPA 2010 Compliant', 'Pematuhan PDPA 2010'],
    ['Discreet Packaging', 'Pembungkusan Diskret'],
    ['No Third-Party Sharing', 'Tiada Perkongsian Data']
];

$default_sections = [
    [
        'title_en' => 'Data We Collect / Maklumat yang Kami Kumpulkan',
        'title_ms' => 'Maklumat yang Kami Kumpulkan',
        'content_en' => 'We collect information you provide when placing an order: name, delivery address, phone number, and email address. We do NOT store credit card details — all payments are processed via bank transfers or FPX online banking.',
        'content_ms' => 'Kami mengumpulkan maklumat yang anda berikan semasa membuat pesanan: nama, alamat penghantaran, nombor telefon, dan alamat emel. Kami tidak menyimpan maklumat kad kredit kerana kami menggunakan pindahan bank sebagai kaedah pembayaran.'
    ],
    [
        'title_en' => 'How We Use Your Information / Cara Kami Menggunakan Maklumat Anda',
        'title_ms' => 'Cara Kami Menggunakan Maklumat Anda',
        'content_en' => "• Processing and dispatching your orders.\n• Providing Pos Malaysia tracking numbers and delivery updates.\n• Communicating with you regarding order support via WhatsApp or email.\n• We do not send marketing spam without your explicit permission.",
        'content_ms' => "• Memproses dan menghantar pesanan anda.\n• Menyediakan nombor penjejakan dan kemas kini penghantaran.\n• Berkomunikasi dengan anda mengenai pesanan anda.\n• Meningkatkan perkhidmatan kami."
    ],
    [
        'title_en' => 'Data Security & Sharing / Keselamatan Data',
        'title_ms' => 'Keselamatan Data & Perkongsian',
        'content_en' => 'We use industry-standard SSL encryption for all web communications. Your personal information is never sold, rented, or shared with third parties, except as strictly required for delivery (i.e. Pos Malaysia logistics).',
        'content_ms' => 'Kami menggunakan penyulitan SSL standard industri untuk semua komunikasi. Maklumat peribadi anda tidak akan dijual, disewa, atau dikongsi dengan pihak ketiga kecuali yang diperlukan untuk proses penghantaran (iaitu Pos Malaysia).'
    ],
    [
        'title_en' => 'Discreet Packaging / Pembungkusan Diskret',
        'title_ms' => 'Pembungkusan Diskret',
        'content_en' => 'All orders are shipped in plain, unbranded boxes without any product names, logos, or information indicating the contents. The sender name on the shipping label is a generic business name.',
        'content_ms' => 'Semua bungkusan dihantar dalam kotak biasa tanpa jenama, nama produk, atau apa-apa maklumat yang mendedahkan kandungan. Nama penghantar pada label adalah nama generik perniagaan sahaja.'
    ],
    [
        'title_en' => 'Malaysian PDPA 2010 Compliance / Pematuhan PDPA Malaysia',
        'title_ms' => 'Pematuhan PDPA Malaysia',
        'content_en' => 'We comply with the Malaysian Personal Data Protection Act 2010 (PDPA). You have full rights to access, rectify, or request deletion of your personal data at any time.',
        'content_ms' => 'Kami mematuhi Akta Perlindungan Data Peribadi 2010 (PDPA) Malaysia. Anda berhak untuk mengakses, membetulkan, atau meminta penghapusan data peribadi anda pada bila-bila masa.'
    ],
    [
        'title_en' => 'Data Retention & Deletion / Penyimpanan & Pemadaman',
        'title_ms' => 'Penyimpanan & Pemadaman',
        'content_en' => 'Order records are securely retained for 12 months for customer support and warranty purposes, after which they are permanently deleted. You can request early data deletion at any time via WhatsApp.',
        'content_ms' => 'Rekod pesanan disimpan selama 12 bulan untuk tujuan sokongan dan bayaran balik, kemudian dipadam. Anda boleh meminta pemadaman awal pada bila-bila masa melalui WhatsApp.'
    ]
];
?>
<section class="bg-slate-900 text-white py-16 text-center relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-emerald-950/40 to-slate-900 pointer-events-none"></div>
    <div class="container-custom max-w-3xl relative z-10">
        <span class="inline-block bg-emerald-500/20 text-emerald-300 text-xs font-bold uppercase tracking-widest px-3.5 py-1.5 rounded-full mb-4 border border-emerald-500/30">
            <?= modmy_t("Legal & Data Protection", "Perlindungan Data & Undang-Undang") ?>
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
                        <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm-2 16l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z"/>
                    </svg>
                    <?= modmy_t(get_sub_field('badge_en'), get_sub_field('badge_ms')) ?>
                </span>
                <?php endwhile; ?>
            <?php else: ?>
                <?php foreach ($default_badges as $b): ?>
                <span class="inline-flex items-center gap-1.5 bg-slate-800/80 border border-slate-700 text-emerald-400 text-xs font-bold px-4 py-2 rounded-full shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-emerald-400" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm-2 16l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z"/>
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

        <!-- Contact Callout -->
        <div class="mt-12 bg-slate-900 text-white rounded-2xl p-8 text-center shadow-lg">
            <h2 class="font-heading font-extrabold text-2xl mb-3">
                <?= modmy_t("Questions about your privacy?", "Pertanyaan tentang privasi anda?") ?>
            </h2>
            <p class="text-slate-300 text-sm mb-6 max-w-lg mx-auto leading-relaxed">
                <?= modmy_t("Contact our data protection team via WhatsApp or email for access or deletion requests under PDPA 2010.", "Hubungi pasukan perlindungan data kami melalui WhatsApp atau e-mel untuk sebarang pertanyaan di bawah PDPA 2010.") ?>
            </p>
            <a href="https://wa.me/60185754182" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 bg-emerald-600 text-white font-bold px-7 py-3.5 rounded-full hover:bg-emerald-500 transition-colors shadow-md text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"></path>
                </svg>
                <?= modmy_t("Contact Privacy Team", "Hubungi Pasukan Privasi") ?>
            </a>
        </div>
    </div>
</section>
