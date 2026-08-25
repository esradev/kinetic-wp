<?php

/**
 * The template for displaying all single posts
 *
 * @package Romonet_WPStorm
 */

get_header();

while (have_posts()) : the_post();
  $categories = get_the_category();
  $cat_name = !empty($categories) ? esc_html($categories[0]->name) : 'عمومی';
  $author_id = get_the_author_meta('ID');
  $author_name = get_the_author();
  $author_role = get_the_author_meta('description') ?: 'معمار ارشد سیستم‌های ابری و وردپرس';
  $author_avatar = get_avatar_url($author_id);

  // Reading time calculation
  $word_count = str_word_count(strip_tags(get_the_content()));
  $read_time = max(1, ceil($word_count / 200)) . ' دقیقه مطالعه';

  // Views calculation (using postmeta fallback)
  $post_views = get_post_meta(get_the_ID(), 'post_views_count', true);
  if ($post_views === '') {
    $post_views = rand(1240, 3850); // Fallback starter view counter
    update_post_meta(get_the_ID(), 'post_views_count', $post_views);
  }

  $likes_count = rand(45, 120);
?>

  <main
    class="min-h-screen pb-24 pt-6"
    dir="rtl"
    xyz-data="romonetSinglePost({
    postId: <?php echo get_the_ID(); ?>,
    initialLikes: <?php echo esc_js($likes_count); ?>
  })">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

      <!-- Back Navigation Bar -->
      <div class="flex items-center justify-between">
        <a
          href="<?php echo esc_url(get_permalink(get_option('page_for_posts')) ?: home_url('/blog')); ?>"
          class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-white/5 hover:bg-white/10 text-neutral-300 hover:text-white text-xs transition border border-white/10">
          <!-- ArrowRight Icon -->
          <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M5 12h14" />
            <path d="m12 5 7 7-7 7" />
          </svg>
          <span>بازگشت به مقالات وبلاگ</span>
        </a>

        <div class="flex items-center gap-2">
          <button
            xyz-on:click="handleShare()"
            class="p-2 rounded-lg bg-white/5 hover:bg-white/10 text-neutral-300 hover:text-white border border-white/10 text-xs flex items-center gap-1.5 transition"
            title="اشتراک‌گذاری مقاله">
            <template xyz-if="copied">
              <svg class="w-3.5 h-3.5 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polyline points="20 6 9 17 4 12" />
              </svg>
            </template>
            <template xyz-if="!copied">
              <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="18" cy="5" r="3" />
                <circle cx="6" cy="12" r="3" />
                <circle cx="18" cy="19" r="3" />
                <line x1="8.59" x2="15.42" y1="13.51" y2="17.49" />
                <line x1="15.41" x2="8.59" y1="6.51" y2="10.49" />
              </svg>
            </template>
            <span class="hidden sm:inline" xyz-text="copied ? 'کپی شد' : 'اشتراک‌گذاری'"></span>
          </button>
        </div>
      </div>

      <!-- Article Header Card -->
      <div class="space-y-6">
        <div class="flex flex-wrap items-center gap-2.5">
          <span class="px-3 py-1 rounded-full bg-amber-500/15 text-amber-300 text-xs font-semibold border border-amber-500/30">
            <?php echo $cat_name; ?>
          </span>
          <span class="text-xs text-neutral-400 flex items-center gap-1">
            <!-- Clock Icon -->
            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <circle cx="12" cy="12" r="10" />
              <polyline points="12 6 12 12 16 14" />
            </svg>
            <?php echo $read_time; ?>
          </span>
          <span class="text-xs text-neutral-500">•</span>
          <span class="text-xs text-neutral-400">تاریخ انتشار: <?php echo get_the_date('j F Y'); ?></span>
        </div>

        <h1 class="text-2xl sm:text-4xl font-extrabold text-white tracking-tight leading-[1.3]">
          <?php the_title(); ?>
        </h1>

        <!-- Author info bar -->
        <div class="p-4 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-between flex-wrap gap-4 backdrop-blur-md">
          <div class="flex items-center gap-3">
            <img
              src="<?php echo esc_url($author_avatar); ?>"
              alt="<?php echo esc_attr($author_name); ?>"
              class="w-12 h-12 rounded-full object-cover border-2 border-amber-500/50" />
            <div>
              <div class="text-sm font-bold text-white flex items-center gap-2">
                <span><?php echo esc_html($author_name); ?></span>
                <span class="text-[10px] px-2 py-0.5 rounded bg-amber-500/20 text-amber-300">
                  نویسنده تاییدشده
                </span>
              </div>
              <div class="text-xs text-neutral-400"><?php echo esc_html($author_role); ?></div>
            </div>
          </div>

          <div class="flex items-center gap-4 text-xs text-neutral-400">
            <button
              xyz-on:click="handleLike()"
              xyz-bind:class="hasLiked ? 'bg-rose-500/20 text-rose-400 border-rose-500/40' : 'bg-white/5 text-neutral-300 hover:text-rose-400 border-white/10'"
              class="flex items-center gap-1.5 px-3 py-1.5 rounded-xl border transition">
              <!-- Heart Icon -->
              <svg class="w-4 h-4" xyz-bind:class="hasLiked ? 'fill-current text-rose-500' : ''" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z" />
              </svg>
              <span class="" xyz-text="likes"></span>
            </button>

            <div class="flex items-center gap-1">
              <!-- Eye Icon -->
              <svg class="w-4 h-4 text-neutral-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z" />
                <circle cx="12" cy="12" r="3" />
              </svg>
              <span class=""><?php echo number_format_i18n($post_views); ?> بازدید</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Featured Image -->
      <?php if (has_post_thumbnail()) : ?>
        <div class="rounded-3xl overflow-hidden border border-white/10 shadow-2xl relative">
          <img
            src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>"
            alt="<?php the_title_attribute(); ?>"
            class="w-full h-80 sm:h-[440px] object-cover" />
        </div>
      <?php endif; ?>

      <!-- Article Body Content -->
      <div class="glass-panel p-6 sm:p-10 rounded-3xl border border-white/10 space-y-6 text-neutral-200 leading-relaxed text-sm sm:text-base font-sans bg-white/5 backdrop-blur-xl">

        <?php if (has_excerpt()) : ?>
          <!-- Excerpt Lead -->
          <div class="text-base sm:text-lg font-medium text-amber-200/90 border-r-4 border-amber-400 pr-4 py-1 italic leading-relaxed">
            «<?php echo get_the_excerpt(); ?>»
          </div>
          <hr class="border-white/10" />
        <?php endif; ?>

        <!-- Dynamic Post Content -->
        <div class="prose prose-invert max-w-none space-y-6 prose-headings:text-white prose-headings:font-bold prose-a:text-amber-400 prose-code:text-emerald-300 prose-pre:bg-[#090b12] prose-pre:border prose-pre:border-white/15">
          <?php the_content(); ?>
        </div>

        <!-- Tags -->
        <?php
        $post_tags = get_the_tags();
        if (!empty($post_tags)) :
        ?>
          <div class="pt-8 border-t border-white/10 space-y-3">
            <div class="text-xs text-neutral-400 font-semibold">
              تگ‌ها و کلیدواژه‌های مقاله:
            </div>
            <div class="flex flex-wrap gap-2">
              <?php foreach ($post_tags as $tag) : ?>
                <a
                  href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>"
                  class="px-3 py-1 rounded-lg bg-white/5 border border-white/10 text-xs text-amber-300 hover:border-amber-400/50 transition">
                  #<?php echo esc_html($tag->name); ?>
                </a>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endif; ?>

      </div>

      <!-- CTA Box Inside Post -->
      <div class="glass-card p-8 rounded-3xl border border-amber-500/30 bg-gradient-to-r from-amber-500/10 via-purple-500/10 to-transparent flex flex-col sm:flex-row items-center justify-between gap-6 backdrop-blur-md">
        <div class="space-y-2 text-center sm:text-right">
          <h3 class="text-lg sm:text-xl font-bold text-white">نیاز به بهینه‌سازی سرعت یا بازطراحی تخصصی وردپرس دارید؟</h3>
          <p class="text-xs text-neutral-400 max-w-md leading-relaxed">
            تیم فنی <strong class="text-amber-400">wpstorm</strong> در هلدینگ رومونت (Romonet.ir) با تضمین امتیاز ۱۰۰ گوگل و پشتیبانی ۲۴ ساعته در خدمت شماست.
          </p>
        </div>
        <a
          href="<?php echo esc_url(home_url('/site-design-pricing')); ?>"
          class="px-6 py-3 rounded-xl bg-amber-500 hover:bg-amber-400 text-black font-extrabold text-xs transition whitespace-nowrap active:scale-95 shadow-lg shadow-amber-500/25 text-center">
          مشاهده تعرفه‌ها و شروع پروژه
        </a>
      </div>

      <!-- Related Articles -->
      <?php
      $related_args = array(
        'category__in'   => wp_get_post_categories(get_the_ID()),
        'post__not_in'   => array(get_the_ID()),
        'posts_per_page' => 2,
        'ignore_sticky_posts' => 1
      );
      $related_query = new WP_Query($related_args);

      if ($related_query->have_posts()) :
      ?>
        <div class="space-y-4 pt-8">
          <h3 class="text-lg font-bold text-white flex items-center gap-2">
            <!-- Sparkles Icon -->
            <svg class="w-4 h-4 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z" />
            </svg>
            <span>مطالب مرتبط و پیشنهادی</span>
          </h3>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <?php while ($related_query->have_posts()) : $related_query->the_post();
              $rel_cats = get_the_category();
              $rel_cat_name = !empty($rel_cats) ? esc_html($rel_cats[0]->name) : 'مقاله تخصصی';
              $rel_word_count = str_word_count(strip_tags(get_the_content()));
              $rel_read_time = max(1, ceil($rel_word_count / 200)) . ' دقیقه مطالعه';
            ?>
              <a
                href="<?php the_permalink(); ?>"
                class="glass-card p-5 rounded-2xl border border-white/10 hover:border-amber-400/40 transition cursor-pointer space-y-2 group bg-white/5 backdrop-blur-md block">
                <span class="text-[10px] text-amber-400 font-semibold"><?php echo $rel_cat_name; ?></span>
                <h4 class="text-sm font-bold text-white group-hover:text-amber-300 transition line-clamp-2">
                  <?php the_title(); ?>
                </h4>
                <div class="flex items-center justify-between text-xs text-neutral-400 pt-2">
                  <span><?php echo $rel_read_time; ?></span>
                  <span class="text-amber-400 flex items-center gap-1 group-hover:-translate-x-1 transition-transform">
                    <span>مطالعه</span>
                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                      <path d="m12 19-7-7 7-7" />
                      <path d="M19 12H5" />
                    </svg>
                  </span>
                </div>
              </a>
            <?php endwhile;
            wp_reset_postdata(); ?>
          </div>
        </div>
      <?php endif; ?>

    </div>
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

        handleShare() {
          if (navigator.clipboard) {
            navigator.clipboard.writeText(window.location.href).then(() => {
              this.copied = true;
              window.dispatchEvent(new CustomEvent('show-toast', {
                detail: 'لینک مقاله در حافظه کپی شد!'
              }));
              setTimeout(() => this.copied = false, 2000);
            });
          }
        }
      };
    }
  </script>

<?php
endwhile;

get_footer();
