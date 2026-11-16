<section class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:py-28 lg:px-8">
    <div class="max-w-2xl">
        <p class="text-sm font-semibold text-amber-400">فرآیند همکاری</p>
        <h2 class="mt-3 text-3xl font-bold tracking-tight text-white sm:text-4xl">مسیر پروژه، روشن و مرحله‌به‌مرحله</h2>
    </div>
    <ol class="mt-12 grid gap-8 md:grid-cols-5">
        <?php
        $steps = array( 'شناخت نیازها', 'بررسی و پیشنهاد راهکار', 'برنامه‌ریزی و توسعه', 'تست و تضمین کیفیت', 'تحویل و پشتیبانی' );
        foreach ( $steps as $index => $step ) :
        ?>
            <li class="relative border-t border-white/15 pt-5">
                <span class="text-sm font-bold text-amber-400">۰<?php echo esc_html( $index + 1 ); ?></span>
                <h3 class="mt-3 text-base font-bold text-white"><?php echo esc_html( $step ); ?></h3>
                <?php if ( $index < count( $steps ) - 1 ) : ?><span class="absolute right-0 top-[-1px] hidden h-px w-8 -translate-x-3 bg-amber-400 md:block" aria-hidden="true"></span><?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ol>
</section>
