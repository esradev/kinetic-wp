<?php
/**
 * Website Design FAQ Section & JSON-LD Schema
 *
 * @package Romonet_WPStorm
 */

$faqs = array(
	'طراحی سایت در رومونت به چه صورت انجام می‌شود؟' => 'پس از شناخت نیازها، ساختار و راهکار پیشنهادی مشخص می‌شود و طراحی و توسعه بر اساس محدوده تأییدشده انجام می‌گیرد.',
	'برای طراحی سایت وردپرسی چه امکاناتی قابل ارائه است؟' => 'امکانات شرکتی، خدماتی، فروشگاهی و قابلیت‌های اختصاصی وردپرس متناسب با نیاز و سازگاری فنی پروژه قابل بررسی هستند.',
	'آیا امکان طراحی سایت فروشگاهی وجود دارد؟' => 'بله، طراحی و توسعه فروشگاه اینترنتی با ووکامرس و امکانات موردنیاز پروژه قابل بررسی است.',
	'تفاوت طراحی سایت با وردپرس و توسعه اختصاصی چیست؟' => 'وردپرس برای بسیاری از سایت‌های محتوایی و فروشگاهی مناسب است؛ توسعه اختصاصی برای فرآیندها و نیازهای پیچیده‌تر بررسی می‌شود.',
	'هزینه طراحی سایت چگونه مشخص می‌شود؟' => 'پس از بررسی نوع سایت، صفحات، امکانات و روش اجرا، محدوده و پیشنهاد هزینه مشخص می‌شود.',
	'طراحی یک وب‌سایت چقدر زمان می‌برد؟' => 'زمان به محدوده، پیچیدگی و آماده‌بودن محتوا و تصمیم‌های پروژه بستگی دارد و در پیشنهاد پروژه مشخص می‌شود.',
	'آیا دامنه و هاست هم توسط رومونت تهیه می‌شود؟' => 'تهیه دامنه و هاست می‌تواند جداگانه هماهنگ شود و در محدوده هر پروژه باید مشخص شود.',
	'آیا پس از تحویل سایت امکان دریافت پشتیبانی وجود دارد؟' => 'بله، شرایط پشتیبانی پس از تحویل طبق توافق پروژه مشخص می‌شود.',
	'آیا می‌توان بعداً امکانات جدید به سایت اضافه کرد؟' => 'ساختار پروژه تا حد امکان قابل توسعه طراحی می‌شود و امکانات جدید پس از بررسی جداگانه قابل برنامه‌ریزی هستند.',
	'برای شروع پروژه چه اطلاعاتی باید ارائه دهیم؟' => 'نوع کسب‌وکار، هدف سایت، مخاطبان، امکانات موردنیاز و نمونه‌های موردنظر برای شروع بررسی مفید هستند.',
);

$faq_numbers = array( '۰۱', '۰۲', '۰۳', '۰۴', '۰۵', '۰۶', '۰۷', '۰۸', '۰۹', '۱۰' );
?>
<section class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
	<style>
		.rm-faq-summary::-webkit-details-marker {
			display: none;
		}
	</style>

	<div class="grid gap-12 lg:grid-cols-12 lg:gap-14">
		<!-- Right Column (RTL): Sticky Heading & Quick CTA -->
		<div class="lg:col-span-4">
			<div class="lg:sticky lg:top-24">
				<p class="text-xs font-bold tracking-wider text-amber-400">پاسخ به پرسش‌های رایج</p>
				<h2 class="mt-3 text-3xl font-bold leading-[1.45] text-white sm:text-4xl">
					سؤالات متداول طراحی سایت
				</h2>
				<p class="mt-4 text-sm leading-8 text-neutral-400">
					پاسخ نکات کلیدی درباره فرآیند اجرا، انتخاب فناوری، زمان‌بندی و پشتیبانی پروژه‌ها در رومونت.
				</p>

				<div class="mt-8 rounded-2xl border border-white/10 bg-white/[0.025] p-5">
					<p class="text-sm font-bold text-white">پاسخ سؤال خود را پیدا نکردید؟</p>
					<p class="mt-2 text-xs leading-6 text-neutral-400">
						جزئیات پروژه خود را در فرم زیر ثبت کنید تا متناسب با شرایط شما بررسی شود.
					</p>
					<a href="#inquiry" class="mt-4 inline-flex items-center gap-1.5 text-xs font-bold text-amber-400 transition hover:text-amber-300">
						<span>ثبت درخواست مشاوره</span>
						<svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true">
							<path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m-6-6 6 6 6-6" />
						</svg>
					</a>
				</div>
			</div>
		</div>

		<!-- Left Column (RTL): Architectural Accordion List -->
		<div class="lg:col-span-8">
			<div class="space-y-3">
				<?php
				$faq_index = 0;
				foreach ( $faqs as $question => $answer ) :
					$num_label = isset( $faq_numbers[ $faq_index ] ) ? $faq_numbers[ $faq_index ] : (string) ( $faq_index + 1 );
					$faq_index++;
				?>
					<details class="group rounded-2xl border border-white/10 bg-white/[0.02] transition open:border-amber-400/35 open:bg-amber-500/[0.03] hover:border-white/20">
						<summary class="rm-faq-summary flex cursor-pointer list-none items-center justify-between gap-4 px-5 py-5 sm:px-6">
							<span class="flex items-start gap-3.5 sm:items-center sm:gap-4">
								<span class="mt-0.5 font-mono text-xs font-bold text-amber-400/80 transition group-open:text-amber-300 sm:mt-0">
									<?php echo esc_html( $num_label ); ?>
								</span>
								<span class="text-sm font-bold leading-7 text-white sm:text-base">
									<?php echo esc_html( $question ); ?>
								</span>
							</span>
							<span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg border border-white/10 bg-white/[0.03] text-amber-400 transition group-open:rotate-45 group-open:border-amber-400/30 group-open:bg-amber-500/10" aria-hidden="true">
								<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
									<path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14M5 12h14" />
								</svg>
							</span>
						</summary>
						<div class="border-t border-white/10 px-5 pb-5 pt-4 sm:px-6 sm:pr-14">
							<p class="text-sm leading-8 text-neutral-300">
								<?php echo esc_html( $answer ); ?>
							</p>
						</div>
					</details>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>

<script type="application/ld+json">
<?php
$schema = array(
	'@context'   => 'https://schema.org',
	'@type'      => 'FAQPage',
	'mainEntity' => array(),
);
foreach ( $faqs as $question => $answer ) {
	$schema['mainEntity'][] = array(
		'@type'          => 'Question',
		'name'           => $question,
		'acceptedAnswer' => array(
			'@type' => 'Answer',
			'text'  => $answer,
		),
	);
}
echo wp_json_encode( $schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES );
?>
</script>