<?php
$navigation = romonet_global_navigation();
?>
<header class="relative z-30 w-full border-b border-white/10 bg-[#08090d]/95 backdrop-blur-xl">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex min-h-[4.5rem] items-center justify-between gap-5">
            <a href="<?php echo esc_url( $navigation['home'] ); ?>" class="group flex shrink-0 items-center gap-3" aria-label="رومونت، صفحه اصلی">
                <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-500 text-xl font-black text-black transition group-hover:bg-amber-400">R</span>
                <span>
                    <span class="block text-lg font-bold tracking-tight text-white transition group-hover:text-amber-300">رومونت<span class="text-amber-400">.ir</span></span>
                    <span class="hidden text-[10px] text-neutral-500 sm:block">راهکارهای دیجیتال برای رشد</span>
                </span>
            </a>

            <nav class="hidden items-center gap-5 xl:flex" aria-label="ناوبری اصلی">
                <a href="<?php echo esc_url( $navigation['home'] ); ?>" class="text-sm text-neutral-300 transition hover:text-amber-300">صفحه اصلی</a>
                <div class="relative" xyz-on:mouseenter="openDropdown('services')" xyz-on:mouseleave="closeDropdown('services')">
                    <button type="button" xyz-on:click="toggleDropdown('services')" xyz-bind:aria-expanded="openDropdowns.services" class="inline-flex items-center gap-1 text-sm text-neutral-300 transition hover:text-amber-300" aria-controls="services-menu">
                        خدمات <span aria-hidden="true">⌄</span>
                    </button>
                    <div xyz-show="openDropdowns.services" class="absolute right-0 top-full z-40 w-72 pt-4" style="display: none;">
                        <div id="services-menu" xyz-on:click.outside="closeDropdown('services')" class="rounded-2xl border border-white/10 bg-[#11131b] p-2 shadow-2xl">
                            <?php foreach ( $navigation['service_items'] as $item ) : ?>
                                <a href="<?php echo esc_url( $item['url'] ); ?>" xyz-on:click="closeNavigation()" class="block rounded-xl px-4 py-3 text-sm text-neutral-300 transition hover:bg-white/5 hover:text-amber-300"><?php echo esc_html( $item['label'] ); ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="relative" xyz-on:mouseenter="openDropdown('pricing')" xyz-on:mouseleave="closeDropdown('pricing')">
                    <button type="button" xyz-on:click="toggleDropdown('pricing')" xyz-bind:aria-expanded="openDropdowns.pricing" class="inline-flex items-center gap-1 text-sm text-neutral-300 transition hover:text-amber-300" aria-controls="pricing-menu">
                        تعرفه‌ها <span aria-hidden="true">⌄</span>
                    </button>
                    <div xyz-show="openDropdowns.pricing" class="absolute right-0 top-full z-40 w-64 pt-4" style="display: none;">
                        <div id="pricing-menu" xyz-on:click.outside="closeDropdown('pricing')" class="rounded-2xl border border-white/10 bg-[#11131b] p-2 shadow-2xl">
                            <?php foreach ( $navigation['pricing_items'] as $item ) : ?>
                                <a href="<?php echo esc_url( $item['url'] ); ?>" xyz-on:click="closeNavigation()" class="block rounded-xl px-4 py-3 text-sm text-neutral-300 transition hover:bg-white/5 hover:text-amber-300"><?php echo esc_html( $item['label'] ); ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <a href="<?php echo esc_url( $navigation['products'] ); ?>" class="text-sm text-neutral-300 transition hover:text-amber-300">محصولات</a>
                <a href="<?php echo esc_url( $navigation['portfolio'] ); ?>" class="text-sm text-neutral-300 transition hover:text-amber-300">نمونه‌کارها</a>
                <a href="<?php echo esc_url( $navigation['articles'] ); ?>" class="text-sm text-neutral-300 transition hover:text-amber-300">مقالات</a>
                <a href="<?php echo esc_url( $navigation['about'] ); ?>" class="text-sm text-neutral-300 transition hover:text-amber-300">درباره ما</a>
                <a href="<?php echo esc_url( $navigation['contact'] ); ?>" class="text-sm text-neutral-300 transition hover:text-amber-300">تماس با ما</a>
            </nav>

            <div class="flex items-center gap-2 sm:gap-3">
                <button xyz-on:click="toggleTheme()" class="hidden rounded-lg border border-white/10 bg-white/5 p-2.5 text-neutral-300 transition hover:border-amber-400/40 hover:text-amber-300 sm:flex" aria-label="تغییر پوسته">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"/></svg>
                </button>
                <button xyz-on:click="isCartDrawerOpen = true" class="relative rounded-lg border border-white/10 bg-white/5 p-2.5 text-neutral-300 transition hover:border-amber-400/40 hover:text-amber-300" aria-label="سبد خرید">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg>
                    <template xyz-if="totalItemsCount() > 0"><span xyz-text="totalItemsCount()" class="absolute -right-2 -top-2 flex h-5 w-5 items-center justify-center rounded-full bg-amber-500 text-[10px] font-bold text-black"></span></template>
                </button>
                <a href="<?php echo esc_url( $navigation['consultation'] ); ?>" class="hidden min-h-10 items-center rounded-lg bg-amber-500 px-4 text-xs font-bold text-black transition hover:bg-amber-400 sm:inline-flex">درخواست مشاوره</a>
                <button xyz-on:click="toggleMobileMenu()" xyz-bind:aria-expanded="isMobileMenuOpen" class="rounded-lg border border-white/10 bg-white/5 p-2.5 text-neutral-300 transition hover:border-amber-400/40 hover:text-amber-300 xl:hidden" aria-label="باز کردن منو" aria-controls="mobile-navigation">
                    <template xyz-if="!isMobileMenuOpen"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 6h16M4 12h16M4 18h16"/></svg></template>
                    <template xyz-if="isMobileMenuOpen"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m6 6 12 12M18 6 6 18"/></svg></template>
                </button>
            </div>
        </div>
    </div>
    <?php get_template_part( 'template-parts/header/mobile', 'menu' ); ?>
</header>
