<section class="border-y border-white/10 bg-white/[0.02]">
    <div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
        <div class="max-w-2xl">
            <p class="text-sm font-semibold text-amber-400">مسیر همکاری</p>
            <h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">مراحل طراحی و اجرای سایت در رومونت</h2>
        </div>
        <ol class="mt-12 grid gap-8 md:grid-cols-5">
            <?php foreach ( array( 'دریافت نیازها و شناخت کسب‌وکار', 'بررسی امکانات و برآورد هزینه', 'توافق بر محدوده و زمان‌بندی', 'طراحی، توسعه و تست', 'تحویل سایت و پشتیبانی طبق توافق' ) as $index => $step ) : ?>
                <li class="border-t border-white/15 pt-5">
                    <span class="text-sm font-bold text-amber-400">۰<?php echo esc_html( $index + 1 ); ?></span>
                    <h3 class="mt-3 text-base font-bold leading-7 text-white"><?php echo esc_html( $step ); ?></h3>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
</section>

<section class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
    <div class="grid gap-12 lg:grid-cols-[0.8fr_1.2fr]">
        <div>
            <p class="text-sm font-semibold text-amber-400">شفافیت در محدوده</p>
            <h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">در هزینه طراحی سایت چه خدماتی لحاظ می‌شود؟</h2>
        </div>
        <div class="grid gap-8 sm:grid-cols-2">
            <div>
                <h3 class="font-bold text-white">تحویل‌های متداول پروژه</h3>
                <ul class="mt-4 space-y-3 text-sm leading-7 text-neutral-400"><?php foreach ( array( 'طراحی و پیاده‌سازی سایت', 'چیدمان واکنش‌گرا', 'پیکربندی صفحات توافق‌شده', 'تنظیمات فنی اولیه', 'تست پیش از تحویل', 'راهنمای اولیه استفاده' ) as $item ) : ?><li>✓ <?php echo esc_html( $item ); ?></li><?php endforeach; ?></ul>
            </div>
            <div>
                <h3 class="font-bold text-white">خدماتی که ممکن است جدا باشند</h3>
                <ul class="mt-4 space-y-3 text-sm leading-7 text-neutral-400"><?php foreach ( array( 'دامنه و هاست', 'لایسنس نرم‌افزارهای تجاری', 'تولید محتوای حرفه‌ای', 'ورود حجم بالای محصولات', 'کمپین‌های پیشرفته سئو', 'پشتیبانی و امکانات بعدی' ) as $item ) : ?><li>• <?php echo esc_html( $item ); ?></li><?php endforeach; ?></ul>
            </div>
        </div>
    </div>
</section>

<section class="border-y border-white/10 bg-white/[0.02]">
    <div class="mx-auto max-w-4xl px-4 py-20 sm:px-6 lg:px-8">
        <p class="text-sm font-semibold text-amber-400">پاسخ به پرسش‌های رایج</p>
        <h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">سؤالات متداول درباره قیمت طراحی سایت</h2>
        <div class="mt-10 divide-y divide-white/10">
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
        <h2 class="text-3xl font-bold text-white sm:text-4xl">برای طراحی سایت کسب‌وکارتان برنامه دارید؟</h2>
        <p class="mx-auto mt-5 max-w-2xl text-sm leading-8 text-neutral-300">نیازها و ایده خود را با رومونت در میان بگذارید. پس از بررسی اولیه، مسیر مناسب اجرا و برآورد هزینه پروژه را پیشنهاد می‌کنیم.</p>
        <div class="mt-8 flex flex-col justify-center gap-3 sm:flex-row">
            <a href="#inquiry" class="inline-flex min-h-12 items-center justify-center rounded-xl bg-amber-500 px-7 text-sm font-bold text-black transition hover:bg-amber-400">درخواست مشاوره طراحی سایت</a>
            <a href="tel:+982191015642" class="inline-flex min-h-12 items-center justify-center rounded-xl border border-white/15 px-7 text-sm font-semibold text-white transition hover:border-amber-400/60 hover:text-amber-300">تماس با رومونت</a>
        </div>
    </div>
    <nav class="mt-10 flex flex-wrap justify-center gap-x-6 gap-y-3 text-sm text-neutral-400" aria-label="خدمات مرتبط">
        <a href="<?php echo esc_url( home_url( '/site-design-pricing' ) ); ?>" class="hover:text-amber-300">طراحی سایت</a>
        <a href="<?php echo esc_url( home_url( '/site-design-pricing' ) ); ?>" class="hover:text-amber-300">طراحی و توسعه فروشگاه ووکامرس</a>
        <a href="<?php echo esc_url( home_url( '/maintenance-pricing' ) ); ?>" class="hover:text-amber-300">پشتیبانی وردپرس</a>
        <a href="<?php echo esc_url( home_url( '/shop' ) ); ?>" class="hover:text-amber-300">توسعه اختصاصی افزونه و قالب</a>
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
