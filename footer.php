<?php
/**
 * The template for displaying the footer
 *
 * @package Romonet_WPStorm
 */
?>

<footer class="bg-[#06070a] border-t border-white/10 text-neutral-400 text-sm transition-colors duration-300" xyz-data="romonetFooter()">
  
  <!-- Value Propositions Banner -->
  <?php get_template_part('template-parts/footer/value', 'props'); ?>

  <!-- Main Footer Content -->
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
    <?php get_template_part('template-parts/footer/main', 'links'); ?>
    <?php get_template_part('template-parts/footer/bottom', 'bar'); ?>
  </div>
  
</footer>

<!-- Toast Notification Component -->
<?php get_template_part('template-parts/footer/toast'); ?>

<?php wp_footer(); ?>
</body>
</html>