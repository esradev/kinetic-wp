<?php
/**
 * LearnDash single course template.
 *
 * @package Romonet_WPStorm
 */

get_header();

while ( have_posts() ) :
	the_post();

	$course_id = get_the_ID();
	$user_id = get_current_user_id();
	$course_price_data = function_exists( 'learndash_get_course_price' ) ? learndash_get_course_price( $course_id ) : array();
	$course_price_type = is_array( $course_price_data ) ? ( $course_price_data['type'] ?? '' ) : '';
	$course_price = is_array( $course_price_data ) ? ( $course_price_data['price'] ?? '' ) : '';

	$short_desc = get_post_meta( $course_id, 'ld_course_short_description', true );
	$summary = $short_desc ? $short_desc : wp_trim_words( wp_strip_all_tags( get_the_content() ), 38 );
	$main_image = get_the_post_thumbnail_url( $course_id, 'large' );
	$course_cats = get_the_term_list( $course_id, 'ld_course_category', '', '، ', '' );
	$course_tags = get_the_term_list( $course_id, 'ld_course_tag', '', '، ', '' );

	$difficulty = get_post_meta( $course_id, 'ld_course_difficulty', true );
	$difficulty_labels = array(
		'beginner' => 'مبتدی',
		'intermediate' => 'متوسط',
		'advanced' => 'پیشرفته',
	);
	$difficulty_label = isset( $difficulty_labels[ $difficulty ] ) ? $difficulty_labels[ $difficulty ] : '';

	$lessons = function_exists( 'learndash_course_get_steps_by_type' ) ? learndash_course_get_steps_by_type( $course_id, 'sfwd-lessons' ) : array();
	$topics = function_exists( 'learndash_course_get_steps_by_type' ) ? learndash_course_get_steps_by_type( $course_id, 'sfwd-topic' ) : array();
	$quizzes = function_exists( 'learndash_course_get_steps_by_type' ) ? learndash_course_get_steps_by_type( $course_id, 'sfwd-quiz' ) : array();
	$lesson_count = is_array( $lessons ) ? count( $lessons ) : 0;
	$topic_count = is_array( $topics ) ? count( $topics ) : 0;
	$quiz_count = is_array( $quizzes ) ? count( $quizzes ) : 0;

	$course_duration = get_post_meta( $course_id, 'ld_course_duration', true );
	$course_access_duration = get_post_meta( $course_id, 'ld_course_access_duration', true );
	$instructor_id = get_post_meta( $course_id, 'ld_course_instructor', true );
	$instructor_name = $instructor_id ? get_the_title( $instructor_id ) : '';
	$instructor_bio = $instructor_id ? get_post_meta( $instructor_id, 'description', true ) : '';
	$updated_display = get_the_modified_date( 'j F Y' );

	$is_enrolled = false;
	if ( $user_id ) {
		if ( function_exists( 'sfwd_lms_has_access' ) ) {
			$is_enrolled = sfwd_lms_has_access( $course_id, $user_id );
		} elseif ( function_exists( 'learndash_user_enrolled_in_course' ) ) {
			$is_enrolled = learndash_user_enrolled_in_course( $user_id, $course_id );
		}
	}

	$native_course_info = do_shortcode( '[learndash_course_info course_id="' . absint( $course_id ) . '"]' );
	$native_course_content = do_shortcode( '[learndash_course_content course_id="' . absint( $course_id ) . '"]' );

	$progress_percent = 0;
	if ( $is_enrolled && function_exists( 'learndash_course_progress' ) ) {
		$course_progress = learndash_course_progress(
			array(
				'course_id' => $course_id,
				'user_id' => $user_id,
				'array' => true,
			)
		);
		$progress_percent = isset( $course_progress['percentage'] ) ? (int) $course_progress['percentage'] : 0;
	}

	$certificate_link = '';
	if ( $is_enrolled && $progress_percent >= 100 && function_exists( 'learndash_get_certificate_link' ) ) {
		$certificate_link = learndash_get_certificate_link( $course_id, $user_id );
	}

	$action_url = get_permalink( $course_id );
	if ( $is_enrolled && function_exists( 'learndash_course_get_steps_by_type' ) ) {
		if ( $progress_percent === 0 || $progress_percent === 100 ) {
			if ( ! empty( $lessons ) ) {
				$first_lesson_id = current( $lessons );
				$action_url = function_exists( 'learndash_get_step_permalink' ) ? learndash_get_step_permalink( $first_lesson_id, $course_id ) : get_permalink( $first_lesson_id );
			}
		} elseif ( $progress_percent < 100 ) {
			$resume_html = do_shortcode( '[ld_course_resume course_id="' . absint( $course_id ) . '"]' );
			if ( preg_match( '/href=["\']([^"\']+)["\']/', $resume_html, $matches ) ) {
				$action_url = $matches[1];
			}
		}
	}

	$enroll_url = get_permalink( $course_id );
	if ( ! $is_enrolled ) {
		if ( 'free' === $course_price_type || empty( $course_price ) ) {
			if ( ! is_user_logged_in() ) {
				$enroll_url = wp_login_url( get_permalink( $course_id ) );
			}
		} else {
			$product_id = false;
			if ( function_exists( 'wc_get_products' ) ) {
				$related_products = get_posts(
					array(
						'post_type' => array( 'product', 'product_variation' ),
						'post_status' => 'publish',
						'posts_per_page' => 1,
						'fields' => 'ids',
						'meta_query' => array(
							array(
								'key' => '_related_course',
								'value' => '"' . $course_id . '"',
								'compare' => 'LIKE',
							),
						),
					)
				);
				if ( ! empty( $related_products ) ) {
					$product_id = $related_products[0];
				}
			}
			if ( $product_id && function_exists( 'wc_get_checkout_url' ) ) {
				$enroll_url = wc_get_checkout_url() . '?add-to-cart=' . $product_id;
			} elseif ( $product_id ) {
				$enroll_url = get_permalink( $product_id );
			} elseif ( function_exists( 'learndash_get_course_meta_setting' ) ) {
				$custom_button_url = learndash_get_course_meta_setting( $course_id, 'custom_button_url' );
				if ( ! empty( $custom_button_url ) ) {
					$enroll_url = $custom_button_url;
				}
			}
		}
	}

	$hero_highlights = array_filter(
		array(
			$difficulty_label ? 'سطح ' . $difficulty_label : '',
			$lesson_count ? sprintf( '%d درس', $lesson_count ) : '',
			$topic_count ? sprintf( '%d موضوع', $topic_count ) : '',
			$quiz_count ? sprintf( '%d آزمون', $quiz_count ) : '',
			$course_duration,
		)
	);
	?>

	<style>
		.romonet-course-page {
			background: #08090d;
			color: #f3f4f6;
		}
		.romonet-course-page .rm-course-grid {
			background-image:
				linear-gradient(to left, rgba(255,255,255,.035) 1px, transparent 1px),
				linear-gradient(to bottom, rgba(255,255,255,.035) 1px, transparent 1px);
			background-size: 56px 56px;
			mask-image: radial-gradient(ellipse 85% 65% at 50% 18%, #000 35%, transparent 100%);
		}
		.romonet-course-page .rm-course-panel {
			background: linear-gradient(180deg, rgba(255,255,255,.038), rgba(255,255,255,.014));
			border: 1px solid rgba(255,255,255,.10);
		}
		.romonet-course-page .ld-course-content-native a { color: #fbbf24; }
		.romonet-course-page .ld-course-content-native .ld-item-list-item,
		.romonet-course-page .ld-course-content-native .ld-lesson-item {
			border-color: rgba(255,255,255,.10);
		}
		.light .romonet-course-page { background: #f8fafc; color: #0f172a; }
		.light .romonet-course-page .rm-course-grid {
			background-image:
				linear-gradient(to left, rgba(15,23,42,.08) 1px, transparent 1px),
				linear-gradient(to bottom, rgba(15,23,42,.08) 1px, transparent 1px);
		}
		.light .romonet-course-page .rm-course-panel {
			background: rgba(255,255,255,.94);
			border-color: rgba(15,23,42,.12);
		}
		.light .romonet-course-page h1,
		.light .romonet-course-page h2,
		.light .romonet-course-page h3,
		.light .romonet-course-page .text-white,
		.light .romonet-course-page .text-neutral-100 {
			color: #0f172a;
		}
		.light .romonet-course-page .text-neutral-300,
		.light .romonet-course-page .text-neutral-400 {
			color: #64748b;
		}
	</style>

	<main class="romonet-course-page relative min-h-screen overflow-x-clip pb-24" dir="rtl">
		<div class="rm-course-grid pointer-events-none absolute inset-x-0 top-0 h-[620px]" aria-hidden="true"></div>
		<div class="pointer-events-none absolute -top-24 right-1/4 h-96 w-96 rounded-full bg-amber-500/10 blur-[120px]" aria-hidden="true"></div>

		<section class="relative border-b border-white/10">
			<div class="mx-auto max-w-7xl px-4 pb-14 pt-10 sm:px-6 sm:pb-20 sm:pt-14 lg:px-8">
				<nav class="mb-8 flex items-center gap-2 text-xs text-neutral-400" aria-label="مسیر دوره">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-amber-300">صفحه اصلی</a>
					<span>/</span>
					<a href="<?php echo esc_url( get_post_type_archive_link( 'sfwd-courses' ) ); ?>" class="hover:text-amber-300">دوره‌های آموزشی</a>
					<span>/</span>
					<span class="text-neutral-300"><?php the_title(); ?></span>
				</nav>

				<div class="grid items-start gap-9 lg:grid-cols-[minmax(0,1.08fr)_minmax(20rem,.92fr)]">
					<div class="relative z-10">
						<div class="flex flex-wrap items-center gap-3">
							<?php if ( $difficulty_label ) : ?>
								<span class="rounded-full border border-amber-400/25 bg-amber-500/[0.08] px-3.5 py-1.5 text-xs font-semibold text-amber-300">سطح <?php echo esc_html( $difficulty_label ); ?></span>
							<?php endif; ?>
							<?php if ( $course_cats ) : ?>
								<span class="text-sm font-semibold text-neutral-300"><?php echo wp_kses_post( $course_cats ); ?></span>
							<?php endif; ?>
						</div>

						<h1 class="mt-5 text-3xl font-extrabold leading-[1.35] text-white sm:text-5xl lg:text-[3.35rem]"><?php the_title(); ?></h1>
						<?php if ( $instructor_name ) : ?>
							<p class="mt-5 text-sm text-neutral-400">مدرس: <span class="font-semibold text-neutral-200"><?php echo esc_html( $instructor_name ); ?></span></p>
						<?php endif; ?>
						<p class="mt-5 max-w-2xl text-base leading-8 text-neutral-300 sm:text-lg"><?php echo esc_html( $summary ); ?></p>

						<?php if ( ! empty( $hero_highlights ) ) : ?>
							<div class="mt-6 flex flex-wrap gap-2">
								<?php foreach ( $hero_highlights as $item ) : ?>
									<span class="rounded-xl border border-white/10 bg-white/[0.03] px-3.5 py-2 text-xs text-neutral-300"><?php echo esc_html( $item ); ?></span>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>

						<div class="rm-course-panel mt-7 rounded-2xl p-5 sm:p-6">
							<div class="flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
								<div>
									<p class="text-xs text-neutral-400">هزینه دوره</p>
									<?php if ( 'free' === $course_price_type || empty( $course_price ) ) : ?>
										<p class="mt-2 text-3xl font-black text-emerald-400">رایگان</p>
									<?php else : ?>
										<p class="mt-2 text-3xl font-black text-white"><?php echo esc_html( $course_price ); ?></p>
									<?php endif; ?>
								</div>

								<div class="flex flex-wrap items-center gap-3">
									<?php if ( $is_enrolled ) : ?>
										<?php if ( $progress_percent > 0 && $progress_percent < 100 ) : ?>
											<div class="flex items-center gap-3">
												<div class="h-2 w-28 overflow-hidden rounded-full bg-white/10"><div class="h-full bg-amber-400" style="width:<?php echo esc_attr( $progress_percent ); ?>%"></div></div>
												<span class="text-xs font-bold text-amber-300"><?php echo esc_html( $progress_percent ); ?>%</span>
											</div>
											<a href="<?php echo esc_url( $action_url ); ?>" class="inline-flex min-h-11 items-center rounded-xl bg-amber-500 px-6 text-sm font-bold text-neutral-950 transition hover:bg-amber-400">ادامه دوره</a>
										<?php elseif ( $progress_percent >= 100 ) : ?>
											<?php if ( $certificate_link ) : ?>
												<a href="<?php echo esc_url( $certificate_link ); ?>" target="_blank" rel="noopener" class="inline-flex min-h-11 items-center rounded-xl bg-emerald-500 px-6 text-sm font-bold text-neutral-950">دریافت گواهی‌نامه</a>
											<?php endif; ?>
											<a href="<?php echo esc_url( $action_url ); ?>" class="inline-flex min-h-11 items-center rounded-xl border border-white/15 px-6 text-sm font-bold text-white">مشاهده مجدد</a>
										<?php else : ?>
											<a href="<?php echo esc_url( $action_url ); ?>" class="inline-flex min-h-11 items-center rounded-xl bg-amber-500 px-6 text-sm font-bold text-neutral-950 transition hover:bg-amber-400">شروع دوره</a>
										<?php endif; ?>
									<?php elseif ( $native_course_info ) : ?>
										<div class="ld-course-info-native text-sm [&_a]:inline-flex [&_a]:min-h-11 [&_a]:items-center [&_a]:rounded-xl [&_a]:bg-amber-500 [&_a]:px-6 [&_a]:font-bold [&_a]:text-neutral-950"><?php echo wp_kses_post( $native_course_info ); ?></div>
									<?php elseif ( $enroll_url !== get_permalink( $course_id ) ) : ?>
										<a href="<?php echo esc_url( $enroll_url ); ?>" class="inline-flex min-h-11 items-center rounded-xl bg-amber-500 px-6 text-sm font-bold text-neutral-950">ثبت‌نام در دوره</a>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>

					<div>
						<div class="rm-course-panel overflow-hidden rounded-2xl p-2">
							<?php if ( $main_image ) : ?>
								<img src="<?php echo esc_url( $main_image ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" class="aspect-[4/3] w-full rounded-xl object-cover" loading="eager">
							<?php else : ?>
								<div class="flex aspect-[4/3] items-center justify-center rounded-xl bg-[radial-gradient(circle_at_30%_20%,rgba(245,158,11,.16),transparent_55%),#11131b] text-sm font-bold text-amber-300">دوره آموزشی رومونت</div>
							<?php endif; ?>
						</div>
						<?php if ( $is_enrolled && $progress_percent > 0 ) : ?>
							<div class="rm-course-panel mt-4 rounded-2xl p-5">
								<div class="flex items-center justify-between text-xs"><span class="text-neutral-300">پیشرفت دوره</span><span class="font-bold text-amber-300"><?php echo esc_html( $progress_percent ); ?>%</span></div>
								<div class="mt-3 h-2 overflow-hidden rounded-full bg-white/10"><div class="h-full rounded-full bg-amber-400" style="width:<?php echo esc_attr( $progress_percent ); ?>%"></div></div>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>

		<section class="relative py-12 lg:py-16">
			<div class="mx-auto grid max-w-7xl gap-7 px-4 sm:px-6 lg:grid-cols-[minmax(0,1fr)_21rem] lg:px-8">
				<div class="min-w-0 space-y-7">
					<section id="description" class="rm-course-panel rounded-2xl p-6 sm:p-8">
						<h2 class="text-2xl font-bold text-white">معرفی دوره</h2>
						<div class="prose prose-invert mt-6 max-w-none prose-headings:font-bold prose-a:text-amber-400">
							<?php the_content(); ?>
						</div>
					</section>

					<?php if ( $native_course_content ) : ?>
						<section id="course-curriculum" class="rm-course-panel rounded-2xl p-6 sm:p-8">
							<h2 class="text-2xl font-bold text-white">سرفصل دوره</h2>
							<div class="ld-course-content-native mt-6">
								<?php echo wp_kses_post( $native_course_content ); ?>
							</div>
						</section>
					<?php endif; ?>

					<?php if ( $instructor_name ) : ?>
						<section class="rm-course-panel rounded-2xl p-6 sm:p-8">
							<h2 class="text-xl font-bold text-white">درباره مدرس</h2>
							<div class="mt-5 flex items-start gap-4">
								<?php echo get_avatar( $instructor_id, 72 ); ?>
								<div>
									<h3 class="font-bold text-white"><?php echo esc_html( $instructor_name ); ?></h3>
									<?php if ( $instructor_bio ) : ?><p class="mt-2 text-sm leading-7 text-neutral-400"><?php echo esc_html( $instructor_bio ); ?></p><?php endif; ?>
								</div>
							</div>
						</section>
					<?php endif; ?>

					<section id="course-reviews" class="rm-course-panel rounded-2xl p-6 sm:p-8">
						<h2 class="text-xl font-bold text-white">نظرات کاربران</h2>
						<div class="mt-5"><?php comments_open() ? comments_template() : print( '<p class="text-sm text-neutral-400">ثبت نظر برای این دوره در حال حاضر غیرفعال است.</p>' ); ?></div>
					</section>
				</div>

				<aside class="space-y-5 lg:sticky lg:top-24 lg:self-start">
					<section class="rm-course-panel rounded-2xl p-6">
						<h2 class="text-lg font-bold text-white">اطلاعات دوره</h2>
						<dl class="mt-5 space-y-0 text-sm">
							<?php
							$metadata = array();
							if ( $difficulty_label ) { $metadata[] = array( 'سطح', $difficulty_label ); }
							if ( $instructor_name ) { $metadata[] = array( 'مدرس', $instructor_name ); }
							$metadata[] = array( 'تعداد درس', (string) $lesson_count );
							$metadata[] = array( 'تعداد موضوع', (string) $topic_count );
							$metadata[] = array( 'تعداد آزمون', (string) $quiz_count );
							if ( $course_duration ) { $metadata[] = array( 'مدت دوره', $course_duration ); }
							if ( $course_access_duration ) { $metadata[] = array( 'مدت دسترسی', $course_access_duration ); }
							$metadata[] = array( 'آخرین بروزرسانی', $updated_display );
							foreach ( $metadata as $index => $row ) :
							?>
								<div class="flex items-start justify-between gap-4 border-b border-white/10 py-3 <?php echo $index === array_key_last( $metadata ) ? 'border-b-0' : ''; ?>">
									<dt class="text-neutral-400"><?php echo esc_html( $row[0] ); ?></dt>
									<dd class="font-semibold text-neutral-100"><?php echo esc_html( $row[1] ); ?></dd>
								</div>
							<?php endforeach; ?>
						</dl>
					</section>

					<?php if ( $course_tags ) : ?>
						<section class="rm-course-panel rounded-2xl p-6">
							<h2 class="text-sm font-bold text-white">برچسب‌ها</h2>
							<div class="mt-4 flex flex-wrap gap-2 text-xs [&_a]:rounded-lg [&_a]:border [&_a]:border-white/10 [&_a]:px-2.5 [&_a]:py-1 [&_a]:text-neutral-300 [&_a:hover]:border-amber-400/40 [&_a:hover]:text-amber-300"><?php echo wp_kses_post( $course_tags ); ?></div>
						</section>
					<?php endif; ?>
				</aside>
			</div>
		</section>
	</main>

<?php
endwhile;
get_footer();
