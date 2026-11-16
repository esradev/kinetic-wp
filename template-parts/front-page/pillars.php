<section id="services" class="mx-auto max-w-7xl scroll-mt-24 px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
    <div class="max-w-2xl">
        <p class="text-sm font-semibold text-amber-400">خدمات رومونت</p>
        <h2 class="mt-3 text-3xl font-bold tracking-tight text-white sm:text-4xl">برای هر مرحله از مسیر دیجیتال شما</h2>
        <p class="mt-4 text-sm leading-7 text-neutral-400 sm:text-base">راهکارهای کاربردی و قابل توسعه، متناسب با نیاز واقعی کسب‌وکار شما.</p>
    </div>

    <div class="mt-12 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
        <?php
        $services = array(
            array(
                'title' => 'طراحی سایت',
                'description' => 'طراحی و پیاده‌سازی وب‌سایت‌های شرکتی، خدماتی و اختصاصی متناسب با نیاز کسب‌وکار.',
                'url' => home_url( '/site-design-pricing' ),
                'icon' => '<path d="m12 3 8 4.5-8 4.5-8-4.5L12 3Z"/><path d="m4 12 8 4.5 8-4.5"/><path d="m4 16.5 8 4.5 8-4.5"/>',
            ),
            array(
                'title' => 'پشتیبانی وردپرس',
                'description' => 'نگهداری، رفع خطا، بهینه‌سازی، امنیت و پشتیبانی فنی وب‌سایت‌های وردپرسی.',
                'url' => home_url( '/maintenance-pricing' ),
                'icon' => '<path d="M12 3 20 7v5c0 4.8-3.3 7.7-8 9-4.7-1.3-8-4.2-8-9V7l8-4Z"/><path d="m9 12 2 2 4-4"/>',
            ),
            array(
                'title' => 'طراحی و توسعه فروشگاه اینترنتی',
                'description' => 'راه‌اندازی و توسعه فروشگاه‌های اینترنتی با ووکامرس، از امکانات پایه تا قابلیت‌های اختصاصی.',
                'url' => home_url( '/site-design-pricing' ),
                'icon' => '<circle cx="9" cy="20" r="1"/><circle cx="18" cy="20" r="1"/><path d="M3 4h2l2.4 11.2a2 2 0 0 0 2 1.6h7.8a2 2 0 0 0 2-1.6L21 8H6"/>',
            ),
            array(
                'title' => 'توسعه اختصاصی افزونه و قالب',
                'description' => 'برنامه‌نویسی و توسعه امکانات اختصاصی برای وردپرس و ووکامرس.',
                'url' => home_url( '/shop' ),
                'icon' => '<path d="m8 9-3 3 3 3"/><path d="m16 9 3 3-3 3"/><path d="m14 5-4 14"/>',
            ),
        );
        foreach ( $services as $service ) :
        ?>
            <a href="<?php echo esc_url( $service['url'] ); ?>" class="group rounded-2xl border border-white/10 bg-white/[0.03] p-6 transition hover:-translate-y-1 hover:border-amber-400/50 hover:bg-white/[0.05]">
                <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-amber-500/10 text-amber-400">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><?php echo $service['icon']; ?></svg>
                </span>
                <h3 class="mt-6 text-lg font-bold leading-8 text-white transition group-hover:text-amber-300"><?php echo esc_html( $service['title'] ); ?></h3>
                <p class="mt-3 text-sm leading-7 text-neutral-400"><?php echo esc_html( $service['description'] ); ?></p>
                <span class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-amber-400">جزئیات خدمت <span aria-hidden="true">←</span></span>
            </a>
        <?php endforeach; ?>
    </div>
</section>
