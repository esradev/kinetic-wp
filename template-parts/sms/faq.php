<?php
/**
 * SMS & OTP Pricing FAQ section + JSON-LD Schema
 *
 * @package Romonet_WPStorm
 */

$faqs = array(
	'تفاوت پلن‌های پنل پیامکی رومونت چیست؟' => 'تفاوت پلن‌ها در تعداد وب‌سایت‌ها، حساب‌های کاربری، اتصال پنل‌ها و سطح گزارش‌گیری و پشتیبانی است.',
	'آیا هزینه ارسال پیامک در مبلغ اشتراک لحاظ شده است؟' => 'خیر. اعتبار ارسال پیامک جدا از اشتراک ماهانه تهیه و بر اساس تعرفه ارائه‌دهنده پنل محاسبه می‌شود.',
	'آیا امکان تغییر پلن پس از ثبت‌نام وجود دارد؟' => 'فرآیند تغییر پلن به امکانات نهایی سامانه و شرایط حساب بستگی دارد و هنگام فعال‌شدن ثبت‌نام اعلام می‌شود.',
	'آیا می‌توان چند وب‌سایت را به یک حساب متصل کرد؟' => 'بله، تعداد وب‌سایت‌های قابل مدیریت مطابق سقف هر پلن است.',
	'آیا امکان اتصال پنل پیامکی دلخواه وجود دارد؟' => 'اتصال پنل به پشتیبانی واقعی محصول و سازگاری فنی آن بستگی دارد؛ قبل از فعال‌سازی باید بررسی شود.',
	'هزینه ارسال پیامک چگونه محاسبه می‌شود؟' => 'هزینه ارسال بر اساس تعرفه اپراتور و پنل پیامکی متصل‌شده و جدا از مبلغ اشتراک محاسبه می‌شود.',
	'آیا پس از خرید اشتراک به پشتیبانی دسترسی دارم؟' => 'بله، هر پلن سطح پشتیبانی مشخصی دارد؛ جزئیات آن در صفحه پلن‌ها درج شده است.',
	'آیا اشتراک به‌صورت ماهانه تمدید می‌شود؟' => 'قیمت‌ها ماهانه اعلام شده‌اند. شرایط تمدید در فرآیند نهایی ثبت‌نام و اشتراک مشخص می‌شود.',
);
?>
<section class="mx-auto max-w-4xl px-4 py-20 sm:px-6 lg:px-8">
	<p class="rm-text-gold inline-flex items-center gap-2 text-xs font-semibold sm:text-sm">
		<span class="h-px w-6" style="background-color: var(--accent-gold, #f59e0b);" aria-hidden="true"></span>
		<span>پرسش‌های متداول</span>
	</p>
	<h2 class="rm-text-primary mt-3 text-3xl font-bold sm:text-4xl">سؤالات متداول درباره پنل پیامکی رومونت</h2>

	<div class="rm-card mt-10 rounded-2xl px-5 sm:px-8">
		<?php foreach ( $faqs as $question => $answer ) : ?>
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

<script type="application/ld+json">
<?php
$schema = array( '@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => array() );
foreach ( $faqs as $question => $answer ) {
	$schema['mainEntity'][] = array( '@type' => 'Question', 'name' => $question, 'acceptedAnswer' => array( '@type' => 'Answer', 'text' => $answer ) );
}
echo wp_json_encode( $schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES );
?>
</script>