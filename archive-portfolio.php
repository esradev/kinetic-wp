<?php
get_header();
$selected = isset( $_GET['portfolio_category'] ) ? sanitize_title( wp_unslash( $_GET['portfolio_category'] ) ) : '';
$query_args = array( 'post_type' => 'portfolio', 'post_status' => 'publish', 'posts_per_page' => 9, 'paged' => max( 1, get_query_var( 'paged' ) ) );
if ( $selected ) {
	$query_args['tax_query'] = array( array( 'taxonomy' => 'portfolio_category', 'field' => 'slug', 'terms' => $selected ) );
}
$portfolio_query = new WP_Query( $query_args );
$categories = get_terms( array( 'taxonomy' => 'portfolio_category', 'hide_empty' => true ) );
?>
<main class="min-h-screen pb-24 pt-16" dir="rtl">
	<section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
		<div class="max-w-3xl"><p class="text-sm font-semibold text-amber-400">نمونه‌کارهای رومونت</p><h1 class="mt-4 text-4xl font-bold leading-[1.4] text-white sm:text-6xl">نمونه‌کارهای طراحی سایت و توسعه رومونت</h1><p class="mt-5 text-base leading-8 text-neutral-400">در این بخش می‌توانید پروژه‌های طراحی سایت، توسعه فروشگاه اینترنتی و راهکارهای نرم‌افزاری رومونت را مشاهده کنید.</p></div>
		<nav class="mt-10 flex gap-2 overflow-x-auto pb-2" aria-label="فیلتر دسته‌بندی نمونه‌کارها">
			<a class="whitespace-nowrap rounded-xl px-4 py-2 text-sm <?php echo $selected ? 'bg-white/5 text-neutral-400' : 'bg-amber-500 font-bold text-black'; ?>" href="<?php echo esc_url( get_post_type_archive_link( 'portfolio' ) ); ?>">همه پروژه‌ها</a>
			<?php foreach ( $categories as $category ) : ?><a class="whitespace-nowrap rounded-xl px-4 py-2 text-sm <?php echo $selected === $category->slug ? 'bg-amber-500 font-bold text-black' : 'bg-white/5 text-neutral-400'; ?>" href="<?php echo esc_url( add_query_arg( 'portfolio_category', $category->slug, get_post_type_archive_link( 'portfolio' ) ) ); ?>"><?php echo esc_html( $category->name ); ?></a><?php endforeach; ?>
		</nav>
		<?php if ( $portfolio_query->have_posts() ) : ?><div class="mt-10 grid gap-5 md:grid-cols-2 lg:grid-cols-3"><?php while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post(); romonet_portfolio_card(); endwhile; ?></div>
			<?php if ( $portfolio_query->max_num_pages > 1 ) : ?><nav class="mt-12 flex justify-center gap-2" aria-label="صفحه‌بندی"><?php echo wp_kses_post( paginate_links( array( 'total' => $portfolio_query->max_num_pages, 'current' => max( 1, get_query_var( 'paged' ) ), 'type' => 'plain', 'add_args' => $selected ? array( 'portfolio_category' => $selected ) : array() ) ) ); ?></nav><?php endif; ?>
		<?php else : ?><div class="mt-10 rounded-2xl border border-white/10 bg-white/[0.03] p-10 text-center text-neutral-300">نمونه‌کارهای رومونت در حال تکمیل هستند. برای بررسی و اجرای پروژه خود می‌توانید <a class="text-amber-400 hover:text-amber-300" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">با ما در ارتباط باشید</a>.</div><?php endif; ?>
	</section>
</main>
<?php wp_reset_postdata(); get_footer(); ?>
