<?php
$is_home = is_front_page();
$services_url = $is_home ? '#services' : home_url( '/site-design-pricing' );
$projects_url = $is_home ? '#projects' : home_url( '/blog' );
$contact_url = $is_home ? '#contact' : home_url( '/site-design-pricing' );
?>
<div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
    <div class="grid gap-10 md:grid-cols-[1.4fr_0.8fr_0.8fr_1fr]">
        <div>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="inline-flex items-center gap-3 text-white">
                <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-500 text-xl font-black text-black">R</span>
                <span class="text-lg font-bold">رومونت<span class="text-amber-400">.ir</span></span>
            </a>
            <p class="mt-5 max-w-sm text-sm leading-8 text-neutral-400">راهکارهای دیجیتال روشن، قابل توسعه و متناسب با نیاز واقعی کسب‌وکار شما.</p>
        </div>

        <nav aria-label="پیوندهای اصلی">
            <h2 class="font-bold text-white">دسترسی سریع</h2>
            <ul class="mt-4 space-y-3 text-sm">
                <li><a href="<?php echo esc_url( $services_url ); ?>" class="transition hover:text-amber-300">خدمات</a></li>
                <li><a href="<?php echo esc_url( $projects_url ); ?>" class="transition hover:text-amber-300">پروژه‌ها</a></li>
                <li><a href="<?php echo esc_url( home_url( '/blog' ) ); ?>" class="transition hover:text-amber-300">وبلاگ</a></li>
                <li><a href="<?php echo esc_url( $contact_url ); ?>" class="transition hover:text-amber-300">درخواست مشاوره</a></li>
            </ul>
        </nav>

        <nav aria-label="خدمات">
            <h2 class="font-bold text-white">خدمات</h2>
            <ul class="mt-4 space-y-3 text-sm">
                <li><a href="<?php echo esc_url( home_url( '/site-design-pricing' ) ); ?>" class="transition hover:text-amber-300">طراحی سایت</a></li>
                <li><a href="<?php echo esc_url( home_url( '/maintenance-pricing' ) ); ?>" class="transition hover:text-amber-300">پشتیبانی وردپرس</a></li>
                <li><a href="<?php echo esc_url( home_url( '/site-design-pricing' ) ); ?>" class="transition hover:text-amber-300">فروشگاه اینترنتی</a></li>
                <li><a href="<?php echo esc_url( home_url( '/shop' ) ); ?>" class="transition hover:text-amber-300">افزونه و قالب اختصاصی</a></li>
            </ul>
        </nav>

        <div>
            <h2 class="font-bold text-white">ارتباط با ما</h2>
            <ul class="mt-4 space-y-3 text-sm">
                <li><a href="tel:+989155772051" dir="ltr" class="inline-block transition hover:text-amber-300">09155772051</a></li>
                <li><a href="mailto:info@romonet.ir" dir="ltr" class="inline-block transition hover:text-amber-300">info@romonet.ir</a></li>
            </ul>
        </div>
    </div>

    <div class="mt-10 flex flex-col gap-3 border-t border-white/10 pt-6 text-xs text-neutral-500 sm:flex-row sm:items-center sm:justify-between">
        <p>© <?php echo esc_html( date( 'Y' ) ); ?> تمامی حقوق برای رومونت محفوظ است.</p>
        <div class="flex flex-wrap gap-5">
            <a href="<?php echo esc_url( home_url( '/terms' ) ); ?>" class="transition hover:text-neutral-300">قوانین و مقررات</a>
            <a href="<?php echo esc_url( home_url( '/privacy' ) ); ?>" class="transition hover:text-neutral-300">حریم خصوصی</a>
        </div>
    </div>
</div>
