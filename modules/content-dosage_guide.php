<?php
/**
 * Modafinil Dosage Guide Module
 */

// Read flat ACF fields
$page_badge_en  = get_sub_field('page_badge_en')  ?: 'Dosage Guide';
$page_badge_ms  = get_sub_field('page_badge_ms')  ?: 'Panduan Dos';
$page_title_en  = get_sub_field('page_title_en')  ?: 'Modafinil Dosage Guide for Malaysian Users';
$page_title_ms  = get_sub_field('page_title_ms')  ?: 'Panduan Dos Modafinil untuk Pengguna Malaysia';
$page_sub_en    = get_sub_field('page_subtitle_en') ?: "The optimal dosage, best time to take it, and tips specific to Malaysia's hot and humid climate.";
$page_sub_ms    = get_sub_field('page_subtitle_ms') ?: 'Dos yang optimum, masa terbaik untuk mengambilnya, dan petua khusus untuk keadaan cuaca Malaysia.';
$disclaimer_en  = get_sub_field('disclaimer_en')  ?: 'This information is for educational purposes only. Please consult a licensed doctor before using Modafinil. This is not medical advice.';
$disclaimer_ms  = get_sub_field('disclaimer_ms')  ?: 'Maklumat ini adalah untuk tujuan pendidikan sahaja. Sila berunding dengan doktor berlesen sebelum menggunakan Modafinil. Ini bukan nasihat perubatan.';

$dosage_cards  = get_sub_field('dosage_cards')  ?: [];
$timing_items  = get_sub_field('timing_items')  ?: [];
$malaysia_tips = get_sub_field('malaysia_tips') ?: [];
$product_cards = get_sub_field('product_cards') ?: [];
$faq_items     = get_sub_field('faq_items')     ?: [];

if (empty($dosage_cards)) {
    $dosage_cards = [
        ['dose' => '50-100mg', 'label_en' => 'Starting Dose', 'label_ms' => 'Dos Permulaan', 'desc_en' => 'For new users. Take half a 200mg tablet to assess your body\'s tolerance.', 'desc_ms' => 'Untuk pengguna baru. Ambil separuh tablet 200mg untuk menilai toleransi badan.', 'color' => 'blue'],
        ['dose' => '200mg',    'label_en' => 'Standard Dose',  'label_ms' => 'Dos Standard',  'desc_en' => 'The typical dose for most people. One full tablet providing 10–15 hours of focus.', 'desc_ms' => 'Dos biasa untuk kebanyakan orang. Satu tablet penuh yang memberikan fokus 10-15 jam.', 'color' => 'emerald'],
        ['dose' => '400mg',    'label_en' => 'High Dose',      'label_ms' => 'Dos Tinggi',     'desc_en' => 'For intensive work. Only for experienced users who need maximum productivity.', 'desc_ms' => 'Untuk kerja intensif. Hanya bagi pengguna berpengalaman yang memerlukan produktiviti maksimum.', 'color' => 'amber'],
    ];
}

if (empty($timing_items)) {
    $timing_items = [
        ['time' => '6–8 AM',      'desc_en' => 'Ideal time to take Modafinil. Effects will last through the workday without disrupting nighttime sleep.', 'desc_ms' => 'Masa ideal untuk mengambil Modafinil. Kesan akan bertahan sepanjang hari kerja tanpa mengganggu tidur malam.'],
        ['time' => 'After 12 PM', 'desc_en' => 'Avoid taking after noon if you plan to sleep at your normal bedtime (10–11 PM).', 'desc_ms' => 'Elakkan mengambil selepas tengah hari jika anda merancang tidur pada waktu biasa (10-11 PM).'],
        ['time' => 'Night Shift', 'desc_en' => 'Night shift workers can take it 2–3 hours before their shift starts to maximise alertness.', 'desc_ms' => 'Pekerja syif malam boleh mengambil 2-3 jam sebelum syif bermula untuk memaksimumkan keberjagaan.'],
    ];
}

if (empty($malaysia_tips)) {
    $malaysia_tips = [
        ['emoji' => '💧', 'title_en' => 'Drink Plenty of Water', 'title_ms' => 'Minum Air yang Banyak', 'desc_en' => 'Aim for 3–4 litres per day — higher than usual because Modafinil naturally suppresses thirst.', 'desc_ms' => 'Sasaran minimum 3-4 liter air sehari — lebih tinggi dari biasa kerana Modafinil boleh mengurangkan rasa dahaga secara semula jadi.'],
        ['emoji' => '🍌', 'title_en' => 'Eat Even If Not Hungry', 'title_ms' => 'Makan Walaupun Tidak Lapar', 'desc_en' => 'Modafinil suppresses appetite. Avoid skipping meals — snack on bananas or nuts.', 'desc_ms' => 'Modafinil mengurangkan selera makan. Elakkan melewatkan makan — ambil makanan ringan seperti pisang atau kacang.'],
        ['emoji' => '❄️', 'title_en' => 'Stay Cool', 'title_ms' => 'Kekal Sejuk', 'desc_en' => 'In cool AC conditions, Modafinil works better. Try to keep your workspace at a comfortable temperature.', 'desc_ms' => 'Dalam keadaan AC yang sejuk, Modafinil berfungsi lebih baik. Cuba kekalkan suhu kerja yang selesa.'],
        ['emoji' => '😴', 'title_en' => 'Get Enough Sleep', 'title_ms' => 'Tidur Cukup', 'desc_en' => 'Modafinil is not a sleep substitute. Aim for 7–8 hours of sleep per night for optimal effects.', 'desc_ms' => 'Modafinil bukan pengganti tidur. Sasaran 7-8 jam tidur semalaman untuk kesan yang optimum.'],
    ];
}

if (empty($product_cards)) {
    $product_cards = [
        ['name' => 'Modalert 200',  'use_en' => 'Best for beginners',     'use_ms' => 'Terbaik untuk pemula',    'dose' => '200mg', 'duration' => '10–12h', 'link' => '/product/modalert-200/'],
        ['name' => 'Modvigil 200',  'use_en' => 'Smooth daily focus',     'use_ms' => 'Fokus harian lancar',     'dose' => '200mg', 'duration' => '8–10h',  'link' => '/product/modvigil-200/'],
        ['name' => 'Waklert 150',   'use_en' => 'Armodafinil — stronger', 'use_ms' => 'Armodafinil — lebih kuat', 'dose' => '150mg', 'duration' => '10–14h', 'link' => '/product/waklert-150/'],
        ['name' => 'Artvigil 150',  'use_en' => 'Budget Armodafinil',     'use_ms' => 'Armodafinil berbelanjawan', 'dose' => '150mg', 'duration' => '8–12h', 'link' => '/product/artvigil-150/'],
    ];
}

if (empty($faq_items)) {
    $faq_items = [
        ['q_en' => 'What happens if I miss a dose?', 'q_ms' => 'Apa yang berlaku jika saya terlepas dos?', 'a_en' => 'Simply skip it and continue the next planned day. Do not double your dose.', 'a_ms' => 'Abaikan sahaja dan teruskan pada hari yang dijadualkan seterusnya. Jangan gandakan dos anda.'],
        ['q_en' => 'Can I take Modafinil every day?', 'q_ms' => 'Bolehkah saya mengambil Modafinil setiap hari?', 'a_en' => 'Most users take it 2–3 times per week to avoid tolerance build-up. Daily use is possible but tolerance management is important.', 'a_ms' => 'Kebanyakan pengguna mengambilnya 2-3 kali seminggu untuk mengelakkan pembinaan toleransi. Penggunaan harian adalah mungkin tetapi pengurusan toleransi adalah penting.'],
        ['q_en' => 'Should I take it with food or on an empty stomach?', 'q_ms' => 'Adakah perlu mengambilnya bersama makanan atau perut kosong?', 'a_en' => 'Both work. Taking it with a light meal can reduce the chance of nausea for new users. Fatty food may delay onset slightly.', 'a_ms' => 'Kedua-duanya berkesan. Mengambilnya dengan makanan ringan boleh mengurangkan loya untuk pengguna baru. Makanan berlemak mungkin melambatkan permulaan sedikit.'],
        ['q_en' => 'Why does Modafinil make me less thirsty in Malaysia\'s heat?', 'q_ms' => 'Mengapa Modafinil menjadikan saya kurang dahaga dalam cuaca panas Malaysia?', 'a_en' => 'Modafinil can suppress the thirst response. Combined with Malaysia\'s tropical heat and humidity, dehydration is a real risk. Set phone reminders to drink water regularly.', 'a_ms' => 'Modafinil boleh menekan tindak balas dahaga. Digabungkan dengan haba tropika dan kelembapan Malaysia, dehidrasi adalah risiko sebenar. Tetapkan peringatan telefon untuk minum air secara berkala.'],
        ['q_en' => 'Is 200mg too much for a first-time user?', 'q_ms' => 'Adakah 200mg terlalu banyak untuk pengguna kali pertama?', 'a_en' => 'It can be. Many experienced users recommend starting with half a tablet (100mg) for your first 2–3 uses to gauge your response before moving to the full dose.', 'a_ms' => 'Boleh jadi. Ramai pengguna berpengalaman mengesyorkan bermula dengan separuh tablet (100mg) untuk 2-3 penggunaan pertama anda untuk menilai tindak balas sebelum beralih ke dos penuh.'],
    ];
}

$color_map = [
    'blue'    => ['bg' => 'bg-blue-50',    'border' => 'border-blue-200',    'text' => 'text-blue-600',    'badge' => 'bg-blue-100 text-blue-700'],
    'emerald' => ['bg' => 'bg-emerald-50', 'border' => 'border-emerald-200', 'text' => 'text-emerald-600', 'badge' => 'bg-emerald-100 text-emerald-700'],
    'amber'   => ['bg' => 'bg-amber-50',   'border' => 'border-amber-200',   'text' => 'text-amber-600',   'badge' => 'bg-amber-100 text-amber-700'],
];
?>

<!-- Hero / Intro -->
<section class="bg-gradient-to-br from-slate-900 via-slate-800 to-emerald-900 py-16 text-white md:py-24 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 30% 50%, #10b981 0%, transparent 50%), radial-gradient(circle at 80% 20%, #3b82f6 0%, transparent 40%);"></div>
    <div class="container-custom max-w-6xl relative z-10">
        <span class="mb-5 inline-block rounded-full bg-emerald-500/20 px-4 py-1.5 text-xs font-bold uppercase tracking-widest text-emerald-300 border border-emerald-500/30">
            <?= modmy_t($page_badge_en, $page_badge_ms) ?>
        </span>
        <h1 class="mb-5 font-heading text-3xl font-black leading-tight md:text-5xl drop-shadow">
            <?= modmy_t($page_title_en, $page_title_ms) ?>
        </h1>
        <p class="max-w-3xl text-lg leading-relaxed text-slate-300">
            <?= modmy_t($page_sub_en, $page_sub_ms) ?>
        </p>
        <!-- Disclaimer Banner -->
        <div class="mt-8 flex items-start gap-3 rounded-xl border border-amber-400/30 bg-amber-400/10 px-5 py-4 text-sm text-amber-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-5 w-5 shrink-0 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
            <span><strong class="text-amber-300"><?= modmy_t('Medical Disclaimer:', 'Penafian Perubatan:') ?></strong> <?= modmy_t($disclaimer_en, $disclaimer_ms) ?></span>
        </div>
    </div>
</section>

<!-- Dosage Cards -->
<section class="section-padding bg-white">
    <div class="container-custom max-w-6xl">
        <div class="mb-10 text-center">
            <h2 class="font-heading text-2xl md:text-3xl font-black text-slate-900 tracking-tight">
                <?= modmy_t('Standard Modafinil Dosages', 'Dos Standard Modafinil') ?>
            </h2>
            <p class="mt-3 text-slate-500 text-sm max-w-xl mx-auto">
                <?= modmy_t('Choose the right dose based on your experience level and goals.', 'Pilih dos yang betul berdasarkan tahap pengalaman dan matlamat anda.') ?>
            </p>
        </div>
        <div class="grid gap-6 md:grid-cols-3">
            <?php foreach ($dosage_cards as $card):
                $c = $color_map[$card['color'] ?? 'emerald'] ?? $color_map['emerald'];
            ?>
            <div class="relative flex flex-col overflow-hidden rounded-2xl border <?= $c['border'] ?> <?= $c['bg'] ?> p-6 text-center shadow-sm transition-all hover:-translate-y-1 hover:shadow-lg">
                <p class="mb-2 font-heading text-4xl md:text-5xl font-black <?= $c['text'] ?>"><?= esc_html($card['dose']) ?></p>
                <span class="mx-auto mb-4 inline-block rounded-full px-3 py-1 text-xs font-bold uppercase tracking-widest <?= $c['badge'] ?>">
                    <?= modmy_t($card['label_en'] ?? '', $card['label_ms'] ?? '') ?>
                </span>
                <p class="text-sm leading-relaxed text-slate-600">
                    <?= modmy_t($card['desc_en'] ?? '', $card['desc_ms'] ?? '') ?>
                </p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Product Recommendations -->
<section class="section-padding bg-stone-50 border-t border-stone-200">
    <div class="container-custom max-w-6xl">
        <div class="mb-10 text-center">
            <h2 class="font-heading text-2xl md:text-3xl font-black text-slate-900 tracking-tight">
                <?= modmy_t('Which Product Matches Your Dose?', 'Produk Mana yang Sesuai dengan Dos Anda?') ?>
            </h2>
        </div>
        <div class="grid gap-4 md:grid-cols-2">
            <?php foreach ($product_cards as $prod): ?>
            <a href="<?= esc_url($prod['link'] ?? '/products/') ?>" class="group flex items-center gap-5 rounded-2xl border border-stone-200 bg-white p-5 shadow-sm transition-all hover:border-emerald-400 hover:shadow-md hover:-translate-y-0.5">
                <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-xl bg-emerald-100 font-heading text-xl font-black text-emerald-700 group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                    <?= strtoupper(substr($prod['name'] ?? 'M', 0, 1)) ?>
                </div>
                <div class="flex-1">
                    <div class="flex items-center justify-between">
                        <p class="font-heading font-black text-slate-900"><?= esc_html($prod['name'] ?? '') ?></p>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400 group-hover:text-emerald-600 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
                    </div>
                    <p class="text-sm text-slate-500"><?= modmy_t($prod['use_en'] ?? '', $prod['use_ms'] ?? '') ?></p>
                    <div class="mt-2 flex items-center gap-3 text-xs">
                        <span class="rounded-full bg-slate-100 px-2.5 py-1 font-bold text-slate-600"><?= esc_html($prod['dose'] ?? '') ?></span>
                        <span class="text-slate-400"><?= esc_html($prod['duration'] ?? '') ?> <?= modmy_t('duration', 'tempoh') ?></span>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
        <div class="mt-8 text-center">
            <a href="/products/" class="inline-flex rounded-full border-2 border-emerald-600 px-8 py-3 text-sm font-bold uppercase tracking-wider text-emerald-700 transition-all hover:bg-emerald-600 hover:text-white">
                <?= modmy_t('Shop All Products', 'Beli Semua Produk') ?>
            </a>
        </div>
    </div>
</section>

<!-- Timing -->
<section class="section-padding bg-white border-t border-stone-200">
    <div class="container-custom max-w-5xl">
        <div class="mb-10 text-center">
            <h2 class="font-heading text-2xl md:text-3xl font-black text-slate-900 tracking-tight">
                <?= modmy_t('Best Time to Take Modafinil in Malaysia', 'Masa Terbaik untuk Mengambil Modafinil di Malaysia') ?>
            </h2>
            <p class="mt-3 text-sm text-slate-500 max-w-2xl mx-auto">
                <?= modmy_t("Malaysia's heat and high humidity can accelerate dehydration, affecting how Modafinil works. Follow this guide:", "Di Malaysia, cuaca panas dan kelembapan tinggi boleh mempercepatkan dehidrasi, yang mempengaruhi cara Modafinil berfungsi. Ikut panduan ini:") ?>
            </p>
        </div>
        <div class="grid gap-4 md:grid-cols-3">
            <?php foreach ($timing_items as $item): ?>
            <div class="flex flex-col gap-3 rounded-xl border border-stone-200 bg-stone-50 p-6 shadow-sm">
                <div class="inline-flex w-fit rounded-lg bg-emerald-600 px-4 py-2">
                    <p class="text-sm font-black text-white"><?= esc_html($item['time'] ?? '') ?></p>
                </div>
                <p class="text-sm leading-relaxed text-slate-600">
                    <?= modmy_t($item['desc_en'] ?? '', $item['desc_ms'] ?? '') ?>
                </p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Malaysia Tips -->
<section class="section-padding bg-gradient-to-br from-emerald-50 to-stone-50 border-t border-stone-200">
    <div class="container-custom max-w-6xl">
        <div class="mb-10 text-center">
            <h2 class="font-heading text-2xl md:text-3xl font-black text-slate-900 tracking-tight">
                <?= modmy_t("Tips Specific to Malaysia's Climate", "Petua Khusus untuk Cuaca Malaysia") ?>
            </h2>
            <p class="mt-3 text-sm text-slate-500 max-w-xl mx-auto">
                <?= modmy_t("Malaysia's hot and humid climate can increase the risk of dehydration when using Modafinil:", "Malaysia yang panas dan lembap boleh meningkatkan risiko dehidrasi semasa menggunakan Modafinil:") ?>
            </p>
        </div>
        <div class="grid gap-5 md:grid-cols-2">
            <?php foreach ($malaysia_tips as $tip): ?>
            <div class="flex gap-4 rounded-2xl border border-white bg-white p-6 shadow-sm">
                <span class="text-3xl shrink-0 mt-1"><?= $tip['emoji'] ?? '' ?></span>
                <div>
                    <h4 class="mb-1 font-heading font-black text-slate-900 text-base">
                        <?= modmy_t($tip['title_en'] ?? '', $tip['title_ms'] ?? '') ?>
                    </h4>
                    <p class="text-sm leading-relaxed text-slate-500">
                        <?= modmy_t($tip['desc_en'] ?? '', $tip['desc_ms'] ?? '') ?>
                    </p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="section-padding bg-white border-t border-stone-200">
    <div class="container-custom max-w-6xl">
        <div class="mb-12 text-center">
            <h2 class="font-heading text-2xl md:text-3xl font-black text-slate-900 tracking-tight">
                <?= modmy_t('Frequently Asked Questions', 'Soalan Lazim') ?>
            </h2>
        </div>
        <div class="grid gap-4 md:grid-cols-2">
            <?php foreach ($faq_items as $i => $faq): ?>
            <details class="group cursor-pointer rounded-2xl border border-stone-200 bg-white p-6 shadow-sm open:bg-emerald-50/30 open:border-emerald-200" <?= $i === 0 ? 'open' : '' ?>>
                <summary class="flex items-center justify-between gap-4 font-heading text-base md:text-lg font-bold text-slate-900 marker:content-none">
                    <?= modmy_t($faq['q_en'] ?? '', $faq['q_ms'] ?? '') ?>
                    <span class="ml-4 shrink-0 rounded-full bg-stone-100 p-1.5 text-stone-500 group-open:bg-emerald-100 group-open:text-emerald-600 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform duration-300 group-open:-rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
                    </span>
                </summary>
                <p class="mt-4 pr-8 text-sm leading-relaxed text-slate-600">
                    <?= modmy_t($faq['a_en'] ?? '', $faq['a_ms'] ?? '') ?>
                </p>
            </details>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="bg-gradient-to-r from-emerald-700 to-emerald-600 py-16">
    <div class="container-custom max-w-5xl text-center text-white">
        <h2 class="mb-4 font-heading text-3xl font-black drop-shadow">
            <?= modmy_t('Ready to Order? Get Genuine Modafinil Delivered to You.', 'Bersedia untuk Memesan? Dapatkan Modafinil Tulen Dihantar kepada Anda.') ?>
        </h2>
        <p class="mb-8 text-lg text-emerald-100">
            <?= modmy_t('Discreet packaging, tracked Pos Malaysia shipping, and guaranteed delivery across Malaysia.', 'Pembungkusan diskret, penghantaran Pos Malaysia berjejak, dan penghantaran terjamin ke seluruh Malaysia.') ?>
        </p>
        <div class="flex flex-col gap-3 sm:flex-row sm:justify-center">
            <a href="/products/" class="inline-flex rounded-full bg-white px-8 py-3.5 text-sm font-bold uppercase tracking-wider text-emerald-700 transition-all hover:bg-emerald-50 hover:scale-105 shadow-lg">
                <?= modmy_t('Shop Now', 'Beli Sekarang') ?>
            </a>
            <a href="https://wa.me/60185754182" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 rounded-full border-2 border-white/60 px-8 py-3.5 text-sm font-bold uppercase tracking-wider text-white transition-all hover:bg-white/10">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.116.549 4.103 1.510 5.835L.057 24l6.304-1.654A11.938 11.938 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.882a9.867 9.867 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374A9.852 9.852 0 012.118 12C2.118 6.578 6.578 2.118 12 2.118c5.424 0 9.882 4.46 9.882 9.882 0 5.423-4.458 9.882-9.882 9.882z"/></svg>
                WhatsApp
            </a>
        </div>
    </div>
</section>
