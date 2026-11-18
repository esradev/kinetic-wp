<?php
/**
 * LearnDash course archive.
 *
 * @package Romonet_WPStorm
 */

get_header();

$hero_badge = 'آکادمی آموزشی';
$hero_title = 'دوره‌های آموزشی';
$hero_description = 'مهارت‌های جدید یاد بگیرید و دانش فنی خود را با دوره‌های آموزشی کاربردی توسعه دهید.';
$hero_current = 'دوره‌ها';
$base_url = get_post_type_archive_link( 'sfwd-courses' );

if ( is_tax( 'ld_course_category' ) || is_tax( 'ld_course_tag' ) ) {
	$term = get_queried_object();
	if ( $term instanceof WP_Term ) {
		$hero_badge = is_tax( 'ld_course_category' ) ? 'دسته‌بندی دوره' : 'برچسب دوره';
		$hero_title = $term->name;
		$hero_description = $term->description ? wp_trim_words( wp_strip_all_tags( $term->description ), 28 ) : $hero_description;
		$hero_current = $term->name;
		$base_url = get_term_link( $term );
	}
}

$active_level = isset( $_GET['difficulty'] ) ? sanitize_text_field( wp_unslash( $_GET['difficulty'] ) ) : '';
$level_labels = array(
	'beginner' => 'مبتدی',
	'intermediate' => 'متوسط',
	'advanced' => 'پیشرفته',
);
$search_query = get_search_query();

global $wp_query;
if ( $active_level && isset( $level_labels[ $active_level ] ) && $wp_query->is_main_query() ) {
	$args = $wp_query->query_vars;
	$args['meta_query'] = array(
		array(
			'key' => 'ld_course_difficulty',
			'value' => $active_level,
			'compare' => '=',
		),
	);
	$wp_query = new WP_Query( $args );
}

$found_posts = (int) $wp_query->found_posts;
$course_cats = get_terms(
	array(
		'taxonomy' => 'ld_course_category',
		'hide_empty' => true,
		'orderby' => 'name',
		'order' => 'ASC',
	)
);
if ( is_wp_error( $course_cats ) ) {
	$course_cats = array();
}

$current_cat_id = 0;
if ( is_tax( 'ld_course_category' ) ) {
	$queried_term = get_queried_object();
	if ( $queried_term instanceof WP_Term ) {
		$current_cat_id = (int) $queried_term->term_id;
	}
}

$level_counts = array();
foreach ( $level_labels as $level_key => $level_label ) {
	$count_args = array(
		'post_type' => 'sfwd-courses',
		'post_status' => 'publish',
		'posts_per_page' => 1,
		'fields' => 'ids',
		'meta_query' => array(
			array(
				'key' => 'ld_course_difficulty',
				'value' => $level_key,
				'compare' => '=',
			),
		),
	);
	if ( is_tax( 'ld_course_category' ) || is_tax( 'ld_course_tag' ) ) {
		$queried_object = get_queried_object();
		if ( $queried_object instanceof WP_Term ) {
			$count_args['tax_query'] = array(
				array(
					'taxonomy' => $queried_object->taxonomy,
					'field' => 'term_id',
					'terms' => $queried_object->term_id,
				),
			);
		}
	}
	if ( $search_query ) {
		$count_args['s'] = $search_query;
	}
	$count_query = new WP_Query( $count_args );
	$level_counts[ $level_key ] = (int) $count_query->found_posts;
	wp_reset_postdata();
}
?>

<style>
	.romonet-courses,
	.romonet-course-page {
		background: #08090d;
		color: #f3f4f6;
	}
	.romonet-courses .rm-course-grid,
	.romonet-course-page .rm-course-grid {
		background-image:
			linear-gradient(to left, rgba(255,255,255,.035) 1px, transparent 1px),
			linear-gradient(to bottom, rgba(255,255,255,.035) 1px, transparent 1px);
		background-size: 56px 56px;
		mask-image: radial-gradient(ellipse 85% 65% at 50% 18%, #000 35%, transparent 100%);
	}
	.romonet-courses .rm-course-panel,
	.romonet-course-page .rm-course-panel {
		background: linear-gradient(180deg, rgba(255,255,255,.038), rgba(255,255,255,.014));
		border: 1px solid rgba(255,255,255,.10);
	}
	.romonet-courses .ld-course-content-native a,
	.romonet-course-page .ld-course-content-native a {
		color: #fbbf24;
	}
	.light .romonet-courses,
	.light .romonet-course-page {
		background: #f8fafc;
		color: #0f172a;
	}
	.light .romonet-courses .rm-course-grid,
	.light .romonet-course-page .rm-course-grid {
		background-image:
			linear-gradient(to left, rgba(15,23,42,.08) 1px, transparent 1px),
			linear-gradient(to bottom, rgba(15,23,42,.08) 1px, transparent 1px);
	}
	.light .romonet-courses .rm-course-panel,
	.light .romonet-course-page .rm-course-panel {
		background: rgba(255,255,255,.94);
		border-color: rgba(15,23,42,.12);
	}
	.light .romonet-courses article {
		background: #ffffff;
		border-color: rgba(15,23,42,.12);
	}
	.light .romonet-courses article h2,
	.light .romonet-courses article h2 a,
	.light .romonet-courses .text-white {
		color: #0f172a;
	}
	.light .romonet-courses .text-neutral-300,
	.light .romonet-courses .text-neutral-400,
	.light .romonet-courses article p {
		color: #64748b;
	}
	@media (prefers-reduced-motion: reduce) {
		.romonet-courses *, .romonet-course-page * { transition: none !important; }
	}
</style>

<main class="romonet-courses relative min-h-screen overflow-x-clip pb-24" dir="rtl">
	<div class="rm-course-grid pointer-events-none absolute inset-x-0 top-0 h-[520px]" aria-hidden="true"></div>
	<div class="pointer-events-none absolute right-1/4 top-0 h-96 w-96 rounded-full bg-amber-500/10 blur-[120px]" aria-hidden="true"></div>

	<section class="relative border-b border-white/10">
		<div class="mx-auto max-w-7xl px-4 pb-14 pt-12 sm:px-6 sm:pb-20 sm:pt-16 lg:px-8">
			<nav class="mb-8 flex items-center gap-2 text-xs text-neutral-400" aria-label="مسیر صفحه">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="transition hover:text-amber-300">صفحه اصلی</a>
				<span aria-hidden="true">/</span>
				<span class="text-neutral-300"><?php echo esc_html( $hero_current ); ?></span>
			</nav>
			<div class="max-w-3xl">
				<span class="inline-flex items-center gap-2 rounded-full border border-amber-400/25 bg-amber-500/[0.08] px-3.5 py-1.5 text-xs font-semibold text-amber-300">
					<span class="h-1.5 w-1.5 rounded-full bg-amber-400"></span>
					<?php echo esc_html( $hero_badge ); ?>
				</span>
				<h1 class="mt-5 text-3xl font-extrabold leading-[1.35] text-white sm:text-5xl"><?php echo esc_html( $hero_title ); ?></h1>
				<p class="mt-5 max-w-2xl text-base leading-8 text-neutral-300 sm:text-lg"><?php echo esc_html( $hero_description ); ?></p>
			</div>
		</div>
	</section>

	<section class="relative py-12 lg:py-16">
		<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
			<div class="grid gap-8 lg:grid-cols-[minmax(0,1fr)_17rem]">
				<div class="min-w-0 space-y-7">
					<div class="rm-course-panel flex flex-col gap-4 rounded-2xl p-5 sm:p-6">
						<div class="flex flex-wrap items-end justify-between gap-3">
							<div>
								<p class="text-sm font-bold text-white"><?php echo esc_html( sprintf( '%d دوره یافت شد', $found_posts ) ); ?></p>
								<?php if ( $search_query ) : ?>
									<p class="mt-1 text-xs text-neutral-400">نتیجه جستجو: «<?php echo esc_html( $search_query ); ?>»</p>
								<?php endif; ?>
							</div>
							<a href="<?php echo esc_url( remove_query_arg( 'difficulty', $base_url ) ); ?>" class="rounded-lg border border-white/10 px-3 py-2 text-xs font-semibold text-neutral-300 transition hover:border-amber-400/40 hover:text-amber-300">همه سطوح</a>
						</div>
						<div class="flex flex-wrap gap-2">
							<?php foreach ( $level_labels as $level_key => $level_label ) : ?>
								<?php
								$is_active = $active_level === $level_key;
								$level_url = add_query_arg( 'difficulty', $level_key, $base_url );
								?>
								<a href="<?php echo esc_url( $level_url ); ?>" class="inline-flex items-center gap-2 rounded-xl border px-4 py-2 text-xs font-semibold transition <?php echo $is_active ? 'border-amber-400/50 bg-amber-500/15 text-amber-300' : 'border-white/10 bg-white/[0.03] text-neutral-300 hover:border-amber-400/30 hover:text-amber-300'; ?>">
									<span><?php echo esc_html( $level_label ); ?></span>
									<span class="text-neutral-500">(<?php echo esc_html( $level_counts[ $level_key ] ); ?>)</span>
								</a>
							<?php endforeach; ?>
						</div>
					</div>

					<?php if ( have_posts() ) : ?>
						<div class="grid gap-6 md:grid-cols-2">
							<?php
							while ( have_posts() ) :
								the_post();
								$course_id = get_the_ID();
								$price_data = function_exists( 'learndash_get_course_price' ) ? learndash_get_course_price( $course_id ) : array();
								$lesson_steps = function_exists( 'learndash_course_get_steps_by_type' ) ? learndash_course_get_steps_by_type( $course_id, 'sfwd-lessons' ) : array();
								$difficulty = get_post_meta( $course_id, 'ld_course_difficulty', true );
								get_template_part(
									'template-parts/cards/course-card',
									null,
									array(
										'id' => $course_id,
										'title' => get_the_title(),
										'excerpt' => get_the_excerpt(),
										'thumbnail' => get_the_post_thumbnail_url( $course_id, 'medium_large' ),
										'price' => is_array( $price_data ) ? ( $price_data['price'] ?? '' ) : '',
										'price_type' => is_array( $price_data ) ? ( $price_data['type'] ?? '' ) : '',
										'lesson_count' => is_array( $lesson_steps ) ? count( $lesson_steps ) : 0,
										'difficulty' => isset( $level_labels[ $difficulty ] ) ? $level_labels[ $difficulty ] : '',
										'permalink' => get_permalink( $course_id ),
									)
								);
							endwhile;
							?>
						</div>
						<div class="mt-10"><?php get_template_part( 'template-parts/ui/pagination' ); ?></div>
					<?php else : ?>
						<div class="rm-course-panel rounded-2xl p-10 text-center">
							<p class="text-lg font-bold text-white">دوره‌ای یافت نشد</p>
							<p class="mt-2 text-sm leading-7 text-neutral-400">فیلتر دیگری امتحان کنید یا با تیم رومونت در ارتباط باشید.</p>
							<a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>" class="mt-6 inline-flex min-h-11 items-center rounded-xl bg-amber-500 px-6 text-sm font-bold text-neutral-950 transition hover:bg-amber-400">درخواست مشاوره</a>
						</div>
					<?php endif; ?>
				</div>

				<aside class="space-y-5 lg:sticky lg:top-24 lg:self-start">
					<div class="rm-course-panel rounded-2xl p-5">
						<h2 class="text-sm font-bold text-white">جستجو در دوره‌ها</h2>
						<form role="search" method="get" action="<?php echo esc_url( $base_url ); ?>" class="mt-4">
							<label for="course-sidebar-search" class="sr-only">جستجو</label>
							<div class="flex items-center gap-2 rounded-xl border border-white/10 bg-neutral-950/40 p-2">
								<input id="course-sidebar-search" type="search" name="s" value="<?php echo esc_attr( $search_query ); ?>" placeholder="نام دوره یا کلیدواژه..." class="min-w-0 flex-1 bg-transparent px-2 text-xs text-white outline-none placeholder:text-neutral-500">
								<?php if ( $active_level ) : ?>
									<input type="hidden" name="difficulty" value="<?php echo esc_attr( $active_level ); ?>">
								<?php endif; ?>
								<button type="submit" class="shrink-0 rounded-lg bg-amber-500 px-3 py-2 text-xs font-bold text-neutral-950">جستجو</button>
							</div>
						</form>
					</div>

					<div class="rm-course-panel rounded-2xl p-5">
						<h2 class="text-sm font-bold text-white">دسته‌بندی‌ها</h2>
						<ul class="mt-4 space-y-2 text-sm text-neutral-400">
							<li><a href="<?php echo esc_url( get_post_type_archive_link( 'sfwd-courses' ) ); ?>" class="<?php echo 0 === $current_cat_id ? 'text-amber-300' : 'transition hover:text-amber-300'; ?>">همه دوره‌ها</a></li>
							<?php foreach ( $course_cats as $course_cat ) : ?>
								<?php $cat_link = get_term_link( $course_cat ); ?>
								<?php if ( ! is_wp_error( $cat_link ) ) : ?>
									<li>
										<a href="<?php echo esc_url( $cat_link ); ?>" class="<?php echo $current_cat_id === (int) $course_cat->term_id ? 'text-amber-300' : 'transition hover:text-amber-300'; ?>">
											<?php echo esc_html( $course_cat->name ); ?>
											<span class="text-xs text-neutral-600">(<?php echo esc_html( $course_cat->count ); ?>)</span>
										</a>
									</li>
								<?php endif; ?>
							<?php endforeach; ?>
						</ul>
					</div>

					<div class="rounded-2xl border border-amber-400/25 bg-amber-500/[0.06] p-5">
						<h2 class="text-sm font-bold text-white">در انتخاب دوره مردد هستید؟</h2>
						<p class="mt-3 text-xs leading-7 text-neutral-300">سطح فعلی و اهداف خود را بگویید تا مناسب‌ترین دوره را انتخاب کنید.</p>
						<a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>" class="mt-5 inline-flex min-h-11 w-full items-center justify-center rounded-xl border border-amber-400/30 bg-amber-500/10 text-xs font-bold text-amber-300 transition hover:bg-amber-500/20">مشاوره رایگان</a>
					</div>
				</aside>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>
