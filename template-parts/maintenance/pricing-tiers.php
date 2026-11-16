<?php
/**
 * Maintenance Pricing Tiers section
 *
 * @package Romonet_WPStorm
 */
?>
<section id="plans" class="rm-band-surface scroll-mt-24">
	<div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-24">
		<div class="flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
			<div class="max-w-2xl">
				<p class="rm-text-gold inline-flex items-center gap-2 text-xs font-semibold sm:text-sm">
					<span class="h-px w-6" style="background-color: var(--accent-gold);" aria-hidden="true"></span>
					<span>سطح همکاری</span>
				</p>
				<h2 class="rm-text-primary mt-3 text-3xl font-bold sm:text-4xl">پلن‌های پشتیبانی سایت رومونت</h2>
			</div>
			<p class="rm-text-secondary max-w-md text-sm leading-7">
				قیمت نهایی و محدوده خدمات پس از بررسی سایت و توافق بر جزئیات قرارداد مشخص می‌شود.
			</p>
		</div>

		<div class="mt-12 grid gap-6 lg:grid-cols-3 lg:items-stretch">
			<?php
			$plans = array(
				array(
					'title' => 'پشتیبانی پایه',
					'for'   => 'برای سایت‌های کوچک که به نگهداری دوره‌ای نیاز دارند.',
					'items' => array( 'بررسی دوره‌ای وضعیت سایت', 'به‌روزرسانی کنترل‌شده وردپرس', 'به‌روزرسانی قالب و افزونه‌ها', 'بررسی اولیه خطاها و بکاپ' ),
				),
				array(
					'title'    => 'پشتیبانی حرفه‌ای',
					'for'      => 'برای سایت‌های کسب‌وکاری که به رسیدگی منظم‌تر نیاز دارند.',
					'items'    => array( 'تمام خدمات پلن پایه', 'بررسی منظم‌تر عملکرد سایت', 'رسیدگی به مشکلات فنی بیشتر', 'بررسی امنیت و تغییرات جزئی توافق‌شده' ),
					'featured' => true,
				),
				array(
					'title' => 'پشتیبانی اختصاصی',
					'for'   => 'برای سایت‌های پیچیده و فروشگاه‌هایی با نیازهای اختصاصی.',
					'items' => array( 'بررسی کامل نیازهای فنی', 'برنامه نگهداری متناسب با ساختار سایت', 'پشتیبانی فنی اختصاصی', 'تعیین سطح پاسخ‌گویی و توسعه در قرارداد' ),
				),
			);
			foreach ( $plans as $plan ) :
				$is_featured = ! empty( $plan['featured'] );
			?>
				<article class="<?php echo $is_featured ? 'rm-card-featured relative' : 'rm-card rm-card-interactive'; ?> flex flex-col justify-between rounded-2xl p-6 sm:p-8">
					<div>
						<div class="flex min-h-7 items-center justify-between gap-3">
							<?php if ( $is_featured ) : ?>
								<span class="rm-pill-gold rounded-full px-3 py-1 text-xs font-semibold">برای بسیاری از سایت‌های کسب‌وکاری</span>
							<?php else : ?>
								<span class="rm-text-muted text-xs font-medium">پلن نگهداری</span>
							<?php endif; ?>
						</div>

						<h3 class="rm-text-primary mt-4 text-2xl font-bold"><?php echo esc_html( $plan['title'] ); ?></h3>
						<p class="rm-text-secondary mt-3 min-h-14 text-sm leading-7"><?php echo esc_html( $plan['for'] ); ?></p>

						<div class="mt-5 flex items-center justify-between rounded-xl border rm-border-subtle px-4 py-3" style="background-color: var(--rm-band-alt);">
							<span class="rm-text-muted text-xs">تعرفه</span>
							<span class="rm-text-gold text-base font-bold">استعلام قیمت</span>
						</div>

						<ul class="mt-6 space-y-3 border-t rm-border-subtle pt-6 text-sm">
							<?php foreach ( $plan['items'] as $item ) : ?>
								<li class="rm-text-secondary flex items-start gap-2.5">
									<span class="rm-text-gold mt-0.5 font-bold" aria-hidden="true">✓</span>
									<span><?php echo esc_html( $item ); ?></span>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>

					<a href="#inquiry" class="mt-8 inline-flex min-h-12 w-full items-center justify-center rounded-xl text-sm font-bold <?php echo $is_featured ? 'rm-btn-primary' : 'rm-btn-secondary'; ?>">
						<?php echo esc_html( $plan['title'] === 'پشتیبانی اختصاصی' ? 'درخواست پلن اختصاصی' : 'استعلام قیمت ' . $plan['title'] ); ?>
					</a>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>