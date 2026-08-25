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

    <!-- 1. Header Hero -->
    <?php get_template_part('template-parts/pricing/design', 'hero'); ?>

    <!-- 2. Core Design Packages -->
    <?php get_template_part('template-parts/pricing/design', 'packages'); ?>

    <!-- 3. Interactive Scope & Sprint Estimator -->
    <?php get_template_part('template-parts/pricing/design', 'estimator'); ?>

    <!-- 4. 5-Phase Sprint Roadmap -->
    <?php get_template_part('template-parts/pricing/design', 'roadmap'); ?>

</main>

<?php get_footer(); ?>