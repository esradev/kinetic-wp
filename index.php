<?php

/**
 * The template for displaying the Blog archive / index page
 *
 * @package Romonet_WPStorm
 */

get_header();

// Fetch WordPress Categories
$wp_categories = get_categories(array('hide_empty' => true));

// Fetch all published posts for Alpine data store & fallback loop
$blog_query = new WP_Query(array(
  'post_type'      => 'post',
  'posts_per_page' => 24,
  'post_status'    => 'publish',
));

$posts_data = array();
if ($blog_query->have_posts()) {
  while ($blog_query->have_posts()) {
    $blog_query->the_post();
    $cats = get_the_category();
    $cat_name = !empty($cats) ? $cats[0]->name : 'عمومی';
    $post_tags = get_the_tags();
    $tags_list = array();
    if ($post_tags) {
      foreach ($post_tags as $t) {
        $tags_list[] = $t->name;
      }
    }

    // Calculate estimated reading time
    $word_count = str_word_count(strip_tags(get_the_content()));
    $read_time = max(1, ceil($word_count / 200)) . ' دقیقه مطالعه';

    $posts_data[] = array(
      'id'          => get_the_ID(),
      'title'       => get_the_title(),
      'slug'        => get_permalink(),
      'excerpt'     => wp_trim_words(get_the_excerpt(), 22),
      'category'    => $cat_name,
      'publishedAt' => get_the_date('j F Y'),
      'readTime'    => $read_time,
      'coverImage'  => has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'large') : 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&w=800&q=80',
      'tags'        => $tags_list,
      'author'      => array(
        'name'   => get_the_author(),
        'role'   => 'تیم فنی wpstorm',
        'avatar' => get_avatar_url(get_the_author_meta('ID'))
      )
    );
  }
  wp_reset_postdata();
}
?>

<main class="min-h-screen pb-24 pt-8" dir="rtl" x-data="romonetBlogPage(<?php echo esc_attr(json_encode($posts_data)); ?>)">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">

    <!-- Blog Header -->
    <div class="text-center max-w-3xl mx-auto space-y-4">
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-amber-500/10 text-amber-400 border border-amber-500/20 text-xs">
        <!-- Terminal Icon -->
        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <polyline points="4 17 10 11 4 5"></polyline>
          <line x1="12" x2="20" y1="19" y2="19"></line>
        </svg>
        <span>مجله تخصصی و آکادمی توسعه وردپرس wpstorm</span>
      </div>
      <h1 class="text-4xl sm:text-5xl font-extrabold text-white tracking-tight">
        وبلاگ مهندسی و مقالات تخصصی وردپرس
      </h1>
      <p class="text-base text-neutral-400 leading-relaxed">
        تحلیل‌های عمیق معماری نرم‌افزار، راهکارهای رساندن امتیاز Core Web Vitals به ۱۰۰، بنچ‌مارک‌های امنیتی و راهنمای سیستم‌های پیامکی نگارش‌شده توسط مهندسان ارشد هلدینگ رومونت (Romonet.ir).
      </p>
    </div>

    <!-- Search & Category Filter Bar -->
    <div class="glass-panel p-4 rounded-2xl border border-white/10 flex flex-col md:flex-row gap-4 items-center justify-between bg-white/5 backdrop-blur-xl">
      <!-- Categories -->
      <div class="flex items-center gap-1.5 overflow-x-auto w-full md:w-auto pb-2 md:pb-0">
        <button
          @click="selectedCategory = 'همه'"
          :class="selectedCategory === 'همه' ? 'bg-amber-500 text-black font-bold shadow-md shadow-amber-500/20' : 'bg-white/5 text-neutral-400 hover:text-white hover:bg-white/10'"
          class="px-3.5 py-2 rounded-xl text-xs whitespace-nowrap transition">
          همه
        </button>

        <?php if (!empty($wp_categories)) : ?>
          <?php foreach ($wp_categories as $cat) : ?>
            <button
              @click="selectedCategory = '<?php echo esc_js($cat->name); ?>'"
              :class="selectedCategory === '<?php echo esc_js($cat->name); ?>' ? 'bg-amber-500 text-black font-bold shadow-md shadow-amber-500/20' : 'bg-white/5 text-neutral-400 hover:text-white hover:bg-white/10'"
              class="px-3.5 py-2 rounded-xl text-xs whitespace-nowrap transition">
              <?php echo esc_html($cat->name); ?>
            </button>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>

      <!-- Search Input -->
      <div class="relative w-full md:w-72">
        <svg class="w-4 h-4 text-neutral-500 absolute right-3.5 top-1/2 -translate-y-1/2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <circle cx="11" cy="11" r="8"></circle>
          <path d="m21 21-4.3-4.3"></path>
        </svg>
        <input
          type="text"
          x-model="searchQuery"
          placeholder="جستجو در مقالات و راهنماها..."
          class="w-full bg-black/50 border border-white/10 focus:border-amber-400 rounded-xl pr-10 pl-4 py-2 text-xs text-white placeholder-neutral-500 focus:outline-none transition font-sans" />
      </div>
    </div>

    <!-- Editorial Spotlight Banner (Featured Article) -->
    <template x-if="selectedCategory === 'همه' && !searchQuery && featuredPost">
      <a
        :href="featuredPost.slug"
        class="block glass-panel rounded-3xl border border-amber-500/30 overflow-hidden cursor-pointer group hover:border-amber-400/60 transition-all bg-gradient-to-br from-[#121522] via-[#0f111a] to-[#121522]">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-center">
          <div class="lg:col-span-7 p-6 sm:p-10 space-y-4">
            <div class="flex items-center gap-3">
              <span class="px-3 py-1 rounded-full bg-amber-500/20 text-amber-300 text-xs border border-amber-500/30 font-semibold">
                ⭐ مقاله ویژه تحریریه
              </span>
              <span class="text-xs text-neutral-400 " x-text="featuredPost.readTime"></span>
            </div>

            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-white group-hover:text-amber-300 transition leading-tight" x-text="featuredPost.title"></h2>

            <p class="text-sm text-neutral-300 leading-relaxed line-clamp-3" x-text="featuredPost.excerpt"></p>

            <div class="pt-4 flex items-center justify-between border-t border-white/10">
              <div class="flex items-center gap-3">
                <img :src="featuredPost.author.avatar" :alt="featuredPost.author.name" class="w-10 h-10 rounded-full object-cover border border-amber-500/40" />
                <div>
                  <div class="text-xs font-bold text-white" x-text="featuredPost.author.name"></div>
                  <div class="text-[11px] text-neutral-400" x-text="featuredPost.author.role"></div>
                </div>
              </div>

              <span class="text-xs font-bold text-amber-400 flex items-center gap-1 group-hover:-translate-x-1 transition-transform">
                <span>مطالعه کامل مقاله</span>
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="m12 19-7-7 7-7" />
                  <path d="M19 12H5" />
                </svg>
              </span>
            </div>
          </div>

          <div class="lg:col-span-5 h-72 sm:h-96 relative overflow-hidden">
            <img
              :src="featuredPost.coverImage"
              :alt="featuredPost.title"
              class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
            <div class="absolute inset-0 bg-gradient-to-l from-[#121522] via-transparent to-transparent hidden lg:block"></div>
          </div>
        </div>
      </a>
    </template>

    <!-- All Posts Grid -->
    <div class="space-y-6">
      <div class="flex items-center justify-between pb-2 border-b border-white/10">
        <h3 class="text-lg font-bold text-white flex items-center gap-2">
          <!-- BookOpen Icon -->
          <svg class="w-4 h-4 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
            <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
          </svg>
          <span>همه مقالات (<span x-text="filteredPosts().length"></span>)</span>
        </h3>
        <template x-if="searchQuery">
          <span class="text-xs text-neutral-400">نتایج جستجو برای: «<span x-text="searchQuery"></span>»</span>
        </template>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <template x-for="post in filteredPosts()" :key="post.id">
          <article
            class="glass-card rounded-2xl border border-white/10 overflow-hidden cursor-pointer group hover:border-amber-400/40 transition flex flex-col justify-between bg-white/5 backdrop-blur-md">
            <div>
              <div class="h-48 overflow-hidden relative">
                <img
                  :src="post.coverImage"
                  :alt="post.title"
                  class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                <div class="absolute inset-0 bg-gradient-to-t from-[#0d0f17] via-transparent to-transparent"></div>
                <span class="absolute bottom-3 right-3 px-2.5 py-0.5 rounded bg-black/80 backdrop-blur text-amber-400 text-[11px] border border-amber-500/30" x-text="post.category"></span>
              </div>

              <div class="p-6 space-y-3">
                <div class="flex items-center justify-between text-xs text-neutral-400">
                  <span x-text="post.publishedAt"></span>
                  <span x-text="post.readTime"></span>
                </div>

                <a :href="post.slug">
                  <h3 class="text-lg font-bold text-white group-hover:text-amber-400 transition leading-snug line-clamp-2" x-text="post.title"></h3>
                </a>

                <p class="text-xs text-neutral-400 line-clamp-2 leading-relaxed" x-text="post.excerpt"></p>

                <div class="pt-2 flex flex-wrap gap-1.5">
                  <template x-for="(tag, idx) in post.tags.slice(0, 3)" :key="idx">
                    <span class="text-[10px] px-2 py-0.5 rounded bg-white/5 text-neutral-400 border border-white/5" x-text="'#' + tag"></span>
                  </template>
                </div>
              </div>
            </div>

            <div class="p-6 pt-0">
              <div class="pt-4 border-t border-white/5 flex items-center justify-between text-xs">
                <div class="flex items-center gap-2">
                  <img :src="post.author.avatar" :alt="post.author.name" class="w-6 h-6 rounded-full object-cover border border-white/10" />
                  <span class="text-neutral-300 font-medium" x-text="post.author.name"></span>
                </div>

                <a :href="post.slug" class="text-amber-400 group-hover:-translate-x-1 transition-transform flex items-center gap-1">
                  <span>مطالعه</span>
                  <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="m12 19-7-7 7-7" />
                    <path d="M19 12H5" />
                  </svg>
                </a>
              </div>
            </div>
          </article>
        </template>
      </div>

      <!-- No Posts Found -->
      <template x-if="filteredPosts().length === 0">
        <div class="glass-panel p-12 text-center rounded-2xl border border-white/10 space-y-3 bg-white/5 backdrop-blur-md">
          <p class="text-neutral-400 text-sm">هیچ مقاله‌ای با این عنوان یا دسته‌بندی یافت نشد.</p>
          <button
            @click="selectedCategory = 'همه'; searchQuery = '';"
            class="text-xs text-amber-400 underline">
            پاک کردن فیلترها
          </button>
        </div>
      </template>
    </div>

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
