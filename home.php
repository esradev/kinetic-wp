<?php
/**
 * The template for displaying the Blog archive / index page
 *
 * @package Romonet_WPStorm
 */

get_header();

// Fetch WordPress Categories
$wp_categories = get_categories( array( 'hide_empty' => true ) );

// Fetch all published posts for Alpine data store & fallback loop
$blog_query = new WP_Query(
	array(
		'post_type'      => 'post',
		'posts_per_page' => 24,
		'post_status'    => 'publish',
	)
);

$posts_data = array();
if ( $blog_query->have_posts() ) {
	while ( $blog_query->have_posts() ) {
		$blog_query->the_post();
		$cats      = get_the_category();
		$cat_name  = ! empty( $cats ) ? $cats[0]->name : 'عمومی';
		$post_tags = get_the_tags();
		$tags_list = array();
		if ( $post_tags ) {
			foreach ( $post_tags as $t ) {
				$tags_list[] = $t->name;
			}
		}

		// Calculate estimated reading time
		$word_count = str_word_count( wp_strip_all_tags( get_the_content() ) );
		$read_time  = max( 1, ceil( $word_count / 200 ) ) . ' دقیقه مطالعه';

		$posts_data[] = array(
			'id'          => get_the_ID(),
			'title'       => get_the_title(),
			'slug'        => get_permalink(),
			'excerpt'     => wp_trim_words( get_the_excerpt(), 22 ),
			'category'    => $cat_name,
			'publishedAt' => get_the_date( 'j F Y' ),
			'readTime'    => $read_time,
			'coverImage'  => has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'large' ) : 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&w=800&q=80',
			'tags'        => $tags_list,
			'author'      => array(
				'name'   => get_the_author(),
				'role'   => 'تیم فنی wpstorm',
				'avatar' => get_avatar_url( get_the_author_meta( 'ID' ) ),
			),
		);
	}
	wp_reset_postdata();
}
?>

<main class="relative min-h-screen overflow-x-clip pb-24 pt-12 text-neutral-100 sm:pt-16" dir="rtl" xyz-data="romonetBlogPage(<?php echo esc_attr( wp_json_encode( $posts_data ) ); ?>)">
	<style>
		.rm-blueprint-bg {
			background-image:
				linear-gradient(to left, rgba(255, 255, 255, 0.03) 1px, transparent 1px),
				linear-gradient(to bottom, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
			background-size: 48px 48px;
			mask-image: radial-gradient(ellipse 80% 70% at 50% 20%, #000 40%, transparent 100%);
			-webkit-mask-image: radial-gradient(ellipse 80% 70% at 50% 20%, #000 40%, transparent 100%);
		}
		.rm-hero-glow {
			background: radial-gradient(circle at 50% 10%, rgba(245, 158, 11, 0.13), transparent 55%);
		}
		@media (prefers-reduced-motion: reduce) {
			.rm-blog-img,
			.rm-blog-card {
				transition: none !important;
			}
		}
	</style>

	<!-- Ambient Architectural Layer -->
	<div class="pointer-events-none absolute inset-x-0 top-0 h-[520px] rm-hero-glow" aria-hidden="true"></div>
	<div class="pointer-events-none absolute inset-x-0 top-0 h-[500px] rm-blueprint-bg" aria-hidden="true"></div>

	<div class="relative mx-auto max-w-7xl space-y-12 px-4 sm:px-6 lg:px-8">

		<!-- Editorial Masthead -->
		<header class="border-b border-white/10 pb-10">
			<div class="grid items-end gap-8 lg:grid-cols-12">
				<div class="space-y-5 lg:col-span-8">
					<div class="inline-flex items-center gap-2 rounded-full border border-amber-400/25 bg-amber-500/[0.08] px-3.5 py-1.5 text-xs font-semibold text-amber-300">
						<svg class="h-3.5 w-3.5 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
							<polyline points="4 17 10 11 4 5"></polyline>
							<line x1="12" x2="20" y1="19" y2="19"></line>
						</svg>
						<span>مجله تخصصی و آکادمی توسعه وردپرس wpstorm</span>
					</div>

					<h1 class="text-3xl font-extrabold leading-[1.35] tracking-tight text-white sm:text-5xl">
						وبلاگ مهندسی و مقالات تخصصی وردپرس
					</h1>

					<p class="max-w-3xl text-sm leading-8 text-neutral-300 sm:text-base">
						تحلیل‌های عمیق معماری نرم‌افزار، راهکارهای رساندن امتیاز Core Web Vitals به ۱۰۰، بنچ‌مارک‌های امنیتی و راهنمای سیستم‌های پیامکی نگارش‌شده توسط مهندسان ارشد هلدینگ رومونت (Romonet.ir).
					</p>
				</div>

				<div class="flex items-center justify-start lg:col-span-4 lg:justify-end">
					<div class="inline-flex items-center gap-3 rounded-2xl border border-white/10 bg-neutral-900/70 px-4 py-3 text-xs">
						<span class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-500/10 text-amber-400" aria-hidden="true">
							<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
								<path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
							</svg>
						</span>
						<div>
							<p class="text-[11px] text-neutral-400">آرشیو دانش فنی</p>
							<p class="font-bold text-white"><span xyz-text="posts.length"></span> مقاله منتشرشده</p>
						</div>
					</div>
				</div>
			</div>
		</header>

		<!-- Search & Category Filter Toolbar -->
		<section aria-label="فیلتر و جستجوی مقالات" class="rounded-2xl border border-white/10 bg-neutral-900/75 p-3.5 sm:p-4">
			<div class="flex flex-col items-stretch justify-between gap-4 lg:flex-row lg:items-center">
				<!-- Categories -->
				<div class="flex items-center gap-2 overflow-x-auto pb-1 lg:pb-0">
					<button
						type="button"
						xyz-on:click="selectedCategory = 'همه'"
						xyz-bind:class="selectedCategory === 'همه' ? 'bg-amber-500 text-black font-bold border-amber-500' : 'bg-white/[0.03] text-neutral-300 border-white/10 hover:text-white hover:border-white/25'"
						class="whitespace-nowrap rounded-xl border px-4 py-2 text-xs transition"
					>
						همه
					</button>

					<?php if ( ! empty( $wp_categories ) ) : ?>
						<?php foreach ( $wp_categories as $cat ) : ?>
							<button
								type="button"
								xyz-on:click="selectedCategory = '<?php echo esc_js( $cat->name ); ?>'"
								xyz-bind:class="selectedCategory === '<?php echo esc_js( $cat->name ); ?>' ? 'bg-amber-500 text-black font-bold border-amber-500' : 'bg-white/[0.03] text-neutral-300 border-white/10 hover:text-white hover:border-white/25'"
								class="whitespace-nowrap rounded-xl border px-4 py-2 text-xs transition"
							>
								<?php echo esc_html( $cat->name ); ?>
							</button>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>

				<!-- Search Input -->
				<div class="relative w-full lg:w-80">
					<svg class="pointer-events-none absolute right-3.5 top-1/2 h-4 w-4 -translate-y-1/2 text-neutral-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
						<circle cx="11" cy="11" r="8"></circle>
						<path d="m21 21-4.3-4.3"></path>
					</svg>
					<input
						type="text"
						xyz-model="searchQuery"
						placeholder="جستجو در مقالات و راهنماها..."
						class="w-full rounded-xl border border-white/15 bg-neutral-950/80 py-2.5 pl-4 pr-10 text-xs text-white placeholder:text-neutral-500 outline-none transition focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20"
					/>
				</div>
			</div>
		</section>

		<!-- Editorial Spotlight Banner (Featured Article) -->
		<template xyz-if="selectedCategory === 'همه' && !searchQuery && featuredPost">
			<a
				xyz-bind:href="featuredPost.slug"
				class="group block overflow-hidden rounded-3xl border border-amber-400/30 bg-neutral-900/70 transition hover:border-amber-400/60"
			>
				<div class="grid grid-cols-1 items-stretch lg:grid-cols-12">
					<div class="flex flex-col justify-between space-y-6 p-6 sm:p-10 lg:col-span-7">
						<div class="space-y-4">
							<div class="flex flex-wrap items-center gap-3">
								<span class="inline-flex items-center gap-1.5 rounded-full border border-amber-400/30 bg-amber-500/15 px-3 py-1 text-xs font-semibold text-amber-300">
									<svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
										<path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z" />
									</svg>
									<span>مقاله ویژه تحریریه</span>
								</span>
								<span class="rounded-full border border-white/10 bg-white/[0.04] px-3 py-1 text-xs text-neutral-300" xyz-text="featuredPost.category"></span>
								<span class="text-xs text-neutral-400" xyz-text="featuredPost.readTime"></span>
							</div>

							<h2 class="text-2xl font-extrabold leading-[1.4] text-white transition group-hover:text-amber-300 sm:text-3xl lg:text-4xl" xyz-text="featuredPost.title"></h2>

							<p class="line-clamp-3 text-sm leading-8 text-neutral-300" xyz-text="featuredPost.excerpt"></p>
						</div>

						<div class="flex flex-wrap items-center justify-between gap-4 border-t border-white/10 pt-5">
							<div class="flex items-center gap-3">
								<img xyz-bind:src="featuredPost.author.avatar" xyz-bind:alt="featuredPost.author.name" class="h-10 w-10 rounded-full border border-amber-400/40 object-cover" />
								<div>
									<div class="text-xs font-bold text-white" xyz-text="featuredPost.author.name"></div>
									<div class="text-[11px] text-neutral-400" xyz-text="featuredPost.author.role"></div>
								</div>
							</div>

							<span class="inline-flex items-center gap-1.5 text-xs font-bold text-amber-400 transition group-hover:-translate-x-1">
								<span>مطالعه کامل مقاله</span>
								<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true">
									<path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5m6 6-6-6 6-6" />
								</svg>
							</span>
						</div>
					</div>

					<div class="relative h-64 overflow-hidden sm:h-80 lg:col-span-5 lg:h-auto lg:min-h-[360px]">
						<img
							xyz-bind:src="featuredPost.coverImage"
							xyz-bind:alt="featuredPost.title"
							class="rm-blog-img h-full w-full object-cover transition duration-700 group-hover:scale-105"
						/>
						<div class="pointer-events-none absolute inset-0 hidden bg-gradient-to-l from-neutral-900/90 via-neutral-900/20 to-transparent lg:block" aria-hidden="true"></div>
					</div>
				</div>
			</a>
		</template>

		<!-- All Posts Grid -->
		<section class="space-y-7">
			<div class="flex flex-wrap items-center justify-between gap-4 border-b border-white/10 pb-4">
				<h2 class="flex items-center gap-2.5 text-lg font-bold text-white">
					<span class="flex h-8 w-8 items-center justify-center rounded-lg border border-white/10 bg-white/[0.03] text-amber-400" aria-hidden="true">
						<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
							<path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
							<path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
						</svg>
					</span>
					<span>همه مقالات (<span xyz-text="filteredPosts().length"></span>)</span>
				</h2>

				<template xyz-if="searchQuery">
					<div class="flex items-center gap-3 text-xs text-neutral-400">
						<span>نتایج جستجو برای: «<span class="font-semibold text-amber-300" xyz-text="searchQuery"></span>»</span>
						<button type="button" xyz-on:click="searchQuery = ''" class="text-neutral-300 underline transition hover:text-amber-300">حذف جستجو</button>
					</div>
				</template>
			</div>

			<div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
				<template xyz-for="post in filteredPosts()" xyz-bind:key="post.id">
					<article class="rm-blog-card group flex flex-col justify-between overflow-hidden rounded-2xl border border-white/10 bg-neutral-900/60 transition hover:border-amber-400/40">
						<div>
							<a xyz-bind:href="post.slug" class="relative block h-52 overflow-hidden border-b border-white/10">
								<img
									xyz-bind:src="post.coverImage"
									xyz-bind:alt="post.title"
									class="rm-blog-img h-full w-full object-cover transition duration-500 group-hover:scale-105"
								/>
								<div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-neutral-950/90 via-neutral-950/20 to-transparent" aria-hidden="true"></div>
								<span class="absolute bottom-3 right-3 rounded-lg border border-amber-400/30 bg-neutral-950/85 px-2.5 py-1 text-[11px] font-semibold text-amber-300 backdrop-blur" xyz-text="post.category"></span>
							</a>

							<div class="space-y-3.5 p-6">
								<div class="flex items-center justify-between text-xs text-neutral-400">
									<span xyz-text="post.publishedAt"></span>
									<span xyz-text="post.readTime"></span>
								</div>

								<a xyz-bind:href="post.slug" class="block">
									<h3 class="line-clamp-2 text-lg font-bold leading-snug text-white transition group-hover:text-amber-300" xyz-text="post.title"></h3>
								</a>

								<p class="line-clamp-2 text-xs leading-7 text-neutral-400" xyz-text="post.excerpt"></p>

								<div class="flex flex-wrap gap-1.5 pt-1">
									<template xyz-for="(tag, idx) in post.tags.slice(0, 3)" xyz-bind:key="idx">
										<span class="rounded-md border border-white/10 bg-white/[0.03] px-2 py-0.5 text-[10px] text-neutral-400" xyz-text="'#' + tag"></span>
									</template>
								</div>
							</div>
						</div>

						<div class="px-6 pb-6">
							<div class="flex items-center justify-between border-t border-white/10 pt-4 text-xs">
								<div class="flex items-center gap-2.5">
									<img xyz-bind:src="post.author.avatar" xyz-bind:alt="post.author.name" class="h-7 w-7 rounded-full border border-white/15 object-cover" />
									<span class="font-medium text-neutral-300" xyz-text="post.author.name"></span>
								</div>

								<a xyz-bind:href="post.slug" class="inline-flex items-center gap-1 font-bold text-amber-400 transition group-hover:-translate-x-1">
									<span>مطالعه</span>
									<svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true">
										<path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5m6 6-6-6 6-6" />
									</svg>
								</a>
							</div>
						</div>
					</article>
				</template>
			</div>

			<!-- No Posts Found -->
			<template xyz-if="filteredPosts().length === 0">
				<div class="space-y-4 rounded-2xl border border-white/10 bg-neutral-900/60 p-12 text-center">
					<p class="text-sm text-neutral-300">هیچ مقاله‌ای با این عنوان یا دسته‌بندی یافت نشد.</p>
					<button
						type="button"
						xyz-on:click="selectedCategory = 'همه'; searchQuery = '';"
						class="inline-flex items-center rounded-xl border border-amber-400/30 bg-amber-500/10 px-4 py-2 text-xs font-bold text-amber-300 transition hover:bg-amber-500/20"
					>
						پاک کردن فیلترها
					</button>
				</div>
			</template>
		</section>

	</div>
</main>

<script>
	function romonetBlogPage(initialPosts) {
		return {
			selectedCategory: 'همه',
			searchQuery: '',
			posts: initialPosts || [],

			get featuredPost() {
				return this.posts.length > 0 ? this.posts[0] : null;
			},

			filteredPosts() {
				return this.posts.filter(post => {
					const matchesCat = this.selectedCategory === 'همه' || post.category === this.selectedCategory;
					const q = this.searchQuery.toLowerCase().trim();
					const matchesQuery = !q ||
						post.title.toLowerCase().includes(q) ||
						post.excerpt.toLowerCase().includes(q) ||
						post.tags.some(t => t.toLowerCase().includes(q));
					return matchesCat && matchesQuery;
				});
			}
		};
	}
</script>

<?php
get_footer();