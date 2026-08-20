<?php
/**
 * FAQ Full Page Module
 */

$eyebrow_en = get_sub_field('eyebrow_en') ?: "FAQ";
$eyebrow_ms = get_sub_field('eyebrow_ms') ?: "Soalan Lazim";

$heading_en = get_sub_field('heading_en') ?: "Frequently Asked Questions / FAQ";
$heading_ms = get_sub_field('heading_ms') ?: "Soalan Lazim / FAQ";

$desc_en = get_sub_field('description_en') ?: "Everything you need to know about buying Modafinil in Malaysia.";
$desc_ms = get_sub_field('description_ms') ?: "Semua yang anda perlu tahu tentang membeli Modafinil di Malaysia.";

$cta_heading_en = get_sub_field('cta_heading_en') ?: "Still Have Questions?";
$cta_heading_ms = get_sub_field('cta_heading_ms') ?: "Masih Ada Soalan?";

$cta_desc_en = get_sub_field('cta_desc_en') ?: "Our team speaks Malay and English, ready to assist 7 days a week.";
$cta_desc_ms = get_sub_field('cta_desc_ms') ?: "Pasukan kami berbahasa Malaysia dan English, sedia membantu 7 hari seminggu.";

$cta_btn_en = get_sub_field('cta_btn_text_en') ?: "WhatsApp Us Now";
$cta_btn_ms = get_sub_field('cta_btn_text_ms') ?: "WhatsApp Kami Sekarang";
$cta_link = get_sub_field('cta_btn_link') ?: "https://wa.me/60185754182";

// Default Fallback Categories & Questions if ACF Repeater is empty
$default_categories = [
    [
        'title_en' => 'Legal Status',
        'title_ms' => 'Status Undang-Undang',
        'items' => [
            [
                'q_en' => 'Is Modafinil legal in Malaysia?',
                'q_ms' => 'Adakah Modafinil sah di Malaysia?',
                'a_en' => 'Modafinil is a prescription medication in Malaysia under the Poisons Act 1952. It is not a narcotic or heavily controlled substance under the Dangerous Drugs Act. Personal possession for own use is generally not actively enforced, but you should consult a doctor first.',
                'a_ms' => 'Modafinil adalah ubat preskripsi di Malaysia di bawah Akta Racun 1952. Ia bukan ubat narkotik atau bahan terkawal di bawah Akta Dadah Berbahaya. Pemilikan peribadi untuk kegunaan peribadi umumnya tidak dikuatkuasakan, tetapi anda harus mendapatkan nasihat doktor terlebih dahulu.'
            ],
            [
                'q_en' => 'Can I import Modafinil into Malaysia from overseas?',
                'q_ms' => 'Bolehkah saya import Modafinil ke Malaysia dari luar negara?',
                'a_en' => 'Small quantities for personal use are usually allowed through Malaysian customs. Our orders are shipped in discreet packaging. However, we recommend keeping a record and consulting a medical practitioner.',
                'a_ms' => 'Kuantiti kecil untuk kegunaan peribadi lazimnya dibenarkan masuk oleh kastam Malaysia. Pesanan kami dihantar dalam pembungkusan diskret. Walau bagaimanapun, kami mengesyorkan anda menyimpan rekod dan berunding dengan pengamal perubatan.'
            ],
            [
                'q_en' => 'Is Modafinil an illicit drug?',
                'q_ms' => 'Adakah Modafinil sama dengan dadah terlarang?',
                'a_en' => 'No. Modafinil is not an amphetamine and is not a controlled substance in Malaysia. It is vastly different from street drugs. It is a wakefulness-promoting agent used clinically to treat narcolepsy, sleep apnea, and shift work disorder.',
                'a_ms' => 'Tidak. Modafinil bukan amfetamin dan bukan bahan terkawal di Malaysia. Ia jauh berbeza daripada dadah jalanan. Ia adalah agen yang menggalakkan keberjagaan (wakefulness-promoting agent) yang digunakan secara klinikal untuk merawat narcolepsy, sleep apnea, dan shift work disorder.'
            ]
        ]
    ],
    [
        'title_en' => 'Delivery',
        'title_ms' => 'Penghantaran',
        'items' => [
            [
                'q_en' => 'How long does shipping to Malaysia take?',
                'q_ms' => 'Berapa lama penghantaran ke Malaysia?',
                'a_en' => 'Shipping to Peninsular Malaysia takes 7-12 working days. Sabah and Sarawak takes 10-16 working days. All orders are shipped via Pos Malaysia with a tracking number.',
                'a_ms' => 'Penghantaran ke Semenanjung Malaysia mengambil 7-12 hari bekerja. Sabah dan Sarawak mengambil 10-16 hari bekerja. Semua pesanan dihantar via Pos Malaysia dengan nombor penjejakan.'
            ],
            [
                'q_en' => 'Is shipping free?',
                'q_ms' => 'Adakah penghantaran percuma?',
                'a_en' => 'Yes — free shipping for all orders RM399 and above. Orders below RM399 incur a standard shipping fee via Pos Malaysia.',
                'a_ms' => 'Ya — penghantaran percuma untuk semua pesanan RM399 ke atas. Pesanan di bawah RM399 dikenakan caj penghantaran standard via Pos Malaysia.'
            ],
            [
                'q_en' => 'How do I track my order?',
                'q_ms' => 'Bagaimana saya menjejak pesanan saya?',
                'a_en' => 'After shipping, you will receive a Pos Malaysia tracking number. You can track the order on the official Pos Malaysia website or through our order tracking page.',
                'a_ms' => 'Selepas penghantaran, anda akan menerima nombor penjejakan Pos Malaysia. Anda boleh menjejak pesanan di laman web rasmi Pos Malaysia atau melalui halaman jejak pesanan kami.'
            ],
            [
                'q_en' => 'Is the packaging discreet?',
                'q_ms' => 'Adakah pembungkusan diskret?',
                'a_en' => 'Yes, completely. All orders are shipped in plain boxes without any branding, product names, or information indicating the contents. The sender name on the label is a generic business name.',
                'a_ms' => 'Ya, sepenuhnya. Semua pesanan dihantar dalam kotak biasa tanpa sebarang jenama, nama produk, atau maklumat yang menunjukkan kandungannya. Nama penghantar pada label adalah nama generik perniagaan sahaja.'
            ],
            [
                'q_en' => 'Do you ship to Sabah and Sarawak?',
                'q_ms' => 'Adakah anda hantar ke Sabah dan Sarawak?',
                'a_en' => 'Yes. We ship to all areas of Malaysia including Sabah, Sarawak, Labuan, and all Malaysian islands. Delivery time to East Malaysia is 10-16 working days.',
                'a_ms' => 'Ya. Kami menghantar ke semua kawasan Malaysia termasuk Sabah, Sarawak, Labuan, dan semua pulau di Malaysia. Masa penghantaran ke Malaysia Timur adalah 10-16 hari bekerja.'
            ]
        ]
    ],
    [
        'title_en' => 'Payment',
        'title_ms' => 'Pembayaran',
        'items' => [
            [
                'q_en' => 'What payment methods are accepted?',
                'q_ms' => 'Apakah kaedah pembayaran yang diterima?',
                'a_en' => 'We accept bank transfers (Maybank, CIMB, Public Bank, RHB, etc.) and FPX/online banking. We do not accept credit cards or PayPal at this time.',
                'a_ms' => 'Kami menerima pindahan bank (Maybank, CIMB, Public Bank, RHB, dll.) dan FPX/online banking. Kami tidak menerima kad kredit atau PayPal buat masa ini.'
            ],
            [
                'q_en' => 'What currency do I pay in?',
                'q_ms' => 'Dalam mata wang apa saya perlu bayar?',
                'a_en' => 'All payments are in Malaysian Ringgit (RM). There are no foreign exchange fees.',
                'a_ms' => 'Semua pembayaran dalam Ringgit Malaysia (RM). Tiada yuran tukar wang asing.'
            ],
            [
                'q_en' => 'How long does payment take to process?',
                'q_ms' => 'Berapa lama untuk pembayaran diproses?',
                'a_en' => 'After you submit proof of payment, orders are processed within 24 hours on working days.',
                'a_ms' => 'Selepas anda menghantar bukti pembayaran, pesanan akan diproses dalam masa 24 jam pada hari bekerja.'
            ]
        ]
    ],
    [
        'title_en' => 'Products',
        'title_ms' => 'Produk',
        'items' => [
            [
                'q_en' => 'What is the difference between Modalert and Modvigil?',
                'q_ms' => 'Apa perbezaan antara Modalert dan Modvigil?',
                'a_en' => 'Both contain 200mg Modafinil but from different manufacturers. Modalert (Sun Pharma) is usually stronger with a faster onset. Modvigil (HAB Pharma) is smoother and more suitable for new users or those sensitive to stimulants.',
                'a_ms' => 'Kedua-duanya mengandungi Modafinil 200mg tetapi dari pengeluar yang berbeza. Modalert (Sun Pharma) biasanya lebih kuat dengan permulaan lebih cepat. Modvigil (HAB Pharma) lebih lembut dan lebih sesuai untuk pengguna baru atau mereka yang sensitif terhadap perangsang.'
            ],
            [
                'q_en' => 'Are your products genuine?',
                'q_ms' => 'Adakah produk anda asli?',
                'a_en' => 'Yes, 100% genuine. We only stock Modafinil from licensed pharmaceutical manufacturers regulated by international standards bodies. Each blister pack comes with manufacturer lot numbers and expiry dates.',
                'a_ms' => 'Ya, 100% asli. Kami hanya menyimpan Modafinil dari pengeluar farmaseutikal berlesen yang dikawal selia oleh badan piawaian antarabangsa. Setiap blister pack dilengkapi nombor lot dan tarikh luput pengeluar.'
            ],
            [
                'q_en' => 'What is the recommended dosage for beginners?',
                'q_ms' => 'Apakah dos yang disyorkan untuk pemula?',
                'a_en' => 'New users should start with 100mg (half a 200mg tablet) to assess tolerance. After a few uses, many increase to a full 200mg dose. Take it early in the morning with or without food.',
                'a_ms' => 'Pengguna baru harus bermula dengan 100mg (setengah tablet 200mg) untuk menilai toleransi. Selepas beberapa penggunaan, ramai yang meningkat kepada dos penuh 200mg. Ambil pada awal pagi dengan atau tanpa makanan.'
            ],
            [
                'q_en' => 'How long do the effects of Modafinil last?',
                'q_ms' => 'Berapa lama kesan Modafinil bertahan?',
                'a_en' => 'Modafinil usually lasts between 10-15 hours depending on individual metabolism and dose. 200mg Modafinil will provide sustained wakefulness and focus throughout the workday.',
                'a_ms' => 'Modafinil biasanya bertahan antara 10-15 jam bergantung pada metabolisme individu dan dos. Modafinil 200mg akan memberikan keberjagaan dan fokus yang berterusan sepanjang hari kerja.'
            ]
        ]
    ]
];
?>
<section class="section-padding bg-white">
    <div class="container-custom max-w-3xl">
        <div class="text-center mb-12">
            <span class="inline-block bg-emerald-100 text-emerald-800 text-xs font-bold uppercase tracking-widest px-3 py-1.5 rounded-full mb-4">
                <?= modmy_t($eyebrow_en, $eyebrow_ms) ?>
            </span>
            <h1 class="font-heading text-4xl md:text-5xl font-black text-slate-900 mb-4">
                <?= modmy_t($heading_en, $heading_ms) ?>
            </h1>
            <p class="text-slate-500 max-w-xl mx-auto">
                <?= modmy_t($desc_en, $desc_ms) ?>
            </p>
        </div>

        <div class="space-y-10">
            <?php if (have_rows('faq_categories')): ?>
                <?php while (have_rows('faq_categories')): the_row();
                    $cat_t_en = get_sub_field('title_en');
                    $cat_t_ms = get_sub_field('title_ms');
                    $cat_label = trim($cat_t_ms . ' / ' . $cat_t_en, ' /');
                ?>
                <div>
                    <h2 class="font-heading font-black text-xl text-slate-900 mb-5 pb-3 border-b-2 border-emerald-200">
                        <?= esc_html($cat_label) ?>
                    </h2>
                    <div class="space-y-3">
                        <?php if (have_rows('items')): ?>
                            <?php while (have_rows('items')): the_row();
                                $q_en = get_sub_field('question_en');
                                $q_ms = get_sub_field('question_ms');
                                $a_en = get_sub_field('answer_en');
                                $a_ms = get_sub_field('answer_ms');
                            ?>
                            <details class="group border border-stone-200 rounded-xl">
                                <summary class="flex items-center justify-between gap-4 p-5 cursor-pointer list-none">
                                    <h3 class="font-heading font-bold text-slate-900 text-sm">
                                        <?= modmy_t($q_en, $q_ms) ?>
                                    </h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-emerald-600 flex-shrink-0 group-open:rotate-180 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </summary>
                                <div class="px-5 pb-5 text-sm text-slate-500 leading-relaxed border-t border-stone-100 pt-4">
                                    <?= modmy_t($a_en, $a_ms) ?>
                                </div>
                            </details>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endwhile; ?>
            <?php else: ?>
                <?php foreach ($default_categories as $cat): ?>
                <div>
                    <h2 class="font-heading font-black text-xl text-slate-900 mb-5 pb-3 border-b-2 border-emerald-200">
                        <?= modmy_t($cat['title_ms'] . ' / ' . $cat['title_en'], $cat['title_ms'] . ' / ' . $cat['title_en']) ?>
                    </h2>
                    <div class="space-y-3">
                        <?php foreach ($cat['items'] as $item): ?>
                        <details class="group border border-stone-200 rounded-xl">
                            <summary class="flex items-center justify-between gap-4 p-5 cursor-pointer list-none">
                                <h3 class="font-heading font-bold text-slate-900 text-sm">
                                    <?= modmy_t($item['q_en'], $item['q_ms']) ?>
                                </h3>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-emerald-600 flex-shrink-0 group-open:rotate-180 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </summary>
                            <div class="px-5 pb-5 text-sm text-slate-500 leading-relaxed border-t border-stone-100 pt-4">
                                <?= modmy_t($item['a_en'], $item['a_ms']) ?>
                            </div>
                        </details>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!-- WhatsApp Support Box -->
        <div class="mt-12 bg-emerald-50 border border-emerald-200 rounded-2xl p-8 text-center">
            <h2 class="font-heading font-bold text-xl text-slate-900 mb-3">
                <?= modmy_t($cta_heading_en, $cta_heading_ms) ?>
            </h2>
            <p class="text-slate-500 text-sm mb-5">
                <?= modmy_t($cta_desc_en, $cta_desc_ms) ?>
            </p>
            <a href="<?= esc_url($cta_link) ?>" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white font-bold px-6 py-3 rounded-full transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"></path>
                </svg>
                <?= modmy_t($cta_btn_en, $cta_btn_ms) ?>
            </a>
        </div>
    </div>
</section>
