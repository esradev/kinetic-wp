<?php
/**
 * Template Name: طراحی سایت
 * Template Post Type: page
 *
 * @package Romonet_WPStorm
 */

get_header();
?>

<main class="min-h-screen pb-24" dir="rtl" xyz-data="romonetDesignPricing()">
    <section class="mx-auto max-w-7xl px-4 pb-20 pt-16 sm:px-6 lg:px-8 lg:pt-24">
        <div class="max-w-3xl">
            <p class="text-sm font-semibold text-amber-400">خدمات طراحی سایت رومونت</p>
            <h1 class="mt-4 text-4xl font-bold leading-[1.4] tracking-tight text-white sm:text-6xl">طراحی سایت حرفه‌ای برای کسب‌وکار شما</h1>
            <p class="mt-6 max-w-2xl text-base leading-8 text-neutral-300 sm:text-lg">در رومونت، وب‌سایت متناسب با نیاز، هویت برند و اهداف کسب‌وکار شما طراحی و اجرا می‌شود. از وب‌سایت‌های شرکتی و خدماتی تا فروشگاه‌های اینترنتی و پروژه‌های اختصاصی، راهکار مناسب خود را انتخاب کنید.</p>
            <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                <a href="#inquiry" class="inline-flex min-h-12 items-center justify-center rounded-xl bg-amber-500 px-7 text-sm font-bold text-black transition hover:bg-amber-400">درخواست مشاوره طراحی سایت</a>
                <a href="<?php echo esc_url( home_url( '/#projects' ) ); ?>" class="inline-flex min-h-12 items-center justify-center rounded-xl border border-white/15 px-7 text-sm font-semibold text-white transition hover:border-amber-400/60 hover:text-amber-300">مشاهده نمونه‌کارها</a>
            </div>
        </div>
    </section>

    <section class="border-y border-white/10 bg-white/[0.02]">
        <div class="mx-auto grid max-w-7xl gap-12 px-4 py-20 sm:px-6 lg:grid-cols-2 lg:items-center lg:px-8 lg:py-28">
            <div><p class="text-sm font-semibold text-amber-400">حضور حرفه‌ای در فضای آنلاین</p><h2 class="mt-3 text-3xl font-bold leading-[1.45] text-white sm:text-4xl">چرا کسب‌وکار شما به یک وب‌سایت حرفه‌ای نیاز دارد؟</h2></div>
            <ul class="grid gap-4 text-sm leading-7 text-neutral-300 sm:grid-cols-2"><?php foreach ( array( 'معرفی حرفه‌ای محصولات و خدمات', 'افزایش اعتبار برند در فضای آنلاین', 'ایجاد مسیر ارتباط مستقیم با مشتریان', 'معرفی و نمایش محصولات و نمونه‌کارها', 'امکان دریافت سفارش و درخواست آنلاین', 'توسعه فعالیت بازاریابی دیجیتال', 'ایجاد زیرساختی قابل توسعه برای آینده' ) as $benefit ) : ?><li class="flex items-start gap-3"><span class="text-amber-400" aria-hidden="true">✓</span><?php echo esc_html( $benefit ); ?></li><?php endforeach; ?></ul>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
        <div class="max-w-2xl"><p class="text-sm font-semibold text-amber-400">خدمات رومونت</p><h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">خدمات طراحی سایت رومونت</h2></div>
        <div class="mt-12 grid gap-4 md:grid-cols-2">
            <?php
            $services = array(
                array( 'title' => 'طراحی سایت شرکتی', 'description' => 'طراحی وب‌سایت برای معرفی شرکت، خدمات، توانمندی‌ها، پروژه‌ها و ایجاد ارتباط حرفه‌ای با مشتریان و مخاطبان.', 'features' => array( 'صفحه معرفی شرکت', 'معرفی خدمات', 'نمایش پروژه‌ها و نمونه‌کارها', 'فرم درخواست مشاوره', 'ساختار مناسب برای توسعه سئو' ) ),
                array( 'title' => 'طراحی سایت خدماتی', 'description' => 'ایجاد وب‌سایتی کاربردی برای معرفی خدمات، دریافت درخواست مشتریان و مدیریت ارتباط با مخاطبان.', 'features' => array( 'معرفی خدمات و تعرفه‌ها', 'فرم ثبت درخواست', 'صفحات فرود اختصاصی', 'اتصال ابزارهای ارتباطی', 'امکان توسعه امکانات موردنیاز' ) ),
                array( 'title' => 'طراحی سایت فروشگاهی', 'description' => 'طراحی و توسعه فروشگاه اینترنتی برای معرفی محصولات، مدیریت سفارش‌ها و فروش آنلاین با ووکامرس.', 'features' => array( 'مدیریت محصولات و دسته‌بندی‌ها', 'سبد خرید و ثبت سفارش', 'اتصال درگاه پرداخت', 'مدیریت سفارش‌ها', 'اتصال سرویس‌های پیامکی' ) ),
                array( 'title' => 'طراحی و توسعه اختصاصی سایت', 'description' => 'برای پروژه‌هایی که به امکانات و فرآیندهای اختصاصی نیاز دارند، ساختار و قابلیت‌های سایت متناسب با نیاز پروژه توسعه داده می‌شود.', 'features' => array( 'تحلیل نیازهای پروژه', 'طراحی ساختار اختصاصی', 'توسعه قابلیت‌های سفارشی', 'اتصال API و سرویس‌های خارجی', 'معماری قابل توسعه' ) ),
            );
            foreach ( $services as $service ) :
            ?>
                <article class="rounded-2xl border border-white/10 bg-white/[0.03] p-6 sm:p-8"><span class="flex h-11 w-11 items-center justify-center rounded-xl bg-amber-500/10 text-xl text-amber-400" aria-hidden="true">+</span><h3 class="mt-6 text-xl font-bold text-white"><?php echo esc_html( $service['title'] ); ?></h3><p class="mt-3 text-sm leading-8 text-neutral-400"><?php echo esc_html( $service['description'] ); ?></p><ul class="mt-6 space-y-2 text-sm leading-7 text-neutral-300"><?php foreach ( $service['features'] as $feature ) : ?><li class="flex gap-2"><span class="text-amber-400">✓</span><?php echo esc_html( $feature ); ?></li><?php endforeach; ?></ul></article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="border-y border-white/10 bg-white/[0.02]">
        <div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28"><div class="max-w-2xl"><p class="text-sm font-semibold text-amber-400">انتخاب مسیر فنی</p><h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">طراحی سایت با وردپرس یا توسعه اختصاصی؟</h2><p class="mt-4 text-sm leading-8 text-neutral-400">انتخاب فناوری مناسب به نیازها، پیچیدگی فرآیندها و مسیر رشد پروژه بستگی دارد. هیچ روش واحدی برای همه کسب‌وکارها بهترین نیست.</p></div><div class="mt-10 grid gap-5 lg:grid-cols-2"><article class="rounded-2xl border border-white/10 bg-white/[0.03] p-6 sm:p-8"><h3 class="text-2xl font-bold text-white">وردپرس</h3><ul class="mt-6 space-y-3 text-sm leading-7 text-neutral-300"><?php foreach ( array( 'مناسب برای بسیاری از وب‌سایت‌های شرکتی و خدماتی', 'امکان استفاده از اکوسیستم افزونه‌ها', 'مدیریت محتوای آسان', 'توسعه با قالب و افزونه‌های اختصاصی', 'مناسب برای بسیاری از فروشگاه‌های اینترنتی با WooCommerce' ) as $item ) : ?><li class="flex gap-2"><span class="text-amber-400">✓</span><?php echo esc_html( $item ); ?></li><?php endforeach; ?></ul></article><article class="rounded-2xl border border-amber-400/30 bg-amber-500/[0.05] p-6 sm:p-8"><h3 class="text-2xl font-bold text-white">توسعه اختصاصی</h3><ul class="mt-6 space-y-3 text-sm leading-7 text-neutral-300"><?php foreach ( array( 'مناسب برای نیازهای خاص و فرآیندهای پیچیده', 'امکان طراحی معماری متناسب با پروژه', 'کنترل بیشتر روی منطق و قابلیت‌های اختصاصی', 'مناسب برای سامانه‌ها و پروژه‌های نرم‌افزاری خاص', 'نیازمند تحلیل، زمان و بودجه متناسب با پیچیدگی پروژه' ) as $item ) : ?><li class="flex gap-2"><span class="text-amber-400">✓</span><?php echo esc_html( $item ); ?></li><?php endforeach; ?></ul></article></div><a href="#inquiry" class="mt-8 inline-flex min-h-12 items-center justify-center rounded-xl bg-amber-500 px-7 text-sm font-bold text-black transition hover:bg-amber-400">برای انتخاب روش مناسب مشاوره بگیرید</a></div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28"><div class="max-w-2xl"><p class="text-sm font-semibold text-amber-400">کیفیت اجرا</p><h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">ویژگی‌های یک وب‌سایت حرفه‌ای</h2></div><div class="mt-12 grid gap-4 sm:grid-cols-2 lg:grid-cols-4"><?php $qualities = array( array( 'طراحی واکنش‌گرا', 'نمایش صحیح وب‌سایت در موبایل، تبلت و دسکتاپ.' ), array( 'رابط کاربری مناسب', 'طراحی ساده، منظم و متناسب با هویت بصری برند.' ), array( 'تجربه کاربری مطلوب', 'دسترسی آسان کاربران به اطلاعات و امکانات سایت.' ), array( 'ساختار مناسب سئو', 'رعایت اصول فنی و ساختاری موردنیاز موتورهای جست‌وجو.' ), array( 'امنیت و نگهداری', 'توجه به اصول امنیتی و امکان نگهداری و به‌روزرسانی سایت.' ), array( 'سرعت و عملکرد', 'توجه به بهینه‌سازی منابع و عملکرد مناسب صفحات.' ), array( 'قابلیت توسعه', 'امکان اضافه کردن امکانات جدید متناسب با رشد کسب‌وکار.' ), array( 'مدیریت آسان', 'فراهم کردن امکان مدیریت محتوا و اطلاعات متناسب با نوع پروژه.' ) ); foreach ( $qualities as $quality ) : ?><article class="rounded-2xl border border-white/10 bg-white/[0.03] p-5"><h3 class="font-bold text-white"><?php echo esc_html( $quality[0] ); ?></h3><p class="mt-3 text-sm leading-7 text-neutral-400"><?php echo esc_html( $quality[1] ); ?></p></article><?php endforeach; ?></div></section>

    <section class="border-y border-white/10 bg-white/[0.02]"><div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28"><div class="max-w-2xl"><p class="text-sm font-semibold text-amber-400">فرآیند همکاری</p><h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">مراحل طراحی و اجرای سایت در رومونت</h2></div><ol class="mt-12 grid gap-8 md:grid-cols-5"><?php $steps = array( array( 'شناخت نیازها', 'ابتدا نوع کسب‌وکار، مخاطبان، اهداف و امکانات موردنیاز پروژه بررسی می‌شود.' ), array( 'تحلیل و پیشنهاد', 'راهکار فنی، محدوده خدمات، زمان‌بندی و هزینه پیشنهادی مشخص می‌شود.' ), array( 'طراحی و توسعه', 'طراحی رابط کاربری و پیاده‌سازی فنی بر اساس توافق انجام می‌شود.' ), array( 'تست و بهینه‌سازی', 'عملکرد صفحات، نمایش در دستگاه‌های مختلف، فرم‌ها و امکانات بررسی می‌شوند.' ), array( 'تحویل و پشتیبانی', 'سایت تحویل می‌شود و شرایط پشتیبانی طبق توافق مشخص خواهد شد.' ) ); foreach ( $steps as $index => $step ) : ?><li class="border-t border-white/15 pt-5"><span class="text-sm font-bold text-amber-400">۰<?php echo esc_html( $index + 1 ); ?></span><h3 class="mt-3 font-bold leading-7 text-white"><?php echo esc_html( $step[0] ); ?></h3><p class="mt-2 text-sm leading-7 text-neutral-400"><?php echo esc_html( $step[1] ); ?></p></li><?php endforeach; ?></ol></div></section>

    <section class="mx-auto grid max-w-7xl gap-12 px-4 py-20 sm:px-6 lg:grid-cols-2 lg:px-8 lg:py-28"><div><p class="text-sm font-semibold text-amber-400">محدوده پروژه</p><h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">در پروژه طراحی سایت چه خدماتی دریافت می‌کنید؟</h2><p class="mt-5 text-sm leading-8 text-neutral-400">محدوده نهایی بر اساس پیشنهاد تأییدشده مشخص می‌شود. موارد زیر می‌توانند بخشی از پروژه باشند:</p></div><div><div class="grid gap-3 text-sm leading-7 text-neutral-300 sm:grid-cols-2"><?php foreach ( array( 'تحلیل نیازهای اولیه', 'طراحی ساختار صفحات', 'طراحی رابط کاربری', 'پیاده‌سازی صفحات توافق‌شده', 'تنظیم نسخه واکنش‌گرا', 'پیاده‌سازی فرم‌های موردنیاز', 'تنظیمات اولیه فنی و سئو', 'بررسی و تست امکانات', 'تحویل و آموزش اولیه مدیریت سایت، در صورت توافق' ) as $item ) : ?><p class="flex gap-2"><span class="text-amber-400">✓</span><?php echo esc_html( $item ); ?></p><?php endforeach; ?></div><p class="mt-8 border-t border-white/10 pt-6 text-sm leading-8 text-neutral-400">خرید دامنه و هاست، لایسنس افزونه‌ها و سرویس‌های تجاری، تولید محتوای تخصصی، عکاسی، سئوی مستمر، پشتیبانی ماهانه و توسعه خارج از محدوده اولیه در صورت نیاز، با توافق جداگانه بررسی می‌شوند.</p></div></section>

    <section class="border-y border-white/10 bg-white/[0.02]"><div class="mx-auto max-w-7xl px-4 py-20 text-center sm:px-6 lg:px-8"><h2 class="text-3xl font-bold text-white sm:text-4xl">هزینه طراحی سایت چقدر است؟</h2><p class="mx-auto mt-5 max-w-2xl text-sm leading-8 text-neutral-400">هزینه به نوع وب‌سایت، تعداد و پیچیدگی صفحات، امکانات، روش پیاده‌سازی، طراحی اختصاصی و اتصال سرویس‌های خارجی بستگی دارد.</p><a href="<?php echo esc_url( home_url( '/site-design-pricing/' ) ); ?>" class="mt-8 inline-flex min-h-12 items-center justify-center rounded-xl border border-amber-400/40 px-7 text-sm font-bold text-amber-300 transition hover:bg-amber-400/10">مشاهده قیمت طراحی سایت</a></div></section>

    <?php get_template_part( 'template-parts/website-design/faq' ); ?>
    <?php get_template_part( 'template-parts/website-design/inquiry' ); ?>
</main>

<?php get_footer(); ?>
