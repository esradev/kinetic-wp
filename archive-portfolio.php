<?php
/**
 * Portfolio archive and portfolio category archive.
 *
 * @package Romonet_WPStorm
 */

get_header();

$is_category_archive = is_tax( 'portfolio_category' );
$current_term        = $is_category_archive ? get_queried_object() : null;
$selected            = $current_term instanceof WP_Term ? $current_term->slug : '';
$archive_url         = get_post_type_archive_link( 'portfolio' );
$categories          = get_terms(
	array(
		'taxonomy'   => 'portfolio_category',
		'hide_empty' => true,
	)
);
$categories = is_wp_error( $categories ) ? array() : $categories;

$featured_query = ! $is_category_archive ? romonet_get_featured_portfolios( 3 ) : null;
$featured_ids   = $featured_query ? wp_list_pluck( $featured_query->posts, 'ID' ) : array();
$query_args     = array(
	'post_type'      => 'portfolio',
	'post_status'    => 'publish',
	'posts_per_page' => 9,
	'paged'          => max( 1, get_query_var( 'paged' ) ),
);

if ( $selected ) {
	$query_args['tax_query'] = array(
		array(
			'taxonomy' => 'portfolio_category',
			'field'    => 'slug',
			'terms'    => $selected,
		),
	);
}
if ( $featured_ids ) {
	$query_args['post__not_in'] = $featured_ids;
}

$portfolio_query = new WP_Query( $query_args );
$published_count = (int) wp_count_posts( 'portfolio' )->publish;
?>

<main class="rm-portfolio-page relative min-h-screen overflow-x-clip pb-24 pt-12 sm:pt-16" dir="rtl">
	<section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
		<div class="rm-portfolio-hero relative overflow-hidden rounded-3xl px-6 py-12 sm:px-10 sm:py-16">
			<div class="relative z-10 max-w-3xl">
				<p class="inline-flex items-center gap-2 text-sm font-semibold text-amber-400"><span class="h-px w-6 bg-amber-400/70" aria-hidden="true"></span>رومونت / پروژه‌ها</p>
				<h1 class="rm-portfolio-text-primary mt-5 text-3xl font-extrabold leading-[1.35] tracking-tight sm:text-5xl"><?php echo esc_html( $is_category_archive ? $current_term->name : 'نمونه‌کارهای طراحی و توسعه رومونت' ); ?></h1>
				<p class="rm-portfolio-text-secondary mt-5 max-w-2xl text-base leading-8">مجموعه‌ای از پروژه‌های طراحی سایت، توسعه نرم‌افزارهای اختصاصی و راهکارهای دیجیتال که با تمرکز بر تجربه کاربری، عملکرد و کیفیت اجرا خلق شده‌اند.</p>
				<a class="mt-8 inline-flex min-h-11 items-center justify-center rounded-xl bg-amber-500 px-6 text-sm font-bold text-black transition hover:bg-amber-400" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">شروع یک پروژه جدید</a>
			</div>
			<span class="pointer-events-none absolute -left-16 -top-20 h-56 w-56 rounded-full border border-amber-400/20" aria-hidden="true"></span>
			<span class="pointer-events-none absolute -bottom-24 left-1/3 h-40 w-40 rounded-full bg-amber-500/10 blur-3xl" aria-hidden="true"></span>
		</div>

		<div class="mt-8 grid gap-3 sm:grid-cols-2">
			<div class="rm-portfolio-stat rounded-2xl px-5 py-4"><span class="rm-portfolio-text-muted block text-xs">پروژه‌های منتشرشده</span><strong class="rm-portfolio-text-primary mt-1 block text-2xl"><?php echo esc_html( number_format_i18n( $published_count ) ); ?></strong></div>
			<div class="rm-portfolio-stat rounded-2xl px-5 py-4"><span class="rm-portfolio-text-muted block text-xs">دسته‌بندی پروژه‌ها</span><strong class="rm-portfolio-text-primary mt-1 block text-2xl"><?php echo esc_html( number_format_i18n( count( $categories ) ) ); ?></strong></div>
		</div>

		<details class="rm-portfolio-mobile-categories mt-8 rounded-2xl lg:hidden">
			<summary class="flex min-h-12 cursor-pointer items-center justify-between px-4 text-sm font-bold"><span>دسته‌بندی پروژه‌ها</span><span class="text-amber-400">نمایش</span></summary>
			<nav class="grid gap-2 p-3 pt-0" aria-label="فیلتر دسته‌بندی نمونه‌کارها">
				<a class="rm-portfolio-category-link rounded-xl px-3 py-2.5 text-sm <?php echo $selected ? '' : 'is-active'; ?>" href="<?php echo esc_url( $archive_url ); ?>">همه پروژه‌ها</a>
				<?php foreach ( $categories as $category ) : ?>
					<a class="rm-portfolio-category-link rounded-xl px-3 py-2.5 text-sm <?php echo $selected === $category->slug ? 'is-active' : ''; ?>" href="<?php echo esc_url( get_term_link( $category ) ); ?>"><?php echo esc_html( $category->name ); ?></a>
				<?php endforeach; ?>
			</nav>
		</details>

		<div class="mt-10 grid gap-8 lg:grid-cols-[220px_minmax(0,1fr)]">
			<aside class="hidden lg:block" aria-label="دسته‌بندی‌های نمونه‌کارها">
				<div class="rm-portfolio-sidebar sticky top-24 rounded-2xl p-3">
					<p class="rm-portfolio-text-muted px-3 pb-2 pt-1 text-xs font-semibold">دسته‌بندی پروژه‌ها</p>
					<nav class="grid gap-1" aria-label="فیلتر دسته‌بندی نمونه‌کارها">
						<a class="rm-portfolio-category-link rounded-xl px-3 py-2.5 text-sm <?php echo $selected ? '' : 'is-active'; ?>" href="<?php echo esc_url( $archive_url ); ?>">همه پروژه‌ها</a>
						<?php foreach ( $categories as $category ) : ?>
							<a class="rm-portfolio-category-link rounded-xl px-3 py-2.5 text-sm <?php echo $selected === $category->slug ? 'is-active' : ''; ?>" href="<?php echo esc_url( get_term_link( $category ) ); ?>"><?php echo esc_html( $category->name ); ?></a>
						<?php endforeach; ?>
					</nav>
				</div>
			</aside>
			<div class="min-w-0">
		<?php if ( $featured_query && $featured_query->have_posts() ) : ?>
			<section aria-labelledby="featured-projects-title">
				<p class="text-sm font-semibold text-amber-400">انتخاب رومونت</p>
				<h2 id="featured-projects-title" class="rm-portfolio-text-primary mt-2 text-2xl font-bold sm:text-3xl">پروژه‌های منتخب</h2>
				<div class="mt-7 grid gap-5 md:grid-cols-3">
					<?php while ( $featured_query->have_posts() ) : $featured_query->the_post(); ?>
						<?php romonet_portfolio_card(); ?>
					<?php endwhile; ?>
				</div>
			</section>
			<?php wp_reset_postdata(); ?>
		<?php endif; ?>

		<section class="<?php echo $featured_query && $featured_query->have_posts() ? 'mt-16' : ''; ?>" aria-labelledby="all-projects-title">
			<div class="flex items-end justify-between gap-4">
				<div><p class="text-sm font-semibold text-amber-400"><?php echo $selected ? 'پروژه‌های این دسته' : 'آرشیو پروژه‌ها'; ?></p><h2 id="all-projects-title" class="rm-portfolio-text-primary mt-2 text-2xl font-bold sm:text-3xl">همه پروژه‌ها</h2></div>
			</div>
			<?php if ( $portfolio_query->have_posts() ) : ?>
				<div class="mt-7 grid gap-5 md:grid-cols-2 lg:grid-cols-3">
					<?php while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post(); ?>
						<?php romonet_portfolio_card(); ?>
					<?php endwhile; ?>
				</div>
				<?php if ( $portfolio_query->max_num_pages > 1 ) : ?>
					<nav class="rm-portfolio-pagination mt-12 flex justify-center" aria-label="صفحه‌بندی نمونه‌کارها">
						<?php echo wp_kses_post( paginate_links( array( 'total' => $portfolio_query->max_num_pages, 'current' => max( 1, get_query_var( 'paged' ) ), 'type' => 'plain', 'prev_text' => '→ قبلی', 'next_text' => 'بعدی ←' ) ) ); ?>
					</nav>
				<?php endif; ?>
			<?php else : ?>
				<div class="rm-portfolio-empty mt-7 rounded-2xl p-10 text-center">نمونه‌کارهای این بخش در حال تکمیل هستند. برای بررسی پروژه خود می‌توانید <a class="font-semibold text-amber-400 hover:text-amber-300" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">با ما در ارتباط باشید</a>.</div>
			<?php endif; ?>
		</section>
			</div>
		</div>
	</section>
</main>
<?php wp_reset_postdata(); get_footer(); ?>
