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

        <div class="space-y-4">
            <?php 
            if(have_rows('faq_items')): 
                while(have_rows('faq_items')): the_row();
            ?>
            <details class="group border border-stone-200 rounded-xl">
                <summary class="flex items-center justify-between gap-4 p-5 cursor-pointer list-none">
                    <h3 class="font-heading font-bold text-ink text-sm">
                        <?= modmy_t(get_sub_field('question_en'), get_sub_field('question_ms')) ?>
                    </h3>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary flex-shrink-0 group-open:rotate-180 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
                </summary>
                <div class="px-5 pb-5 text-sm text-muted-foreground leading-relaxed border-t border-stone-100 pt-4">
                    <?= modmy_t(get_sub_field('answer_en'), get_sub_field('answer_ms')) ?>
                </div>
            </details>
            <?php 
                endwhile;
            else:
                // Fallback default FAQs
                $defaults = [
                    ['Is it legal to buy Modafinil in Malaysia?', 'Adakah sah untuk membeli Modafinil di Malaysia?', 'Yes, it is legal to possess for personal use. However, Modafinil is a prescription medication, so you should consult a doctor before use.', 'Ya, ia sah dimiliki untuk kegunaan peribadi. Walau bagaimanapun, Modafinil adalah ubat preskripsi, jadi anda harus berunding dengan doktor sebelum menggunakannya.'],
                    ['How long does delivery take?', 'Berapa lama masa penghantaran?', 'We ship via Pos Malaysia. Delivery typically takes 7-14 working days to all states including Sabah and Sarawak.', 'Kami membuat penghantaran melalui Pos Malaysia. Penghantaran biasanya mengambil masa 7-14 hari bekerja ke semua negeri termasuk Sabah dan Sarawak.']
                ];
                foreach($defaults as $f):
            ?>
            <details class="group border border-stone-200 rounded-xl">
                <summary class="flex items-center justify-between gap-4 p-5 cursor-pointer list-none">
                    <h3 class="font-heading font-bold text-ink text-sm">
                        <?= modmy_t($f[0], $f[1]) ?>
                    </h3>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary flex-shrink-0 group-open:rotate-180 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
                </summary>
                <div class="px-5 pb-5 text-sm text-muted-foreground leading-relaxed border-t border-stone-100 pt-4">
                    <?= modmy_t($f[2], $f[3]) ?>
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
