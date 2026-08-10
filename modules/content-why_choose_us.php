<?php
/**
 * Module: Why Choose Us (Audiences)
 */

$tag_en = get_sub_field('tag_en') ?: "Made for Malaysia";
$tag_ms = get_sub_field('tag_ms') ?: "Dibuat untuk Malaysia";

$heading_en = get_sub_field('heading_en') ?: "Who Uses Modafinil in Malaysia?";
$heading_ms = get_sub_field('heading_ms') ?: "Siapa yang Menggunakan Modafinil di Malaysia?";

$desc_en = get_sub_field('description_en') ?: "From UM students in KL to USM doctors in Kelantan, thousands of Malaysians use Modafinil to stay sharp when it matters most.";
$desc_ms = get_sub_field('description_ms') ?: "Dari pelajar UM di KL hingga doktor USM di Kelantan, ribuan rakyat Malaysia menggunakan Modafinil untuk kekal tajam di saat yang paling penting.";
?>
<section class="section-padding bg-stone-50" data-testid="malaysia-identity">
    <div class="container-custom">
        <div class="text-center mb-12">
            <span class="inline-block bg-primary-soft text-primary-dark text-xs font-bold uppercase tracking-widest px-3 py-1.5 rounded-full mb-4">
                <?= modmy_t($tag_en, $tag_ms) ?>
            </span>
            <h2 class="font-heading text-2xl md:text-4xl font-black text-ink mb-3">
                <?= modmy_t($heading_en, $heading_ms) ?>
            </h2>
            <p class="text-muted-foreground max-w-2xl mx-auto">
                <?= modmy_t($desc_en, $desc_ms) ?>
            </p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <?php if(have_rows('audiences')): ?>
                <?php while(have_rows('audiences')): the_row(); ?>
                <div class="bg-white border border-stone-200 rounded-xl p-6 hover:border-primary hover:shadow-md transition-all">
                    <div class="w-12 h-12 rounded-xl bg-primary-softer text-primary-dark flex items-center justify-center mb-4">
                        <?= get_sub_field('icon_svg') ?>
                    </div>
                    <h3 class="font-heading font-bold text-ink mb-2">
                        <?= modmy_t(get_sub_field('title_en'), get_sub_field('title_ms')) ?>
                    </h3>
                    <p class="text-sm text-muted-foreground leading-relaxed">
                        <?= modmy_t(get_sub_field('desc_en'), get_sub_field('desc_ms')) ?>
                    </p>
                </div>
                <?php endwhile; ?>
            <?php else: ?>
                <!-- Default audiences fallback -->
                <div class="bg-white border border-stone-200 rounded-xl p-6 hover:border-primary-soft hover:shadow-md transition-all">
                    <div class="w-12 h-12 rounded-xl bg-primary-softer text-primary-dark flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" /></svg>
                    </div>
                    <h3 class="font-heading font-bold text-ink mb-2"><?= modmy_t("University Students", "Pelajar Universiti") ?></h3>
                    <p class="text-sm text-muted-foreground leading-relaxed">
                        <?= modmy_t("Exams, thesis, and final assignments. UM, UTM, UiTM, Sunway, Monash — get the focus you need without burnout.", "Peperiksaan, tesis, dan tugasan akhir. UM, UTM, UiTM, Sunway, Monash — dapatkan fokus yang diperlukan tanpa burnout.") ?>
                    </p>
                </div>
                <!-- Adding more is tedious, we rely on ACF fields normally -->
            <?php endif; ?>
        </div>
    </div>
</section>
