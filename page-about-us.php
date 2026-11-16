<?php
/**
 * Template Name: درباره رومونت
 * Template Post Type: page
 *
 * @package Romonet_WPStorm
 */

get_header();
?>

<main class="min-h-screen pb-24" dir="rtl">
    <section class="mx-auto max-w-7xl px-4 pb-20 pt-16 sm:px-6 lg:px-8 lg:pt-24">
        <div class="max-w-3xl">
            <p class="text-sm font-semibold text-amber-400">رومونت</p>
            <h1 class="mt-4 text-4xl font-bold leading-[1.4] tracking-tight text-white sm:text-6xl">درباره رومونت</h1>
            <p class="mt-4 text-xl font-semibold text-neutral-200 sm:text-2xl">همراه کسب‌وکار شما در مسیر رشد دیجیتال</p>
            <p class="mt-6 max-w-2xl text-base leading-8 text-neutral-300 sm:text-lg">رومونت با تمرکز بر طراحی و توسعه وب، برنامه‌نویسی وردپرس و ارائه راهکارهای دیجیتال، به کسب‌وکارها کمک می‌کند حضور حرفه‌ای‌تری در فضای آنلاین داشته باشند.</p>
            <a href="<?php echo esc_url( home_url( '/#services' ) ); ?>" class="mt-8 inline-flex min-h-12 items-center justify-center rounded-xl bg-amber-500 px-7 text-sm font-bold text-black transition hover:bg-amber-400">مشاهده خدمات</a>
        </div>
    </section>

    <section class="border-y border-white/10 bg-white/[0.02]">
        <div class="mx-auto grid max-w-7xl gap-12 px-4 py-20 sm:px-6 lg:grid-cols-2 lg:items-center lg:px-8 lg:py-28">
            <div>
                <p class="text-sm font-semibold text-amber-400">رویکرد رومونت</p>
                <h2 class="mt-3 text-3xl font-bold leading-[1.45] text-white sm:text-4xl">راهکارهای دیجیتال روشن و قابل توسعه</h2>
            </div>
            <div class="space-y-5 text-sm leading-8 text-neutral-300 sm:text-base">
                <p>رومونت در زمینه طراحی سایت، توسعه وردپرس، ساخت فروشگاه اینترنتی و برنامه‌نویسی اختصاصی فعالیت می‌کند.</p>
                <p>تمرکز ما روی شناخت مسئله واقعی کسب‌وکار، انتخاب راهکار متناسب و ساخت تجربه‌ای است که در ادامه مسیر نیز قابل مدیریت و توسعه باشد.</p>
                <p>از طراحی اولیه تا نگهداری و بهبود فنی، تلاش می‌کنیم ارتباط شفاف و مسیر اجرایی قابل فهمی برای هر پروژه ایجاد کنیم.</p>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
        <div class="max-w-2xl">
            <p class="text-sm font-semibold text-amber-400">توانمندی‌های ما</p>
            <h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">خدمات رومونت</h2>
        </div>
        <div class="mt-12 grid gap-4 md:grid-cols-2 lg:grid-cols-5">
            <?php
            $services = array(
                array( 'title' => 'طراحی سایت', 'description' => 'وب‌سایت‌های شرکتی و خدماتی متناسب با نیاز کسب‌وکار.', 'url' => home_url( '/site-design-pricing/' ) ),
                array( 'title' => 'پشتیبانی و نگهداری وردپرس', 'description' => 'نگهداری، رفع خطا و بهبود فنی سایت‌های وردپرسی.', 'url' => home_url( '/maintenance-pricing/' ) ),
                array( 'title' => 'طراحی و توسعه فروشگاه اینترنتی', 'description' => 'راه‌اندازی و توسعه فروشگاه‌های ووکامرسی.', 'url' => home_url( '/site-design-pricing/' ) ),
                array( 'title' => 'توسعه اختصاصی افزونه و قالب', 'description' => 'ساخت امکانات اختصاصی برای وردپرس و ووکامرس.', 'url' => home_url( '/shop/' ) ),
                array( 'title' => 'راهکارهای پیامکی و اتوماسیون', 'description' => 'مدیریت پیامک کسب‌وکار با پلن‌های پنل پیامکی.', 'url' => home_url( '/sms-pricing/' ) ),
            );
            foreach ( $services as $service ) :
            ?>
                <a href="<?php echo esc_url( $service['url'] ); ?>" class="group rounded-2xl border border-white/10 bg-white/[0.03] p-5 transition hover:border-amber-400/50 hover:bg-white/[0.05]">
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-500/10 text-lg text-amber-400" aria-hidden="true">+</span>
                    <h3 class="mt-5 text-base font-bold leading-7 text-white transition group-hover:text-amber-300"><?php echo esc_html( $service['title'] ); ?></h3>
                    <p class="mt-3 text-sm leading-7 text-neutral-400"><?php echo esc_html( $service['description'] ); ?></p>
                </a>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="border-y border-white/10 bg-white/[0.02]">
        <div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
            <div class="max-w-2xl">
                <p class="text-sm font-semibold text-amber-400">شیوه همکاری</p>
                <h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">اصولی که در هر پروژه دنبال می‌کنیم</h2>
            </div>
            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-5">
                <?php foreach ( array( 'شناخت نیاز واقعی', 'ارائه راهکار متناسب', 'توسعه اصولی', 'شفافیت در همکاری', 'پشتیبانی و همراهی' ) as $index => $principle ) : ?>
                    <article class="border-r-2 border-amber-400 pr-5"><span class="text-sm font-bold text-amber-400">۰<?php echo esc_html( $index + 1 ); ?></span><h3 class="mt-3 font-bold leading-7 text-white"><?php echo esc_html( $principle ); ?></h3></article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
        <div class="mx-auto max-w-3xl text-center">
            <p class="text-sm font-semibold text-amber-400">چرا رومونت؟</p>
            <h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">یک مسیر فنی منسجم برای رشد آنلاین</h2>
            <p class="mt-5 text-sm leading-8 text-neutral-300 sm:text-base">ترکیب طراحی وب، توسعه وردپرس، برنامه‌نویسی اختصاصی و پشتیبانی فنی کمک می‌کند تصمیم‌های پروژه از ابتدا با نیازهای واقعی کسب‌وکار هماهنگ باشند و در ادامه نیز امکان بهبود و توسعه وجود داشته باشد.</p>
        </div>
    </section>

    <section class="px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-5xl rounded-3xl border border-amber-400/25 bg-amber-500/[0.07] px-6 py-14 text-center sm:px-12">
            <h2 class="text-3xl font-bold text-white sm:text-4xl">آماده همکاری هستیم؟</h2>
            <p class="mx-auto mt-5 max-w-2xl text-sm leading-8 text-neutral-300">اگر برای کسب‌وکار خود به طراحی سایت، راه‌اندازی فروشگاه اینترنتی، توسعه اختصاصی وردپرس یا پشتیبانی فنی نیاز دارید، خوشحال می‌شویم درباره پروژه شما بیشتر بدانیم.</p>
            <div class="mt-8 flex flex-col justify-center gap-3 sm:flex-row">
                <a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>" class="inline-flex min-h-12 items-center justify-center rounded-xl bg-amber-500 px-7 text-sm font-bold text-black transition hover:bg-amber-400">درخواست مشاوره</a>
                <a href="<?php echo esc_url( home_url( '/#services' ) ); ?>" class="inline-flex min-h-12 items-center justify-center rounded-xl border border-white/15 px-7 text-sm font-semibold text-white transition hover:border-amber-400/60 hover:text-amber-300">مشاهده خدمات رومونت</a>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>