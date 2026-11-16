<?php
$navigation = romonet_global_navigation();
?>
<div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
	<div class="grid gap-10 md:grid-cols-2 lg:grid-cols-[1.35fr_1fr_1fr_1fr]">
		<div>
			<a href="<?php echo esc_url( $navigation['home'] ); ?>" class="inline-flex items-center gap-3" aria-label="رومونت، صفحه اصلی">
				<span class="flex h-10 w-10 items-center justify-center rounded-xl text-xl font-black" style="background-color: var(--accent-gold, #f59e0b); color: var(--rm-gold-ink);">R</span>
				<span class="text-lg font-bold" style="color: var(--text-primary, #ffffff);">رومونت<span style="color: var(--accent-gold, #fbbf24);">.ir</span></span>
			</a>
			<p class="mt-5 max-w-sm text-sm leading-8" style="color: var(--text-secondary, #9ca3af);">رومونت ارائه‌دهنده خدمات طراحی سایت، توسعه وردپرس، طراحی فروشگاه اینترنتی و راهکارهای دیجیتال برای کسب‌وکارهاست.</p>
			<div class="mt-6">
				<a href="<?php echo esc_url( $navigation['consultation'] ); ?>" class="rm-header-cta inline-flex min-h-10 items-center rounded-xl px-5 text-xs font-bold">درخواست مشاوره</a>
			</div>
		</div>

		<nav aria-label="خدمات رومونت">
			<h2 class="font-bold" style="color: var(--text-primary, #ffffff);">خدمات رومونت</h2>
			<ul class="mt-5 space-y-3 text-sm">
				<?php foreach ( $navigation['service_items'] as $item ) : ?>
					<li><a href="<?php echo esc_url( $item['url'] ); ?>" class="transition hover:text-[var(--accent-gold)]" style="color: var(--text-secondary, #9ca3af);"><?php echo esc_html( $item['label'] ); ?></a></li>
				<?php endforeach; ?>
			</ul>
		</nav>

		<nav aria-label="تعرفه‌ها و دسترسی سریع">
			<h2 class="font-bold" style="color: var(--text-primary, #ffffff);">تعرفه‌ها و دسترسی سریع</h2>
			<ul class="mt-5 space-y-3 text-sm">
				<?php foreach ( $navigation['pricing_items'] as $item ) : ?>
					<li><a href="<?php echo esc_url( $item['url'] ); ?>" class="transition hover:text-[var(--accent-gold)]" style="color: var(--text-secondary, #9ca3af);"><?php echo esc_html( $item['label'] ); ?></a></li>
				<?php endforeach; ?>
				<li><a href="<?php echo esc_url( $navigation['home'] ); ?>" class="transition hover:text-[var(--accent-gold)]" style="color: var(--text-secondary, #9ca3af);">صفحه اصلی</a></li>
				<li><a href="<?php echo esc_url( $navigation['portfolio'] ); ?>" class="transition hover:text-[var(--accent-gold)]" style="color: var(--text-secondary, #9ca3af);">نمونه‌کارها</a></li>
				<li><a href="<?php echo esc_url( $navigation['articles'] ); ?>" class="transition hover:text-[var(--accent-gold)]" style="color: var(--text-secondary, #9ca3af);">مقالات آموزشی</a></li>
				<li><a href="<?php echo esc_url( $navigation['about'] ); ?>" class="transition hover:text-[var(--accent-gold)]" style="color: var(--text-secondary, #9ca3af);">درباره ما</a></li>
			</ul>
		</nav>

		<div>
			<h2 class="font-bold" style="color: var(--text-primary, #ffffff);">ارتباط با رومونت</h2>
			<ul class="mt-5 space-y-3 text-sm">
				<li>
					<a href="tel:+989155772051" class="rm-header-control flex items-center justify-between rounded-xl px-3.5 py-2.5">
						<span class="text-xs" style="color: var(--text-muted, #6b7280);">تلفن</span>
						<span dir="ltr" class="font-semibold" style="color: var(--text-primary, #ffffff);">09155772051</span>
					</a>
				</li>
				<li>
					<a href="mailto:info@romonet.ir" class="rm-header-control flex items-center justify-between rounded-xl px-3.5 py-2.5">
						<span class="text-xs" style="color: var(--text-muted, #6b7280);">ایمیل</span>
						<span dir="ltr" class="font-semibold" style="color: var(--text-primary, #ffffff);">info@romonet.ir</span>
					</a>
				</li>
				<li>
					<a href="<?php echo esc_url( $navigation['contact'] ); ?>" class="rm-header-control flex items-center justify-between rounded-xl px-3.5 py-2.5">
						<span class="text-xs font-semibold" style="color: var(--text-primary, #ffffff);">تماس با ما</span>
						<span style="color: var(--accent-gold, #fbbf24);" aria-hidden="true">←</span>
					</a>
				</li>
			</ul>
		</div>
	</div>

	<div class="mt-12 flex flex-col gap-3 border-t pt-6 text-xs sm:flex-row sm:items-center sm:justify-between" style="border-color: var(--border-subtle, rgba(255, 255, 255, 0.1)); color: var(--text-muted, #6b7280);">
		<p>تمام حقوق این وب‌سایت متعلق به رومونت است. © <?php echo esc_html( date_i18n( 'Y' ) ); ?></p>
		<a href="<?php echo esc_url( $navigation['consultation'] ); ?>" class="transition hover:text-[var(--accent-gold)]" style="color: var(--text-secondary, #9ca3af);">درخواست مشاوره</a>
	</div>
</div>