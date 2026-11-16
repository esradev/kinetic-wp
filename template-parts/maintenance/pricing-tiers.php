<section class="border-y border-white/10 bg-white/[0.02]">
    <div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
        <div class="max-w-2xl">
            <p class="text-sm font-semibold text-amber-400">سطح همکاری</p>
            <h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">پلن‌های پشتیبانی سایت رومونت</h2>
            <p class="mt-4 text-sm leading-7 text-neutral-400">قیمت نهایی و محدوده خدمات پس از بررسی سایت و توافق بر جزئیات قرارداد مشخص می‌شود.</p>
        </div>
        <div class="mt-12 grid gap-4 lg:grid-cols-3">
            <?php
            $plans = array(
                array( 'title' => 'پشتیبانی پایه', 'for' => 'برای سایت‌های کوچک که به نگهداری دوره‌ای نیاز دارند.', 'items' => array( 'بررسی دوره‌ای وضعیت سایت', 'به‌روزرسانی کنترل‌شده وردپرس', 'به‌روزرسانی قالب و افزونه‌ها', 'بررسی اولیه خطاها و بکاپ' ) ),
                array( 'title' => 'پشتیبانی حرفه‌ای', 'for' => 'برای سایت‌های کسب‌وکاری که به رسیدگی منظم‌تر نیاز دارند.', 'items' => array( 'تمام خدمات پلن پایه', 'بررسی منظم‌تر عملکرد سایت', 'رسیدگی به مشکلات فنی بیشتر', 'بررسی امنیت و تغییرات جزئی توافق‌شده' ), 'featured' => true ),
                array( 'title' => 'پشتیبانی اختصاصی', 'for' => 'برای سایت‌های پیچیده و فروشگاه‌هایی با نیازهای اختصاصی.', 'items' => array( 'بررسی کامل نیازهای فنی', 'برنامه نگهداری متناسب با ساختار سایت', 'پشتیبانی فنی اختصاصی', 'تعیین سطح پاسخ‌گویی و توسعه در قرارداد' ) ),
            );
            foreach ( $plans as $plan ) :
            ?>
                <article class="<?php echo ! empty( $plan['featured'] ) ? 'border-amber-400/50 bg-amber-500/[0.06]' : 'border-white/10 bg-white/[0.03]'; ?> rounded-2xl border p-6">
                    <?php if ( ! empty( $plan['featured'] ) ) : ?><span class="text-xs font-semibold text-amber-400">برای بسیاری از سایت‌های کسب‌وکاری</span><?php endif; ?>
                    <h3 class="mt-2 text-2xl font-bold text-white"><?php echo esc_html( $plan['title'] ); ?></h3>
                    <p class="mt-3 min-h-14 text-sm leading-7 text-neutral-400"><?php echo esc_html( $plan['for'] ); ?></p>
                    <p class="mt-6 text-lg font-bold text-amber-400">استعلام قیمت</p>
                    <ul class="mt-5 space-y-3 text-sm text-neutral-300">
                        <?php foreach ( $plan['items'] as $item ) : ?><li class="flex gap-2"><span class="text-amber-400">✓</span><?php echo esc_html( $item ); ?></li><?php endforeach; ?>
                    </ul>
                    <a href="#inquiry" class="mt-8 inline-flex min-h-11 w-full items-center justify-center rounded-xl <?php echo ! empty( $plan['featured'] ) ? 'bg-amber-500 text-black hover:bg-amber-400' : 'bg-white/10 text-white hover:bg-white/15'; ?> text-sm font-bold transition"><?php echo esc_html( $plan['title'] === 'پشتیبانی اختصاصی' ? 'درخواست پلن اختصاصی' : 'استعلام قیمت ' . $plan['title'] ); ?></a>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
