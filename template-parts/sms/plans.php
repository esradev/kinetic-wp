<?php
/**
 * SMS & OTP Pricing Plans section
 *
 * @package Romonet_WPStorm
 */

$plans = romonet_sms_pricing_plans();
?>
<section id="sms-plans" class="mx-auto max-w-7xl scroll-mt-24 px-4 py-20 sm:px-6 lg:px-8 lg:py-24">
	<div class="mx-auto max-w-2xl text-center">
		<span class="rm-pill-gold inline-flex items-center gap-2 rounded-full px-3.5 py-1 text-xs font-semibold">
			اشتراک ماهانه پنل پیامکی
		</span>
		<h2 class="rm-text-primary mt-4 text-3xl font-bold leading-snug sm:text-4xl">
			پلن مناسب کسب‌وکارتان را انتخاب کنید
		</h2>
		<p class="rm-text-secondary mt-4 text-sm leading-8 sm:text-base">
			هر پلن برای سطح مشخصی از مدیریت سایت، کاربر و اتصال پنل پیامکی طراحی شده است.
		</p>
	</div>

	<div class="mt-14 grid gap-6 lg:grid-cols-3 lg:items-stretch">
		<?php foreach ( $plans as $plan ) : ?>
			<?php $is_featured = ! empty( $plan['featured'] ); ?>
			<article class="<?php echo $is_featured ? 'rm-card-featured relative' : 'rm-card rm-card-interactive'; ?> flex flex-col justify-between rounded-2xl p-6 sm:p-8">
				<?php if ( $is_featured ) : ?>
					<span class="rm-btn-primary absolute -top-3.5 right-6 rounded-full px-3.5 py-1 text-xs font-bold shadow-sm">
						پیشنهاد رومونت
					</span>
				<?php endif; ?>

				<div>
					<h3 class="rm-text-primary text-2xl font-bold"><?php echo esc_html( $plan['name'] ); ?></h3>
					<p class="rm-text-secondary mt-3 min-h-14 text-sm leading-7"><?php echo esc_html( $plan['description'] ); ?></p>

					<div class="mt-6 flex items-baseline gap-2 rounded-xl border rm-border-subtle px-4 py-4" style="background-color: var(--rm-band-alt);">
						<span class="rm-text-primary text-3xl font-extrabold tracking-tight"><?php echo esc_html( $plan['price'] ); ?></span>
						<span class="rm-text-muted text-xs font-medium sm:text-sm">تومان / ماه</span>
					</div>

					<ul class="mt-7 space-y-3 border-t rm-border-subtle pt-6">
						<?php foreach ( $plan['features'] as $feature ) : ?>
							<li class="rm-text-secondary flex items-start gap-2.5 text-sm leading-7">
								<span class="rm-text-gold mt-0.5 font-bold" aria-hidden="true">✓</span>
								<span><?php echo esc_html( $feature ); ?></span>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>

				<a href="#sms-start" data-plan-id="<?php echo esc_attr( $plan['id'] ); ?>" class="mt-8 inline-flex min-h-12 w-full items-center justify-center rounded-xl px-5 text-sm font-bold <?php echo $is_featured ? 'rm-btn-primary' : 'rm-btn-secondary'; ?>">
					<?php echo esc_html( $plan['cta'] ); ?>
				</a>
			</article>
		<?php endforeach; ?>
	</div>
</section>