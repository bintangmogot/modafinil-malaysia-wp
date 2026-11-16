<?php
/**
 * Page Modules seeder: starting text for the Product Guide, FAQs and SEO Text modules.
 *
 * These modules used to print built-in text when their fields were blank, so the text could not
 * be edited or hidden in WP admin. The templates now show only what is in the fields, and this
 * seeder writes the former built-in text into the fields once per environment.
 *
 * It fills ONLY fields that are empty and never overwrites anything written in WP admin.
 * Clear a field afterwards and it stays blank and hidden. It runs once per environment
 * (MODMY_MODULES_SEED_VERSION); bump the version only to fill newly added defaults, which
 * again fills empty fields only.
 */

const MODMY_MODULES_SEED_VERSION = 1;

/** Starting values per layout: field name => text, or a list of rows for a repeater. */
function modmy_module_defaults() {
    $seo_html = <<<'HTML'
<h2 class="font-heading text-2xl md:text-3xl font-extrabold text-slate-900 mb-3">Ordering Modafinil in Malaysia</h2>
<p class="text-base text-slate-600 leading-relaxed mb-6">We've made the process of buying modafinil online as straightforward as possible. Here's what to expect when you place an order with ModafinilMY.</p>
<h3 class="font-heading text-lg font-bold text-slate-900 mt-6 mb-2">Delivery Timeframes</h3>
<p class="text-sm text-slate-600 leading-relaxed mb-6">Semua pesanan dihantar dengan cepat ke seluruh Malaysia dengan penjejakan penuh. Bandar-bandar utama Semenanjung seperti KL, Selangor, Penang, dan Johor biasanya menerima pesanan dalam masa 7-12 hari bekerja. Sabah dan Sarawak mengambil 10-16 hari bekerja. Pesanan atas RM399 layak untuk penghantaran percuma.</p>
<h3 class="font-heading text-lg font-bold text-slate-900 mt-6 mb-2">Customs & Packaging</h3>
<p class="text-sm text-slate-600 leading-relaxed mb-6">Every order is shipped in plain, unmarked packaging with no indication of the contents. There is no branding or product information visible on the outside. Our shipments are processed through international channels and we maintain a high delivery success rate across all Malaysian states and territories.</p>
<h3 class="font-heading text-lg font-bold text-slate-900 mt-6 mb-2">What to Expect After Ordering</h3>
<p class="text-sm text-slate-600 leading-relaxed mb-6">Once your order is placed, you'll receive a confirmation email with your order details. Tracking information is provided within 1-2 business days. If you have any questions about your order at any point, our support team is available via our contact page.</p>
HTML;

    return array(
        'product_guide' => array(
            'heading_en'     => 'Choosing the Right Modafinil',
            'heading_ms'     => 'Memilih Modafinil Yang Tepat',
            'description_en' => 'With several brands and dosages available, the right product depends on your experience level, desired effects, and budget. Below is a comparison of our most popular options.',
            'description_ms' => 'Dengan pelbagai jenama dan dos yang ada, produk yang tepat bergantung kepada tahap pengalaman, kesan yang dimahukan, dan bajet anda. Di bawah adalah perbandingan pilihan paling popular kami.',
            'guide_items'    => array(
                array(
                    'title_en'       => 'Modalert 200mg — The Gold Standard',
                    'title_ms'       => 'Modalert 200mg — Standard Emas',
                    'description_en' => 'Manufactured by Sun Pharma, Modalert is the most widely recognised modafinil brand worldwide. Each tablet contains the standard 200mg clinical dose and delivers a clean, sustained boost in focus lasting 10–12 hours.',
                    'description_ms' => 'Dihasilkan oleh Sun Pharma, Modalert ialah jenama modafinil yang paling diiktiraf di seluruh dunia. Setiap tablet mengandungi dos klinikal 200mg dan memberikan lonjakan fokus yang bersih selama 10–12 jam.',
                    'best_for_en'    => 'Best for: First-time users who want a trusted, proven brand.',
                    'best_for_ms'    => 'Terbaik untuk: Pengguna baru yang mahukan jenama terbukti & dipercayai.',
                ),
                array(
                    'title_en'       => 'Modvigil 200mg — Affordable Alternative',
                    'title_ms'       => 'Modvigil 200mg — Alternatif Berpatutan',
                    'description_en' => 'Produced by HAB Pharma with the same 200mg dose as Modalert. Many users report very similar effects at a lower price, with a slightly gentler onset that suits all-day productivity.',
                    'description_ms' => 'Dihasilkan oleh HAB Pharma dengan dos 200mg yang sama seperti Modalert. Ramai pengguna melaporkan kesan yang hampir sama pada harga yang lebih rendah, dengan permulaan yang lebih perlahan.',
                    'best_for_en'    => 'Best for: Budget-conscious buyers or those who want a smoother onset.',
                    'best_for_ms'    => 'Terbaik untuk: Pembeli yang mementingkan bajet atau mahukan kesan mula yang lebih lancar.',
                ),
                array(
                    'title_en'       => 'Modasmart 400mg — Extended Duration',
                    'title_ms'       => 'Modasmart 400mg — Tempoh Berpanjangan',
                    'description_en' => 'Double the standard dose in a single tablet, designed for experienced users who need longer-lasting cognitive enhancement for extended study sessions or overnight shifts.',
                    'description_ms' => 'Dua kali ganda dos biasa dalam satu tablet, direka untuk pengguna berpengalaman yang perlukan peningkatan kognitif tahan lama.',
                    'best_for_en'    => 'Best for: Experienced users who need 14+ hours of sustained focus.',
                    'best_for_ms'    => 'Terbaik untuk: Pengguna berpengalaman yang perlukan fokus berterusan 14+ jam.',
                ),
            ),
        ),
        'faqs' => array(
            'eyebrow_en'   => 'FAQ',
            'eyebrow_ms'   => 'Soalan Lazim',
            'heading_en'   => 'Frequently Asked Questions',
            'heading_ms'   => 'Soalan Yang Sering Ditanya',
            'link_text_en' => 'Full FAQ',
            'link_text_ms' => 'Soalan Lazim Penuh',
            'link_url'     => home_url('/faq'),
            'faq_items'    => array(
                array(
                    'question_en' => 'Is it legal to buy Modafinil in Malaysia?',
                    'question_ms' => 'Adakah sah untuk membeli Modafinil di Malaysia?',
                    'answer_en'   => 'Yes, it is legal to possess for personal use. However, Modafinil is a prescription medication, so you should consult a doctor before use.',
                    'answer_ms'   => 'Ya, ia sah dimiliki untuk kegunaan peribadi. Walau bagaimanapun, Modafinil adalah ubat preskripsi, jadi anda harus berunding dengan doktor sebelum menggunakannya.',
                ),
                array(
                    'question_en' => 'How long does delivery take?',
                    'question_ms' => 'Berapa lama masa penghantaran?',
                    'answer_en'   => 'We ship via Pos Malaysia. Delivery typically takes 7-14 working days to all states including Sabah and Sarawak.',
                    'answer_ms'   => 'Kami membuat penghantaran melalui Pos Malaysia. Penghantaran biasanya mengambil masa 7-14 hari bekerja ke semua negeri termasuk Sabah dan Sarawak.',
                ),
            ),
        ),
        'seo_text' => array(
            'content_en'   => $seo_html,
            'content_ms'   => $seo_html,
            'cta_title_en' => 'Modafinil Dosage Guide',
            'cta_title_ms' => 'Panduan Dos Modafinil',
            'cta_desc_en'  => 'Not sure which dose is right for you? Read our complete dosage guide with recommendations, timing tips, and brand comparisons.',
            'cta_desc_ms'  => 'Tidak pasti dos mana yang sesuai untuk anda? Baca panduan dos lengkap kami dengan cadangan, tips masa, dan perbandingan jenama.',
            'cta_link'     => home_url('/modafinil-dosage-guide/'),
        ),
    );
}

/** ACF field keys of the Page Modules layouts: layout name => field name => ['key' => ..., 'sub' => [sub field name => key]]. */
function modmy_module_field_keys() {
    $path  = MODMY_THEME_DIR . '/acf-json/group_page_modules.json';
    $group = is_readable($path) ? json_decode((string) file_get_contents($path), true) : array();
    $keys  = array();
    foreach ((array) ($group['fields'] ?? array()) as $field) {
        if (($field['type'] ?? '') !== 'flexible_content') {
            continue;
        }
        foreach ((array) ($field['layouts'] ?? array()) as $layout) {
            foreach ((array) ($layout['sub_fields'] ?? array()) as $sub) {
                $entry = array('key' => $sub['key'], 'sub' => array());
                foreach ((array) ($sub['sub_fields'] ?? array()) as $inner) {
                    $entry['sub'][$inner['name']] = $inner['key'];
                }
                $keys[$layout['name']][$sub['name']] = $entry;
            }
        }
    }
    return $keys;
}

/** Writes the starting text into every empty field of the Product Guide, FAQs and SEO Text rows. */
function modmy_seed_module_defaults() {
    $defaults = modmy_module_defaults();
    $keys     = modmy_module_field_keys();
    $post_ids = get_posts(array(
        'post_type'   => 'any',
        'post_status' => array('publish', 'draft', 'private', 'pending', 'future'),
        'meta_key'    => 'modules',
        'numberposts' => -1,
        'fields'      => 'ids',
    ));
    foreach ($post_ids as $post_id) {
        $layouts = get_post_meta($post_id, 'modules', true);
        if (!is_array($layouts)) {
            continue;
        }
        foreach (array_values($layouts) as $index => $layout) {
            foreach ($defaults[$layout] ?? array() as $name => $value) {
                $field = $keys[$layout][$name] ?? null;
                if (!$field) {
                    continue;
                }
                $meta = 'modules_' . $index . '_' . $name;
                if (is_array($value)) {
                    if ((int) get_post_meta($post_id, $meta, true) > 0) {
                        continue;
                    }
                    foreach ($value as $row_index => $row) {
                        foreach ($row as $sub_name => $sub_value) {
                            $sub_meta = $meta . '_' . $row_index . '_' . $sub_name;
                            update_post_meta($post_id, $sub_meta, wp_slash($sub_value));
                            update_post_meta($post_id, '_' . $sub_meta, $field['sub'][$sub_name] ?? '');
                        }
                    }
                    update_post_meta($post_id, $meta, count($value));
                    update_post_meta($post_id, '_' . $meta, $field['key']);
                    continue;
                }
                if ('' !== trim(wp_strip_all_tags((string) get_post_meta($post_id, $meta, true)))) {
                    continue;
                }
                update_post_meta($post_id, $meta, wp_slash($value));
                update_post_meta($post_id, '_' . $meta, $field['key']);
            }
        }
    }
}

add_action('init', function () {
    if ((int) get_option('modmy_modules_seed_version', 0) >= MODMY_MODULES_SEED_VERSION) {
        return;
    }
    modmy_seed_module_defaults();
    update_option('modmy_modules_seed_version', MODMY_MODULES_SEED_VERSION);
}, 25);
