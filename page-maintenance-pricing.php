<?php
/**
 * Template Name: تعرفه‌های پشتیبانی و نگهداری وردپرس
 * Template Post Type: page
 *
 * @package Romonet_WPStorm
 */

get_header();
?>

<main class="min-h-screen pb-24" dir="rtl" xyz-data="romonetMaintenancePricing()">

    <?php get_template_part( 'template-parts/maintenance/hero' ); ?>
    <?php get_template_part( 'template-parts/maintenance/content' ); ?>
    <?php get_template_part( 'template-parts/maintenance/pricing', 'tiers' ); ?>
    <?php get_template_part( 'template-parts/maintenance/security', 'protocols' ); ?>
    <?php get_template_part( 'template-parts/maintenance/estimator' ); ?>
    <?php get_template_part( 'template-parts/maintenance/roadmap' ); ?>

</main>

<?php get_footer(); ?>