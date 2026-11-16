<?php $navigation = romonet_global_navigation(); ?>
<div id="mobile-navigation" xyz-show="isMobileMenuOpen" class="border-t border-white/10 bg-[#0a0c12] px-4 py-4 xl:hidden" style="display: none;">
    <nav class="grid gap-1" aria-label="ناوبری موبایل">
        <a href="<?php echo esc_url( $navigation['home'] ); ?>" xyz-on:click="closeMobileMenu()" class="rounded-xl px-3 py-3 text-sm text-neutral-200 transition hover:bg-white/5 hover:text-amber-300">صفحه اصلی</a>
        <div class="border-t border-white/10 pt-1">
            <button type="button" xyz-on:click="toggleMobileDropdown('services')" xyz-bind:aria-expanded="mobileDropdowns.services" class="flex w-full items-center justify-between rounded-xl px-3 py-3 text-sm text-neutral-200 transition hover:bg-white/5 hover:text-amber-300">خدمات <span aria-hidden="true">⌄</span></button>
            <div xyz-show="mobileDropdowns.services" class="mr-3 grid gap-1 border-r border-white/10 pr-3" style="display: none;">
                <?php foreach ( $navigation['service_items'] as $item ) : ?>
                    <a href="<?php echo esc_url( $item['url'] ); ?>" xyz-on:click="closeMobileMenu()" class="rounded-lg px-3 py-2.5 text-sm text-neutral-400 transition hover:text-amber-300"><?php echo esc_html( $item['label'] ); ?></a>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="border-t border-white/10 pt-1">
            <button type="button" xyz-on:click="toggleMobileDropdown('pricing')" xyz-bind:aria-expanded="mobileDropdowns.pricing" class="flex w-full items-center justify-between rounded-xl px-3 py-3 text-sm text-neutral-200 transition hover:bg-white/5 hover:text-amber-300">تعرفه‌ها <span aria-hidden="true">⌄</span></button>
            <div xyz-show="mobileDropdowns.pricing" class="mr-3 grid gap-1 border-r border-white/10 pr-3" style="display: none;">
                <?php foreach ( $navigation['pricing_items'] as $item ) : ?>
                    <a href="<?php echo esc_url( $item['url'] ); ?>" xyz-on:click="closeMobileMenu()" class="rounded-lg px-3 py-2.5 text-sm text-neutral-400 transition hover:text-amber-300"><?php echo esc_html( $item['label'] ); ?></a>
                <?php endforeach; ?>
            </div>
        </div>
        <a href="<?php echo esc_url( $navigation['products'] ); ?>" xyz-on:click="closeMobileMenu()" class="rounded-xl px-3 py-3 text-sm text-neutral-200 transition hover:bg-white/5 hover:text-amber-300">محصولات</a>
        <a href="<?php echo esc_url( $navigation['portfolio'] ); ?>" xyz-on:click="closeMobileMenu()" class="rounded-xl px-3 py-3 text-sm text-neutral-200 transition hover:bg-white/5 hover:text-amber-300">نمونه‌کارها</a>
        <a href="<?php echo esc_url( $navigation['articles'] ); ?>" xyz-on:click="closeMobileMenu()" class="rounded-xl px-3 py-3 text-sm text-neutral-200 transition hover:bg-white/5 hover:text-amber-300">مقالات</a>
        <a href="<?php echo esc_url( $navigation['about'] ); ?>" xyz-on:click="closeMobileMenu()" class="rounded-xl px-3 py-3 text-sm text-neutral-200 transition hover:bg-white/5 hover:text-amber-300">درباره ما</a>
        <a href="<?php echo esc_url( $navigation['contact'] ); ?>" xyz-on:click="closeMobileMenu()" class="rounded-xl px-3 py-3 text-sm text-neutral-200 transition hover:bg-white/5 hover:text-amber-300">تماس با ما</a>
    </nav>
    <a href="<?php echo esc_url( $navigation['consultation'] ); ?>" xyz-on:click="closeMobileMenu()" class="mt-4 flex min-h-12 items-center justify-center rounded-xl bg-amber-500 text-sm font-bold text-black">درخواست مشاوره</a>
</div>
