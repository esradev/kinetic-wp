<?php
$navigation = romonet_global_navigation();
$courses_active = is_post_type_archive( 'sfwd-courses' ) || is_singular( 'sfwd-courses' ) || is_tax( array( 'ld_course_category', 'ld_course_tag' ) );
?>
<div id="mobile-navigation" xyz-show="isMobileMenuOpen" class="rm-mobile-drawer max-h-[80vh] overflow-y-auto px-4 py-4 xl:hidden" style="display: none;">
	<nav class="grid gap-1" aria-label="ناوبری موبایل">
		<?php if ( has_nav_menu( 'primary' ) ) : ?>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_class'     => 'rm-mobile-menu grid gap-1',
					'link_before'    => '<span class="rm-nav-link rounded-xl px-3 py-3 text-sm" style="color: var(--text-primary, #e5e5e5);">',
					'link_after'     => '</span>',
					'fallback_cb'    => false,
				)
			);
			?>
		<?php else : ?>
		<a href="<?php echo esc_url( $navigation['home'] ); ?>" xyz-on:click="closeMobileMenu()" class="rm-nav-link rounded-xl px-3 py-3 text-sm" style="color: var(--text-primary, #e5e5e5);">صفحه اصلی</a>

		<div class="border-t pt-1" style="border-color: var(--border-subtle, rgba(255, 255, 255, 0.1));">
			<button type="button" xyz-on:click="toggleMobileDropdown('services')" xyz-bind:aria-expanded="mobileDropdowns.services" class="rm-nav-link rm-dropdown-trigger flex w-full items-center justify-between rounded-xl px-3 py-3 text-sm" style="color: var(--text-primary, #e5e5e5);">
				<span>خدمات</span>
				<svg class="rm-chevron h-4 w-4 transition-transform duration-200" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m6 9 6 6 6-6"/></svg>
			</button>
			<div xyz-show="mobileDropdowns.services" class="mr-3 grid gap-1 border-r pr-3" style="display: none; border-color: var(--border-subtle, rgba(255, 255, 255, 0.1));">
				<?php foreach ( $navigation['service_items'] as $item ) : ?>
					<a href="<?php echo esc_url( $item['url'] ); ?>" xyz-on:click="closeMobileMenu()" class="rm-nav-link rounded-lg px-3 py-2.5 text-sm"><?php echo esc_html( $item['label'] ); ?></a>
				<?php endforeach; ?>
			</div>
		</div>

		<div class="border-t pt-1" style="border-color: var(--border-subtle, rgba(255, 255, 255, 0.1));">
			<button type="button" xyz-on:click="toggleMobileDropdown('pricing')" xyz-bind:aria-expanded="mobileDropdowns.pricing" class="rm-nav-link rm-dropdown-trigger flex w-full items-center justify-between rounded-xl px-3 py-3 text-sm" style="color: var(--text-primary, #e5e5e5);">
				<span>تعرفه‌ها</span>
				<svg class="rm-chevron h-4 w-4 transition-transform duration-200" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m6 9 6 6 6-6"/></svg>
			</button>
			<div xyz-show="mobileDropdowns.pricing" class="mr-3 grid gap-1 border-r pr-3" style="display: none; border-color: var(--border-subtle, rgba(255, 255, 255, 0.1));">
				<?php foreach ( $navigation['pricing_items'] as $item ) : ?>
					<a href="<?php echo esc_url( $item['url'] ); ?>" xyz-on:click="closeMobileMenu()" class="rm-nav-link rounded-lg px-3 py-2.5 text-sm"><?php echo esc_html( $item['label'] ); ?></a>
				<?php endforeach; ?>
			</div>
		</div>

		<a href="<?php echo esc_url( $navigation['products'] ); ?>" xyz-on:click="closeMobileMenu()" class="rm-nav-link rounded-xl px-3 py-3 text-sm" style="color: var(--text-primary, #e5e5e5);">محصولات</a>
		<a href="<?php echo esc_url( $navigation['portfolio'] ); ?>" xyz-on:click="closeMobileMenu()" class="rm-nav-link rounded-xl px-3 py-3 text-sm" style="color: var(--text-primary, #e5e5e5);">نمونه‌کارها</a>
		<a href="<?php echo esc_url( $navigation['articles'] ); ?>" xyz-on:click="closeMobileMenu()" class="rm-nav-link rounded-xl px-3 py-3 text-sm" style="color: var(--text-primary, #e5e5e5);">مقالات</a>
		<a href="<?php echo esc_url( $navigation['courses'] ); ?>" xyz-on:click="closeMobileMenu()" class="rm-nav-link rounded-xl px-3 py-3 text-sm<?php echo $courses_active ? ' is-active' : ''; ?>"<?php echo $courses_active ? ' aria-current="page"' : ''; ?> style="color: var(--text-primary, #e5e5e5);">دوره‌های آموزشی</a>
		<a href="<?php echo esc_url( $navigation['about'] ); ?>" xyz-on:click="closeMobileMenu()" class="rm-nav-link rounded-xl px-3 py-3 text-sm" style="color: var(--text-primary, #e5e5e5);">درباره ما</a>
		<a href="<?php echo esc_url( $navigation['contact'] ); ?>" xyz-on:click="closeMobileMenu()" class="rm-nav-link rounded-xl px-3 py-3 text-sm" style="color: var(--text-primary, #e5e5e5);">تماس با ما</a>
		<?php endif; ?>
	</nav>

	<div class="mt-4 flex items-center gap-2 border-t pt-4" style="border-color: var(--border-subtle, rgba(255, 255, 255, 0.1));">
		<button type="button" xyz-on:click="toggleTheme()" class="rm-header-control flex h-12 w-12 shrink-0 items-center justify-center rounded-xl" aria-label="تغییر پوسته">
			<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"/></svg>
		</button>
		<a href="<?php echo esc_url( $navigation['consultation'] ); ?>" xyz-on:click="closeMobileMenu()" class="rm-header-cta flex min-h-12 flex-1 items-center justify-center rounded-xl text-sm font-bold">درخواست مشاوره</a>
	</div>
</div>