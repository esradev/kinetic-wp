<?php $plans = romonet_sms_pricing_plans(); ?>

<section class="border-y border-white/10 bg-white/[0.02]">
    <div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
        <div class="max-w-2xl">
            <p class="text-sm font-semibold text-amber-400">مقایسه شفاف</p>
            <h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">مقایسه امکانات پلن‌ها</h2>
        </div>
        <div class="mt-10 overflow-x-auto rounded-2xl border border-white/10">
            <table class="min-w-[700px] w-full border-collapse text-right text-sm">
                <thead class="bg-white/[0.04] text-white">
                    <tr>
                        <th class="p-4 font-bold">امکانات</th>
                        <?php foreach ( $plans as $plan ) : ?><th class="p-4 font-bold"><?php echo esc_html( $plan['name'] ); ?></th><?php endforeach; ?>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/10 text-neutral-300">
                    <?php
                    $rows = array(
                        array( 'قیمت ماهانه', $plans[0]['price'] . ' تومان', $plans[1]['price'] . ' تومان', $plans[2]['price'] . ' تومان' ),
                        array( 'وب‌سایت', '۱', 'حداکثر ۳', 'حداکثر ۱۰' ),
                        array( 'حساب کاربری', '۱', '۳', '۱۰' ),
                        array( 'اتصال پنل پیامکی', '۱', 'حداکثر ۳', 'حداکثر ۱۰' ),
                        array( 'سوابق ارسال', 'بله', 'بله', 'بله' ),
                        array( 'گزارش‌های پیشرفته', 'خیر', 'مطابق قابلیت واقعی محصول', 'بله، در صورت پشتیبانی محصول' ),
                        array( 'دسترسی API', 'مطابق قابلیت واقعی محصول', 'مطابق قابلیت واقعی محصول', 'مطابق قابلیت واقعی محصول' ),
                        array( 'اولویت پشتیبانی', 'عادی', 'بالاتر', 'سازمانی' ),
                    );
                    foreach ( $rows as $row ) :
                    ?>
                        <tr class="align-top even:bg-white/[0.02]"><th class="p-4 font-semibold text-white"><?php echo esc_html( $row[0] ); ?></th><?php foreach ( array_slice( $row, 1 ) as $value ) : ?><td class="p-4 leading-7"><?php echo esc_html( $value ); ?></td><?php endforeach; ?></tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
