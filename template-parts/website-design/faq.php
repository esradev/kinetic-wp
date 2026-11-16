<?php
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
?>
<section class="mx-auto max-w-4xl px-4 py-20 sm:px-6 lg:px-8">
    <h2 class="text-3xl font-bold text-white sm:text-4xl">سؤالات متداول طراحی سایت</h2>
    <div class="mt-10 divide-y divide-white/10">
        <?php foreach ( $faqs as $question => $answer ) : ?>
            <details class="group py-5"><summary class="flex cursor-pointer list-none items-center justify-between gap-5 font-bold text-white"><?php echo esc_html( $question ); ?><span class="text-xl text-amber-400 transition group-open:rotate-45">+</span></summary><p class="mt-4 text-sm leading-8 text-neutral-400"><?php echo esc_html( $answer ); ?></p></details>
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
