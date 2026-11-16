<section class="border-y border-white/10 bg-white/[0.02]">
    <div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-white sm:text-4xl">شروع استفاده از پنل پیامکی رومونت</h2>
        <ol class="mt-10 grid gap-6 md:grid-cols-4">
            <?php foreach ( array( 'انتخاب پلن مناسب', 'ثبت‌نام و ایجاد حساب کاربری', 'تکمیل اطلاعات و اتصال پنل پیامکی', 'شروع استفاده از امکانات پنل' ) as $index => $step ) : ?>
                <li class="border-t border-white/15 pt-5"><span class="text-sm font-bold text-amber-400">۰<?php echo esc_html( $index + 1 ); ?></span><h3 class="mt-3 font-bold leading-7 text-white"><?php echo esc_html( $step ); ?></h3><p class="mt-2 text-sm leading-7 text-neutral-400">پس از آماده‌شدن فرآیند ثبت‌نام و اشتراک، این مرحله با پلن انتخاب‌شده انجام می‌شود.</p></li>
            <?php endforeach; ?>
        </ol>
    </div>
</section>
