<?php
/**
 * Template Name: تعرفه‌های سامانه پیامک و OTP رومونت
 * Template Post Type: page
 *
 * @package Romonet_WPStorm
 */

get_header();
?>

<main class="min-h-screen pb-24 pt-8 space-y-20" dir="rtl" xyz-data="romonetSmsPricing()">

    <!-- 1. Header Hero -->
    <?php get_template_part('template-parts/sms/hero'); ?>

    <!-- 2. Monthly Recurring Plans -->
    <?php get_template_part('template-parts/sms/monthly', 'plans'); ?>

    <!-- 3. Interactive Estimator & Country Rate Calculator -->
    <?php get_template_part('template-parts/sms/estimator'); ?>

    <!-- 4. Prepaid Pay-As-You-Go Credit Bundles -->
    <?php get_template_part('template-parts/sms/bundles'); ?>

    <!-- 5. Telco Infrastructure Guarantees -->
    <?php get_template_part('template-parts/sms/guarantees'); ?>

</main>

<?php get_footer(); ?>