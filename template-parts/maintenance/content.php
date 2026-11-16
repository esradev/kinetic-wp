<section class="border-y border-white/10 bg-white/[0.02]">
    <div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-[0.85fr_1.15fr]">
            <div>
                <p class="text-sm font-semibold text-amber-400">پاسخ کوتاه</p>
                <h2 class="mt-3 text-3xl font-bold leading-[1.45] text-white sm:text-4xl">هزینه پشتیبانی سایت چگونه محاسبه می‌شود؟</h2>
            </div>
            <div class="space-y-5 text-sm leading-8 text-neutral-300 sm:text-base">
                <p>قیمت پشتیبانی سایت برای همه وب‌سایت‌ها یکسان نیست. نوع و حجم سایت، تعداد افزونه‌ها، پیچیدگی فنی، تعداد درخواست‌ها و سطح پاسخ‌گویی مورد انتظار، محدوده خدمات را مشخص می‌کنند.</p>
                <p>نگهداری دوره‌ای با توسعه مستمر یکسان نیست؛ به‌روزرسانی و بررسی وضعیت سایت بخشی از نگهداری است، اما افزودن قابلیت‌های جدید یا تغییرات بزرگ معمولاً نیازمند توافق جداگانه است.</p>
                <ul class="grid gap-3 pt-2 sm:grid-cols-2">
                    <?php foreach ( array( 'نوع و حجم سایت', 'تعداد افزونه‌ها و سرویس‌های متصل', 'پیچیدگی فنی', 'تعداد درخواست‌های پشتیبانی', 'بررسی و مراقبت امنیتی', 'سطح پاسخ‌گویی موردنیاز' ) as $item ) : ?>
                        <li class="flex items-start gap-3"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-amber-400"></span><span><?php echo esc_html( $item ); ?></span></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="services" class="mx-auto max-w-7xl scroll-mt-24 px-4 py-20 sm:px-6 lg:px-8">
    <div class="max-w-2xl">
        <p class="text-sm font-semibold text-amber-400">محدوده خدمات</p>
        <h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">خدمات پشتیبانی و نگهداری سایت شامل چه مواردی است؟</h2>
        <p class="mt-4 text-sm leading-7 text-neutral-400">محدوده دقیق هر خدمت بر اساس پلن انتخابی و توافق مکتوب مشخص می‌شود.</p>
    </div>
    <div class="mt-12 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <?php
        $services = array(
            'به‌روزرسانی وردپرس' => 'بررسی و به‌روزرسانی هسته وردپرس با رعایت سازگاری و پایداری سایت.',
            'به‌روزرسانی قالب و افزونه‌ها' => 'بررسی نسخه‌های جدید و کنترل مشکلات احتمالی پس از به‌روزرسانی.',
            'بررسی امنیت سایت' => 'بررسی مشکلات امنیتی رایج و ارائه اقدامات اصلاحی در محدوده قرارداد.',
            'رفع خطاهای فنی' => 'بررسی و رفع مشکلات فنی وردپرس، قالب و افزونه‌ها در محدوده توافق‌شده.',
            'پشتیبان‌گیری' => 'بررسی وضعیت نسخه‌های پشتیبان و هماهنگی برای تهیه بکاپ مناسب پروژه.',
            'بررسی عملکرد سایت' => 'بررسی مشکلات رایج سرعت، منابع و عملکرد و ارائه پیشنهادهای بهبود.',
            'پشتیبانی و پاسخ‌گویی' => 'دریافت درخواست‌ها و پیگیری مشکلات فنی در چارچوب قرارداد.',
            'تغییرات و توسعه محدود' => 'اعمال تغییرات کوچک و مشخص، در صورت پیش‌بینی در پلن پشتیبانی.',
        );
        foreach ( $services as $title => $description ) :
        ?>
            <article class="rounded-2xl border border-white/10 bg-white/[0.03] p-5 transition hover:border-amber-400/40">
                <span class="text-lg text-amber-400">+</span>
                <h3 class="mt-4 font-bold leading-7 text-white"><?php echo esc_html( $title ); ?></h3>
                <p class="mt-2 text-sm leading-7 text-neutral-400"><?php echo esc_html( $description ); ?></p>
            </article>
        <?php endforeach; ?>
    </div>
</section>
