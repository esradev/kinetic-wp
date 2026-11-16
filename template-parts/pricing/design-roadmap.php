<?php
/**
 * Design Pricing Roadmap, Scope Transparency, FAQ & Bottom CTA section
 *
 * @package Romonet_WPStorm
 */
?>

<!-- 1. Roadmap -->
<section class="rm-band-surface">
	<div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
		<div class="max-w-2xl">
			<p class="rm-text-gold inline-flex items-center gap-2 text-xs font-semibold sm:text-sm">
				<span class="h-px w-6" style="background-color: var(--accent-gold);" aria-hidden="true"></span>
				<span>مسیر همکاری</span>
			</p>
			<h2 class="rm-text-primary mt-3 text-3xl font-bold sm:text-4xl">مراحل طراحی و اجرای سایت در رومونت</h2>
		</div>

		<div class="relative mt-12">
			<div class="pointer-events-none absolute left-10 right-10 top-5 hidden h-px md:block" style="background: linear-gradient(to left, var(--border-glow), var(--border-subtle));" aria-hidden="true"></div>
			<div class="pointer-events-none absolute bottom-5 right-5 top-5 w-px md:hidden" style="background: linear-gradient(to bottom, var(--border-glow), transparent);" aria-hidden="true"></div>

			<ol class="grid gap-6 md:grid-cols-5 md:gap-4">
				<?php foreach ( array( 'دریافت نیازها و شناخت کسب‌وکار', 'بررسی امکانات و برآورد هزینه', 'توافق بر محدوده و زمان‌بندی', 'طراحی، توسعه و تست', 'تحویل سایت و پشتیبانی طبق توافق' ) as $index => $step ) : ?>
					<li class="relative pr-14 md:pr-0">
						<span class="rm-pill-gold absolute right-0 top-0 flex h-10 w-10 items-center justify-center rounded-xl text-xs font-bold md:relative md:right-auto md:top-auto" style="background-color: var(--bg-main);">
							۰<?php echo esc_html( $index + 1 ); ?>
						</span>
						<div class="rm-card rounded-2xl p-4 md:mt-5 md:min-h-[120px]">
							<h3 class="rm-text-primary text-sm font-bold leading-7 sm:text-base"><?php echo esc_html( $step ); ?></h3>
						</div>
					</li>
				<?php endforeach; ?>
			</ol>
		</div>
	</div>
</section>

<!-- 2. Scope Transparency -->
<section class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-24">
	<div class="grid gap-12 lg:grid-cols-12 lg:items-start">
		<div class="lg:col-span-4">
			<p class="rm-text-gold inline-flex items-center gap-2 text-xs font-semibold sm:text-sm">
				<span class="h-px w-6" style="background-color: var(--accent-gold);" aria-hidden="true"></span>
				<span>شفافیت در محدوده</span>
			</p>
			<h2 class="rm-text-primary mt-3 text-3xl font-bold leading-[1.42] sm:text-4xl">
				در هزینه طراحی سایت چه خدماتی لحاظ می‌شود؟
			</h2>
		</div>

		<div class="grid gap-6 sm:grid-cols-2 lg:col-span-8">
			<div class="rm-card rounded-2xl p-6 sm:p-7">
				<div class="flex items-center justify-between border-b rm-border-subtle pb-4">
					<h3 class="rm-text-primary text-base font-bold sm:text-lg">تحویل‌های متداول پروژه</h3>
					<span class="rm-text-emerald text-xs font-semibold">شامل پروژه</span>
				</div>
				<ul class="mt-5 space-y-3 text-sm leading-7">
					<?php foreach ( array( 'طراحی و پیاده‌سازی سایت', 'چیدمان واکنش‌گرا', 'پیکربندی صفحات توافق‌شده', 'تنظیمات فنی اولیه', 'تست پیش از تحویل', 'راهنمای اولیه استفاده' ) as $item ) : ?>
						<li class="rm-text-secondary flex items-center gap-2.5">
							<span class="rm-text-emerald font-bold" aria-hidden="true">✓</span>
							<span><?php echo esc_html( $item ); ?></span>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

			<div class="rm-card rounded-2xl p-6 sm:p-7">
				<div class="flex items-center justify-between border-b rm-border-subtle pb-4">
					<h3 class="rm-text-primary text-base font-bold sm:text-lg">خدماتی که ممکن است جدا باشند</h3>
					<span class="rm-text-muted text-xs font-semibold">طبق توافق</span>
				</div>
				<ul class="mt-5 space-y-3 text-sm leading-7">
					<?php foreach ( array( 'دامنه و هاست', 'لایسنس نرم‌افزارهای تجاری', 'تولید محتوای حرفه‌ای', 'ورود حجم بالای محصولات', 'کمپین‌های پیشرفته سئو', 'پشتیبانی و امکانات بعدی' ) as $item ) : ?>
						<li class="rm-text-secondary flex items-center gap-2.5">
							<span class="rm-text-muted font-bold" aria-hidden="true">•</span>
							<span><?php echo esc_html( $item ); ?></span>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>
</section>

<!-- 3. FAQ -->
<section class="rm-band-surface">
	<div class="mx-auto max-w-4xl px-4 py-20 sm:px-6 lg:px-8">
		<p class="rm-text-gold inline-flex items-center gap-2 text-xs font-semibold sm:text-sm">
			<span class="h-px w-6" style="background-color: var(--accent-gold);" aria-hidden="true"></span>
			<span>پاسخ به پرسش‌های رایج</span>
		</p>
		<h2 class="rm-text-primary mt-3 text-3xl font-bold sm:text-4xl">سؤالات متداول درباره قیمت طراحی سایت</h2>

		<div class="rm-card mt-10 rounded-2xl px-5 sm:px-8">
			<?php
			$faqs = array(
				'قیمت طراحی سایت در سال ۱۴۰۵ چقدر است؟' => 'قیمت به نوع سایت، محدوده امکانات و پیچیدگی اجرا بستگی دارد. برای عدد دقیق، اطلاعات پروژه خود را ارسال کنید تا برآورد متناسب ارائه شود.',
				'طراحی سایت با وردپرس ارزان‌تر است یا اختصاصی؟' => 'وردپرس برای نیازهای متداول مسیر عملی و قابل توسعه‌ای است؛ توسعه اختصاصی برای منطق‌ها و گردش‌کارهای ویژه بررسی می‌شود. انتخاب درست به نیاز پروژه بستگی دارد.',
				'طراحی سایت چقدر زمان می‌برد؟' => 'مدت اجرا به محدوده، آماده بودن محتوا و پیچیدگی پروژه بستگی دارد و در زمان‌بندی توافق‌شده مشخص می‌شود.',
				'آیا هزینه هاست و دامنه در قیمت طراحی سایت محاسبه می‌شود؟' => 'ممکن است دامنه، هاست و سرویس‌های خارجی جداگانه محاسبه شوند؛ این موضوع در پیشنهاد پروژه شفاف اعلام می‌شود.',
				'آیا پس از تحویل سایت خدمات پشتیبانی ارائه می‌دهید؟' => 'بله، پشتیبانی می‌تواند بر اساس پلن یا قرارداد خدماتی جداگانه ارائه شود.',
				'آیا امکان اضافه کردن امکانات جدید در آینده وجود دارد؟' => 'اگر معماری متناسب انتخاب شود، توسعه آینده امکان‌پذیر است؛ امکان‌سنجی هر قابلیت به ساختار فنی و نیاز جدید بستگی دارد.',
				'برای دریافت قیمت دقیق چه اطلاعاتی لازم است؟' => 'نوع کسب‌وکار، هدف سایت، امکانات موردنیاز، نمونه‌های موردنظر و در صورت تمایل بودجه تقریبی را ارسال کنید.',
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
	</div>
</section>

<!-- 4. Bottom CTA & Related Services Nav -->
<section class="mx-auto max-w-7xl px-4 pb-8 pt-20 sm:px-6 lg:px-8">
	<div class="rm-cta-banner relative overflow-hidden rounded-3xl px-6 py-14 text-center sm:px-12 sm:py-16">
		<div class="rm-grid-bg pointer-events-none absolute inset-0 opacity-60"></div>
		<div class="relative mx-auto max-w-2xl">
			<h2 class="rm-text-primary text-3xl font-extrabold leading-[1.4] sm:text-4xl">
				برای طراحی سایت کسب‌وکارتان برنامه دارید؟
			</h2>
			<p class="rm-text-secondary mx-auto mt-5 max-w-xl text-sm leading-8 sm:text-base">
				نیازها و ایده خود را با رومونت در میان بگذارید. پس از بررسی اولیه، مسیر مناسب اجرا و برآورد هزینه پروژه را پیشنهاد می‌کنیم.
			</p>
			<div class="mt-8 flex flex-col justify-center gap-3.5 sm:flex-row">
				<a href="#inquiry" class="rm-btn-primary inline-flex min-h-12 items-center justify-center rounded-xl px-7 text-sm font-bold">
					درخواست مشاوره طراحی سایت
				</a>
				<a href="tel:+982191015642" class="rm-btn-secondary inline-flex min-h-12 items-center justify-center rounded-xl px-7 text-sm font-semibold">
					تماس با رومونت
				</a>
			</div>
		</div>
	</div>

	<nav class="mt-10 flex flex-wrap justify-center gap-3 text-sm" aria-label="خدمات مرتبط">
		<a href="<?php echo esc_url( home_url( '/site-design-pricing' ) ); ?>" class="rm-card rm-card-interactive rm-text-secondary rounded-xl px-4 py-2 transition hover:text-[var(--accent-gold)]">طراحی سایت</a>
		<a href="<?php echo esc_url( home_url( '/site-design-pricing' ) ); ?>" class="rm-card rm-card-interactive rm-text-secondary rounded-xl px-4 py-2 transition hover:text-[var(--accent-gold)]">طراحی و توسعه فروشگاه ووکامرس</a>
		<a href="<?php echo esc_url( home_url( '/maintenance-pricing' ) ); ?>" class="rm-card rm-card-interactive rm-text-secondary rounded-xl px-4 py-2 transition hover:text-[var(--accent-gold)]">پشتیبانی وردپرس</a>
		<a href="<?php echo esc_url( home_url( '/shop' ) ); ?>" class="rm-card rm-card-interactive rm-text-secondary rounded-xl px-4 py-2 transition hover:text-[var(--accent-gold)]">توسعه اختصاصی افزونه و قالب</a>
	</nav>
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