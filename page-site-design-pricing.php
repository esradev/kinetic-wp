<?php
/**
 * Template Name: تعرفه‌های طراحی سایت اختصاصی
 * Template Post Type: page
 *
 * @package Romonet_WPStorm
 */

get_header();
?>

<style>
	/* Scoped theme-aware design tokens & surface styles (Dark + html.light compatible) */
	.rm-pricing-page {
		overflow-x: clip;
		background-color: var(--bg-main);
		color: var(--text-primary);
		--rm-band-alt: rgba(255, 255, 255, 0.02);
		--rm-surface-glass: linear-gradient(180deg, rgba(255, 255, 255, 0.035) 0%, rgba(255, 255, 255, 0.012) 100%);
		--rm-card-shadow: 0 20px 45px -26px rgba(0, 0, 0, 0.75);
		--rm-input-bg: rgba(0, 0, 0, 0.28);
		--rm-input-focus-ring: rgba(245, 158, 11, 0.2);
		--rm-gold-soft: rgba(245, 158, 11, 0.1);
		--rm-gold-tint: rgba(245, 158, 11, 0.065);
		--rm-emerald-soft: rgba(16, 185, 129, 0.12);
		--rm-btn-primary-text: #08090d;
		--rm-btn-secondary-bg: rgba(255, 255, 255, 0.03);
		--rm-btn-secondary-hover: rgba(255, 255, 255, 0.07);
	}

	html.light .rm-pricing-page {
		--rm-band-alt: rgba(15, 23, 42, 0.03);
		--rm-surface-glass: linear-gradient(180deg, rgba(255, 255, 255, 0.96) 0%, rgba(255, 255, 255, 0.84) 100%);
		--rm-card-shadow: 0 18px 38px -22px rgba(15, 23, 42, 0.12);
		--rm-input-bg: #ffffff;
		--rm-input-focus-ring: rgba(217, 119, 6, 0.18);
		--rm-gold-soft: rgba(217, 119, 6, 0.12);
		--rm-gold-tint: rgba(217, 119, 6, 0.07);
		--rm-emerald-soft: rgba(5, 150, 105, 0.1);
		--rm-btn-primary-text: #0f172a;
		--rm-btn-secondary-bg: rgba(255, 255, 255, 0.78);
		--rm-btn-secondary-hover: #ffffff;
	}

	.rm-pricing-page .rm-grid-bg {
		background-image:
			linear-gradient(to left, var(--grid-line) 1px, transparent 1px),
			linear-gradient(to bottom, var(--grid-line) 1px, transparent 1px);
		background-size: 52px 52px;
		mask-image: radial-gradient(ellipse 85% 75% at 50% 20%, #000 35%, transparent 100%);
		-webkit-mask-image: radial-gradient(ellipse 85% 75% at 50% 20%, #000 35%, transparent 100%);
	}

	.rm-pricing-page .rm-band-surface {
		background-color: var(--rm-band-alt);
		border-top: 1px solid var(--border-subtle);
		border-bottom: 1px solid var(--border-subtle);
	}

	.rm-pricing-page .rm-card {
		background-color: var(--bg-card);
		background-image: var(--rm-surface-glass);
		border: 1px solid var(--border-subtle);
		transition: background-color 0.25s ease, border-color 0.25s ease, transform 0.25s ease, box-shadow 0.25s ease;
	}

	.rm-pricing-page .rm-card-interactive:hover {
		background-color: var(--bg-card-hover);
		border-color: var(--border-glow);
		box-shadow: var(--rm-card-shadow);
	}

	.rm-pricing-page .rm-card-featured {
		background-color: var(--bg-card);
		background-image: radial-gradient(120% 90% at 50% 0%, var(--rm-gold-soft) 0%, transparent 60%);
		border: 1px solid var(--border-glow);
		box-shadow: var(--rm-card-shadow);
	}

	.rm-pricing-page .rm-cta-banner {
		background-color: var(--bg-card);
		background-image: radial-gradient(100% 100% at 50% 0%, var(--rm-gold-soft) 0%, transparent 65%);
		border: 1px solid var(--border-glow);
		box-shadow: var(--rm-card-shadow);
	}

	.rm-pricing-page .rm-text-primary { color: var(--text-primary); }
	.rm-pricing-page .rm-text-secondary { color: var(--text-secondary); }
	.rm-pricing-page .rm-text-muted { color: var(--text-muted); }
	.rm-pricing-page .rm-text-gold { color: var(--accent-gold); }
	.rm-pricing-page .rm-text-emerald { color: var(--accent-emerald); }
	.rm-pricing-page .rm-border-subtle { border-color: var(--border-subtle); }

	.rm-pricing-page .rm-pill-gold {
		background-color: var(--rm-gold-soft);
		border: 1px solid var(--border-glow);
		color: var(--accent-gold);
	}

	.rm-pricing-page .rm-btn-primary {
		background-color: var(--accent-gold);
		color: var(--rm-btn-primary-text);
		transition: filter 0.2s ease, transform 0.2s ease, opacity 0.2s ease;
	}
	.rm-pricing-page .rm-btn-primary:hover {
		filter: brightness(1.06);
	}
	.rm-pricing-page .rm-btn-primary:focus-visible {
		outline: 2px solid var(--accent-gold);
		outline-offset: 3px;
	}

	.rm-pricing-page .rm-btn-secondary {
		background-color: var(--rm-btn-secondary-bg);
		border: 1px solid var(--border-subtle);
		color: var(--text-primary);
		transition: background-color 0.2s ease, border-color 0.2s ease, color 0.2s ease;
	}
	.rm-pricing-page .rm-btn-secondary:hover {
		background-color: var(--rm-btn-secondary-hover);
		border-color: var(--border-glow);
		color: var(--accent-gold);
	}

	.rm-pricing-page .rm-input {
		background-color: var(--rm-input-bg);
		border: 1px solid var(--border-subtle);
		color: var(--text-primary);
		transition: border-color 0.2s ease, box-shadow 0.2s ease, background-color 0.2s ease;
	}
	.rm-pricing-page .rm-input::placeholder {
		color: var(--text-muted);
	}
	.rm-pricing-page .rm-input:focus {
		outline: none;
		border-color: var(--accent-gold);
		box-shadow: 0 0 0 3px var(--rm-input-focus-ring);
	}
	.rm-pricing-page select.rm-input {
		background-color: var(--bg-card);
	}
	.rm-pricing-page select.rm-input option {
		background-color: var(--bg-card);
		color: var(--text-primary);
	}

	.rm-pricing-page .rm-faq-item {
		border-bottom: 1px solid var(--border-subtle);
	}
	.rm-pricing-page .rm-faq-item[open] .rm-faq-question {
		color: var(--accent-gold);
	}

	@media (prefers-reduced-motion: reduce) {
		.rm-pricing-page *,
		.rm-pricing-page *::before,
		.rm-pricing-page *::after {
			animation-duration: 0.01ms !important;
			animation-iteration-count: 1 !important;
			transition-duration: 0.01ms !important;
			scroll-behavior: auto !important;
		}
	}
</style>

<main class="rm-pricing-page min-h-screen pb-20 antialiased" dir="rtl" xyz-data="romonetDesignPricing()">

	<?php get_template_part( 'template-parts/pricing/design', 'hero' ); ?>
	<?php get_template_part( 'template-parts/pricing/design', 'content' ); ?>
	<?php get_template_part( 'template-parts/pricing/design', 'packages' ); ?>
	<?php get_template_part( 'template-parts/pricing/design', 'estimator' ); ?>
	<?php get_template_part( 'template-parts/pricing/design', 'roadmap' ); ?>

</main>

<?php get_footer(); ?>