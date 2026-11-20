<?php
/**
 * Single portfolio case study.
 *
 * @package Romonet_WPStorm
 */

get_header();
$type_labels = array( 'client' => 'پروژه مشتری', 'internal' => 'محصول داخلی رومونت', 'demo' => 'پروژه نمایشی' );

while ( have_posts() ) :
	the_post();
	$post_id      = get_the_ID();
	$type         = get_post_meta( $post_id, '_romonet_portfolio_type', true );
	$terms        = get_the_terms( $post_id, 'portfolio_category' );
	$terms        = is_wp_error( $terms ) ? array() : (array) $terms;
	$website      = get_post_meta( $post_id, '_romonet_portfolio_website_url', true );
	$website      = wp_http_validate_url( $website ) ? $website : '';
	$client       = get_post_meta( $post_id, '_romonet_portfolio_client', true );
	$completion   = get_post_meta( $post_id, '_romonet_portfolio_completion_date', true );
	$completion   = preg_match( '/^\d{4}-\d{2}-\d{2}$/', $completion ) ? mysql2date( get_option( 'date_format' ), $completion ) : '';
	$technologies = array_filter( (array) get_post_meta( $post_id, '_romonet_portfolio_technologies', true ) );
	$services     = array_filter( (array) get_post_meta( $post_id, '_romonet_portfolio_services', true ) );
	$gallery      = array_filter( array_map( 'absint', (array) get_post_meta( $post_id, '_romonet_portfolio_gallery', true ) ) );
	$gallery      = array_values( array_filter( $gallery, function ( $image_id ) use ( $post_id ) {
		return wp_attachment_is_image( $image_id ) && get_post_thumbnail_id( $post_id ) !== $image_id;
	} ) );
	$related_args = array( 'post_type' => 'portfolio', 'post_status' => 'publish', 'posts_per_page' => 3, 'post__not_in' => array( $post_id ), 'no_found_rows' => true );
	if ( $terms ) {
		$related_args['tax_query'] = array( array( 'taxonomy' => 'portfolio_category', 'field' => 'term_id', 'terms' => wp_list_pluck( $terms, 'term_id' ) ) );
	}
	$related = new WP_Query( $related_args );
	if ( ! $related->have_posts() && $terms ) {
		$related = new WP_Query( array( 'post_type' => 'portfolio', 'post_status' => 'publish', 'posts_per_page' => 3, 'post__not_in' => array( $post_id ), 'no_found_rows' => true ) );
	}
	?>
	<main class="rm-portfolio-page rm-portfolio-single relative min-h-screen overflow-x-clip pb-28 pt-10 sm:pb-24" dir="rtl">
		<article class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
			<nav class="mb-8 text-sm text-neutral-500" aria-label="مسیر صفحه"><a class="hover:text-amber-400" href="<?php echo esc_url( get_post_type_archive_link( 'portfolio' ) ); ?>">نمونه‌کارها</a><span class="mx-2" aria-hidden="true">/</span><span class="text-neutral-300"><?php the_title(); ?></span></nav>
			<div class="grid gap-10 lg:grid-cols-[1fr_1.1fr] lg:items-center">
				<div>
					<?php if ( $terms ) : ?><div class="flex flex-wrap gap-2"><?php foreach ( $terms as $term ) : ?><a class="text-sm font-semibold text-amber-400 hover:text-amber-300" href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo esc_html( $term->name ); ?></a><?php endforeach; ?></div><?php endif; ?>
					<h1 class="rm-portfolio-text-primary mt-4 text-4xl font-extrabold leading-[1.35] tracking-tight sm:text-6xl"><?php the_title(); ?></h1>
					<?php if ( has_excerpt() ) : ?><p class="rm-portfolio-text-secondary mt-5 max-w-2xl text-lg leading-8"><?php echo esc_html( get_the_excerpt() ); ?></p><?php endif; ?>
					<?php if ( $website ) : ?><a class="mt-7 inline-flex min-h-11 items-center justify-center rounded-xl bg-amber-500 px-6 text-sm font-bold text-black transition hover:bg-amber-400" href="<?php echo esc_url( $website ); ?>" target="_blank" rel="noopener noreferrer">مشاهده وب‌سایت</a><?php endif; ?>
				</div>
				<?php if ( has_post_thumbnail() ) : ?><div class="overflow-hidden rounded-3xl border border-white/10 bg-white/[0.03]"><?php the_post_thumbnail( 'large', array( 'class' => 'h-auto w-full', 'loading' => 'eager' ) ); ?></div><?php endif; ?>
			</div>

			<div class="mt-14 grid items-start gap-8 lg:grid-cols-[minmax(0,1fr)_280px]">
				<div class="min-w-0">
					<div class="rm-portfolio-prose prose prose-invert max-w-3xl leading-8"><?php the_content(); ?></div>

					<?php if ( $gallery ) : ?><section class="mt-14" aria-labelledby="gallery-title"><h2 id="gallery-title" class="rm-portfolio-text-primary mb-6 text-2xl font-bold">گالری پروژه</h2><div class="grid gap-4 sm:grid-cols-2"><?php foreach ( $gallery as $image_id ) : ?><figure class="rm-portfolio-stat overflow-hidden rounded-2xl"><?php echo wp_get_attachment_image( $image_id, 'large', false, array( 'class' => 'h-auto w-full', 'loading' => 'lazy' ) ); ?></figure><?php endforeach; ?></div></section><?php endif; ?>
				</div>
				<?php if ( $client || isset( $type_labels[ $type ] ) || $completion || $technologies || $services ) : ?>
					<aside class="rm-portfolio-sidebar hidden rounded-2xl p-5 lg:sticky lg:top-24 lg:block" aria-labelledby="project-overview-title">
						<h2 id="project-overview-title" class="rm-portfolio-text-primary text-lg font-bold">اطلاعات پروژه</h2>
						<dl class="mt-5 grid gap-5">
							<?php if ( $client ) : ?><div><dt class="rm-portfolio-text-muted text-xs">مشتری</dt><dd class="rm-portfolio-text-primary mt-1 text-sm"><?php echo esc_html( $client ); ?></dd></div><?php endif; ?>
							<?php if ( isset( $type_labels[ $type ] ) ) : ?><div><dt class="rm-portfolio-text-muted text-xs">نوع پروژه</dt><dd class="rm-portfolio-text-primary mt-1 text-sm"><?php echo esc_html( $type_labels[ $type ] ); ?></dd></div><?php endif; ?>
							<?php if ( $completion ) : ?><div><dt class="rm-portfolio-text-muted text-xs">تاریخ تکمیل</dt><dd class="rm-portfolio-text-primary mt-1 text-sm"><?php echo esc_html( $completion ); ?></dd></div><?php endif; ?>
							<?php if ( $technologies ) : ?><div><dt class="rm-portfolio-text-muted text-xs">فناوری‌ها</dt><dd class="rm-portfolio-text-primary mt-1 text-sm leading-7"><?php echo esc_html( implode( '، ', $technologies ) ); ?></dd></div><?php endif; ?>
							<?php if ( $services ) : ?><div><dt class="rm-portfolio-text-muted text-xs">خدمات</dt><dd class="rm-portfolio-text-primary mt-1 text-sm leading-7"><?php echo esc_html( implode( '، ', $services ) ); ?></dd></div><?php endif; ?>
						</dl>
						<?php if ( $website ) : ?><a id="sym-website" class="rm-portfolio-primary-button mt-6 flex min-h-11 items-center justify-center rounded-xl px-4 text-sm font-bold" href="<?php echo esc_url( $website ); ?>" target="_blank" rel="noopener noreferrer">مشاهده وب‌سایت</a><?php endif; ?>
					</aside>
				<?php endif; ?>
			</div>

			<section class="mt-16 rounded-2xl border border-amber-400/20 bg-amber-500/[0.07] p-8 text-center sm:p-10"><h2 class="text-2xl font-bold text-white">برای اجرای پروژه مشابه آماده‌اید؟</h2><p class="mx-auto mt-3 max-w-xl text-sm leading-7 text-neutral-300">برای بررسی نیازهای کسب‌وکار و انتخاب راهکار مناسب، با تیم رومونت در ارتباط باشید.</p><a class="mt-6 inline-flex min-h-11 items-center justify-center rounded-xl bg-amber-500 px-6 text-sm font-bold text-black transition hover:bg-amber-400" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">درخواست مشاوره</a></section>

			<?php if ( $related->have_posts() ) : ?><section class="mt-16" aria-labelledby="related-projects-title"><h2 id="related-projects-title" class="mb-6 text-2xl font-bold text-white">پروژه‌های مرتبط</h2><div class="grid gap-5 md:grid-cols-3"><?php while ( $related->have_posts() ) : $related->the_post(); romonet_portfolio_card(); endwhile; ?></div></section><?php endif; ?>
		</article>
		<?php if ( $website ) : ?>
			<div class="rm-portfolio-mobile-website fixed inset-x-0 bottom-0 z-40 border-t p-3 lg:hidden">
				<div class="mx-auto max-w-7xl px-1">
					<a id="sym-website-mobile" class="rm-portfolio-primary-button flex min-h-12 w-full items-center justify-center rounded-xl text-sm font-bold" href="<?php echo esc_url( $website ); ?>" target="_blank" rel="noopener noreferrer">مشاهده وب‌سایت</a>
				</div>
			</div>
		<?php endif; ?>
	</main>
	<?php wp_reset_postdata(); ?>
<?php endwhile; ?>
<?php get_footer(); ?>
