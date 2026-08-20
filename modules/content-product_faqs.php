<?php
/**
 * Module: FAQs
 */

$eyebrow_en = get_sub_field('eyebrow_en') ?: "FAQ";
$eyebrow_ms = get_sub_field('eyebrow_ms') ?: "Soalan Lazim";
$show_eyebrow = get_sub_field('show_eyebrow') !== false;

$heading_en = get_sub_field('heading_en') ?: "Frequently Asked Questions";
$heading_ms = get_sub_field('heading_ms') ?: "Soalan Yang Sering Ditanya";

$show_link = get_sub_field('show_full_faq_link') !== false;
$link_en = get_sub_field('link_text_en') ?: "Full FAQ";
$link_ms = get_sub_field('link_text_ms') ?: "Soalan Lazim Penuh";
$link_url = get_sub_field('link_url') ?: home_url('/faq');
?>
<section class="section-padding bg-white" data-testid="faq-strip">
    <div class="container-custom max-w-3xl">
        <div class="text-center mb-10">
            <?php if($show_eyebrow): ?>
            <span class="inline-block bg-primary-soft text-primary-dark text-xs font-bold uppercase tracking-widest px-3 py-1.5 rounded-full mb-4">
                <?= modmy_t($eyebrow_en, $eyebrow_ms) ?>
            </span>
            <?php endif; ?>
            <h2 class="font-heading text-2xl md:text-4xl font-black text-ink <?= !$show_eyebrow ? 'mb-3' : '' ?>">
                <?= modmy_t($heading_en, $heading_ms) ?>
            </h2>
        </div>

        <div class="border border-stone-200 rounded-xl overflow-hidden bg-white shadow-sm">
            <?php 
            if(have_rows('faq_items')): 
                $faq_items = get_sub_field('faq_items');
                $count = is_array($faq_items) ? count($faq_items) : 0;
                $i = 0;
                while(have_rows('faq_items')): the_row();
                    $i++;
                    $is_last = ($i === $count);
            ?>
            <details class="group <?= !$is_last ? 'border-b border-stone-200' : '' ?>">
                <summary class="flex items-center justify-between gap-4 p-5 cursor-pointer list-none hover:bg-slate-50 transition-colors group-open:border-l-4 group-open:border-l-[#4F46E5] group-open:bg-slate-50 [&::-webkit-details-marker]:hidden">
                    <h3 class="font-heading font-semibold text-ink text-sm md:text-[15px] group-open:font-bold group-open:text-[#4F46E5]">
                        <?= modmy_t(get_sub_field('q_en'), get_sub_field('q_ms')) ?>
                    </h3>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-slate-400 flex-shrink-0 group-open:rotate-180 transition-transform group-open:text-[#4F46E5]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
                </summary>
                <div class="px-5 pb-5 pt-2 text-sm text-slate-600 leading-relaxed pl-[22px]">
                    <?= wpautop(wp_kses_post(modmy_t(get_sub_field('a_en'), get_sub_field('a_ms')))) ?>
                </div>
            </details>
            <?php 
                endwhile;
            else:
                // Fallback default FAQs
                $defaults = [
                    ['What is Modafinil?', 'Apakah itu Modafinil?', 'Modafinil is a wakefulness-promoting agent (eugeroic) widely used as a cognitive enhancer by students, professionals, and shift workers to improve focus, concentration, and mental clarity. It was originally developed to treat narcolepsy and sleep disorders.', 'Modafinil ialah agen penggalak kewaspadaan (eugeroic) yang digunakan secara meluas sebagai pengingkat kognitif oleh pelajar, profesional, dan pekerja syif untuk meningkatkan fokus, kepekatan, dan kejelasan mental. Ia pada asalnya dibangunkan untuk merawat narkolepsi dan gangguan tidur.'],
                    ['What is the recommended dosage?', 'Apakah dos yang disyorkan?', 'The standard recommended dose is 200mg taken once in the morning. Beginners should start with 100mg (half a tablet) to assess tolerance. Read our complete dosage guide for detailed recommendations.', 'Dos disyorkan standard ialah 200mg diambil sekali pada waktu pagi. Pemula harus bermula dengan 100mg (separuh tablet) untuk menilai toleransi. Baca panduan dos lengkap kami untuk cadangan terperinci.'],
                    ['Are your products genuine?', 'Adakah produk anda asli?', '100%. We source all our Modafinil exclusively from certified, reputable manufacturers including Sun Pharma (Modalert, Waklert), HAB Pharma (Modvigil, Artvigil), and other trusted pharmaceutical companies. Every product is genuine and pharmaceutical grade.', '100% asli. Kami mendapatkan semua Modafinil kami secara eksklusif dari pengeluar bertauliah dan bereputasi tinggi termasuk Sun Pharma (Modalert, Waklert), HAB Pharma (Modvigil, Artvigil), dan syarikat farmaseutikal dipercayai yang lain. Setiap produk adalah asli.'],
                    ['How long does delivery take?', 'Berapa lamakah masa penghantaran?', 'Semenanjung Malaysia (KL, Selangor, Penang, Johor, dll.) biasanya menerima pesanan dalam masa 7-12 hari bekerja. Sabah dan Sarawak mengambil 10-16 hari bekerja. Semua pesanan dilengkapi penjejakan dan penghantaran percuma atas RM399.', 'Semenanjung Malaysia (KL, Selangor, Penang, Johor, dll.) biasanya menerima pesanan dalam masa 7-12 hari bekerja. Sabah dan Sarawak mengambil 10-16 hari bekerja. Semua pesanan dilengkapi penjejakan dan penghantaran percuma atas RM399.'],
                    ['Is the packaging discreet?', 'Adakah pembungkusan diskret?', 'Absolutely. All orders are shipped in plain, unmarked packaging with no indication of the contents. There is no branding or product information visible on the outside of the package. Your privacy is our priority.', 'Sangat diskret. Semua pesanan dihantar dalam bungkusan biasa tanpa sebarang tanda kandungan. Tiada jenama atau maklumat produk kelihatan di luar bungkusan. Privasi anda ialah keutamaan kami.']
                ];
                $count = count($defaults);
                foreach($defaults as $i => $f):
                    $is_last = ($i === $count - 1);
            ?>
            <details class="group <?= !$is_last ? 'border-b border-stone-200' : '' ?>">
                <summary class="flex items-center justify-between gap-4 p-5 cursor-pointer list-none hover:bg-slate-50 transition-colors group-open:border-l-4 group-open:border-l-[#4F46E5] group-open:bg-slate-50 [&::-webkit-details-marker]:hidden">
                    <h3 class="font-heading font-semibold text-ink text-sm md:text-[15px] group-open:font-bold group-open:text-[#4F46E5]">
                        <?= modmy_t($f[0], $f[1]) ?>
                    </h3>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-slate-400 flex-shrink-0 group-open:rotate-180 transition-transform group-open:text-[#4F46E5]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
                </summary>
                <div class="px-5 pb-5 pt-2 text-sm text-slate-600 leading-relaxed pl-[22px]">
                    <?= wpautop(wp_kses_post(modmy_t($f[2], $f[3]))) ?>
                </div>
            </details>
            <?php 
                endforeach;
            endif; 
            ?>
        </div>

        <?php if($show_link): ?>
        <div class="text-center mt-8">
            <a href="<?= esc_url($link_url) ?>" class="inline-flex items-center gap-1 font-bold text-primary hover:text-primary-dark transition-colors text-sm">
                <?= modmy_t($link_en, $link_ms) ?> &rarr;
            </a>
        </div>
        <?php endif; ?>
    </div>
</section>
