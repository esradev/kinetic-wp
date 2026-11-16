<?php
/**
 * The template for displaying the footer
 *
 * @package Romonet_WPStorm
 */
?>

<footer class="border-t border-white/10 bg-[#06070a] text-sm text-neutral-400">
  <?php get_template_part( 'template-parts/footer/minimal' ); ?>
</footer>

<!-- Toast Notification Component -->
<?php get_template_part('template-parts/footer/toast'); ?>

<?php wp_footer(); ?>
</body>
</html>