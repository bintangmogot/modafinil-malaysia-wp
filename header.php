<?php
/**
 * The header for our theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="overflow-x-hidden">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-background text-foreground antialiased selection:bg-primary-soft selection:text-primary-dark'); ?>>
<?php wp_body_open(); ?>

<?php
$lang = modmy_get_lang();
$is_en = $lang === 'en';
?>

<!-- Trust Bar -->
<div class="w-full bg-primary" data-testid="trust-bar">
    <div class="container-site flex items-center justify-between px-4 py-2 font-semibold text-primary-foreground">
        <div class="flex items-center gap-1.5">
            <svg xmlns="http://www.w3.org/2000/svg" class="hidden h-3.5 w-3.5 shrink-0 sm:block" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
            </svg>
            <span class="hidden text-sm tracking-wide sm:inline">
                <?= modmy_t("Free Shipping Over RM399 &nbsp;&middot;&nbsp; 100% Genuine", "Penghantaran Percuma RM399+ &nbsp;&middot;&nbsp; 100% Asli") ?>
            </span>
            <span class="text-xs sm:hidden">
                <?= modmy_t("🚚 Free Shipping RM399+", "🚚 Percuma Penghantaran RM399+") ?>
            </span>
        </div>
        <div class="flex items-center gap-2 text-xs font-bold tracking-wider">
            <a href="?lang=en" data-lang="en" class="lang-toggle <?= $is_en ? 'text-white' : 'text-primary-foreground/50 hover:text-white transition-colors' ?>">EN</a>
            <span class="text-primary-foreground/30">|</span>
            <a href="?lang=ms" data-lang="ms" class="lang-toggle <?= !$is_en ? 'text-white' : 'text-primary-foreground/50 hover:text-white transition-colors' ?>">MS</a>
        </div>
    </div>
</div>

<!-- Header -->
<header class="sticky top-0 z-50 w-full border-b border-border bg-background shadow-sm">
    <div class="container-site relative flex h-[68px] items-center justify-between gap-4">
        
        <!-- Mobile Menu Toggle -->
        <div class="flex items-center lg:hidden">
            <button type="button" aria-label="Menu" id="mobile-menu-open" class="rounded-md p-2 -ml-2 text-foreground/70 transition-colors hover:text-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
            </button>
        </div>

        <!-- Logo -->
        <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 lg:static lg:translate-x-0 lg:translate-y-0">
            <a href="<?= home_url('/') ?>" class="flex shrink-0 items-center gap-2.5" aria-label="ModafinilMY">
                <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-primary text-primary-foreground">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5"><path d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1 .2 2.2 1.5 3.5.7.9 1.3 1.5 1.5 2.5"/><path d="M9 18h6"/><path d="M10 22h4"/></svg>
                </span>
                <span class="font-heading text-xl font-extrabold tracking-tight text-foreground">
                    Modafinil<span class="text-primary">MY</span>
                </span>
            </a>
        </div>

        <!-- Desktop Nav -->
        <nav class="hidden items-center gap-1 lg:flex lg:flex-1 lg:justify-center desktop-nav">
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'flex items-center gap-1',
                'fallback_cb'    => false,
                'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            ]);
            ?>
        </nav>

        <!-- Right Actions -->
        <div class="flex items-center gap-3 ml-auto lg:ml-0">
            <!-- Call CTA -->
            <style>
            .modmy-call-cta { display: flex; align-items: center; gap: 8px; margin-right: 4px; transition: opacity 0.2s; }
            .modmy-call-cta:hover { opacity: 0.8; }
            .modmy-call-cta .call-text { display: none; flex-direction: column; color: #0033A0; }
            .modmy-call-cta .call-icon { position: relative; display: flex; align-items: center; justify-content: center; }
            @media (min-width: 640px) {
                .modmy-call-cta { gap: 10px; margin-right: 4px; }
                .modmy-call-cta .call-text { display: flex; }
                .modmy-call-cta .call-icon { width: 40px; height: 40px; }
            }
            @media (max-width: 639px) {
                .modmy-call-cta .call-icon { width: 36px; height: 36px; }
            }
            </style>
            <a href="tel:0455241294" class="modmy-call-cta">
                <div class="call-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="#00b09b" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-full w-full">
                        <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z" />
                        <path d="M15.4 12.6c-.3-.2-1.7-.8-2-.9-.3-.1-.5-.1-.7.2-.2.3-.7.9-.9 1.1-.2.2-.3.3-.6.1-.3-.1-1.2-.4-2.3-1.4-.8-.7-1.4-1.6-1.5-1.9-.1-.3 0-.4.1-.5.1-.1.3-.3.4-.5.1-.1.2-.3.3-.5.1-.2 0-.4 0-.5-.1-.2-.6-1.6-.9-2.2-.2-.5-.4-.4-.6-.4h-.5c-.2 0-.5.1-.8.4-.3.3-1 1-1 2.4s1.1 2.8 1.2 3c.1.2 2 3.1 4.9 4.3 1.9.8 2.5.8 3.4.7.9-.1 1.7-.7 2-1.4.3-.7.3-1.3.2-1.4-.1-.1-.3-.2-.6-.3z" fill="#00b09b" stroke="none" />
                    </svg>
                    <div class="absolute -left-1 -top-1 flex h-4 w-4 items-center justify-center bg-white rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#00b09b" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" class="h-3 w-3">
                            <line x1="12" y1="4" x2="12" y2="20"></line>
                            <line x1="4" y1="12" x2="20" y2="12"></line>
                        </svg>
                    </div>
                </div>
                <div class="call-text">
                    <span class="text-[14px] font-bold leading-none tracking-wide">Call</span>
                    <span class="text-[21px] font-extrabold leading-tight tracking-tight">0455 241 294</span>
                </div>
            </a>
            <?= do_shortcode('[xoo_wsc_cart]') ?>
        </div>
    </div>

    <!-- Mobile Nav Overlay -->
    <div id="mobile-menu-overlay" class="fixed inset-0 z-50 hidden bg-black/40 backdrop-blur-sm lg:hidden" aria-hidden="true"></div>

    <!-- Mobile Nav Drawer -->
    <div id="mobile-menu-drawer" class="fixed inset-y-0 left-0 z-50 w-[85%] max-w-sm transform overflow-y-auto bg-background transition-transform duration-300 ease-in-out lg:hidden -translate-x-full">
        <div class="flex h-[68px] items-center justify-between border-b border-border px-6">
            <span class="font-heading text-lg font-bold text-foreground">
                ModafinilMY
            </span>
            <button type="button" aria-label="Tutup / Close" id="mobile-menu-close" class="rounded-md p-2 text-foreground/70 transition-colors hover:text-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
            </button>
        </div>

        <nav class="flex flex-col border-b border-border py-4 mobile-nav">
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'flex flex-col',
                'fallback_cb'    => false,
                'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            ]);
            ?>
        </nav>

        <div class="px-6 py-6 pb-20">
            <h3 class="mb-2 text-xs font-semibold uppercase tracking-wider text-[#62847A]">
                <?= modmy_t("BUY MODAFINIL IN", "BELI MODAFINIL DI") ?>
            </h3>
            <div class="grid grid-cols-2 gap-y-1 gap-x-4">
                <?php
                if (has_nav_menu('mobile_cities')) {
                    wp_nav_menu([
                        'theme_location' => 'mobile_cities',
                        'container'      => false,
                        'menu_class'     => 'contents',
                        'fallback_cb'    => false,
                        'items_wrap'     => '%3$s',
                    ]);
                } else {
                    $cities = get_posts([
                        'post_type' => 'city',
                        'posts_per_page' => -1,
                        'orderby' => 'title',
                        'order' => 'ASC'
                    ]);
                    foreach ($cities as $city) {
                        $city_name = get_post_meta($city->ID, 'city_name', true);
                        if (!$city_name) {
                            $city_name = str_replace(['Buy Modafinil in ', 'Buy Modafinil '], '', $city->post_title);
                        }
                        echo '<a href="' . get_permalink($city->ID) . '" class="text-sm text-[#62847A] hover:text-primary transition-colors block py-1.5 font-medium">' . esc_html($city_name) . '</a>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</header>
