<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between mb-8 pb-4 border-b border-white/10">
        <div>
            <div class="text-xs text-amber-400 font-semibold mb-1">
                مجموعه مقالات تخصصی wpstorm
            </div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-white">
                جدیدترین مقالات و تحلیل‌های معماری وردپرس
            </h2>
        </div>
        <a href="<?php echo esc_url(home_url('/blog')); ?>" class="text-xs text-neutral-300 hover:text-amber-400 flex items-center gap-1.5">
            <span>مشاهده همه مقالات</span>
            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="m12 19-7-7 7-7" />
                <path d="M19 12H5" />
            </svg>
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <?php
        $args = array(
            'post_type'      => 'post',
            'posts_per_page' => 3,
            'ignore_sticky_posts' => 1
        );
        $recent_posts = new WP_Query($args);

        if ($recent_posts->have_posts()) :
            while ($recent_posts->have_posts()) : $recent_posts->the_post();
                $categories = get_the_category();
                $category_name = !empty($categories) ? esc_html($categories[0]->name) : 'تخصصی';
                $thumbnail_url = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'medium_large') : 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&w=800&q=80';
                $author_id = get_the_author_meta('ID');
        ?>
                <div class="glass-card rounded-2xl border border-white/10 overflow-hidden group hover:border-amber-400/40 transition flex flex-col justify-between bg-white/5 backdrop-blur-md">
                    <div>
                        <div class="h-44 overflow-hidden relative">
                            <img
                                src="<?php echo esc_url($thumbnail_url); ?>"
                                alt="<?php the_title_attribute(); ?>"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                            <span class="absolute bottom-3 right-3 px-2.5 py-0.5 rounded bg-black/80 backdrop-blur text-amber-400 text-[11px] border border-amber-500/30">
                                <?php echo $category_name; ?>
                            </span>
                        </div>

                        <div class="p-5 space-y-2">
                            <div class="flex items-center justify-between text-xs text-neutral-400">
                                <span><?php echo get_the_date(); ?></span>
                                <span>۵ دقیقه مطالعه</span>
                            </div>
                            <a href="<?php the_permalink(); ?>">
                                <h3 class="text-base font-bold text-white group-hover:text-amber-400 transition line-clamp-2 leading-snug">
                                    <?php the_title(); ?>
                                </h3>
                            </a>
                            <p class="text-xs text-neutral-400 line-clamp-2 leading-relaxed">
                                <?php echo wp_trim_words(get_the_excerpt(), 18); ?>
                            </p>
                        </div>
                    </div>

                    <div class="p-5 pt-0">
                        <div class="pt-3 border-t border-white/5 flex items-center justify-between text-xs text-neutral-400">
                            <div class="flex items-center gap-2">
                                <img src="<?php echo esc_url(get_avatar_url($author_id)); ?>" alt="<?php the_author(); ?>" class="w-5 h-5 rounded-full object-cover" />
                                <span><?php the_author(); ?></span>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="text-amber-400 group-hover:-translate-x-1 transition-transform">مطالعه مقاله ←</a>
                        </div>
                    </div>
                </div>
            <?php endwhile;
            wp_reset_postdata();
        else : ?>
           <!-- متن پیش‌فرض در صورت نبود مقاله -->
        <?php endif; ?>
    </div>
</section>