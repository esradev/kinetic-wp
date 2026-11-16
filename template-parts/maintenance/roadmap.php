<section class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
    <div class="max-w-2xl">
        <p class="text-sm font-semibold text-amber-400">مسیر شروع همکاری</p>
        <h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">فرآیند شروع پشتیبانی سایت در رومونت</h2>
    </div>
    <ol class="mt-12 grid gap-8 md:grid-cols-5">
        <?php foreach ( array( 'ثبت درخواست', 'بررسی فنی', 'تعیین محدوده خدمات', 'ارائه پیشنهاد', 'شروع همکاری' ) as $index => $step ) : ?>
            <li class="border-t border-white/15 pt-5">
                <span class="text-sm font-bold text-amber-400">۰<?php echo esc_html( $index + 1 ); ?></span>
                <h3 class="mt-3 font-bold leading-7 text-white"><?php echo esc_html( $step ); ?></h3>
                <p class="mt-2 text-sm leading-7 text-neutral-400"><?php echo esc_html( array( 'مشتری اطلاعات اولیه سایت و نیاز خود را ارسال می‌کند.', 'وضعیت سایت، افزونه‌ها، قالب و نیازهای نگهداری بررسی می‌شود.', 'نوع خدمات، سطح پشتیبانی و موارد خارج از قرارداد مشخص می‌شود.', 'پلن و هزینه متناسب با شرایط پروژه پیشنهاد می‌شود.', 'پس از توافق و تعیین دسترسی‌ها، خدمات آغاز می‌شود.' )[ $index ] ); ?></p>
            </li>
        <?php endforeach; ?>
    </ol>
</section>

<section class="border-y border-white/10 bg-white/[0.02]">
    <div class="mx-auto max-w-4xl px-4 py-20 sm:px-6 lg:px-8">
        <p class="text-sm font-semibold text-amber-400">پاسخ به پرسش‌های رایج</p>
        <h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">سؤالات متداول درباره قیمت و پشتیبانی سایت</h2>
        <div class="mt-10 divide-y divide-white/10">
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
                <details class="group py-5">
                    <summary class="flex cursor-pointer list-none items-center justify-between gap-5 font-bold text-white"><?php echo esc_html( $question ); ?><span class="text-xl font-normal text-amber-400 transition group-open:rotate-45">+</span></summary>
                    <p class="mt-4 max-w-3xl text-sm leading-8 text-neutral-400"><?php echo esc_html( $answer ); ?></p>
                </details>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
    <div class="rounded-3xl border border-amber-400/25 bg-amber-500/[0.07] px-6 py-14 text-center sm:px-12">
        <h2 class="text-3xl font-bold text-white sm:text-4xl">نگهداری سایت خود را با خیال آسوده به رومونت بسپارید</h2>
        <p class="mx-auto mt-5 max-w-2xl text-sm leading-8 text-neutral-300">اگر سایت وردپرسی شما به پشتیبانی فنی، نگهداری منظم یا رسیدگی به مشکلات نیاز دارد، درخواست خود را ارسال کنید تا پس از بررسی شرایط سایت، پیشنهاد مناسبی دریافت کنید.</p>
        <div class="mt-8 flex flex-col justify-center gap-3 sm:flex-row">
            <a href="#inquiry" class="inline-flex min-h-12 items-center justify-center rounded-xl bg-amber-500 px-7 text-sm font-bold text-black transition hover:bg-amber-400">درخواست پشتیبانی سایت</a>
            <a href="tel:+982191015642" class="inline-flex min-h-12 items-center justify-center rounded-xl border border-white/15 px-7 text-sm font-semibold text-white transition hover:border-amber-400/60 hover:text-amber-300">تماس با رومونت</a>
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
