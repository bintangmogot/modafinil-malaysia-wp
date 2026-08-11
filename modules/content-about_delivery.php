<?php
/**
 * Module: About Delivery
 */
$heading_en = get_sub_field('heading_en') ?: "Delivery Across Malaysia";
$heading_ms = get_sub_field('heading_ms') ?: "Penghantaran ke Seluruh Malaysia";
$desc_en = get_sub_field('desc_en') ?: "We use Pos Malaysia for reliable delivery to all postcodes across Malaysia:";
$desc_ms = get_sub_field('desc_ms') ?: "Kami menggunakan Pos Malaysia untuk penghantaran yang boleh dipercayai ke semua poskod di seluruh Malaysia:";
?>
<section class="bg-white py-4 pb-6 md:py-8 md:pb-12">
    <div class="container-custom max-w-4xl">
        <h2 class="font-heading font-black text-xl sm:text-2xl text-slate-900 mb-4">
            <?= modmy_t($heading_en, $heading_ms) ?>
        </h2>
        <p class="text-sm sm:text-base text-slate-600 mb-6 whitespace-pre-line"><?= modmy_t($desc_en, $desc_ms) ?></p>

        <ul class="space-y-4 mb-8 text-slate-600 text-sm list-none pl-0">
            <?php if(have_rows('list_items')): ?>
                <?php while(have_rows('list_items')): the_row(); ?>
                    <li class="flex items-start gap-3">
                        <div class="text-emerald-600 flex-shrink-0 mt-0.5 w-5 h-5">
                            <?php 
                            $icon = get_sub_field('icon_svg');
                            echo $icon ?: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>'; 
                            ?>
                        </div>
                        <span>
                            <strong><?= modmy_t(get_sub_field('title_en'), get_sub_field('title_ms')) ?>:</strong> 
                            <?= modmy_t(get_sub_field('desc_en'), get_sub_field('desc_ms')) ?>
                        </span>
                    </li>
                <?php endwhile; ?>
            <?php else: ?>
                <!-- Default delivery list -->
                <li class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
                    <span>
                        <strong><?= modmy_t("Peninsular Malaysia", "Semenanjung Malaysia") ?>:</strong> 
                        <?= modmy_t("7-12 working days — KL, Selangor, Penang, Johor, and all Peninsular states.", "7-12 hari bekerja — KL, Selangor, Penang, Johor, dan semua negeri Semenanjung.") ?>
                    </span>
                </li>
                <li class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
                    <span>
                        <strong><?= modmy_t("Sabah & Sarawak", "Sabah & Sarawak") ?>:</strong> 
                        <?= modmy_t("10-16 working days — Kota Kinabalu, Kuching, and all East Malaysia cities.", "10-16 hari bekerja — Kota Kinabalu, Kuching, dan semua bandar Malaysia Timur.") ?>
                    </span>
                </li>
                <li class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
                    <span>
                        <strong><?= modmy_t("Free Shipping", "Penghantaran Percuma") ?>:</strong> 
                        <?= modmy_t("For all orders RM399 and above.", "Untuk semua pesanan RM399 ke atas.") ?>
                    </span>
                </li>
                <li class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
                    <span>
                        <strong><?= modmy_t("Discreet Packaging", "Pembungkusan Diskret") ?>:</strong> 
                        <?= modmy_t("Every order is shipped in a plain box without brand or product information.", "Setiap pesanan dihantar dalam kotak biasa tanpa jenama atau maklumat produk.") ?>
                    </span>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</section>
