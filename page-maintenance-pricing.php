<?php
/**
 * Template Name: تعرفه‌های پشتیبانی و نگهداری وردپرس
 * Template Post Type: page
 *
 * @package Romonet_WPStorm
 */

get_header();
?>

<main class="min-h-screen pb-24 pt-8 space-y-20" dir="rtl" xyz-data="romonetMaintenancePricing()">

    <!-- 1. Header Hero & Billing Toggle -->
    <?php get_template_part('template-parts/maintenance/hero'); ?>

    <!-- 2. Three Main Pricing Tiers -->
    <?php get_template_part('template-parts/maintenance/pricing', 'tiers'); ?>

    <!-- 3. Custom Maintenance Scope Estimator -->
    <?php get_template_part('template-parts/maintenance/estimator'); ?>

    <!-- 4. Security Protocols Breakdown -->
    <?php get_template_part('template-parts/maintenance/security', 'protocols'); ?>

</main>

<?php get_footer(); ?>