<?php
/**
 * The template for displaying the Front Page / Home Page
 *
 * @package Romonet_WPStorm
 */

get_header();
?>

<main class="romonet-home min-h-screen pb-20" dir="rtl">

    <!-- 1. Hero Section -->
    <?php get_template_part( 'template-parts/front-page/hero' ); ?>

    <!-- 2. Services -->
    <?php get_template_part( 'template-parts/front-page/pillars' ); ?>

    <!-- 3. Why Romonet -->
    <?php get_template_part( 'template-parts/front-page/why' ); ?>

    <!-- 4. Workflow -->
    <?php get_template_part( 'template-parts/front-page/workflow' ); ?>

    <!-- 5. Selected projects -->
    <?php get_template_part( 'template-parts/front-page/projects' ); ?>

    <!-- 6. Final CTA -->
    <?php get_template_part( 'template-parts/front-page/bottom-cta' ); ?>

</main>

<?php get_footer(); ?>