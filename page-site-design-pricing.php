<?php
/**
 * Template Name: تعرفه‌های طراحی سایت اختصاصی
 * Template Post Type: page
 *
 * @package Romonet_WPStorm
 */

get_header();
?>

<main class="min-h-screen pb-24 pt-8 space-y-20" dir="rtl" xyz-data="romonetDesignPricing()">

    <?php get_template_part( 'template-parts/pricing/design', 'hero' ); ?>
    <?php get_template_part( 'template-parts/pricing/design', 'content' ); ?>
    <?php get_template_part( 'template-parts/pricing/design', 'packages' ); ?>
    <?php get_template_part( 'template-parts/pricing/design', 'estimator' ); ?>
    <?php get_template_part( 'template-parts/pricing/design', 'roadmap' ); ?>

</main>

<?php get_footer(); ?>