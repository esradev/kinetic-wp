<?php
/**
 * The template for displaying the Front Page / Home Page
 *
 * @package Romonet_WPStorm
 */

get_header();
?>

<style>
	/* Scoped architectural surface & motion refinements for Romonet front page */
	.romonet-home {
		overflow-x: clip;
		background-color: #08090d;
		color: #f8fafc;
	}
	.romonet-home .rm-hairline-grid {
		background-image:
			linear-gradient(to left, rgba(255, 255, 255, 0.035) 1px, transparent 1px),
			linear-gradient(to bottom, rgba(255, 255, 255, 0.035) 1px, transparent 1px);
		background-size: 56px 56px;
		mask-image: radial-gradient(ellipse 80% 70% at 50% 25%, #000 40%, transparent 100%);
		-webkit-mask-image: radial-gradient(ellipse 80% 70% at 50% 25%, #000 40%, transparent 100%);
	}
	.romonet-home .rm-surface-card {
		background: linear-gradient(180deg, rgba(255, 255, 255, 0.038) 0%, rgba(255, 255, 255, 0.014) 100%);
		box-shadow: inset 0 1px 0 0 rgba(255, 255, 255, 0.06);
	}
	.romonet-home .rm-surface-card:hover {
		background: linear-gradient(180deg, rgba(245, 158, 11, 0.065) 0%, rgba(255, 255, 255, 0.02) 100%);
		box-shadow:
			inset 0 1px 0 0 rgba(251, 191, 36, 0.22),
			0 20px 40px -24px rgba(0, 0, 0, 0.75);
	}
	.romonet-home .rm-blueprint-panel {
		background:
			radial-gradient(120% 90% at 0% 0%, rgba(245, 158, 11, 0.09) 0%, transparent 55%),
			linear-gradient(180deg, rgba(17, 20, 29, 0.92) 0%, rgba(10, 12, 18, 0.96) 100%);
		box-shadow:
			inset 0 1px 0 0 rgba(255, 255, 255, 0.08),
			0 28px 60px -30px rgba(0, 0, 0, 0.85);
	}
	.light .romonet-home {
		background-color: #f8fafc;
		color: #0f172a;
	}
	.light .romonet-home .rm-hairline-grid {
		background-image:
			linear-gradient(to left, rgba(15, 23, 42, 0.08) 1px, transparent 1px),
			linear-gradient(to bottom, rgba(15, 23, 42, 0.08) 1px, transparent 1px);
	}
	.light .romonet-home .rm-surface-card {
		background: linear-gradient(180deg, rgba(255, 255, 255, 0.96) 0%, rgba(241, 245, 249, 0.9) 100%);
		box-shadow: inset 0 1px 0 0 rgba(255, 255, 255, 0.9), 0 12px 30px -24px rgba(15, 23, 42, 0.45);
	}
	.light .romonet-home .rm-surface-card:hover {
		background: linear-gradient(180deg, rgba(255, 251, 235, 0.98) 0%, rgba(255, 247, 237, 0.94) 100%);
		box-shadow:
			inset 0 1px 0 0 rgba(217, 119, 6, 0.25),
			0 20px 40px -24px rgba(15, 23, 42, 0.3);
	}
	.light .romonet-home .rm-blueprint-panel {
		background:
			radial-gradient(120% 90% at 0% 0%, rgba(245, 158, 11, 0.12) 0%, transparent 55%),
			linear-gradient(180deg, rgba(255, 255, 255, 0.98) 0%, rgba(241, 245, 249, 0.96) 100%);
		box-shadow:
			inset 0 1px 0 0 rgba(255, 255, 255, 0.95),
			0 28px 60px -30px rgba(15, 23, 42, 0.3);
	}
	.light .romonet-home [class*="bg-white/"] {
		background-color: rgba(15, 23, 42, 0.035) !important;
	}
	.light .romonet-home [class*="border-white/"] {
		border-color: rgba(15, 23, 42, 0.12) !important;
	}
	.light .romonet-home [class*="text-white/"] {
		color: rgba(71, 85, 105, 0.75) !important;
	}
	.light .romonet-home .bg-\[\#0b0d13\] {
		background-color: #eef2f7 !important;
	}
	.light .romonet-home .bg-\[\#08090d\] {
		background-color: #ffffff !important;
	}
	.light .romonet-home [class*="focus:ring-offset-[#08090d]"] {
		--tw-ring-offset-color: #f8fafc;
	}
	@media (prefers-reduced-motion: reduce) {
		.romonet-home *,
		.romonet-home *::before,
		.romonet-home *::after {
			animation-duration: 0.01ms !important;
			animation-iteration-count: 1 !important;
			transition-duration: 0.01ms !important;
			scroll-behavior: auto !important;
		}
	}
</style>

<main class="romonet-home min-h-screen antialiased selection:bg-amber-400/25 selection:text-amber-200" dir="rtl">

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