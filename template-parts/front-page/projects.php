<section id="projects" class="border-y border-white/10 bg-white/[0.02]">
    <div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:py-28 lg:px-8">
        <div class="flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-sm font-semibold text-amber-400">پروژه‌های منتخب</p>
                <h2 class="mt-3 text-3xl font-bold tracking-tight text-white sm:text-4xl">نمونه‌هایی از مسیرهایی که می‌سازیم</h2>
                <p class="mt-4 max-w-xl text-sm leading-7 text-neutral-400">این بخش برای نمایش پروژه‌های واقعی رومونت آماده شده و با انتشار نمونه‌های قابل ارائه تکمیل می‌شود.</p>
            </div>
            <a href="#contact" class="inline-flex items-center gap-2 text-sm font-semibold text-amber-400 transition hover:text-amber-300">مشاهده همه پروژه‌ها <span aria-hidden="true">←</span></a>
        </div>
        <div class="mt-12 grid gap-4 md:grid-cols-3">
            <?php foreach ( array( 'وب‌سایت‌های شرکتی و خدماتی', 'فروشگاه‌های اینترنتی ووکامرس', 'توسعه اختصاصی وردپرس' ) as $project ) : ?>
                <div class="rounded-2xl border border-dashed border-white/15 p-6">
                    <div class="flex h-36 items-end rounded-xl bg-gradient-to-br from-amber-500/20 via-white/5 to-transparent p-5">
                        <span class="text-xs font-semibold text-amber-300">نمونه قابل ارائه به‌زودی</span>
                    </div>
                    <h3 class="mt-5 font-bold text-white"><?php echo esc_html( $project ); ?></h3>
                    <p class="mt-2 text-sm leading-7 text-neutral-400">برای کسب‌وکارهایی که به تجربه‌ای حرفه‌ای و قابل توسعه نیاز دارند.</p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
