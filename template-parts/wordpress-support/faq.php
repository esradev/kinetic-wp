<?php
$faqs = array(
	'پشتیبانی وردپرس شامل چه خدماتی می‌شود؟' => 'بسته به نیاز سایت می‌تواند شامل نگهداری، به‌روزرسانی، رفع خطا، بررسی فنی و توسعه در محدوده توافق‌شده باشد.',
	'آیا برای سایت‌های فروشگاهی ووکامرس هم پشتیبانی ارائه می‌دهید؟' => 'بله، وضعیت فروشگاه و نیازهای ووکامرس در بررسی اولیه مشخص می‌شود.',
	'تفاوت پشتیبانی ماهانه و پشتیبانی موردی چیست؟' => 'پشتیبانی ماهانه برای رسیدگی برنامه‌ریزی‌شده است و پشتیبانی موردی برای یک نیاز یا مشکل مشخص بررسی می‌شود.',
	'آیا می‌توانم فقط برای رفع یک خطای وردپرس درخواست ثبت کنم؟' => 'بله، می‌توانید درخواست موردی برای بررسی و رفع یک خطای مشخص ارسال کنید.',
	'آیا به‌روزرسانی وردپرس و افزونه‌ها هم انجام می‌شود؟' => 'در صورت قرارگرفتن در محدوده خدمت، به‌روزرسانی‌ها با توجه به سازگاری سایت بررسی و انجام می‌شوند.',
	'اگر سایت من دچار مشکل یا از دسترس خارج شود چه کاری باید انجام دهم؟' => 'شرح مشکل و آدرس سایت را ارسال کنید تا وضعیت اولیه بررسی و محدوده اقدام پیشنهادی اعلام شود.',
	'هزینه پشتیبانی وردپرس چگونه محاسبه می‌شود؟' => 'هزینه به وضعیت سایت، حجم نگهداری، نوع درخواست و سطح خدمات موردنیاز بستگی دارد.',
	'آیا امکان توسعه قابلیت‌های جدید در زمان پشتیبانی وجود دارد؟' => 'توسعه قابلیت‌های جدید پس از بررسی جداگانه و مشخص‌شدن محدوده کار قابل برنامه‌ریزی است.',
	'برای شروع همکاری چه اطلاعاتی از سایت لازم است؟' => 'آدرس سایت، نوع درخواست و توضیح مشکل یا نیاز برای بررسی اولیه کافی است؛ دسترسی‌ها فقط در صورت نیاز و به‌صورت امن درخواست می‌شوند.',
	'آیا قبل از شروع پشتیبانی، سایت بررسی می‌شود؟' => 'بله، بررسی اولیه برای شناخت وضعیت سایت و پیشنهاد محدوده مناسب انجام می‌شود.',
);
?>
<section class="mx-auto max-w-4xl px-4 py-20 sm:px-6 lg:px-8"><h2 class="text-3xl font-bold text-white sm:text-4xl">سؤالات متداول پشتیبانی وردپرس</h2><div class="mt-10 divide-y divide-white/10"><?php foreach ( $faqs as $question => $answer ) : ?><details class="group py-5"><summary class="flex cursor-pointer list-none items-center justify-between gap-5 font-bold text-white"><?php echo esc_html( $question ); ?><span class="text-xl text-amber-400 transition group-open:rotate-45">+</span></summary><p class="mt-4 text-sm leading-8 text-neutral-400"><?php echo esc_html( $answer ); ?></p></details><?php endforeach; ?></div></section>
<script type="application/ld+json">
<?php
$schema = array( '@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => array() );
foreach ( $faqs as $question => $answer ) {
	$schema['mainEntity'][] = array( '@type' => 'Question', 'name' => $question, 'acceptedAnswer' => array( '@type' => 'Answer', 'text' => $answer ) );
}
echo wp_json_encode( $schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES );
?>
</script>
