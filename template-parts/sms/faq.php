<?php
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
    <h2 class="text-3xl font-bold text-white sm:text-4xl">سؤالات متداول درباره پنل پیامکی رومونت</h2>
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
