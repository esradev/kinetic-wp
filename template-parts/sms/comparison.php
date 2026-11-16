<?php
/**
 * SMS & OTP Plans Feature Comparison Table
 *
 * @package Romonet_WPStorm
 */

$plans = romonet_sms_pricing_plans();
?>
<section id="sms-comparison" class="mx-auto max-w-7xl scroll-mt-24 px-4 py-20 sm:px-6 lg:px-8 lg:py-24">
	<div class="flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
		<div class="max-w-2xl">
			<p class="rm-text-gold inline-flex items-center gap-2 text-xs font-semibold sm:text-sm">
				<span class="h-px w-6" style="background-color: var(--accent-gold, #f59e0b);" aria-hidden="true"></span>
				<span>مقایسه شفاف</span>
			</p>
			<h2 class="rm-text-primary mt-3 text-3xl font-bold sm:text-4xl">مقایسه امکانات پلن‌ها</h2>
		</div>
		<a href="#sms-plans" class="rm-text-gold text-sm font-semibold transition hover:opacity-80">بازگشت به کارت پلن‌ها ↑</a>
	</div>

	<div class="rm-card mt-10 overflow-hidden rounded-2xl">
		<div class="overflow-x-auto">
			<table class="w-full min-w-[700px] border-collapse text-right text-sm">
				<thead>
					<tr class="border-b rm-border-subtle" style="background-color: var(--rm-band-alt);">
						<th class="rm-text-muted p-4 text-xs font-semibold">امکانات</th>
						<?php foreach ( $plans as $plan ) : ?>
							<th class="p-4 text-sm font-bold <?php echo ! empty( $plan['featured'] ) ? 'rm-text-gold' : 'rm-text-primary'; ?>">
								<?php echo esc_html( $plan['name'] ); ?>
							</th>
						<?php endforeach; ?>
					</tr>
				</thead>
				<tbody class="divide-y rm-border-subtle">
					<?php
					$rows = array(
						array( 'قیمت ماهانه', $plans[0]['price'] . ' تومان', $plans[1]['price'] . ' تومان', $plans[2]['price'] . ' تومان' ),
						array( 'وب‌سایت', '۱', 'حداکثر ۳', 'حداکثر ۱۰' ),
						array( 'حساب کاربری', '۱', '۳', '۱۰' ),
						array( 'اتصال پنل پیامکی', '۱', 'حداکثر ۳', 'حداکثر ۱۰' ),
						array( 'سوابق ارسال', 'بله', 'بله', 'بله' ),
						array( 'گزارش‌های پیشرفته', 'خیر', 'مطابق قابلیت واقعی محصول', 'بله، در صورت پشتیبانی محصول' ),
						array( 'دسترسی API', 'مطابق قابلیت واقعی محصول', 'مطابق قابلیت واقعی محصول', 'مطابق قابلیت واقعی محصول' ),
						array( 'اولویت پشتیبانی', 'عادی', 'بالاتر', 'سازمانی' ),
					);
					foreach ( $rows as $row ) :
					?>
						<tr class="rm-table-row-even align-top transition">
							<th class="rm-text-primary p-4 font-semibold"><?php echo esc_html( $row[0] ); ?></th>
							<?php foreach ( array_slice( $row, 1 ) as $col_idx => $value ) : ?>
								<td class="rm-text-secondary p-4 leading-7 <?php echo 1 === $col_idx ? 'font-medium' : ''; ?>">
									<?php echo esc_html( $value ); ?>
								</td>
							<?php endforeach; ?>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
	<p class="rm-text-muted mt-3 text-xs sm:hidden">برای مشاهده کامل ستون‌ها، جدول را به صورت افقی پیمایش کنید.</p>
</section>