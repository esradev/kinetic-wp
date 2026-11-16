<?php $plans = romonet_sms_pricing_plans(); ?>

<section id="sms-plans" class="mx-auto max-w-7xl scroll-mt-24 px-4 py-20 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-2xl text-center">
        <p class="text-sm font-semibold text-amber-400">اشتراک ماهانه پنل پیامکی</p>
        <h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">پلن مناسب کسب‌وکارتان را انتخاب کنید</h2>
        <p class="mt-4 text-sm leading-8 text-neutral-400">هر پلن برای سطح مشخصی از مدیریت سایت، کاربر و اتصال پنل پیامکی طراحی شده است.</p>
    </div>

    <div class="mt-12 grid gap-5 lg:grid-cols-3">
        <?php foreach ( $plans as $plan ) : ?>
            <article class="<?php echo ! empty( $plan['featured'] ) ? 'border-amber-400/50 bg-amber-500/[0.06]' : 'border-white/10 bg-white/[0.03]'; ?> relative flex flex-col rounded-2xl border p-6 sm:p-8">
                <?php if ( ! empty( $plan['featured'] ) ) : ?>
                    <span class="absolute -top-3 right-6 rounded-full bg-amber-500 px-3 py-1 text-xs font-bold text-black">پیشنهاد رومونت</span>
                <?php endif; ?>
                <h3 class="text-2xl font-bold text-white"><?php echo esc_html( $plan['name'] ); ?></h3>
                <p class="mt-3 min-h-14 text-sm leading-7 text-neutral-400"><?php echo esc_html( $plan['description'] ); ?></p>
                <p class="mt-7 text-3xl font-bold text-white"><?php echo esc_html( $plan['price'] ); ?> <span class="text-sm font-normal text-neutral-400">تومان / ماه</span></p>
                <ul class="mt-8 flex-1 space-y-3 border-t border-white/10 pt-6">
                    <?php foreach ( $plan['features'] as $feature ) : ?>
                        <li class="flex items-start gap-2 text-sm leading-7 text-neutral-300"><span class="text-amber-400" aria-hidden="true">✓</span><span><?php echo esc_html( $feature ); ?></span></li>
                    <?php endforeach; ?>
                </ul>
                <a href="#sms-start" data-plan-id="<?php echo esc_attr( $plan['id'] ); ?>" class="mt-8 inline-flex min-h-12 items-center justify-center rounded-xl <?php echo ! empty( $plan['featured'] ) ? 'bg-amber-500 text-black hover:bg-amber-400' : 'bg-white/10 text-white hover:bg-white/15'; ?> px-5 text-sm font-bold transition"><?php echo esc_html( $plan['cta'] ); ?></a>
            </article>
        <?php endforeach; ?>
    </div>
</section>
