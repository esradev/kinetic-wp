<section class="border-y border-white/10 bg-white/[0.02]">
    <div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-[0.85fr_1.15fr] lg:items-start">
            <div>
                <p class="text-sm font-semibold text-amber-400">پاسخ کوتاه</p>
                <h2 class="mt-3 text-3xl font-bold leading-[1.45] text-white sm:text-4xl">هزینه طراحی سایت چگونه محاسبه می‌شود؟</h2>
            </div>
            <div class="space-y-5 text-sm leading-8 text-neutral-300 sm:text-base">
                <p>قیمت طراحی سایت یک عدد ثابت برای همه پروژه‌ها نیست. یک سایت معرفی ساده با چند صفحه ثابت، نیازها و هزینه متفاوتی نسبت به یک سایت شرکتی با امکانات اختصاصی یا یک فروشگاه اینترنتی دارد.</p>
                <p>برای تعیین قیمت، نوع سایت، تعداد و پیچیدگی صفحات، طراحی رابط کاربری، اتصال به سرویس‌های خارجی، ورود اطلاعات و سطح پشتیبانی بررسی می‌شوند. به همین دلیل، اعلام قیمت دقیق بدون شناخت نیازهای پروژه معمولاً امکان‌پذیر نیست.</p>
                <ul class="grid gap-3 pt-2 sm:grid-cols-2">
                    <?php foreach ( array( 'نوع و هدف وب‌سایت', 'تعداد صفحات و ساختار محتوا', 'طراحی اختصاصی یا استفاده از قالب', 'امکانات و قابلیت‌های موردنیاز', 'اتصال به سرویس‌های دیگر', 'خدمات پس از تحویل' ) as $item ) : ?>
                        <li class="flex items-start gap-3"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-amber-400"></span><span><?php echo esc_html( $item ); ?></span></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="website-types" class="mx-auto max-w-7xl scroll-mt-24 px-4 py-20 sm:px-6 lg:px-8">
    <div class="max-w-2xl">
        <p class="text-sm font-semibold text-amber-400">دامنه پروژه‌ها</p>
        <h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">قیمت طراحی انواع سایت</h2>
        <p class="mt-4 text-sm leading-7 text-neutral-400 sm:text-base">هر نوع سایت، هدف و محدوده متفاوتی دارد. قیمت نهایی بعد از بررسی نیازهای پروژه و توافق بر محدوده اجرا مشخص می‌شود.</p>
    </div>
    <div class="mt-12 grid gap-4 md:grid-cols-2">
        <?php
        $types = array(
            array( 'title' => 'طراحی سایت شرکتی', 'description' => 'مناسب شرکت‌ها، سازمان‌ها و کسب‌وکارهایی که به وب‌سایتی حرفه‌ای برای معرفی مجموعه، خدمات، پروژه‌ها و راه‌های ارتباطی نیاز دارند.', 'features' => array( 'صفحه اصلی و درباره ما', 'معرفی خدمات و پروژه‌ها', 'فرم درخواست مشاوره', 'وبلاگ و طراحی واکنش‌گرا' ), 'cta' => 'جزئیات طراحی سایت شرکتی' ),
            array( 'title' => 'طراحی سایت خدماتی', 'description' => 'مناسب مشاوران، شرکت‌های خدماتی، مراکز تخصصی و کسب‌وکارهایی که هدف اصلی آن‌ها معرفی خدمات و دریافت درخواست مشتری است.', 'features' => array( 'صفحات اختصاصی خدمات', 'فرم درخواست خدمات', 'نمونه‌کارها', 'وبلاگ و محتوای آموزشی' ), 'cta' => 'مشاوره طراحی سایت خدماتی' ),
            array( 'title' => 'طراحی سایت فروشگاهی', 'description' => 'مناسب کسب‌وکارهایی که قصد فروش محصولات فیزیکی یا دیجیتال از طریق اینترنت را دارند.', 'features' => array( 'دسته‌بندی و صفحه محصول', 'سبد خرید و تسویه‌حساب', 'درگاه پرداخت', 'مدیریت سفارش و ارسال' ), 'cta' => 'مشاوره طراحی فروشگاه اینترنتی' ),
            array( 'title' => 'طراحی سایت با امکانات اختصاصی', 'description' => 'مناسب پروژه‌هایی که به امکانات خاص، فرایندهای سفارشی یا ارتباط با سامانه‌ها و سرویس‌های دیگر نیاز دارند.', 'features' => array( 'تحلیل نیازمندی‌ها', 'قابلیت‌های اختصاصی', 'اتصال به APIها', 'تست متناسب با پروژه' ), 'cta' => 'درخواست بررسی پروژه اختصاصی' ),
        );
        foreach ( $types as $type ) :
        ?>
            <article class="rounded-2xl border border-white/10 bg-white/[0.03] p-6 transition hover:border-amber-400/40">
                <h3 class="text-xl font-bold text-white"><?php echo esc_html( $type['title'] ); ?></h3>
                <p class="mt-3 text-sm leading-7 text-neutral-400"><?php echo esc_html( $type['description'] ); ?></p>
                <ul class="mt-5 space-y-2 text-sm text-neutral-300">
                    <?php foreach ( $type['features'] as $feature ) : ?><li class="flex gap-2"><span class="text-amber-400">✓</span><?php echo esc_html( $feature ); ?></li><?php endforeach; ?>
                </ul>
                <a href="#inquiry" class="mt-6 inline-flex text-sm font-semibold text-amber-400 transition hover:text-amber-300"><?php echo esc_html( $type['cta'] ); ?> <span class="mr-2">←</span></a>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<section class="border-y border-white/10 bg-white/[0.02]">
    <div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
        <div class="max-w-2xl">
            <p class="text-sm font-semibold text-amber-400">عوامل مؤثر بر هزینه</p>
            <h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">چه عواملی بر قیمت طراحی سایت تأثیر می‌گذارند؟</h2>
        </div>
        <div class="mt-12 grid gap-x-8 gap-y-10 sm:grid-cols-2 lg:grid-cols-3">
            <?php
            $factors = array(
                'نوع وب‌سایت' => 'سایت شرکتی، خدماتی، فروشگاه اینترنتی و وب‌اپلیکیشن نیازهای متفاوتی دارند.',
                'تعداد و پیچیدگی صفحات' => 'تعداد صفحات، چیدمان آن‌ها و پیچیدگی محتوای هر صفحه روی زمان اجرا اثر می‌گذارد.',
                'طراحی UI/UX' => 'رابط کاربری اختصاصی و تجربه کاربری تخصصی به تحقیق، طراحی و پیاده‌سازی بیشتری نیاز دارد.',
                'امکانات وب‌سایت' => 'ثبت‌نام، جست‌وجوی پیشرفته، رزرو، داشبورد، پرداخت و گردش‌کارهای خودکار دامنه پروژه را تغییر می‌دهند.',
                'اتصال به سرویس‌های دیگر' => 'درگاه پرداخت، پیامک، حسابداری، CRM، حمل‌ونقل و APIهای خارجی باید جداگانه بررسی شوند.',
                'محتوا و ورود داده' => 'تولید محتوا، آماده‌سازی تصاویر، ورود محصولات و انتقال داده ممکن است خدمت جداگانه باشد.',
                'هاست، دامنه و لایسنس‌ها' => 'هزینه زیرساخت، دامنه، قالب‌ها، افزونه‌ها و سرویس‌های خارجی طبق پیشنهاد پروژه تعیین می‌شود.',
            );
            foreach ( $factors as $title => $description ) :
            ?>
                <article>
                    <h3 class="font-bold text-white"><?php echo esc_html( $title ); ?></h3>
                    <p class="mt-2 text-sm leading-7 text-neutral-400"><?php echo esc_html( $description ); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
    <div class="grid gap-10 lg:grid-cols-[0.8fr_1.2fr] lg:items-center">
        <div>
            <p class="text-sm font-semibold text-amber-400">انتخاب مسیر فنی</p>
            <h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">طراحی سایت با وردپرس یا برنامه‌نویسی اختصاصی؟</h2>
            <p class="mt-5 text-sm leading-8 text-neutral-400">وردپرس برای بسیاری از سایت‌های شرکتی، خدماتی و فروشگاهی انتخابی عملی است؛ توسعه اختصاصی برای پروژه‌هایی مناسب‌تر است که منطق کسب‌وکار یا گردش‌کار منحصربه‌فرد دارند.</p>
            <a href="#inquiry" class="mt-6 inline-flex min-h-11 items-center rounded-xl bg-amber-500 px-6 text-sm font-bold text-black transition hover:bg-amber-400">مشاوره انتخاب مسیر</a>
        </div>
        <div class="overflow-x-auto rounded-2xl border border-white/10">
            <table class="w-full min-w-[620px] text-right text-sm">
                <thead class="bg-white/[0.04] text-white"><tr><th class="p-4">معیار</th><th class="p-4">وردپرس</th><th class="p-4">توسعه اختصاصی</th></tr></thead>
                <tbody class="divide-y divide-white/10 text-neutral-300">
                    <?php foreach ( array( 'هزینه شروع' => 'برای بسیاری از پروژه‌ها اقتصادی‌تر است', 'زمان توسعه' => 'معمولاً کوتاه‌تر برای نیازهای متداول', 'انعطاف‌پذیری' => 'با افزونه و توسعه قابل افزایش است', 'نگهداری' => 'نیازمند به‌روزرسانی و مراقبت منظم', 'مناسب برای' => 'شرکتی، خدماتی و فروشگاهی', 'منطق کسب‌وکار' => 'برای فرایندهای پیچیده، اختصاصی بررسی شود' ) as $criterion => $answer ) : ?>
                        <tr><th class="p-4 font-semibold text-white"><?php echo esc_html( $criterion ); ?></th><td class="p-4"><?php echo esc_html( $answer ); ?></td><td class="p-4"><?php echo esc_html( $criterion === 'منطق کسب‌وکار' ? 'قابل طراحی دقیق بر اساس نیاز پروژه' : 'قابل تنظیم، اما با زمان و هزینه توسعه بیشتر' ); ?></td></tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
