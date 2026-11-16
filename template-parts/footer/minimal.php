<?php
$navigation = romonet_global_navigation();
?>
<div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
    <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-[1.35fr_1fr_1fr_1fr]">
        <div>
            <a href="<?php echo esc_url( $navigation['home'] ); ?>" class="inline-flex items-center gap-3 text-white" aria-label="رومونت، صفحه اصلی">
                <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-500 text-xl font-black text-black">R</span>
                <span class="text-lg font-bold">رومونت<span class="text-amber-400">.ir</span></span>
            </a>
            <p class="mt-5 max-w-sm text-sm leading-8 text-neutral-400">رومونت ارائه‌دهنده خدمات طراحی سایت، توسعه وردپرس، طراحی فروشگاه اینترنتی و راهکارهای دیجیتال برای کسب‌وکارهاست.</p>
        </div>

        <nav aria-label="خدمات رومونت">
            <h2 class="font-bold text-white">خدمات رومونت</h2>
            <ul class="mt-5 space-y-3 text-sm">
                <?php foreach ( $navigation['service_items'] as $item ) : ?>
                    <li><a href="<?php echo esc_url( $item['url'] ); ?>" class="transition hover:text-amber-300"><?php echo esc_html( $item['label'] ); ?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <nav aria-label="تعرفه‌ها و دسترسی سریع">
            <h2 class="font-bold text-white">تعرفه‌ها و دسترسی سریع</h2>
            <ul class="mt-5 space-y-3 text-sm">
                <?php foreach ( $navigation['pricing_items'] as $item ) : ?>
                    <li><a href="<?php echo esc_url( $item['url'] ); ?>" class="transition hover:text-amber-300"><?php echo esc_html( $item['label'] ); ?></a></li>
                <?php endforeach; ?>
                <li><a href="<?php echo esc_url( $navigation['home'] ); ?>" class="transition hover:text-amber-300">صفحه اصلی</a></li>
                <li><a href="<?php echo esc_url( $navigation['portfolio'] ); ?>" class="transition hover:text-amber-300">نمونه‌کارها</a></li>
                <li><a href="<?php echo esc_url( $navigation['articles'] ); ?>" class="transition hover:text-amber-300">مقالات آموزشی</a></li>
                <li><a href="<?php echo esc_url( $navigation['about'] ); ?>" class="transition hover:text-amber-300">درباره ما</a></li>
            </ul>
        </nav>

        <div>
            <h2 class="font-bold text-white">ارتباط با رومونت</h2>
            <ul class="mt-5 space-y-3 text-sm">
                <li><a href="tel:+989155772051" dir="ltr" class="inline-block transition hover:text-amber-300">09155772051</a></li>
                <li><a href="<?php echo esc_url( $navigation['contact'] ); ?>" class="transition hover:text-amber-300">تماس با ما</a></li>
                <li><a href="mailto:info@romonet.ir" dir="ltr" class="inline-block transition hover:text-amber-300">info@romonet.ir</a></li>
            </ul>
        </div>
    </div>

    <div class="mt-12 flex flex-col gap-3 border-t border-white/10 pt-6 text-xs text-neutral-500 sm:flex-row sm:items-center sm:justify-between">
        <p>تمام حقوق این وب‌سایت متعلق به رومونت است. © <?php echo esc_html( date_i18n( 'Y' ) ); ?></p>
        <a href="<?php echo esc_url( $navigation['consultation'] ); ?>" class="transition hover:text-amber-300">درخواست مشاوره</a>
    </div>
</div>
