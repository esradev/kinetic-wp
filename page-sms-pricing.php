<?php
/**
 * Template Name: تعرفه‌های سامانه پیامک و OTP رومونت
 * Template Post Type: page
 *
 * @package Romonet_WPStorm
 */

get_header();
?>

<style>
	/* Scoped theme-aware tokens & surface styles (Dark + html.light compatible) */
	.rm-sms-page {
		overflow-x: clip;
		background-color: var(--bg-main, #08090d);
		color: var(--text-primary, #f3f4f6);
		--rm-band-alt: rgba(255, 255, 255, 0.02);
		--rm-surface-glass: linear-gradient(180deg, rgba(255, 255, 255, 0.035) 0%, rgba(255, 255, 255, 0.012) 100%);
		--rm-card-shadow: 0 20px 45px -26px rgba(0, 0, 0, 0.75);
		--rm-gold-soft: rgba(245, 158, 11, 0.1);
		--rm-cyan-soft: rgba(6, 182, 212, 0.12);
		--rm-btn-primary-text: #08090d;
		--rm-btn-secondary-bg: rgba(255, 255, 255, 0.03);
		--rm-btn-secondary-hover: rgba(255, 255, 255, 0.07);
	}

	html.light .rm-sms-page {
		--rm-band-alt: rgba(15, 23, 42, 0.03);
		--rm-surface-glass: linear-gradient(180deg, rgba(255, 255, 255, 0.96) 0%, rgba(255, 255, 255, 0.84) 100%);
		--rm-card-shadow: 0 18px 38px -22px rgba(15, 23, 42, 0.12);
		--rm-gold-soft: rgba(217, 119, 6, 0.12);
		--rm-cyan-soft: rgba(2, 132, 199, 0.12);
		--rm-btn-primary-text: #0f172a;
		--rm-btn-secondary-bg: rgba(255, 255, 255, 0.78);
		--rm-btn-secondary-hover: #ffffff;
	}

	.rm-sms-page .rm-grid-bg {
		background-image:
			linear-gradient(to left, var(--grid-line, rgba(255, 255, 255, 0.035)) 1px, transparent 1px),
			linear-gradient(to bottom, var(--grid-line, rgba(255, 255, 255, 0.035)) 1px, transparent 1px);
		background-size: 52px 52px;
		mask-image: radial-gradient(ellipse 85% 75% at 50% 20%, #000 35%, transparent 100%);
		-webkit-mask-image: radial-gradient(ellipse 85% 75% at 50% 20%, #000 35%, transparent 100%);
	}

	.rm-sms-page .rm-band-surface {
		background-color: var(--rm-band-alt);
		border-top: 1px solid var(--border-subtle, rgba(255, 255, 255, 0.08));
		border-bottom: 1px solid var(--border-subtle, rgba(255, 255, 255, 0.08));
	}

	.rm-sms-page .rm-card {
		background-color: var(--bg-card, #11131c);
		background-image: var(--rm-surface-glass);
		border: 1px solid var(--border-subtle, rgba(255, 255, 255, 0.08));
		transition: background-color 0.25s ease, border-color 0.25s ease, transform 0.25s ease, box-shadow 0.25s ease;
	}

	.rm-sms-page .rm-card-interactive:hover {
		background-color: var(--bg-card-hover, #161a26);
		border-color: var(--border-glow, rgba(245, 158, 11, 0.25));
		box-shadow: var(--rm-card-shadow);
	}

	.rm-sms-page .rm-card-featured {
		background-color: var(--bg-card, #11131c);
		background-image: radial-gradient(120% 90% at 50% 0%, var(--rm-gold-soft) 0%, transparent 60%);
		border: 1px solid var(--border-glow, rgba(245, 158, 11, 0.35));
		box-shadow: var(--rm-card-shadow);
	}

	.rm-sms-page .rm-cta-banner {
		background-color: var(--bg-card, #11131c);
		background-image: radial-gradient(100% 100% at 50% 0%, var(--rm-gold-soft) 0%, transparent 65%);
		border: 1px solid var(--border-glow, rgba(245, 158, 11, 0.25));
		box-shadow: var(--rm-card-shadow);
	}

	.rm-sms-page .rm-text-primary { color: var(--text-primary, #f3f4f6); }
	.rm-sms-page .rm-text-secondary { color: var(--text-secondary, #9ca3af); }
	.rm-sms-page .rm-text-muted { color: var(--text-muted, #6b7280); }
	.rm-sms-page .rm-text-gold { color: var(--accent-gold, #f59e0b); }
	.rm-sms-page .rm-text-cyan { color: var(--accent-cyan, #06b6d4); }
	.rm-sms-page .rm-border-subtle { border-color: var(--border-subtle, rgba(255, 255, 255, 0.08)); }

	.rm-sms-page .rm-pill-gold {
		background-color: var(--rm-gold-soft);
		border: 1px solid var(--border-glow, rgba(245, 158, 11, 0.25));
		color: var(--accent-gold, #f59e0b);
	}

	.rm-sms-page .rm-btn-primary {
		background-color: var(--accent-gold, #f59e0b);
		color: var(--rm-btn-primary-text);
		transition: filter 0.2s ease, transform 0.2s ease;
	}
	.rm-sms-page .rm-btn-primary:hover {
		filter: brightness(1.06);
	}
	.rm-sms-page .rm-btn-primary:focus-visible {
		outline: 2px solid var(--accent-gold, #f59e0b);
		outline-offset: 3px;
	}

	.rm-sms-page .rm-btn-secondary {
		background-color: var(--rm-btn-secondary-bg);
		border: 1px solid var(--border-subtle, rgba(255, 255, 255, 0.08));
		color: var(--text-primary, #f3f4f6);
		transition: background-color 0.2s ease, border-color 0.2s ease, color 0.2s ease;
	}
	.rm-sms-page .rm-btn-secondary:hover {
		background-color: var(--rm-btn-secondary-hover);
		border-color: var(--border-glow, rgba(245, 158, 11, 0.25));
		color: var(--accent-gold, #f59e0b);
	}

	.rm-sms-page .rm-table-row-even:nth-child(even) {
		background-color: var(--rm-band-alt);
	}

	.rm-sms-page .rm-faq-item {
		border-bottom: 1px solid var(--border-subtle, rgba(255, 255, 255, 0.08));
	}
	.rm-sms-page .rm-faq-item[open] .rm-faq-question {
		color: var(--accent-gold, #f59e0b);
	}

	@media (prefers-reduced-motion: reduce) {
		.rm-sms-page *,
		.rm-sms-page *::before,
		.rm-sms-page *::after {
			animation-duration: 0.01ms !important;
			animation-iteration-count: 1 !important;
			transition-duration: 0.01ms !important;
			scroll-behavior: auto !important;
		}
	}
</style>

<main class="rm-sms-page min-h-screen pb-20 antialiased" dir="rtl">
	<?php get_template_part( 'template-parts/sms/hero' ); ?>
	<?php get_template_part( 'template-parts/sms/plans' ); ?>
	<?php get_template_part( 'template-parts/sms/details' ); ?>
	<?php get_template_part( 'template-parts/sms/comparison' ); ?>
	<?php get_template_part( 'template-parts/sms/workflow' ); ?>
	<?php get_template_part( 'template-parts/sms/faq' ); ?>
	<?php get_template_part( 'template-parts/sms/final', 'cta' ); ?>
</main>

<?php get_footer(); ?>