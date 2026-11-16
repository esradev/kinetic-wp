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
        <?php $featured_portfolios = romonet_get_featured_portfolios( 3 ); ?>
        <?php if ( $featured_portfolios->have_posts() ) : ?>
            <div class="mt-12 grid gap-4 md:grid-cols-3">
                <?php while ( $featured_portfolios->have_posts() ) : $featured_portfolios->the_post(); ?>
                    <?php romonet_portfolio_card(); ?>
                <?php endwhile; ?>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <div class="mt-12 rounded-2xl border border-dashed border-white/15 p-8 text-center text-sm leading-7 text-neutral-400">
                نمونه‌کارهای رومونت در حال تکمیل هستند. برای مشاهده پروژه‌های منتشرشده به <a class="text-amber-400 hover:text-amber-300" href="<?php echo esc_url( home_url( '/portfolio/' ) ); ?>">آرشیو نمونه‌کارها</a> سر بزنید.
            </div>
        <?php endif; ?>
    </div>
</section>
