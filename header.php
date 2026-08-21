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
            <?php 
            $whatsapp = get_field('whatsapp_number', 'option') ?: 'https://wa.me/60185754182'; 
            ?>
            <a href="<?= esc_url($whatsapp) ?>" target="_blank" rel="noopener noreferrer" class="hidden items-center gap-2 rounded-full bg-primary px-4 py-2 text-sm font-semibold text-primary-foreground shadow-pill transition-colors hover:bg-primary-dark sm:inline-flex">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4 shrink-0"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.67-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                WhatsApp
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
