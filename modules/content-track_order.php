<?php
/**
 * Track Order Module
 */
?>
<section class="section-padding bg-white text-center">
    <div class="container-custom max-w-3xl">
        <span class="inline-block bg-emerald-100 text-emerald-800 text-xs font-bold uppercase tracking-widest px-3 py-1.5 rounded-full mb-4">
            <?= modmy_t("Track Order", "Jejak Pesanan") ?>
        </span>
        <h1 class="font-heading text-4xl md:text-5xl font-black text-slate-900 mb-4">
            <?= modmy_t("Track Your Order", "Jejak Pesanan Anda") ?>
        </h1>
        <p class="text-slate-500 max-w-2xl mx-auto leading-relaxed">
            <?= modmy_t("All ModafinilMY orders are shipped via Pos Malaysia with a tracking number that can be checked online.", "Semua pesanan ModafinilMY dihantar melalui Pos Malaysia dengan nombor penjejakan yang boleh disemak secara dalam talian.") ?>
        </p>
    </div>
</section>

<section class="pb-16 bg-white">
    <div class="container-custom max-w-3xl">
        <!-- Tracking Box -->
        <div class="flex flex-col items-center rounded-2xl border border-emerald-100 bg-emerald-50/50 px-6 py-10 text-center shadow-sm sm:px-12">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-emerald-600">
                <path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2"/>
                <path d="M15 18H9"/>
                <path d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.624l-3.48-4.35A1 1 0 0 0 17.52 8H14"/>
                <circle cx="17" cy="18" r="2"/>
                <circle cx="7" cy="18" r="2"/>
            </svg>
            
            <h2 class="mt-5 font-heading text-xl font-bold text-slate-900">
                <?= modmy_t("Track via Pos Malaysia", "Jejak melalui Pos Malaysia") ?>
            </h2>
            <p class="mt-3 text-sm leading-relaxed text-slate-500 sm:text-base">
                <?= modmy_t("You can track your order directly on the official Pos Malaysia website using the tracking number we sent you.", "Anda boleh menjejak pesanan anda terus di laman web rasmi Pos Malaysia menggunakan nombor penjejakan yang kami hantar kepada anda.") ?>
            </p>
            <a href="https://track.pos.com.my/" target="_blank" rel="noopener noreferrer" class="mt-6 inline-flex items-center gap-2 rounded-full bg-emerald-600 hover:bg-emerald-500 px-6 py-3 text-sm font-bold text-white shadow-md transition-colors">
                <?= modmy_t("Track at Pos Malaysia", "Jejak di Pos Malaysia") ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M15 3h6v6"/><path d="M10 14 21 3"/><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
                </svg>
            </a>
        </div>

        <!-- Estimates -->
        <div class="mt-12">
            <h2 class="font-heading text-xl font-bold text-slate-900 text-center sm:text-left">
                <?= modmy_t("Estimated Delivery Time", "Anggaran Masa Penghantaran") ?>
            </h2>
            <div class="mt-5 grid gap-4 sm:grid-cols-2">
                <div class="rounded-xl border border-stone-200 bg-white p-6 shadow-sm text-center sm:text-left">
                    <h3 class="font-semibold text-slate-900"><?= modmy_t("Peninsular Malaysia", "Semenanjung Malaysia") ?></h3>
                    <div class="mt-2 text-4xl font-extrabold text-emerald-600">7-12</div>
                    <p class="mt-1 text-sm text-slate-500">
                        <?= modmy_t("business days from shipping date", "hari bekerja dari tarikh penghantaran") ?>
                    </p>
                </div>
                <div class="rounded-xl border border-stone-200 bg-white p-6 shadow-sm text-center sm:text-left">
                    <h3 class="font-semibold text-slate-900"><?= modmy_t("Sabah & Sarawak", "Sabah & Sarawak") ?></h3>
                    <div class="mt-2 text-4xl font-extrabold text-emerald-600">10-16</div>
                    <p class="mt-1 text-sm text-slate-500">
                        <?= modmy_t("business days from shipping date", "hari bekerja dari tarikh penghantaran") ?>
                    </p>
                </div>
            </div>
        </div>

        <!-- Footer Text -->
        <div class="mt-12 text-center">
            <p class="text-sm leading-relaxed text-slate-500">
                <?= modmy_t("Orders that do not arrive within 25/30 business days are eligible for a free reshipment.", "Pesanan yang tidak sampai dalam tempoh 25/30 hari bekerja layak untuk penghantaran semula percuma.") ?>
                <a href="/refund-policy" class="font-medium text-emerald-600 hover:underline">
                    <?= modmy_t("Read our policy.", "Baca dasar kami.") ?>
                </a>
            </p>
            <p class="mt-8 text-sm text-slate-500">
                <?= modmy_t("Still have questions about your order?", "Masih ada pertanyaan tentang pesanan anda?") ?>
            </p>
            <a href="https://wa.me/601116284532" target="_blank" rel="noopener noreferrer" class="mt-4 inline-flex items-center rounded-full bg-slate-900 px-6 py-3 text-sm font-bold text-white shadow-md transition-colors hover:bg-slate-800">
                <?= modmy_t("Support WhatsApp", "WhatsApp Sokongan") ?>
            </a>
        </div>
    </div>
</section>
