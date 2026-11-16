<?php
/**
 * Template Name: تعرفه‌های سامانه پیامک و OTP رومونت
 * Template Post Type: page
 *
 * @package Romonet_WPStorm
 */

get_header();
?>

<main class="min-h-screen pb-24" dir="rtl">
    <?php get_template_part( 'template-parts/sms/hero' ); ?>
    <?php get_template_part( 'template-parts/sms/plans' ); ?>
    <?php get_template_part( 'template-parts/sms/details' ); ?>
    <?php get_template_part( 'template-parts/sms/comparison' ); ?>
    <?php get_template_part( 'template-parts/sms/workflow' ); ?>
    <?php get_template_part( 'template-parts/sms/faq' ); ?>
    <?php get_template_part( 'template-parts/sms/final', 'cta' ); ?>
</main>

<?php get_footer(); ?>