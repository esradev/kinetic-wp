<?php
/**
 * Maintenance Pricing Roadmap, FAQ & Bottom CTA section
 *
 * @package Romonet_WPStorm
 */
?>

<!-- 1. Onboarding Process -->
<section class="rm-band-surface">
	<div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
		<div class="max-w-2xl">
			<p class="rm-text-gold inline-flex items-center gap-2 text-xs font-semibold sm:text-sm">
				<span class="h-px w-6" style="background-color: var(--accent-gold);" aria-hidden="true"></span>
				<span>مسیر شروع همکاری</span>
			</p>
			<h2 class="rm-text-primary mt-3 text-3xl font-bold sm:text-4xl">فرآیند شروع پشتیبانی سایت در رومونت</h2>
		</div>

		<div class="relative mt-12">
			<div class="pointer-events-none absolute left-10 right-10 top-5 hidden h-px md:block" style="background: linear-gradient(to left, var(--border-glow), var(--border-subtle));" aria-hidden="true"></div>
			<div class="pointer-events-none absolute bottom-5 right-5 top-5 w-px md:hidden" style="background: linear-gradient(to bottom, var(--border-glow), transparent);" aria-hidden="true"></div>

			<ol class="grid gap-6 md:grid-cols-5 md:gap-4">
				<?php
				$descriptions = array(
					'مشتری اطلاعات اولیه سایت و نیاز خود را ارسال می‌کند.',
					'وضعیت سایت، افزونه‌ها، قالب و نیازهای نگهداری بررسی می‌شود.',
					'نوع خدمات، سطح پشتیبانی و موارد خارج از قرارداد مشخص می‌شود.',
					'پلن و هزینه متناسب با شرایط پروژه پیشنهاد می‌شود.',
					'پس از توافق و تعیین دسترسی‌ها، خدمات آغاز می‌شود.',
				);
				foreach ( array( 'ثبت درخواست', 'بررسی فنی', 'تعیین محدوده خدمات', 'ارائه پیشنهاد', 'شروع همکاری' ) as $index => $step ) :
				?>
					<li class="relative pr-14 md:pr-0">
						<span class="rm-pill-gold absolute right-0 top-0 flex h-10 w-10 items-center justify-center rounded-xl text-xs font-bold md:relative md:right-auto md:top-auto" style="background-color: var(--bg-main);">
							۰<?php echo esc_html( $index + 1 ); ?>
						</span>
						<div class="rm-card rounded-2xl p-4 md:mt-5 md:min-h-[165px]">
							<h3 class="rm-text-primary text-sm font-bold leading-7 sm:text-base"><?php echo esc_html( $step ); ?></h3>
							<p class="rm-text-secondary mt-2 text-xs leading-6 sm:text-sm sm:leading-7"><?php echo esc_html( $descriptions[ $index ] ); ?></p>
						</div>
					</li>
				<?php endforeach; ?>
			</ol>
		</div>
	</div>
</section>

<!-- 2. FAQ -->
<section class="mx-auto max-w-4xl px-4 py-20 sm:px-6 lg:px-8">
	<p class="rm-text-gold inline-flex items-center gap-2 text-xs font-semibold sm:text-sm">
		<span class="h-px w-6" style="background-color: var(--accent-gold);" aria-hidden="true"></span>
		<span>پاسخ به پرسش‌های رایج</span>
	</p>
	<h2 class="rm-text-primary mt-3 text-3xl font-bold sm:text-4xl">سؤالات متداول درباره قیمت و پشتیبانی سایت</h2>

	<div class="rm-card mt-10 rounded-2xl px-5 sm:px-8">
		<?php
		$faqs = array(
			'قیمت پشتیبانی سایت وردپرسی در سال ۱۴۰۵ چقدر است؟' => 'قیمت به وضعیت سایت، حجم نگهداری، تعداد درخواست‌ها و سطح خدمات بستگی دارد. پس از بررسی سایت، پیشنهاد متناسب ارائه می‌شود.',
			'آیا امکان دریافت پشتیبانی بدون قرارداد ماهانه وجود دارد؟' => 'بله، برای مشکلات مشخص می‌توان درخواست موردی ثبت کرد؛ محدوده و هزینه قبل از شروع بررسی اعلام می‌شود.',
			'آیا به‌روزرسانی وردپرس و افزونه‌ها شامل پشتیبانی می‌شود؟' => 'در صورت درج در پلن، به‌روزرسانی‌ها با توجه به سازگاری و محدوده قرارداد انجام می‌شوند.',
			'اگر سایت هک شود، آیا رفع مشکل امنیتی شامل پشتیبانی است؟' => 'این موضوع به سطح نفوذ و قرارداد بستگی دارد. بررسی اولیه و اقدامات اصلاحی فقط در محدوده توافق انجام می‌شود.',
			'آیا تغییرات ظاهری و افزودن امکانات جدید در پلن ماهانه قرار دارد؟' => 'تغییرات کوچک ممکن است در برخی پلن‌ها پیش‌بینی شوند؛ امکانات جدید یا توسعه بزرگ نیازمند توافق جداگانه است.',
			'آیا از سایت نسخه پشتیبان تهیه می‌شود؟' => 'بررسی و هماهنگی بکاپ می‌تواند بخشی از پلن باشد؛ روش و تناوب آن بر اساس شرایط پروژه تعیین می‌شود.',
			'برای شروع پشتیبانی چه اطلاعات و دسترسی‌هایی لازم است؟' => 'آدرس سایت، شرح نیاز و در مرحله بررسی، دسترسی‌های محدود و امن موردنیاز اعلام می‌شوند.',
			'آیا می‌توان پلن پشتیبانی را در آینده تغییر داد؟' => 'بله، با تغییر نیازهای سایت می‌توان محدوده و سطح خدمات را دوباره بررسی و اصلاح کرد.',
		);
		foreach ( $faqs as $question => $answer ) :
		?>
			<details class="rm-faq-item group py-5 last:border-b-0">
				<summary class="rm-faq-question rm-text-primary flex cursor-pointer list-none items-center justify-between gap-5 text-sm font-bold leading-7 transition sm:text-base">
					<span><?php echo esc_html( $question ); ?></span>
					<span class="rm-pill-gold flex h-7 w-7 shrink-0 items-center justify-center rounded-lg text-base font-normal transition duration-200 group-open:rotate-45" aria-hidden="true">+</span>
				</summary>
				<p class="rm-text-secondary mt-3.5 max-w-3xl text-sm leading-8"><?php echo esc_html( $answer ); ?></p>
			</details>
		<?php endforeach; ?>
	</div>
</section>

<!-- 3. Bottom CTA -->
<section class="mx-auto max-w-7xl px-4 pb-8 pt-6 sm:px-6 lg:px-8">
	<div class="rm-cta-banner relative overflow-hidden rounded-3xl px-6 py-14 text-center sm:px-12 sm:py-16">
		<div class="rm-grid-bg pointer-events-none absolute inset-0 opacity-60"></div>
		<div class="relative mx-auto max-w-2xl">
			<h2 class="rm-text-primary text-3xl font-extrabold leading-[1.4] sm:text-4xl">
				نگهداری سایت خود را با خیال آسوده به رومونت بسپارید
			</h2>
			<p class="rm-text-secondary mx-auto mt-5 max-w-xl text-sm leading-8 sm:text-base">
				اگر سایت وردپرسی شما به پشتیبانی فنی، نگهداری منظم یا رسیدگی به مشکلات نیاز دارد، درخواست خود را ارسال کنید تا پس از بررسی شرایط سایت، پیشنهاد مناسبی دریافت کنید.
			</p>
			<div class="mt-8 flex flex-col justify-center gap-3.5 sm:flex-row">
				<a href="#inquiry" class="rm-btn-primary inline-flex min-h-12 items-center justify-center rounded-xl px-7 text-sm font-bold">
					درخواست پشتیبانی سایت
				</a>
				<a href="tel:+982191015642" class="rm-btn-secondary inline-flex min-h-12 items-center justify-center rounded-xl px-7 text-sm font-semibold">
					تماس با رومونت
				</a>
			</div>
		</div>
	</div>
</section>

<script type="application/ld+json">
<?php
$faq_schema = array( '@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => array() );
foreach ( $faqs as $question => $answer ) {
	$faq_schema['mainEntity'][] = array( '@type' => 'Question', 'name' => $question, 'acceptedAnswer' => array( '@type' => 'Answer', 'text' => $answer ) );
}
echo wp_json_encode( $faq_schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES );
?>
</script>