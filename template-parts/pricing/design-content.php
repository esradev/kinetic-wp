<?php
/**
 * Design Pricing Content sections (Short answer, Types, Factors, WP vs Custom)
 *
 * @package Romonet_WPStorm
 */
?>

<!-- 1. Short Answer -->
<section class="rm-band-surface">
	<div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
		<div class="grid gap-12 lg:grid-cols-12 lg:items-start">
			<div class="lg:col-span-5 lg:sticky lg:top-28">
				<p class="rm-text-gold inline-flex items-center gap-2 text-xs font-semibold sm:text-sm">
					<span class="h-px w-6" style="background-color: var(--accent-gold);" aria-hidden="true"></span>
					<span>پاسخ کوتاه</span>
				</p>
				<h2 class="rm-text-primary mt-3 text-3xl font-bold leading-[1.42] sm:text-4xl">
					هزینه طراحی سایت چگونه محاسبه می‌شود؟
				</h2>
			</div>

			<div class="space-y-6 lg:col-span-7">
				<div class="rm-text-secondary space-y-4 text-sm leading-8 sm:text-base">
					<p>قیمت طراحی سایت یک عدد ثابت برای همه پروژه‌ها نیست. یک سایت معرفی ساده با چند صفحه ثابت، نیازها و هزینه متفاوتی نسبت به یک سایت شرکتی با امکانات اختصاصی یا یک فروشگاه اینترنتی دارد.</p>
					<p>برای تعیین قیمت، نوع سایت، تعداد و پیچیدگی صفحات، طراحی رابط کاربری، اتصال به سرویس‌های خارجی، ورود اطلاعات و سطح پشتیبانی بررسی می‌شوند. به همین دلیل، اعلام قیمت دقیق بدون شناخت نیازهای پروژه معمولاً امکان‌پذیر نیست.</p>
				</div>

				<div class="rm-card rounded-2xl p-5 sm:p-6">
					<p class="rm-text-primary text-xs font-bold sm:text-sm">موارد کلیدی در برآورد هزینه:</p>
					<ul class="mt-4 grid gap-3 sm:grid-cols-2">
						<?php foreach ( array( 'نوع و هدف وب‌سایت', 'تعداد صفحات و ساختار محتوا', 'طراحی اختصاصی یا استفاده از قالب', 'امکانات و قابلیت‌های موردنیاز', 'اتصال به سرویس‌های دیگر', 'خدمات پس از تحویل' ) as $item ) : ?>
							<li class="rm-text-secondary flex items-center gap-3 rounded-xl border rm-border-subtle px-3.5 py-2.5 text-sm">
								<span class="h-2 w-2 shrink-0 rounded-full" style="background-color: var(--accent-gold);" aria-hidden="true"></span>
								<span><?php echo esc_html( $item ); ?></span>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- 2. Website Types -->
<section id="website-types" class="mx-auto max-w-7xl scroll-mt-24 px-4 py-20 sm:px-6 lg:px-8 lg:py-24">
	<div class="flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
		<div class="max-w-2xl">
			<p class="rm-text-gold inline-flex items-center gap-2 text-xs font-semibold sm:text-sm">
				<span class="h-px w-6" style="background-color: var(--accent-gold);" aria-hidden="true"></span>
				<span>دامنه پروژه‌ها</span>
			</p>
			<h2 class="rm-text-primary mt-3 text-3xl font-bold sm:text-4xl">قیمت طراحی انواع سایت</h2>
		</div>
		<p class="rm-text-secondary max-w-md text-sm leading-7 sm:text-base">
			هر نوع سایت، هدف و محدوده متفاوتی دارد. قیمت نهایی بعد از بررسی نیازهای پروژه و توافق بر محدوده اجرا مشخص می‌شود.
		</p>
	</div>

	<div class="mt-12 grid gap-5 md:grid-cols-2">
		<?php
		$types = array(
			array(
				'num'         => '۰۱',
				'title'       => 'طراحی سایت شرکتی',
				'description' => 'مناسب شرکت‌ها، سازمان‌ها و کسب‌وکارهایی که به وب‌سایتی حرفه‌ای برای معرفی مجموعه، خدمات، پروژه‌ها و راه‌های ارتباطی نیاز دارند.',
				'features'    => array( 'صفحه اصلی و درباره ما', 'معرفی خدمات و پروژه‌ها', 'فرم درخواست مشاوره', 'وبلاگ و طراحی واکنش‌گرا' ),
				'cta'         => 'جزئیات طراحی سایت شرکتی',
				'icon'        => '<path d="M3 21h18"/><path d="M5 21V7l8-4v18"/><path d="M19 21V11l-6-4"/><path d="M9 9v.01"/><path d="M9 12v.01"/><path d="M9 15v.01"/>',
			),
			array(
				'num'         => '۰۲',
				'title'       => 'طراحی سایت خدماتی',
				'description' => 'مناسب مشاوران، شرکت‌های خدماتی، مراکز تخصصی و کسب‌وکارهایی که هدف اصلی آن‌ها معرفی خدمات و دریافت درخواست مشتری است.',
				'features'    => array( 'صفحات اختصاصی خدمات', 'فرم درخواست خدمات', 'نمونه‌کارها', 'وبلاگ و محتوای آموزشی' ),
				'cta'         => 'مشاوره طراحی سایت خدماتی',
				'icon'        => '<rect width="16" height="20" x="4" y="2" rx="2"/><path d="M9 22v-4h6v4"/><path d="M8 6h.01"/><path d="M16 6h.01"/><path d="M12 6h.01"/><path d="M12 10h.01"/><path d="M12 14h.01"/><path d="M16 10h.01"/><path d="M8 10h.01"/>',
			),
			array(
				'num'         => '۰۳',
				'title'       => 'طراحی سایت فروشگاهی',
				'description' => 'مناسب کسب‌وکارهایی که قصد فروش محصولات فیزیکی یا دیجیتال از طریق اینترنت را دارند.',
				'features'    => array( 'دسته‌بندی و صفحه محصول', 'سبد خرید و تسویه‌حساب', 'درگاه پرداخت', 'مدیریت سفارش و ارسال' ),
				'cta'         => 'مشاوره طراحی فروشگاه اینترنتی',
				'icon'        => '<circle cx="9" cy="20" r="1"/><circle cx="18" cy="20" r="1"/><path d="M3 4h2l2.4 11.2a2 2 0 0 0 2 1.6h7.8a2 2 0 0 0 2-1.6L21 8H6"/>',
			),
			array(
				'num'         => '۰۴',
				'title'       => 'طراحی سایت با امکانات اختصاصی',
				'description' => 'مناسب پروژه‌هایی که به امکانات خاص، فرایندهای سفارشی یا ارتباط با سامانه‌ها و سرویس‌های دیگر نیاز دارند.',
				'features'    => array( 'تحلیل نیازمندی‌ها', 'قابلیت‌های اختصاصی', 'اتصال به APIها', 'تست متناسب با پروژه' ),
				'cta'         => 'درخواست بررسی پروژه اختصاصی',
				'icon'        => '<path d="m8 9-3 3 3 3"/><path d="m16 9 3 3-3 3"/><path d="m14 5-4 14"/>',
			),
		);
		foreach ( $types as $type ) :
		?>
			<article class="rm-card rm-card-interactive group flex flex-col justify-between rounded-2xl p-6 sm:p-8">
				<div>
					<div class="flex items-center justify-between gap-4">
						<span class="flex h-11 w-11 items-center justify-center rounded-xl border rm-border-subtle rm-text-gold" style="background-color: var(--rm-gold-soft);">
							<svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><?php echo $type['icon']; ?></svg>
						</span>
						<span class="rm-text-muted font-mono text-xs font-semibold"><?php echo esc_html( $type['num'] ); ?></span>
					</div>

					<h3 class="rm-text-primary mt-6 text-xl font-bold"><?php echo esc_html( $type['title'] ); ?></h3>
					<p class="rm-text-secondary mt-3 text-sm leading-7"><?php echo esc_html( $type['description'] ); ?></p>

					<ul class="mt-6 grid gap-2.5 border-t rm-border-subtle pt-5 text-sm sm:grid-cols-2">
						<?php foreach ( $type['features'] as $feature ) : ?>
							<li class="rm-text-secondary flex items-center gap-2">
								<span class="rm-text-gold font-bold" aria-hidden="true">✓</span>
								<span><?php echo esc_html( $feature ); ?></span>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>

				<div class="mt-7 border-t rm-border-subtle pt-5">
					<a href="#inquiry" class="rm-text-gold group/link inline-flex items-center gap-2 text-sm font-semibold transition hover:opacity-85">
						<span><?php echo esc_html( $type['cta'] ); ?></span>
						<svg class="h-4 w-4 transition-transform duration-200 group-hover/link:-translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
							<path d="M19 12H5" />
							<path d="m12 19-7-7 7-7" />
						</svg>
					</a>
				</div>
			</article>
		<?php endforeach; ?>
	</div>
</section>

<!-- 3. Pricing Factors -->
<section id="pricing-factors" class="rm-band-surface scroll-mt-24">
	<div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
		<div class="max-w-2xl">
			<p class="rm-text-gold inline-flex items-center gap-2 text-xs font-semibold sm:text-sm">
				<span class="h-px w-6" style="background-color: var(--accent-gold);" aria-hidden="true"></span>
				<span>عوامل مؤثر بر هزینه</span>
			</p>
			<h2 class="rm-text-primary mt-3 text-3xl font-bold sm:text-4xl">چه عواملی بر قیمت طراحی سایت تأثیر می‌گذارند؟</h2>
		</div>

		<div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
			<?php
			$factors = array(
				'نوع وب‌سایت' => 'سایت شرکتی، خدماتی، فروشگاه اینترنتی و وب‌اپلیکیشن نیازهای متفاوتی دارند.',
				'تعداد و پیچیدگی صفحات' => 'تعداد صفحات، چیدمان آن‌ها و پیچیدگی محتوای هر صفحه روی زمان اجرا اثر می‌گذارد.',
				'طراحی UI/UX' => 'رابط کاربری اختصاصی و تجربه کاربری تخصصی به تحقیق، طراحی و پیاده‌سازی بیشتری نیاز دارد.',
				'امکانات وب‌سایت' => 'ثبت‌نام، جست‌وجوی پیشرفته، رزرو، داشبورد، پرداخت و گردش‌کارهای خودکار دامنه پروژه را تغییر می‌دهند.',
				'اتصال به سرویس‌های دیگر' => 'درگاه پرداخت، پیامک، حسابداری، CRM، حمل‌ونقل و APIهای خارجی باید جداگانه بررسی شوند.',
				'محتوا و ورود داده' => 'تولید محتوا، آماده‌سازی تصاویر، ورود محصولات و انتقال داده ممکن است خدمت جداگانه باشد.',
				'هاست، دامنه و لایسنس‌ها' => 'هزینه زیرساخت، دامنه، قالب‌ها، افزونه‌ها و سرویس‌های خارجی طبق پیشنهاد پروژه تعیین می‌شود.',
			);
			$factor_index = 0;
			$total_factors = count( $factors );
			foreach ( $factors as $title => $description ) :
				$factor_index++;
				$is_last = ( $factor_index === $total_factors );
			?>
				<article class="rm-card rounded-2xl p-6 <?php echo $is_last ? 'sm:col-span-2 lg:col-span-3' : ''; ?>">
					<div class="flex items-start justify-between gap-4">
						<h3 class="rm-text-primary text-base font-bold sm:text-lg"><?php echo esc_html( $title ); ?></h3>
						<span class="rm-text-gold font-mono text-xs font-semibold">۰<?php echo esc_html( $factor_index ); ?></span>
					</div>
					<p class="rm-text-secondary mt-3 text-sm leading-7 <?php echo $is_last ? 'max-w-3xl' : ''; ?>">
						<?php echo esc_html( $description ); ?>
					</p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- 4. WordPress vs Custom Comparison -->
<section id="tech-comparison" class="mx-auto max-w-7xl scroll-mt-24 px-4 py-20 sm:px-6 lg:px-8 lg:py-24">
	<div class="grid gap-10 lg:grid-cols-12 lg:items-start">
		<div class="lg:col-span-5">
			<p class="rm-text-gold inline-flex items-center gap-2 text-xs font-semibold sm:text-sm">
				<span class="h-px w-6" style="background-color: var(--accent-gold);" aria-hidden="true"></span>
				<span>انتخاب مسیر فنی</span>
			</p>
			<h2 class="rm-text-primary mt-3 text-3xl font-bold leading-[1.4] sm:text-4xl">
				طراحی سایت با وردپرس یا برنامه‌نویسی اختصاصی؟
			</h2>
			<p class="rm-text-secondary mt-5 text-sm leading-8 sm:text-base">
				وردپرس برای بسیاری از سایت‌های شرکتی، خدماتی و فروشگاهی انتخابی عملی است؛ توسعه اختصاصی برای پروژه‌هایی مناسب‌تر است که منطق کسب‌وکار یا گردش‌کار منحصربه‌فرد دارند.
			</p>
			<a href="#inquiry" class="rm-btn-primary mt-7 inline-flex min-h-11 items-center gap-2 rounded-xl px-6 text-sm font-bold">
				<span>مشاوره انتخاب مسیر</span>
				<span aria-hidden="true">←</span>
			</a>
		</div>

		<div class="lg:col-span-7">
			<div class="rm-card overflow-hidden rounded-2xl">
				<div class="overflow-x-auto">
					<table class="w-full min-w-[580px] text-right text-sm">
						<thead>
							<tr class="border-b rm-border-subtle" style="background-color: var(--rm-band-alt);">
								<th class="rm-text-muted p-4 text-xs font-semibold">معیار مقایسه</th>
								<th class="rm-text-gold p-4 text-sm font-bold">وردپرس</th>
								<th class="rm-text-primary p-4 text-sm font-bold">توسعه اختصاصی</th>
							</tr>
						</thead>
						<tbody class="divide-y rm-border-subtle">
							<?php foreach ( array( 'هزینه شروع' => 'برای بسیاری از پروژه‌ها اقتصادی‌تر است', 'زمان توسعه' => 'معمولاً کوتاه‌تر برای نیازهای متداول', 'انعطاف‌پذیری' => 'با افزونه و توسعه قابل افزایش است', 'نگهداری' => 'نیازمند به‌روزرسانی و مراقبت منظم', 'مناسب برای' => 'شرکتی، خدماتی و فروشگاهی', 'منطق کسب‌وکار' => 'برای فرایندهای پیچیده، اختصاصی بررسی شود' ) as $criterion => $answer ) : ?>
								<tr class="transition hover:bg-black/[0.02] dark:hover:bg-white/[0.02]">
									<th class="rm-text-primary p-4 font-semibold"><?php echo esc_html( $criterion ); ?></th>
									<td class="rm-text-secondary p-4 leading-7"><?php echo esc_html( $answer ); ?></td>
									<td class="rm-text-secondary p-4 leading-7"><?php echo esc_html( $criterion === 'منطق کسب‌وکار' ? 'قابل طراحی دقیق بر اساس نیاز پروژه' : 'قابل تنظیم، اما با زمان و هزینه توسعه بیشتر' ); ?></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
			<p class="rm-text-muted mt-3 text-xs sm:hidden">برای مشاهده کامل ستون‌ها، جدول را به صورت افقی پیمایش کنید.</p>
		</div>
	</div>
</section>