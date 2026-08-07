<?php
/**
 * The template for displaying the footer
 */
?>
<footer class="bg-ink text-ink-foreground">
    <!-- Badge strip -->
    <div class="bg-primary py-8 text-primary-foreground">
        <div class="container-site grid grid-cols-2 gap-6 text-center md:grid-cols-4">
            
            <div class="flex flex-col items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-7 w-7"><path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2"/><path d="M15 18H9"/><path d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.624l-3.48-4.35A1 1 0 0 0 17.52 8H14"/><circle cx="17" cy="18" r="2"/><circle cx="7" cy="18" r="2"/></svg>
                <span class="text-[11px] font-bold tracking-widest uppercase"><?= modmy_t("Pos Malaysia &middot; FREE RM399+", "Pos Malaysia &middot; PERCUMA RM399+") ?></span>
            </div>

            <div class="flex flex-col items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-7 w-7"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></svg>
                <span class="text-[11px] font-bold tracking-widest uppercase"><?= modmy_t("100% Genuine Products", "100% Produk Asli") ?></span>
            </div>

            <div class="flex flex-col items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-7 w-7"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                <span class="text-[11px] font-bold tracking-widest uppercase"><?= modmy_t("Shipping Insurance", "Insurans Penghantaran") ?></span>
            </div>

            <div class="flex flex-col items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-7 w-7"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                <span class="text-[11px] font-bold tracking-widest uppercase"><?= modmy_t("Discreet Delivery", "Penghantaran Diskret") ?></span>
            </div>
            
        </div>
    </div>

    <div class="container-site grid gap-10 py-14 md:grid-cols-2 lg:grid-cols-4">
        <div>
            <a href="<?= home_url('/') ?>" class="flex shrink-0 items-center gap-2.5" aria-label="ModafinilMY">
                <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-primary text-primary-foreground">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5"><path d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1 .2 2.2 1.5 3.5.7.9 1.3 1.5 1.5 2.5"/><path d="M9 18h6"/><path d="M10 22h4"/></svg>
                </span>
                <span class="font-heading text-xl font-extrabold tracking-tight text-ink-foreground">
                    Modafinil<span class="text-primary">MY</span>
                </span>
            </a>
            <p class="mt-4 text-sm leading-relaxed text-ink-foreground/70">
                <?= modmy_t(
                    "Malaysia's trusted source for genuine Modafinil. Delivering to all states and territories via Pos Malaysia &mdash; Semenanjung, Sabah & Sarawak.",
                    "Sumber Modafinil asli yang dipercayai di Malaysia. Penghantaran ke seluruh negeri melalui Pos Malaysia &mdash; Semenanjung, Sabah & Sarawak."
                ) ?>
            </p>
            <?php $whatsapp = get_field('whatsapp_number', 'option') ?: 'https://wa.me/601116284532'; ?>
            <a href="<?= esc_url($whatsapp) ?>" target="_blank" rel="noopener noreferrer" class="mt-5 inline-flex items-center gap-2 rounded-full bg-primary px-4 py-2 text-sm font-semibold text-primary-foreground transition-colors hover:bg-primary-dark">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                WhatsApp <?= modmy_t("Us", "Kami") ?>
            </a>
        </div>

        <div>
            <h3 class="text-sm font-bold uppercase tracking-widest text-ink-foreground">
                <?= modmy_t("Quick Links", "Pautan Pantas") ?>
            </h3>
            <div class="mt-4">
                <?php
                wp_nav_menu([
                    'theme_location' => 'footer_quick',
                    'container'      => false,
                    'menu_class'     => 'space-y-2.5 text-sm text-ink-foreground/70',
                    'fallback_cb'    => false,
                ]);
                ?>
            </div>
        </div>

        <div>
            <h3 class="text-sm font-bold uppercase tracking-widest text-ink-foreground">
                <?= modmy_t("Information", "Maklumat") ?>
            </h3>
            <div class="mt-4">
                <?php
                wp_nav_menu([
                    'theme_location' => 'footer_info',
                    'container'      => false,
                    'menu_class'     => 'space-y-2.5 text-sm text-ink-foreground/70',
                    'fallback_cb'    => false,
                ]);
                ?>
            </div>
        </div>

        <div>
            <h3 class="text-sm font-bold uppercase tracking-widest text-ink-foreground">
                <?= modmy_t("Malaysia Delivery", "Penghantaran Malaysia") ?>
            </h3>
            <div class="mt-4">
                <?php
                wp_nav_menu([
                    'theme_location' => 'footer_cities',
                    'container'      => false,
                    'menu_class'     => 'space-y-2.5 text-sm text-ink-foreground/70',
                    'fallback_cb'    => false,
                ]);
                ?>
            </div>
            <p class="mt-5 flex items-start gap-2 text-sm leading-relaxed text-ink-foreground/60">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mt-0.5 h-4 w-4 shrink-0 text-primary-light"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                <span>
                    <?= modmy_t("All of Malaysia &mdash; Peninsula, Sabah & Sarawak", "Seluruh Malaysia &mdash; Semenanjung, Sabah & Sarawak") ?>
                </span>
            </p>
        </div>
    </div>

    <div class="border-t border-white/10">
        <div class="container-site py-8">
            <p class="mx-auto max-w-[90%] text-center text-xs leading-relaxed text-ink-foreground/50">
                <?= modmy_t(
                    "The information on this site is for educational purposes only. Modafinil is a prescription medication in Malaysia. Please consult a licensed medical practitioner before using any cognitive enhancement products.",
                    "Maklumat yang disediakan di laman web ini adalah untuk tujuan pendidikan sahaja dan tidak boleh dianggap sebagai nasihat perubatan. Modafinil adalah ubat preskripsi di Malaysia. Sila berunding dengan pengamal perubatan berlesen sebelum menggunakan sebarang produk peningkatan kognitif."
                ) ?>
            </p>
        </div>
    </div>

    <div class="border-t border-white/10">
        <div class="container-site flex flex-col items-center justify-between gap-3 py-5 text-xs text-ink-foreground/60 sm:flex-row">
            <p>&copy; <?= date('Y') ?> ModafinilMY. All rights reserved.</p>
            <div class="flex gap-5">
                <a href="<?= home_url('/privacy') ?>" class="hover:text-primary-light"><?= modmy_t("Privacy Policy", "Dasar Privasi") ?></a>
                <a href="<?= home_url('/terms') ?>" class="hover:text-primary-light"><?= modmy_t("Terms & Conditions", "Terma & Syarat") ?></a>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
