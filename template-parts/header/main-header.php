<?php
$navigation = romonet_global_navigation();
$courses_active = is_post_type_archive( 'sfwd-courses' ) || is_singular( 'sfwd-courses' ) || is_tax( array( 'ld_course_category', 'ld_course_tag' ) );
?>
<header class="rm-site-header sticky top-0 z-30 w-full">
	<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
		<div class="flex min-h-[4.5rem] items-center justify-between gap-5">
			<a href="<?php echo esc_url( $navigation['home'] ); ?>" class="group flex shrink-0 items-center gap-3" aria-label="رومونت، صفحه اصلی">
				<span class="flex h-10 w-10 items-center justify-center rounded-xl text-xl font-black transition" style="background-color: var(--accent-gold, #f59e0b); color: var(--rm-gold-ink);">R</span>
				<span>
					<span class="block text-lg font-bold tracking-tight transition" style="color: var(--text-primary, #ffffff);">رومونت<span style="color: var(--accent-gold, #fbbf24);">.ir</span></span>
					<span class="hidden text-[10px] sm:block" style="color: var(--text-muted, #6b7280);">راهکارهای دیجیتال برای رشد</span>
				</span>
			</a>

			<nav class="hidden items-center gap-1 xl:flex" aria-label="ناوبری اصلی">
				<?php if ( has_nav_menu( 'primary' ) ) : ?>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'container'      => false,
							'menu_class'     => 'flex items-center gap-1',
							'link_before'    => '<span class="rm-nav-link rounded-xl px-3 py-2 text-sm">',
							'link_after'     => '</span>',
							'fallback_cb'    => false,
						)
					);
					?>
				<?php else : ?>
				<a href="<?php echo esc_url( $navigation['home'] ); ?>" class="rm-nav-link rounded-xl px-3 py-2 text-sm">صفحه اصلی</a>

				<div class="relative" xyz-on:mouseenter="openDropdown('services')" xyz-on:mouseleave="closeDropdown('services')">
					<button type="button" xyz-on:click="toggleDropdown('services')" xyz-bind:aria-expanded="openDropdowns.services" class="rm-nav-link rm-dropdown-trigger inline-flex items-center gap-1 rounded-xl px-3 py-2 text-sm" aria-controls="services-menu">
						<span>خدمات</span>
						<svg class="rm-chevron h-3.5 w-3.5 transition-transform duration-200" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m6 9 6 6 6-6"/></svg>
					</button>
					<div xyz-show="openDropdowns.services" class="absolute right-0 top-full z-40 w-72 pt-3" style="display: none;">
						<div id="services-menu" xyz-on:click.outside="closeDropdown('services')" class="rm-dropdown-panel rounded-2xl p-2 shadow-2xl">
							<?php foreach ( $navigation['service_items'] as $item ) : ?>
								<a href="<?php echo esc_url( $item['url'] ); ?>" xyz-on:click="closeNavigation()" class="rm-nav-link block rounded-xl px-4 py-3 text-sm"><?php echo esc_html( $item['label'] ); ?></a>
							<?php endforeach; ?>
						</div>
					</div>
				</div>

				<div class="relative" xyz-on:mouseenter="openDropdown('pricing')" xyz-on:mouseleave="closeDropdown('pricing')">
					<button type="button" xyz-on:click="toggleDropdown('pricing')" xyz-bind:aria-expanded="openDropdowns.pricing" class="rm-nav-link rm-dropdown-trigger inline-flex items-center gap-1 rounded-xl px-3 py-2 text-sm" aria-controls="pricing-menu">
						<span>تعرفه‌ها</span>
						<svg class="rm-chevron h-3.5 w-3.5 transition-transform duration-200" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m6 9 6 6 6-6"/></svg>
					</button>
					<div xyz-show="openDropdowns.pricing" class="absolute right-0 top-full z-40 w-64 pt-3" style="display: none;">
						<div id="pricing-menu" xyz-on:click.outside="closeDropdown('pricing')" class="rm-dropdown-panel rounded-2xl p-2 shadow-2xl">
							<?php foreach ( $navigation['pricing_items'] as $item ) : ?>
								<a href="<?php echo esc_url( $item['url'] ); ?>" xyz-on:click="closeNavigation()" class="rm-nav-link block rounded-xl px-4 py-3 text-sm"><?php echo esc_html( $item['label'] ); ?></a>
							<?php endforeach; ?>
						</div>
					</div>
				</div>

				<a href="<?php echo esc_url( $navigation['products'] ); ?>" class="rm-nav-link rounded-xl px-3 py-2 text-sm">محصولات</a>
				<a href="<?php echo esc_url( $navigation['portfolio'] ); ?>" class="rm-nav-link rounded-xl px-3 py-2 text-sm">نمونه‌کارها</a>
				<a href="<?php echo esc_url( $navigation['articles'] ); ?>" class="rm-nav-link rounded-xl px-3 py-2 text-sm">مقالات</a>
				<a href="<?php echo esc_url( $navigation['courses'] ); ?>" class="rm-nav-link rounded-xl px-3 py-2 text-sm<?php echo $courses_active ? ' is-active' : ''; ?>"<?php echo $courses_active ? ' aria-current="page"' : ''; ?>>دوره‌های آموزشی</a>
				<a href="<?php echo esc_url( $navigation['about'] ); ?>" class="rm-nav-link rounded-xl px-3 py-2 text-sm">درباره ما</a>
				<a href="<?php echo esc_url( $navigation['contact'] ); ?>" class="rm-nav-link rounded-xl px-3 py-2 text-sm">تماس با ما</a>
				<?php endif; ?>
			</nav>

			<div class="flex items-center gap-2 sm:gap-3">
				<button xyz-on:click="toggleTheme()" class="rm-header-control hidden rounded-xl p-2.5 sm:flex" aria-label="تغییر پوسته">
					<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"/></svg>
				</button>
				<button xyz-on:click="isCartDrawerOpen = true" class="rm-header-control relative rounded-xl p-2.5" aria-label="سبد خرید">
					<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg>
					<template xyz-if="totalItemsCount() > 0"><span xyz-text="totalItemsCount()" class="absolute -right-2 -top-2 flex h-5 w-5 items-center justify-center rounded-full text-[10px] font-bold" style="background-color: var(--accent-gold, #f59e0b); color: var(--rm-gold-ink);"></span></template>
				</button>
				<a href="<?php echo esc_url( $navigation['consultation'] ); ?>" class="rm-header-cta hidden min-h-10 items-center rounded-xl px-4 text-xs font-bold sm:inline-flex">درخواست مشاوره</a>
				<button xyz-on:click="toggleMobileMenu()" xyz-bind:aria-expanded="isMobileMenuOpen" class="rm-header-control rounded-xl p-2.5 xl:hidden" aria-label="باز کردن منو" aria-controls="mobile-navigation">
					<template xyz-if="!isMobileMenuOpen"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M4 6h16M4 12h16M4 18h16"/></svg></template>
					<template xyz-if="isMobileMenuOpen"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m6 6 12 12M18 6 6 18"/></svg></template>
				</button>
			</div>
		</div>
	</div>
	<?php get_template_part( 'template-parts/header/mobile', 'menu' ); ?>
</header>