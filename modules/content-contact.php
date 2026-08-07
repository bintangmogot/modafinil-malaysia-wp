<?php
/**
 * Module: Contact Form & Info
 */

$heading_en = get_sub_field('heading_en') ?: "Have Questions? We Are Here.";
$heading_ms = get_sub_field('heading_ms') ?: "Ada Soalan? Kami Di Sini.";

$desc_en = get_sub_field('description_en') ?: "Our team speaks English and Malaysia. We usually reply within 30 minutes during business hours.";
$desc_ms = get_sub_field('description_ms') ?: "Pasukan kami berbahasa Malaysia dan English. Kami biasanya membalas dalam masa 30 minit pada waktu perniagaan.";

$whatsapp = get_field('whatsapp_number', 'option') ?: 'https://wa.me/601116284532';
$email = get_field('contact_email', 'option') ?: 'support@modafinil-malaysia.com';
?>
<section class="bg-background pt-16 pb-8 text-center">
    <div class="container-site max-w-3xl">
        <span class="inline-block rounded-full bg-primary-softer px-4 py-1.5 text-xs font-bold uppercase tracking-wider text-primary">
            <?= modmy_t("Contact Us", "Hubungi Kami") ?>
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
    <div class="container-site grid gap-12 lg:grid-cols-[1fr_1.2fr]">
        <div class="space-y-6">
            <a href="<?= esc_url($whatsapp) ?>" target="_blank" rel="noopener noreferrer" class="flex gap-4 rounded-xl border border-primary/20 bg-primary-softer/30 p-5 shadow-sm transition-all hover:border-primary/50 hover:bg-primary-softer/50">
                <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-primary text-primary-foreground">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                </span>
                <div>
                    <h2 class="font-heading text-base font-bold text-foreground"><?= modmy_t("WhatsApp (Fastest Option)", "WhatsApp (Pilihan Terpantas)") ?></h2>
                    <p class="mt-1 text-sm leading-relaxed text-muted-foreground">+60 11-1628 4532 &middot; <?= modmy_t("Replies within 30 minutes", "Balas dalam masa 30 minit") ?></p>
                </div>
            </a>

            <div class="flex gap-4 rounded-xl border border-border bg-card p-5 shadow-card">
                <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-primary-softer text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                </span>
                <div>
                    <h2 class="font-heading text-base font-bold"><?= modmy_t("Email", "Emel") ?></h2>
                    <p class="mt-1 text-sm leading-relaxed text-muted-foreground"><?= esc_html($email) ?> &middot; <?= modmy_t("Within 24 hours", "Dalam masa 24 jam") ?></p>
                </div>
            </div>

            <div class="rounded-xl border border-border bg-muted/30 p-5">
                <h2 class="font-heading text-sm font-bold uppercase tracking-wider text-foreground"><?= modmy_t("OPERATING HOURS", "WAKTU OPERASI") ?></h2>
                <div class="mt-5 flex flex-col gap-3 text-sm text-muted-foreground">
                    <div class="flex justify-between gap-4">
                        <span><?= modmy_t("Monday - Friday", "Isnin – Jumaat") ?></span>
                        <span class="font-medium text-foreground text-right">9:00 AM &ndash; 8:00 PM MYT</span>
                    </div>
                    <div class="flex justify-between gap-4">
                        <span><?= modmy_t("Saturday", "Sabtu") ?></span>
                        <span class="font-medium text-foreground text-right">10:00 AM &ndash; 5:00 PM MYT</span>
                    </div>
                    <div class="flex justify-between gap-4">
                        <span><?= modmy_t("Sunday / Public Holiday", "Ahad / Cuti Umum") ?></span>
                        <span class="font-medium text-foreground text-right"><?= modmy_t("Limited (WhatsApp only)", "Terhad (WhatsApp sahaja)") ?></span>
                    </div>
                </div>
            </div>
        </div>

        <form class="rounded-2xl border border-border bg-card p-7 shadow-card" action="<?= esc_url(admin_url('admin-post.php')) ?>" method="POST">
            <input type="hidden" name="action" value="modmy_contact_form">
            <?php wp_nonce_field('modmy_contact', 'modmy_contact_nonce'); ?>
            
            <h2 class="font-heading text-xl font-bold"><?= modmy_t("Send Message", "Hantar Mesej") ?></h2>
            <p class="mt-1 text-sm text-muted-foreground">
                <?= modmy_t("Fill in the form and we will contact you.", "Isikan borang dan kami akan menghubungi anda.") ?>
            </p>

            <?php if(isset($_GET['sent']) && $_GET['sent'] == '1'): ?>
            <div class="mt-4 p-4 rounded-lg bg-primary-softer text-primary-dark font-medium text-sm">
                <?= modmy_t("Thank you! We will reply within 24 hours.", "Terima kasih! Kami akan membalas dalam masa 24 jam.") ?>
            </div>
            <?php endif; ?>

            <div class="mt-6 grid gap-5">
                <div>
                    <label for="name" class="text-sm font-semibold text-foreground"><?= modmy_t("Full Name", "Nama Penuh") ?></label>
                    <input id="name" name="name" type="text" required placeholder="<?= modmy_t('Ahmad bin Ismail', 'Ahmad bin Ismail') ?>" class="mt-2 w-full rounded-lg border border-input bg-background px-4 py-3 text-sm outline-none transition-colors focus:border-primary focus:ring-2 focus:ring-ring/30" />
                </div>
                <div>
                    <label for="email" class="text-sm font-semibold text-foreground"><?= modmy_t("Email", "E-mel") ?></label>
                    <input id="email" name="email" type="email" required placeholder="nama@email.com" class="mt-2 w-full rounded-lg border border-input bg-background px-4 py-3 text-sm outline-none transition-colors focus:border-primary focus:ring-2 focus:ring-ring/30" />
                </div>
                <div>
                    <label for="order" class="text-sm font-semibold text-foreground"><?= modmy_t("Order No. (optional)", "No. Pesanan (pilihan)") ?></label>
                    <input id="order" name="order" type="text" placeholder="MY-10234" class="mt-2 w-full rounded-lg border border-input bg-background px-4 py-3 text-sm outline-none transition-colors focus:border-primary focus:ring-2 focus:ring-ring/30" />
                </div>
                <div>
                    <label for="message" class="text-sm font-semibold text-foreground"><?= modmy_t("Message", "Mesej") ?></label>
                    <textarea id="message" name="message" required rows="5" placeholder="<?= modmy_t('How can we help?', 'Bagaimana kami boleh membantu?') ?>" class="mt-2 w-full rounded-lg border border-input bg-background px-4 py-3 text-sm outline-none transition-colors focus:border-primary focus:ring-2 focus:ring-ring/30"></textarea>
                </div>
                <button type="submit" class="rounded-full bg-primary px-8 py-4 text-sm font-bold uppercase tracking-wider text-primary-foreground shadow-pill transition-colors hover:bg-primary-dark">
                    <?= modmy_t("Send Message", "Hantar Mesej") ?>
                </button>
            </div>
        </form>
    </div>
</section>
