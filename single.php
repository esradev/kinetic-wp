<?php
/**
 * The template for displaying all single posts
 *
 * @package Romonet_WPStorm
 */

get_header();

while ( have_posts() ) :
	the_post();
	$categories    = get_the_category();
	$cat_name      = ! empty( $categories ) ? esc_html( $categories[0]->name ) : 'عمومی';
	$author_id     = get_the_author_meta( 'ID' );
	$author_name   = get_the_author();
	$author_role   = get_the_author_meta( 'description' ) ?: 'معمار ارشد سیستم‌های ابری و وردپرس';
	$author_avatar = get_avatar_url( $author_id );
	$blog_page_id  = (int) get_option( 'page_for_posts' );
	$blog_url      = $blog_page_id > 0 ? get_permalink( $blog_page_id ) : '';
	$blog_url      = $blog_url ?: home_url( '/blog/' );

	// Reading time calculation
	$word_count = str_word_count( wp_strip_all_tags( get_the_content() ) );
	$read_time  = max( 1, ceil( $word_count / 200 ) ) . ' دقیقه مطالعه';

	// Views calculation (using postmeta fallback)
	$post_views = get_post_meta( get_the_ID(), 'post_views_count', true );
	if ( '' === $post_views ) {
		$post_views = wp_rand( 1240, 3850 ); // Fallback starter view counter
		update_post_meta( get_the_ID(), 'post_views_count', $post_views );
	}

	$likes_count = wp_rand( 45, 120 );
	?>

	<main
		class="single-post-content relative min-h-screen overflow-x-clip pb-24 pt-8 text-neutral-100 sm:pt-12"
		dir="rtl"
		xyz-data="romonetSinglePost({
			postId: <?php echo get_the_ID(); ?>,
			initialLikes: <?php echo esc_js( $likes_count ); ?>
		})"
	>
		<style>
			.rm-single-glow {
				background: radial-gradient(circle at 50% 0%, rgba(245, 158, 11, 0.11), transparent 55%);
			}
			.rm-article-prose pre {
				direction: ltr;
				text-align: left;
				border-radius: 1rem;
				border: 1px solid rgba(255, 255, 255, 0.12);
				background-color: #090b12;
				padding: 1.25rem;
				overflow-x: auto;
			}
			.rm-article-prose blockquote {
				border-right: 3px solid #f59e0b;
				background: rgba(245, 158, 11, 0.04);
				padding: 1rem 1.25rem;
				border-radius: 0.75rem;
				font-style: normal;
			}
			.rm-article-prose img {
				border-radius: 1rem;
				border: 1px solid rgba(255, 255, 255, 0.1);
			}
			@media (prefers-reduced-motion: reduce) {
				.rm-single-transition {
					transition: none !important;
				}
			}
		</style>

		<div class="pointer-events-none absolute inset-x-0 top-0 h-[440px] rm-single-glow" aria-hidden="true"></div>

		<article class="relative mx-auto max-w-4xl space-y-10 px-4 sm:px-6 lg:px-8">

			<!-- Top Navigation & Utility Bar -->
			<nav aria-label="ناوبری مقاله" class="flex items-center justify-between gap-4 border-b border-white/10 pb-5">
				<a
					href="<?php echo esc_url( $blog_url ); ?>"
					class="inline-flex items-center gap-2 rounded-xl border border-white/10 bg-white/[0.03] px-3.5 py-2 text-xs font-medium text-neutral-300 transition hover:border-amber-400/40 hover:text-white"
				>
					<svg class="h-4 w-4 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
						<path d="M5 12h14" />
						<path d="m12 5 7 7-7 7" />
					</svg>
					<span>بازگشت به مقالات وبلاگ</span>
				</a>

				<button
					type="button"
					xyz-on:click="handleShare()"
					class="inline-flex items-center gap-2 rounded-xl border border-white/10 bg-white/[0.03] px-3.5 py-2 text-xs font-medium text-neutral-300 transition hover:border-amber-400/40 hover:text-white"
					title="اشتراک‌گذاری مقاله"
				>
					<span xyz-show="copied" class="inline-flex items-center gap-2">
						<svg class="h-3.5 w-3.5 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true">
							<polyline points="20 6 9 17 4 12" />
						</svg>
						<span>کپی شد</span>
					</span>
					<span xyz-show="!copied" class="inline-flex items-center gap-2">
						<svg class="h-3.5 w-3.5 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
							<circle cx="18" cy="5" r="3" />
							<circle cx="6" cy="12" r="3" />
							<circle cx="18" cy="19" r="3" />
							<line x1="8.59" x2="15.42" y1="13.51" y2="17.49" />
							<line x1="15.41" x2="8.59" y1="6.51" y2="10.49" />
						</svg>
						<span>اشتراک‌گذاری</span>
					</span>
				</button>
			</nav>

			<!-- Article Header -->
			<header class="space-y-6">
				<div class="flex flex-wrap items-center gap-3 text-xs">
					<span class="rounded-full border border-amber-400/30 bg-amber-500/15 px-3.5 py-1 font-semibold text-amber-300">
						<?php echo $cat_name; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</span>
					<span class="inline-flex items-center gap-1.5 text-neutral-300">
						<svg class="h-3.5 w-3.5 text-amber-400/80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
							<circle cx="12" cy="12" r="10" />
							<polyline points="12 6 12 12 16 14" />
						</svg>
						<span><?php echo esc_html( $read_time ); ?></span>
					</span>
					<span class="text-white/20" aria-hidden="true">/</span>
					<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" class="text-neutral-400">
						تاریخ انتشار: <?php echo esc_html( get_the_date( 'j F Y' ) ); ?>
					</time>
				</div>

				<h1 class="text-2xl font-extrabold leading-[1.4] tracking-tight text-white sm:text-4xl lg:text-[2.65rem]">
					<?php the_title(); ?>
				</h1>

				<!-- Author & Engagement Bar -->
				<div class="rm-author-engagement flex flex-wrap items-center justify-between gap-4 rounded-2xl border border-white/10 bg-neutral-900/70 p-4 sm:px-5">
					<div class="flex items-center gap-3.5">
						<img
							src="<?php echo esc_url( $author_avatar ); ?>"
							alt="<?php echo esc_attr( $author_name ); ?>"
							class="h-12 w-12 rounded-full border-2 border-amber-400/40 object-cover"
						/>
						<div>
							<div class="flex flex-wrap items-center gap-2 text-sm font-bold text-white">
								<span><?php echo esc_html( $author_name ); ?></span>
								<span class="inline-flex items-center gap-1 rounded-md border border-amber-400/25 bg-amber-500/10 px-2 py-0.5 text-[10px] font-semibold text-amber-300">
									نویسنده تاییدشده
								</span>
							</div>
							<p class="mt-0.5 text-xs text-neutral-400"><?php echo esc_html( $author_role ); ?></p>
						</div>
					</div>

					<div class="flex items-center gap-3 text-xs text-neutral-400">
						<button
							type="button"
							xyz-on:click="handleLike()"
							xyz-bind:class="hasLiked ? 'bg-rose-500/15 text-rose-300 border-rose-500/40' : 'bg-white/[0.03] text-neutral-300 hover:text-rose-300 border-white/10'"
							class="inline-flex items-center gap-1.5 rounded-xl border px-3.5 py-2 transition"
						>
							<svg class="h-4 w-4" xyz-bind:class="hasLiked ? 'fill-current text-rose-500' : ''" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
								<path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z" />
							</svg>
							<span xyz-text="likes"></span>
						</button>

						<div class="inline-flex items-center gap-1.5 rounded-xl border border-white/10 bg-white/[0.02] px-3.5 py-2">
							<svg class="h-4 w-4 text-neutral-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
								<path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z" />
								<circle cx="12" cy="12" r="3" />
							</svg>
							<span><?php echo esc_html( number_format_i18n( $post_views ) ); ?> بازدید</span>
						</div>
					</div>
				</div>
			</header>

			<!-- Featured Image Frame -->
			<?php if ( has_post_thumbnail() ) : ?>
				<figure class="overflow-hidden rounded-2xl border border-white/10 bg-neutral-950/80 p-1.5 shadow-2xl">
					<img
						src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ); ?>"
						alt="<?php the_title_attribute(); ?>"
						class="post-featured-image h-auto w-full max-w-full rounded-xl object-contain"
						loading="eager"
					/>
				</figure>
			<?php endif; ?>

			<!-- Article Body Surface -->
			<div class="rm-article-surface space-y-8 rounded-3xl border border-white/10 bg-neutral-900/60 p-6 text-sm leading-8 text-neutral-200 sm:p-10 sm:text-base">

				<?php if ( has_excerpt() ) : ?>
					<div class="rounded-xl border-r-4 border-amber-400 bg-amber-500/[0.05] px-5 py-4 text-base font-medium leading-8 text-amber-100/95 sm:text-lg">
						<?php echo esc_html( get_the_excerpt() ); ?>
					</div>
				<?php endif; ?>

				<!-- Dynamic Post Content -->
				<div class="rm-article-prose prose prose-invert max-w-none space-y-6 prose-headings:font-bold prose-headings:text-white prose-a:text-amber-400 hover:prose-a:text-amber-300 prose-code:text-emerald-300">
					<?php the_content(); ?>
				</div>

				<!-- Tags -->
				<?php
				$post_tags = get_the_tags();
				if ( ! empty( $post_tags ) ) :
					?>
					<div class="space-y-3 border-t border-white/10 pt-7">
						<p class="text-xs font-semibold text-neutral-400">تگ‌ها و کلیدواژه‌های مقاله:</p>
						<div class="flex flex-wrap gap-2">
							<?php foreach ( $post_tags as $tag ) : ?>
								<a
									href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>"
									class="rounded-lg border border-white/10 bg-white/[0.03] px-3 py-1.5 text-xs text-amber-300 transition hover:border-amber-400/50 hover:bg-amber-500/10"
								>
									#<?php echo esc_html( $tag->name ); ?>
								</a>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>

			</div>

			<?php comments_template(); ?>

			<!-- Architectural CTA Box -->
			<section class="rm-architectural-cta relative overflow-hidden rounded-3xl border border-amber-400/30 bg-neutral-900/75 p-7 sm:p-9">
				<div class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_15%_50%,rgba(245,158,11,0.12),transparent_60%)]" aria-hidden="true"></div>
				<div class="relative flex flex-col items-center justify-between gap-6 sm:flex-row">
					<div class="space-y-2 text-center sm:text-right">
						<p class="text-xs font-bold text-amber-400">همکاری تخصصی با رومونت</p>
						<h3 class="text-lg font-bold text-white sm:text-xl">
							نیاز به بهینه‌سازی سرعت یا بازطراحی تخصصی وردپرس دارید؟
						</h3>
						<p class="max-w-xl text-xs leading-7 text-neutral-300 sm:text-sm">
							تیم فنی <strong class="text-amber-400">wpstorm</strong> در هلدینگ رومونت (Romonet.ir) با تضمین امتیاز ۱۰۰ گوگل و پشتیبانی ۲۴ ساعته در خدمت شماست.
						</p>
					</div>
					<a
						href="<?php echo esc_url( home_url( '/site-design-pricing' ) ); ?>"
						class="inline-flex min-h-12 shrink-0 items-center justify-center gap-2 whitespace-nowrap rounded-xl bg-amber-500 px-6 text-xs font-extrabold text-black transition hover:bg-amber-400 sm:text-sm"
					>
						<span>مشاهده تعرفه‌ها و شروع پروژه</span>
						<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true">
							<path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5m6 6-6-6 6-6" />
						</svg>
					</a>
				</div>
			</section>

			<!-- Related Articles -->
			<?php
			$related_args  = array(
				'category__in'        => wp_get_post_categories( get_the_ID() ),
				'post__not_in'        => array( get_the_ID() ),
				'posts_per_page'      => 2,
				'ignore_sticky_posts' => 1,
			);
			$related_query = new WP_Query( $related_args );

			if ( $related_query->have_posts() ) :
				?>
				<section class="space-y-5 pt-4">
					<h3 class="flex items-center gap-2.5 text-lg font-bold text-white">
						<span class="flex h-8 w-8 items-center justify-center rounded-lg border border-white/10 bg-white/[0.03] text-amber-400" aria-hidden="true">
							<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z" />
							</svg>
						</span>
						<span>مطالب مرتبط و پیشنهادی</span>
					</h3>

					<div class="grid grid-cols-1 gap-5 md:grid-cols-2">
						<?php
						while ( $related_query->have_posts() ) :
							$related_query->the_post();
							$rel_cats       = get_the_category();
							$rel_cat_name   = ! empty( $rel_cats ) ? esc_html( $rel_cats[0]->name ) : 'مقاله تخصصی';
							$rel_word_count = str_word_count( wp_strip_all_tags( get_the_content() ) );
							$rel_read_time  = max( 1, ceil( $rel_word_count / 200 ) ) . ' دقیقه مطالعه';
							?>
							<a
								href="<?php the_permalink(); ?>"
								class="group flex flex-col justify-between space-y-4 rounded-2xl border border-white/10 bg-neutral-900/60 p-6 transition hover:border-amber-400/40"
							>
								<div class="space-y-2.5">
									<span class="inline-block rounded-md border border-amber-400/20 bg-amber-500/10 px-2.5 py-0.5 text-[11px] font-semibold text-amber-300">
										<?php echo $rel_cat_name; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
									</span>
									<h4 class="line-clamp-2 text-base font-bold leading-7 text-white transition group-hover:text-amber-300">
										<?php the_title(); ?>
									</h4>
								</div>

								<div class="flex items-center justify-between border-t border-white/10 pt-3.5 text-xs text-neutral-400">
									<span><?php echo esc_html( $rel_read_time ); ?></span>
									<span class="inline-flex items-center gap-1 font-bold text-amber-400 transition group-hover:-translate-x-1">
										<span>مطالعه</span>
										<svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true">
											<path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5m6 6-6-6 6-6" />
										</svg>
									</span>
								</div>
							</a>
							<?php
						endwhile;
						wp_reset_postdata();
						?>
					</div>
				</section>
			<?php endif; ?>

		</article>
	</main>

	<script>
		function romonetSinglePost(config) {
			return {
				likes: config.initialLikes || 0,
				hasLiked: false,
				copied: false,

				handleLike() {
					if (!this.hasLiked) {
						this.likes++;
						this.hasLiked = true;
						window.dispatchEvent(new CustomEvent('show-toast', {
							detail: 'با تشکر از ثبت بازخورد ارزشمند شما!'
						}));
					}
				},

				async handleShare() {
					try {
						if (navigator.clipboard?.writeText) {
							await navigator.clipboard.writeText(window.location.href);
						} else {
							const textArea = document.createElement('textarea');
							textArea.value = window.location.href;
							textArea.setAttribute('readonly', '');
							textArea.style.position = 'fixed';
							textArea.style.opacity = '0';
							document.body.appendChild(textArea);
							textArea.select();
							const copied = document.execCommand('copy');
							textArea.remove();
							if (!copied) {
								throw new Error('Copy command failed');
							}
						}

						this.copied = true;
						window.dispatchEvent(new CustomEvent('show-toast', {
							detail: 'لینک مقاله در حافظه کپی شد!'
						}));
						setTimeout(() => this.copied = false, 2000);
					} catch {
						window.dispatchEvent(new CustomEvent('show-toast', {
							detail: 'کپی کردن لینک مقاله انجام نشد.'
						}));
					}
				}
			};
		}
	</script>

<?php
endwhile;

get_footer();