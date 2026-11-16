<?php
get_header();
while ( have_posts() ) : the_post();
	$post_id = get_the_ID();
	$type = get_post_meta( $post_id, '_romonet_portfolio_type', true );
	$type_label = array( 'client' => 'پروژه مشتری', 'internal' => 'محصول داخلی رومونت', 'demo' => 'پروژه نمایشی' );
	$terms = get_the_terms( $post_id, 'portfolio_category' );
	$gallery = get_post_meta( $post_id, '_romonet_portfolio_gallery', true );
	$website = get_post_meta( $post_id, '_romonet_portfolio_website_url', true );
	$client = get_post_meta( $post_id, '_romonet_portfolio_client', true );
	$technologies = get_post_meta( $post_id, '_romonet_portfolio_technologies', true );
	$services = get_post_meta( $post_id, '_romonet_portfolio_services', true );
	$related = new WP_Query( array( 'post_type' => 'portfolio', 'post_status' => 'publish', 'posts_per_page' => 3, 'post__not_in' => array( $post_id ), 'tax_query' => $terms ? array( array( 'taxonomy' => 'portfolio_category', 'field' => 'term_id', 'terms' => wp_list_pluck( $terms, 'term_id' ) ) ) : array(), 'no_found_rows' => true ) );
	?>
	<main class="min-h-screen pb-24 pt-10" dir="rtl"><article class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
		<nav class="mb-8 text-sm text-neutral-500"><a class="hover:text-amber-400" href="<?php echo esc_url( get_post_type_archive_link( 'portfolio' ) ); ?>">نمونه‌کارها</a> <span aria-hidden="true">/</span> <span class="text-neutral-300"><?php the_title(); ?></span></nav>
		<div class="flex flex-wrap items-center gap-2"><?php if ( isset( $type_label[ $type ] ) ) : ?><span class="rounded-full bg-amber-500/15 px-3 py-1 text-xs text-amber-300"><?php echo esc_html( $type_label[ $type ] ); ?></span><?php endif; ?><?php if ( $type === 'demo' ) : ?><span class="text-xs text-neutral-400">این پروژه نمایشی است.</span><?php endif; ?></div>
		<h1 class="mt-4 text-4xl font-bold leading-[1.4] text-white sm:text-6xl"><?php the_title(); ?></h1>
		<?php if ( has_excerpt() ) : ?><p class="mt-5 max-w-3xl text-lg leading-8 text-neutral-300"><?php echo esc_html( get_the_excerpt() ); ?></p><?php endif; ?>
		<?php if ( has_post_thumbnail() ) : ?><div class="mt-10 overflow-hidden rounded-3xl border border-white/10"><?php the_post_thumbnail( 'full', array( 'class' => 'h-auto w-full', 'loading' => 'eager' ) ); ?></div><?php endif; ?>
		<div class="prose prose-invert mt-10 max-w-none prose-headings:text-white prose-p:text-neutral-300 prose-a:text-amber-400"><?php the_content(); ?></div>
		<?php if ( $client || $website || $technologies || $services ) : ?><section class="mt-12 grid gap-4 rounded-2xl border border-white/10 bg-white/[0.03] p-6 sm:grid-cols-2"><h2 class="sm:col-span-2 text-2xl font-bold text-white">اطلاعات پروژه</h2><?php if ( $client ) : ?><div><dt class="text-sm text-neutral-500">مشتری</dt><dd class="mt-1 text-neutral-200"><?php echo esc_html( $client ); ?></dd></div><?php endif; ?><?php if ( $website ) : ?><div><dt class="text-sm text-neutral-500">وب‌سایت</dt><dd class="mt-1"><a class="text-amber-400 hover:text-amber-300" href="<?php echo esc_url( $website ); ?>" target="_blank" rel="noopener noreferrer">مشاهده وب‌سایت</a></dd></div><?php endif; ?><?php if ( $services ) : ?><div><dt class="text-sm text-neutral-500">خدمات ارائه‌شده</dt><dd class="mt-1 text-neutral-200"><?php echo esc_html( implode( '، ', (array) $services ) ); ?></dd></div><?php endif; ?><?php if ( $technologies ) : ?><div><dt class="text-sm text-neutral-500">فناوری‌ها</dt><dd class="mt-1 text-neutral-200"><?php echo esc_html( implode( '، ', (array) $technologies ) ); ?></dd></div><?php endif; ?></section><?php endif; ?>
		<?php if ( $gallery ) : ?><section class="mt-12"><h2 class="mb-5 text-2xl font-bold text-white">گالری پروژه</h2><div class="grid gap-4 sm:grid-cols-2"><?php foreach ( (array) $gallery as $image_id ) : if ( wp_attachment_is_image( $image_id ) ) : ?><figure class="overflow-hidden rounded-2xl border border-white/10"><?php echo wp_get_attachment_image( $image_id, 'large', false, array( 'class' => 'h-auto w-full', 'loading' => 'lazy' ) ); ?></figure><?php endif; endforeach; ?></div></section><?php endif; ?>
		<div class="mt-12 rounded-2xl border border-amber-400/20 bg-amber-500/[0.07] p-8 text-center"><h2 class="text-2xl font-bold text-white">پروژه مشابهی در ذهن دارید؟</h2><a class="mt-5 inline-flex rounded-xl bg-amber-500 px-5 py-3 font-bold text-black hover:bg-amber-400" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">درخواست مشاوره</a></div>
		<?php if ( $related->have_posts() ) : ?><section class="mt-16"><h2 class="mb-6 text-2xl font-bold text-white">پروژه‌های مرتبط</h2><div class="grid gap-5 md:grid-cols-3"><?php while ( $related->have_posts() ) : $related->the_post(); romonet_portfolio_card(); endwhile; ?></div></section><?php endif; ?>
	</article></main>
	<?php wp_reset_postdata();
endwhile;
get_footer();
