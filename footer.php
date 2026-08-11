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
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4 shrink-0"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.67-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
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
