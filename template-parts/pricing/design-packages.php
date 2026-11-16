<section class="border-y border-white/10 bg-white/[0.02]">
    <div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
        <div class="max-w-2xl">
            <p class="text-sm font-semibold text-amber-400">سطح همکاری</p>
            <h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">پکیج‌های طراحی سایت رومونت</h2>
            <p class="mt-4 text-sm leading-7 text-neutral-400">این دسته‌بندی‌ها برای شروع گفتگو هستند؛ محدوده و قیمت نهایی پس از بررسی نیازهای پروژه مشخص می‌شود.</p>
        </div>
        <div class="mt-12 grid gap-4 lg:grid-cols-3">
            <?php
            $packages = array(
                array( 'title' => 'پکیج شروع', 'for' => 'برای کسب‌وکارهای کوچک و متخصصانی که به حضور آنلاین ساده نیاز دارند.', 'items' => array( 'صفحات ضروری وب‌سایت', 'طراحی واکنش‌گرا', 'فرم تماس پایه', 'تنظیمات اولیه سئو و راه‌اندازی' ) ),
                array( 'title' => 'پکیج حرفه‌ای', 'for' => 'برای کسب‌وکارهایی که به ساختاری کامل‌تر و منسجم‌تر نیاز دارند.', 'items' => array( 'ساختار کامل‌تر صفحات', 'طراحی بصری دقیق‌تر', 'بخش وبلاگ و محتوا', 'امکانات تکمیلی و سازمان‌دهی محتوا' ), 'featured' => true ),
                array( 'title' => 'پکیج اختصاصی', 'for' => 'برای کسب‌وکارهایی با نیازهای تخصصی و فرایندهای سفارشی.', 'items' => array( 'تحلیل نیازمندی‌ها', 'طراحی UI/UX اختصاصی', 'قابلیت‌ها و توسعه سفارشی', 'اتصال API و تست متناسب با پروژه' ) ),
            );
            foreach ( $packages as $package ) :
            ?>
                <article class="<?php echo ! empty( $package['featured'] ) ? 'border-amber-400/50 bg-amber-500/[0.06]' : 'border-white/10 bg-white/[0.03]'; ?> rounded-2xl border p-6">
                    <?php if ( ! empty( $package['featured'] ) ) : ?><span class="text-xs font-semibold text-amber-400">انتخاب متداول‌تر</span><?php endif; ?>
                    <h3 class="mt-2 text-2xl font-bold text-white"><?php echo esc_html( $package['title'] ); ?></h3>
                    <p class="mt-3 min-h-14 text-sm leading-7 text-neutral-400"><?php echo esc_html( $package['for'] ); ?></p>
                    <ul class="mt-6 space-y-3 text-sm text-neutral-300">
                        <?php foreach ( $package['items'] as $item ) : ?><li class="flex gap-2"><span class="text-amber-400">✓</span><?php echo esc_html( $item ); ?></li><?php endforeach; ?>
                    </ul>
                    <a href="#inquiry" class="mt-8 inline-flex min-h-11 w-full items-center justify-center rounded-xl <?php echo ! empty( $package['featured'] ) ? 'bg-amber-500 text-black hover:bg-amber-400' : 'bg-white/10 text-white hover:bg-white/15'; ?> text-sm font-bold transition">درخواست بررسی <?php echo esc_html( $package['title'] ); ?></a>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
