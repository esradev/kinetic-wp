<section class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
    <div class="max-w-2xl">
        <p class="text-sm font-semibold text-amber-400">شفافیت در انتخاب</p>
        <h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">چه عواملی بر قیمت پشتیبانی سایت تأثیر می‌گذارند؟</h2>
    </div>
    <div class="mt-12 grid gap-x-8 gap-y-10 sm:grid-cols-2 lg:grid-cols-3">
        <?php
        $factors = array(
            'حجم و پیچیدگی سایت' => 'تعداد صفحات، محصولات، کاربران و وابستگی‌های فنی روی حجم نگهداری اثر دارد.',
            'شرکتی یا فروشگاهی بودن سایت' => 'فروشگاه‌ها معمولاً به بررسی دقیق‌تر پرداخت، سفارش و فرایندهای خرید نیاز دارند.',
            'افزونه‌ها و سرویس‌های متصل' => 'تعداد و حساسیت افزونه‌ها، APIها و سرویس‌های بیرونی باید در محدوده کار دیده شود.',
            'حساسیت اطلاعات و تراکنش‌ها' => 'سایت‌های دارای داده حساس یا پرداخت آنلاین به بررسی و مراقبت متناسب نیاز دارند.',
            'تعداد درخواست‌های ماهانه' => 'حجم درخواست‌های پشتیبانی و تغییرات کوچک، سطح همکاری را مشخص می‌کند.',
            'سطح پاسخ‌گویی موردنیاز' => 'زمان پاسخ‌گویی و روش ارتباط باید در قرارداد شفاف و متناسب با نیاز پروژه تعیین شود.',
        );
        foreach ( $factors as $title => $description ) :
        ?>
            <article>
                <h3 class="font-bold text-white"><?php echo esc_html( $title ); ?></h3>
                <p class="mt-2 text-sm leading-7 text-neutral-400"><?php echo esc_html( $description ); ?></p>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<section class="border-y border-white/10 bg-white/[0.02]">
    <div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-[0.8fr_1.2fr] lg:items-center">
            <div>
                <p class="text-sm font-semibold text-amber-400">انتخاب مدل همکاری</p>
                <h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">پشتیبانی ماهانه بهتر است یا رفع مشکل موردی؟</h2>
                <p class="mt-5 text-sm leading-8 text-neutral-400">انتخاب مناسب به اهمیت سایت، تکرار نیازهای فنی و سطح رسیدگی مورد انتظار شما بستگی دارد.</p>
            </div>
            <div class="grid gap-4 sm:grid-cols-2">
                <article class="rounded-2xl border border-white/10 bg-white/[0.03] p-6">
                    <h3 class="text-lg font-bold text-white">پشتیبانی موردی</h3>
                    <ul class="mt-4 space-y-3 text-sm leading-7 text-neutral-400"><li>مناسب مشکلات مشخص و محدود</li><li>پرداخت بر اساس درخواست یا پروژه</li><li>بدون برنامه نگهداری مستمر</li><li>مناسب سایت‌هایی که نیاز دائمی ندارند</li></ul>
                </article>
                <article class="rounded-2xl border border-amber-400/40 bg-amber-500/[0.05] p-6">
                    <h3 class="text-lg font-bold text-white">پشتیبانی ماهانه</h3>
                    <ul class="mt-4 space-y-3 text-sm leading-7 text-neutral-400"><li>رسیدگی مستمر به وضعیت سایت</li><li>برنامه منظم نگهداری</li><li>پیگیری بهتر مشکلات</li><li>مناسب سایت‌های مهم برای کسب‌وکار</li></ul>
                </article>
            </div>
        </div>
    </div>
</section>
