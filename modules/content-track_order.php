<?php
/**
 * Module: Track Order
 */

$tag_en = get_sub_field('tag_en') ?: "Track Order";
$tag_ms = get_sub_field('tag_ms') ?: "Jejak Pesanan";

$heading_en = get_sub_field('heading_en') ?: "Track Your Order";
$heading_ms = get_sub_field('heading_ms') ?: "Jejak Pesanan Anda";

$desc_en = get_sub_field('description_en') ?: "All ModafinilMY orders are shipped via Pos Malaysia with a tracking number that can be checked online.";
$desc_ms = get_sub_field('description_ms') ?: "Semua pesanan ModafinilMY dihantar melalui Pos Malaysia dengan nombor penjejakan yang boleh disemak secara dalam talian.";

$whatsapp = get_field('whatsapp_number', 'option') ?: 'https://wa.me/601116284532';
?>
<section class="bg-background pt-16 pb-8 text-center">
    <div class="container-site max-w-3xl">
        <span class="inline-block rounded-full bg-primary-softer px-4 py-1.5 text-xs font-bold uppercase tracking-wider text-primary">
            <?= modmy_t($tag_en, $tag_ms) ?>
        </span>
        <h1 class="mt-4 font-heading text-4xl font-extrabold tracking-tight md:text-5xl">
            <?= modmy_t($heading_en, $heading_ms) ?>
        </h1>
        <p class="mx-auto mt-4 max-w-2xl text-base leading-relaxed text-muted-foreground">
            <?= modmy_t($desc_en, $desc_ms) ?>
        </p>
    </div>
</section>

<section class="pb-16 pt-8 bg-background">
    <div class="container-site max-w-3xl">
        <!-- Tracking Box -->
        <div class="flex flex-col items-center rounded-2xl border border-primary/20 bg-primary-softer/30 px-6 py-10 text-center shadow-sm sm:px-12">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" /></svg>
            <h2 class="mt-5 font-heading text-xl font-bold"><?= modmy_t("Track via Pos Malaysia", "Jejak melalui Pos Malaysia") ?></h2>
            <p class="mt-3 text-sm leading-relaxed text-muted-foreground sm:text-base">
                <?= modmy_t("You can track your order directly on the official Pos Malaysia website using the tracking number we sent you.", "Anda boleh menjejak pesanan anda terus di laman web rasmi Pos Malaysia menggunakan nombor penjejakan yang kami hantar kepada anda.") ?>
            </p>
            <a href="https://track.pos.com.my/" target="_blank" rel="noopener noreferrer" class="mt-6 inline-flex items-center gap-2 rounded-full bg-primary px-6 py-3 text-sm font-bold text-primary-foreground shadow-pill transition-colors hover:bg-primary-dark">
                <?= modmy_t("Track at Pos Malaysia", "Jejak di Pos Malaysia") ?>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
            </a>
        </div>

        <!-- Estimates -->
        <div class="mt-12">
            <h2 class="font-heading text-xl font-bold"><?= modmy_t("Estimated Delivery Time", "Anggaran Masa Penghantaran") ?></h2>
            <div class="mt-5 grid gap-4 sm:grid-cols-2">
                <div class="rounded-xl border border-border bg-card p-6 shadow-sm">
                    <h3 class="font-semibold text-foreground"><?= modmy_t("Peninsular Malaysia", "Semenanjung Malaysia") ?></h3>
                    <div class="mt-2 text-4xl font-extrabold text-primary">7-12</div>
                    <p class="mt-1 text-sm text-muted-foreground"><?= modmy_t("business days from shipping date", "hari bekerja dari tarikh penghantaran") ?></p>
                </div>
                <div class="rounded-xl border border-border bg-card p-6 shadow-sm">
                    <h3 class="font-semibold text-foreground"><?= modmy_t("Sabah & Sarawak", "Sabah & Sarawak") ?></h3>
                    <div class="mt-2 text-4xl font-extrabold text-primary">10-16</div>
                    <p class="mt-1 text-sm text-muted-foreground"><?= modmy_t("business days from shipping date", "hari bekerja dari tarikh penghantaran") ?></p>
                </div>
            </div>
        </div>

        <!-- Footer Text -->
        <div class="mt-12 text-center">
            <p class="text-sm leading-relaxed text-muted-foreground">
                <?= modmy_t("Orders that do not arrive within 25/30 business days are eligible for a free reshipment.", "Pesanan yang tidak sampai dalam tempoh 25/30 hari bekerja layak untuk penghantaran semula percuma.") ?>
                <a href="<?= home_url('/refund-policy') ?>" class="font-medium text-primary hover:underline">
                    <?= modmy_t("Read our policy.", "Baca dasar kami.") ?>
                </a>
            </p>
            <p class="mt-8 text-sm text-muted-foreground"><?= modmy_t("Still have questions about your order?", "Masih ada pertanyaan tentang pesanan anda?") ?></p>
            <a href="<?= esc_url($whatsapp) ?>" target="_blank" rel="noopener noreferrer" class="mt-4 inline-flex items-center rounded-full bg-primary px-6 py-3 text-sm font-bold text-primary-foreground shadow-pill transition-colors hover:bg-primary-dark">
                <?= modmy_t("Support WhatsApp", "WhatsApp Sokongan") ?>
            </a>
        </div>
    </div>
</section>
