<?php
/**
 * Selected Projects section for Front Page
 *
 * @package Romonet_WPStorm
 */
?>
<section id="projects" class="rm-portfolio-front scroll-mt-24 border-y">
	<div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
		<div class="flex flex-col gap-6 sm:flex-row sm:items-end sm:justify-between">
			<div class="max-w-2xl">
				<p class="inline-flex items-center gap-2 text-xs font-semibold tracking-wide text-amber-400 sm:text-sm">
					<span class="h-px w-6 bg-amber-400/70" aria-hidden="true"></span>
					<span>پروژه‌های منتخب</span>
				</p>
				<h2 class="mt-3 text-3xl font-bold leading-snug tracking-tight text-white sm:text-4xl">
					نمونه‌هایی از مسیرهایی که می‌سازیم
				</h2>
				<p class="mt-4 max-w-xl text-sm leading-7 text-neutral-400 sm:text-base">
					این بخش برای نمایش پروژه‌های واقعی رومونت آماده شده و با انتشار نمونه‌های قابل ارائه تکمیل می‌شود.
				</p>
			</div>

			<a href="<?php echo esc_url( home_url( '/portfolio/' ) ); ?>" class="rm-portfolio-front-button group inline-flex shrink-0 items-center gap-2 self-start rounded-xl px-5 py-3 text-sm font-semibold sm:self-auto">
				<span>مشاهده همه پروژه‌ها</span>
				<svg class="h-4 w-4 transition-transform duration-200 group-hover:-translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
					<path d="M19 12H5" />
					<path d="m12 19-7-7 7-7" />
				</svg>
			</a>
		</div>

		<?php
		$featured_portfolios = romonet_get_featured_portfolios( 3 );
		$display_ids         = array();
		if ( $featured_portfolios->have_posts() ) {
			foreach ( $featured_portfolios->posts as $featured_post ) {
				$display_ids[] = (int) $featured_post->ID;
			}
		}
		wp_reset_postdata();

		if ( count( $display_ids ) < 3 ) {
			$fallback_query = new WP_Query(
				array(
					'post_type'      => 'portfolio',
					'post_status'    => 'publish',
					'posts_per_page' => 3 - count( $display_ids ),
					'post__not_in'   => $display_ids,
					'orderby'        => 'date',
					'order'          => 'DESC',
					'no_found_rows'  => true,
				)
			);
			if ( $fallback_query->have_posts() ) {
				foreach ( $fallback_query->posts as $fallback_post ) {
					$display_ids[] = (int) $fallback_post->ID;
				}
			}
			wp_reset_postdata();
		}
		?>
		<?php if ( $display_ids ) : ?>
			<div class="mt-12 grid grid-cols-1 gap-6 md:grid-cols-3">
				<?php foreach ( $display_ids as $portfolio_id ) : romonet_portfolio_card( $portfolio_id ); endforeach; ?>
			</div>
		<?php else : ?>
			<div class="mt-12 overflow-hidden rounded-2xl border border-dashed border-white/15 bg-white/[0.02] p-8 sm:p-12">
				<div class="mx-auto flex max-w-lg flex-col items-center text-center">
					<span class="flex h-12 w-12 items-center justify-center rounded-2xl border border-amber-400/25 bg-amber-500/10 text-amber-400">
						<svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
							<rect width="18" height="18" x="3" y="3" rx="2" />
							<path d="M3 9h18" />
							<path d="M9 21V9" />
						</svg>
					</span> 
					<p class="mt-5 text-sm leading-8 text-neutral-300 sm:text-base">
						نمونه‌کارهای رومونت در حال تکمیل هستند. برای مشاهده پروژه‌های منتشرشده به
						<a class="font-semibold text-amber-400 underline decoration-amber-400/40 underline-offset-4 transition hover:text-amber-300" href="<?php echo esc_url( home_url( '/portfolio/' ) ); ?>">آرشیو نمونه‌کارها</a>
						سر بزنید.
					</p>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>