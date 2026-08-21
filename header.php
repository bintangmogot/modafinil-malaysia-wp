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
        
        <!-- Mobile Left Actions (Hamburger + Call Icon) -->
        <div class="flex items-center lg:hidden gap-3">
            <!-- Mobile Menu Toggle -->
            <button type="button" aria-label="Menu" id="mobile-menu-open" class="rounded-md p-2 -ml-2 text-foreground/70 transition-colors hover:text-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
            </button>
            
            <!-- Mobile Call CTA -->
            <a href="tel:0455241294" class="flex items-center justify-center w-[30px] h-[30px] transition-opacity hover:opacity-80">
                <svg viewBox="0 0 308 308" fill="#00b09b" class="h-full w-full">
                    <path d="M227.904,176.981c-0.6-0.288-23.054-11.345-27.044-12.781c-1.629-0.585-3.374-1.156-5.23-1.156 c-3.032,0-5.579,1.511-7.563,4.479c-2.243,3.334-9.033,11.271-11.131,13.642c-0.274,0.313-0.648,0.687-0.872,0.687 c-0.201,0-3.676-1.431-4.728-1.888c-24.087-10.463-42.37-35.624-44.877-39.867c-0.358-0.61-0.373-0.887-0.376-0.887 c0.088-0.323,0.898-1.135,1.316-1.554c1.223-1.21,2.548-2.805,3.83-4.348c0.607-0.731,1.215-1.463,1.812-2.153 c1.86-2.164,2.688-3.844,3.648-5.79l0.503-1.011c2.344-4.657,0.342-8.587-0.305-9.856c-0.531-1.062-10.012-23.944-11.02-26.348 c-2.424-5.801-5.627-8.502-10.078-8.502c-0.413,0,0,0-1.732,0.073c-2.109,0.089-13.594,1.601-18.672,4.802 c-5.385,3.395-14.495,14.217-14.495,33.249c0,17.129,10.87,33.302,15.537,39.453c0.116,0.155,0.329,0.47,0.638,0.922 c17.873,26.102,40.154,45.446,62.741,54.469c21.745,8.686,32.042,9.69,37.896,9.69c0.001,0,0.001,0,0.001,0 c2.46,0,4.429-0.193,6.166-0.364l1.102-0.105c7.512-0.666,24.02-9.22,27.775-19.655c2.958-8.219,3.738-17.199,1.77-20.458 C233.168,179.508,230.845,178.393,227.904,176.981z"/>
                    <path d="M156.734,0C73.318,0,5.454,67.354,5.454,150.143c0,26.777,7.166,52.988,20.741,75.928L0.212,302.716 c-0.484,1.429-0.124,3.009,0.933,4.085C1.908,307.58,2.943,308,4,308c0.405,0,0.813-0.061,1.211-0.188l79.92-25.396 c21.87,11.685,46.588,17.853,71.604,17.853C240.143,300.27,308,232.923,308,150.143C308,67.354,240.143,0,156.734,0z M156.734,268.994c-23.539,0-46.338-6.797-65.936-19.657c-0.659-0.433-1.424-0.655-2.194-0.655c-0.407,0-0.815,0.062-1.212,0.188 l-40.035,12.726l12.924-38.129c0.418-1.234,0.209-2.595-0.561-3.647c-14.924-20.392-22.813-44.485-22.813-69.677 c0-65.543,53.754-118.867,119.826-118.867c66.064,0,119.812,53.324,119.812,118.867 C276.546,215.678,222.799,268.994,156.734,268.994z"/>
                </svg>
            </a>
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
            <style>
            .modmy-call-cta { display: flex; align-items: center; gap: 8px; margin-right: 4px; transition: opacity 0.2s; }
            .modmy-call-cta:hover { opacity: 0.8; }
            .modmy-call-cta .call-text { display: flex; flex-direction: column; color: #0033A0; }
            .modmy-call-cta .call-icon { position: relative; display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; }
            </style>
            <!-- Desktop Call CTA (Hidden on Mobile) -->
            <a href="tel:0455241294" class="modmy-call-cta hidden lg:flex">
                <div class="call-icon">
                    <svg viewBox="0 0 308 308" fill="#00b09b" class="h-full w-full">
                        <path d="M227.904,176.981c-0.6-0.288-23.054-11.345-27.044-12.781c-1.629-0.585-3.374-1.156-5.23-1.156 c-3.032,0-5.579,1.511-7.563,4.479c-2.243,3.334-9.033,11.271-11.131,13.642c-0.274,0.313-0.648,0.687-0.872,0.687 c-0.201,0-3.676-1.431-4.728-1.888c-24.087-10.463-42.37-35.624-44.877-39.867c-0.358-0.61-0.373-0.887-0.376-0.887 c0.088-0.323,0.898-1.135,1.316-1.554c1.223-1.21,2.548-2.805,3.83-4.348c0.607-0.731,1.215-1.463,1.812-2.153 c1.86-2.164,2.688-3.844,3.648-5.79l0.503-1.011c2.344-4.657,0.342-8.587-0.305-9.856c-0.531-1.062-10.012-23.944-11.02-26.348 c-2.424-5.801-5.627-8.502-10.078-8.502c-0.413,0,0,0-1.732,0.073c-2.109,0.089-13.594,1.601-18.672,4.802 c-5.385,3.395-14.495,14.217-14.495,33.249c0,17.129,10.87,33.302,15.537,39.453c0.116,0.155,0.329,0.47,0.638,0.922 c17.873,26.102,40.154,45.446,62.741,54.469c21.745,8.686,32.042,9.69,37.896,9.69c0.001,0,0.001,0,0.001,0 c2.46,0,4.429-0.193,6.166-0.364l1.102-0.105c7.512-0.666,24.02-9.22,27.775-19.655c2.958-8.219,3.738-17.199,1.77-20.458 C233.168,179.508,230.845,178.393,227.904,176.981z"/>
                        <path d="M156.734,0C73.318,0,5.454,67.354,5.454,150.143c0,26.777,7.166,52.988,20.741,75.928L0.212,302.716 c-0.484,1.429-0.124,3.009,0.933,4.085C1.908,307.58,2.943,308,4,308c0.405,0,0.813-0.061,1.211-0.188l79.92-25.396 c21.87,11.685,46.588,17.853,71.604,17.853C240.143,300.27,308,232.923,308,150.143C308,67.354,240.143,0,156.734,0z M156.734,268.994c-23.539,0-46.338-6.797-65.936-19.657c-0.659-0.433-1.424-0.655-2.194-0.655c-0.407,0-0.815,0.062-1.212,0.188 l-40.035,12.726l12.924-38.129c0.418-1.234,0.209-2.595-0.561-3.647c-14.924-20.392-22.813-44.485-22.813-69.677 c0-65.543,53.754-118.867,119.826-118.867c66.064,0,119.812,53.324,119.812,118.867 C276.546,215.678,222.799,268.994,156.734,268.994z"/>
                    </svg>
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
