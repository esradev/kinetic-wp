<?php
/**
 * Design Pricing Packages section
 *
 * @package Romonet_WPStorm
 */
?>
<section id="packages" class="rm-band-surface scroll-mt-24">
	<div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-24">
		<div class="flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
			<div class="max-w-2xl">
				<p class="rm-text-gold inline-flex items-center gap-2 text-xs font-semibold sm:text-sm">
					<span class="h-px w-6" style="background-color: var(--accent-gold);" aria-hidden="true"></span>
					<span>سطح همکاری</span>
				</p>
				<h2 class="rm-text-primary mt-3 text-3xl font-bold sm:text-4xl">پکیج‌های طراحی سایت رومونت</h2>
			</div>
			<p class="rm-text-secondary max-w-md text-sm leading-7">
				این دسته‌بندی‌ها برای شروع گفتگو هستند؛ محدوده و قیمت نهایی پس از بررسی نیازهای پروژه مشخص می‌شود.
			</p>
		</div>

		<div class="mt-12 grid gap-6 lg:grid-cols-3 lg:items-stretch">
			<?php
			$packages = array(
				array(
					'title' => 'پکیج شروع',
					'for'   => 'برای کسب‌وکارهای کوچک و متخصصانی که به حضور آنلاین ساده نیاز دارند.',
					'items' => array( 'صفحات ضروری وب‌سایت', 'طراحی واکنش‌گرا', 'فرم تماس پایه', 'تنظیمات اولیه سئو و راه‌اندازی' ),
				),
				array(
					'title'    => 'پکیج حرفه‌ای',
					'for'      => 'برای کسب‌وکارهایی که به ساختاری کامل‌تر و منسجم‌تر نیاز دارند.',
					'items'    => array( 'ساختار کامل‌تر صفحات', 'طراحی بصری دقیق‌تر', 'بخش وبلاگ و محتوا', 'امکانات تکمیلی و سازمان‌دهی محتوا' ),
					'featured' => true,
				),
				array(
					'title' => 'پکیج اختصاصی',
					'for'   => 'برای کسب‌وکارهایی با نیازهای تخصصی و فرایندهای سفارشی.',
					'items' => array( 'تحلیل نیازمندی‌ها', 'طراحی UI/UX اختصاصی', 'قابلیت‌ها و توسعه سفارشی', 'اتصال API و تست متناسب با پروژه' ),
				),
			);
			foreach ( $packages as $package ) :
				$is_featured = ! empty( $package['featured'] );
			?>
				<article class="<?php echo $is_featured ? 'rm-card-featured relative' : 'rm-card rm-card-interactive'; ?> flex flex-col justify-between rounded-2xl p-6 sm:p-8">
					<div>
						<div class="flex min-h-7 items-center justify-between gap-3">
							<?php if ( $is_featured ) : ?>
								<span class="rm-pill-gold rounded-full px-3 py-1 text-xs font-semibold">انتخاب متداول‌تر</span>
							<?php else : ?>
								<span class="rm-text-muted text-xs font-medium">سطح همکاری</span>
							<?php endif; ?>
						</div>

						<h3 class="rm-text-primary mt-4 text-2xl font-bold"><?php echo esc_html( $package['title'] ); ?></h3>
						<p class="rm-text-secondary mt-3 min-h-14 text-sm leading-7"><?php echo esc_html( $package['for'] ); ?></p>

						<ul class="mt-6 space-y-3 border-t rm-border-subtle pt-6 text-sm">
							<?php foreach ( $package['items'] as $item ) : ?>
								<li class="rm-text-secondary flex items-start gap-2.5">
									<span class="rm-text-gold mt-0.5 font-bold" aria-hidden="true">✓</span>
									<span><?php echo esc_html( $item ); ?></span>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>

					<a href="#inquiry" class="mt-8 inline-flex min-h-12 w-full items-center justify-center rounded-xl text-sm font-bold <?php echo $is_featured ? 'rm-btn-primary' : 'rm-btn-secondary'; ?>">
						درخواست بررسی <?php echo esc_html( $package['title'] ); ?>
					</a>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>