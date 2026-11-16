<?php
/**
 * The template for displaying the footer
 *
 * @package Romonet_WPStorm
 */
?>

<footer class="rm-site-footer text-sm">
	<?php get_template_part( 'template-parts/footer/minimal' ); ?>
</footer>

<!-- Toast Notification Component -->
<?php get_template_part( 'template-parts/footer/toast' ); ?>

<?php wp_footer(); ?>
</body>
</html>