<?php

/**
 * Template Name: مارکت‌پلیس قالب‌ها و افزونه‌ها
 * Template Post Type: page
 *
 * @package Romonet_WPStorm
 */

// دریافت محصولات ووکامرس
$args = array(
    'post_type'      => 'product',
    'post_status'    => 'publish',
    'posts_per_page' => -1, // دریافت تمام محصولات (می‌توانید محدود کنید)
);
$products_query = new WP_Query($args);

$js_products = array();
$all_tags_set = array();

if ($products_query->have_posts()) {
    while ($products_query->have_posts()) {
        $products_query->the_post();

        // اطمینان از نصب بودن ووکامرس و دریافت آبجکت محصول
        if (! function_exists('wc_get_product')) continue;

        $product = wc_get_product(get_the_ID());
        if (! $product) continue;

        $id   = $product->get_id();
        $name = $product->get_name();
        $slug = $product->get_slug();

        // --- تشخیص دسته‌بندی و نوع محصول (قالب یا افزونه) ---
        $terms = get_the_terms($id, 'product_cat');
        $category_name = 'دسته‌بندی نشده';
        $type = 'plugin'; // پیش‌فرض روی افزونه
        if (! empty($terms) && ! is_wp_error($terms)) {
            $category_name = $terms[0]->name;
            foreach ($terms as $term) {
                // اگر کلمه "قالب" یا "theme" در نام/اسلاگ دسته بود، نوع آن را theme می‌گذاریم
                if (strpos($term->name, 'قالب') !== false || strpos(strtolower($term->slug), 'theme') !== false) {
                    $type = 'theme';
                }
            }
        }

        // --- استخراج تگ‌ها ---
        $tags = array();
        $tag_terms = get_the_terms($id, 'product_tag');
        if (! empty($tag_terms) && ! is_wp_error($tag_terms)) {
            foreach ($tag_terms as $tag_term) {
                $tags[] = $tag_term->name;
                $all_tags_set[$tag_term->name] = true; // افزودن به لیست تمام تگ‌ها برای فیلتر هدر
            }
        }

        // --- استخراج اطلاعات عمومی محصول ---
        // استفاده از توضیحات کوتاه محصول برای Tagline
        $tagline = wp_strip_all_tags($product->get_short_description());

        $rating       = $product->get_average_rating();
        $reviewsCount = $product->get_review_count();
        $downloads    = (int) get_post_meta($id, 'total_sales', true);

        // لاجیک برای بج (Badge) اتوماتیک
        $badge = '';
        if ($product->is_featured()) {
            $badge = 'ویژه';
        } elseif ($downloads > 50) {
            $badge = 'پرفروش';
        }

        // ویژگی‌های کاستوم (می‌توانید به عنوان زمینه دلخواه یا متا اضافه کنید)
        $version   = get_post_meta($id, '_product_version', true) ?: '1.0.0';
        $wpVersion = get_post_meta($id, '_wp_version_req', true) ?: '6.0+';

        // تصویر شاخص محصول
        $bannerImage = wp_get_attachment_image_url($product->get_image_id(), 'large');
        if (! $bannerImage) {
            $bannerImage = function_exists('wc_placeholder_img_src') ? wc_placeholder_img_src() : '';
        }

        // قیمت
        $price = $product->get_price();

        // --- استخراج KeyFeatures ---
        $keyFeatures = array();
        // خواندن فیچرها از توضیحات کوتاه (گرفتن ۲ خط اول) 
        // یا اگر متا دیتای خاصی دارید، آن را از $product->get_meta('features') فراخوانی کنید
        $lines = explode("\n", $product->get_short_description());
        foreach (array_slice($lines, 0, 2) as $line) {
            $clean_line = trim(wp_strip_all_tags($line));
            if (! empty($clean_line)) {
                $keyFeatures[] = array('title' => $clean_line);
            }
        }
        // اگر خالی بود، مقادیر پیش‌فرض بگذار
        if (empty($keyFeatures)) {
            $keyFeatures = array(
                array('title' => 'پشتیبانی فنی اختصاصی'),
                array('title' => 'بروزرسانی‌های منظم')
            );
        }

        // ثبت دیتای این محصول برای پاس دادن به جاوا اسکریپت
        $js_products[] = array(
            'id'           => $id,
            'slug'         => $slug,
            'name'         => $name,
            'type'         => $type,
            'category'     => $category_name,
            'tagline'      => $tagline,
            'rating'       => (float) $rating > 0 ? number_format((float) $rating, 1) : '۰.۰',
            'reviewsCount' => $reviewsCount,
            'downloads'    => $downloads,
            'badge'        => $badge,
            'version'      => $version,
            'wpVersion'    => $wpVersion,
            'tags'         => $tags,
            'bannerImage'  => $bannerImage,
            'url'          => get_permalink($id),
            'licenses'     => array(
                array(
                    'name'  => 'لایسنس استاندارد',
                    'price' => (float) $price,
                )
            ),
            'keyFeatures'  => $keyFeatures,
        );
    }
    wp_reset_postdata();
}

// ساخت لیست تگ‌های داینامیک برای منوی فیلتر تگ‌ها
$dynamic_tags = array('همه');
foreach (array_keys($all_tags_set) as $t) {
    $dynamic_tags[] = $t;
}

get_header();
?>

<main class="min-h-screen pb-24 pt-8 space-y-12" dir="rtl" xyz-data="romonetShop()">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">

        <!-- ==================== SHOP HEADER ==================== -->
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-purple-500/10 text-purple-400 border border-purple-500/20 text-xs">
                <!-- Sparkles Icon -->
                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"></path>
                </svg>
                <span>مارکت‌پلیس رسمی محصولات wpstorm در هلدینگ رومونت (Romonet.ir)</span>
            </div>

            <h1 class="text-4xl sm:text-5xl font-extrabold text-white tracking-tight">
                قالب‌ها و افزونه‌های تخصصی تجاری وردپرس
            </h1>

            <p class="text-base text-neutral-400 leading-relaxed">
                کدنویسی استاندارد توسط مهندسان ارشد دپارتمان <strong class="text-amber-400">wpstorm</strong>. هر محصول شامل صدور آنی کلید لایسنس، دانلود مستقیم فایل ZIP، آپدیت‌های مداوم و پشتیبانی فنی اختصاصی است.
            </p>
        </div>

        <!-- ==================== CONTROLS BAR ==================== -->
        <div class="glass-panel p-4 rounded-2xl border border-white/10 space-y-4 bg-white/5 backdrop-blur-xl">
            <div class="flex flex-col lg:flex-row gap-4 items-center justify-between">

                <!-- Type selector -->
                <div class="flex items-center bg-white/5 p-1 rounded-xl border border-white/10 w-full sm:w-auto">
                    <button
                        type="button"
                        xyz-on:click="filterType = 'all'"
                        xyz-bind:class="filterType === 'all' ? 'bg-amber-500 text-black shadow' : 'text-neutral-400 hover:text-white'"
                        class="flex-1 sm:flex-none px-4 py-2 rounded-lg text-xs font-bold transition">
                        همه محصولات (<span xyz-text="products.length"></span>)
                    </button>

                    <button
                        type="button"
                        xyz-on:click="filterType = 'theme'"
                        xyz-bind:class="filterType === 'theme' ? 'bg-amber-500 text-black shadow' : 'text-neutral-400 hover:text-white'"
                        class="flex-1 sm:flex-none px-4 py-2 rounded-lg text-xs font-bold transition">
                        فقط قالب‌ها
                    </button>

                    <button
                        type="button"
                        xyz-on:click="filterType = 'plugin'"
                        xyz-bind:class="filterType === 'plugin' ? 'bg-amber-500 text-black shadow' : 'text-neutral-400 hover:text-white'"
                        class="flex-1 sm:flex-none px-4 py-2 rounded-lg text-xs font-bold transition">
                        فقط افزونه‌ها
                    </button>
                </div>

                <!-- Search & Sort -->
                <div class="flex items-center gap-3 w-full lg:w-auto">
                    <div class="relative flex-1 sm:w-64">
                        <!-- Search Icon -->
                        <svg class="w-4 h-4 text-neutral-500 absolute right-3.5 top-1/2 -translate-y-1/2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.3-4.3"></path>
                        </svg>
                        <input
                            type="text"
                            xyz-model="searchQuery"
                            placeholder="جستجو در محصولات..."
                            class="w-full bg-black/50 border border-white/10 focus:border-amber-400 rounded-xl pr-10 pl-4 py-2 text-xs text-white placeholder-neutral-500 focus:outline-none transition font-sans" />
                    </div>

                    <select
                        xyz-model="sortBy"
                        class="bg-black/50 border border-white/10 text-xs text-neutral-300 rounded-xl px-3 py-2 focus:outline-none">
                        <option value="popular">محبوب‌ترین‌ها</option>
                        <option value="rating">بالاترین امتیاز</option>
                        <option value="price-asc">قیمت: کم به زیاد</option>
                        <option value="price-desc">قیمت: زیاد به کم</option>
                    </select>
                </div>
            </div>

            <!-- Tags scroll -->
            <div class="flex items-center gap-1.5 overflow-x-auto pt-2 border-t border-white/5 pb-1">
                <span class="text-[11px] text-neutral-400 ml-2 shrink-0">فیلتر بر اساس تگ:</span>
                <template xyz-for="tag in tags" xyz-bind:key="tag">
                    <button
                        type="button"
                        xyz-on:click="selectedTag = tag"
                        xyz-bind:class="selectedTag === tag 
              ? 'bg-amber-500/20 text-amber-300 border border-amber-500/40 font-semibold' 
              : 'bg-white/5 text-neutral-400 hover:text-white hover:bg-white/10'"
                        class="px-3 py-1 rounded-lg text-xs whitespace-nowrap transition"
                        xyz-text="tag">
                    </button>
                </template>
            </div>
        </div>

        <!-- ==================== PRODUCTS GRID ==================== -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <template xyz-for="product in filteredProducts()" xyz-bind:key="product.id">
                <div
                    class="glass-card rounded-2xl border border-white/10 overflow-hidden flex flex-col justify-between group hover:border-amber-500/50 transition-all shadow-xl hover:shadow-2xl bg-white/5 backdrop-blur-md">
                    <div>
                        <!-- Banner & Badges -->
                        <a
                            xyz-bind:href="product.url"
                            class="relative h-56 overflow-hidden bg-black/60 block">
                            <img
                                xyz-bind:src="product.bannerImage"
                                xyz-bind:alt="product.name"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
                            <div class="absolute inset-0 bg-gradient-to-t from-[#0d0f17] via-black/20 to-transparent"></div>

                            <template xyz-if="product.badge">
                                <span class="absolute top-3 right-3 px-3 py-1 rounded-md bg-amber-500 text-black text-[11px] font-bold shadow-md" xyz-text="product.badge"></span>
                            </template>

                            <span
                                class="absolute top-3 left-3 px-2.5 py-1 rounded bg-black/80 backdrop-blur text-neutral-300 text-[10px] border border-white/15"
                                xyz-text="product.type === 'theme' ? 'قالب وردپرس' : 'افزونه وردپرس'"></span>

                            <div class="absolute bottom-3 left-3 right-3 flex items-center justify-between text-xs text-neutral-300">
                                <span class="bg-black/70 px-2 py-0.5 rounded border border-white/10">
                                    نسخه <span xyz-text="product.version"></span>
                                </span>
                                <span class="bg-black/70 px-2 py-0.5 rounded border border-white/10 text-emerald-400">
                                    وردپرس <span xyz-text="product.wpVersion"></span>
                                </span>
                            </div>
                        </a>

                        <!-- Body Content -->
                        <div class="p-6 space-y-3">
                            <div class="flex items-center justify-between text-xs">
                                <span class="text-neutral-400" xyz-text="product.category"></span>
                                <div class="flex items-center gap-1 text-amber-400 ">
                                    <!-- Star Icon -->
                                    <svg class="w-3.5 h-3.5 fill-current text-amber-400" viewBox="0 0 24 24">
                                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                                    </svg>
                                    <span class="font-bold" xyz-text="product.rating"></span>
                                    <span class="text-neutral-500">(<span xyz-text="product.reviewsCount"></span> نظر)</span>
                                </div>
                            </div>

                            <a xyz-bind:href="product.url" class="block">
                                <h2
                                    class="text-lg font-bold text-white group-hover:text-amber-400 transition cursor-pointer line-clamp-1"
                                    xyz-text="product.name"></h2>
                            </a>

                            <p class="text-xs text-neutral-400 line-clamp-2 leading-relaxed" xyz-text="product.tagline"></p>

                            <!-- Feature Bullets -->
                            <div class="space-y-1.5 pt-2">
                                <template xyz-for="(kf, idx) in product.keyFeatures.slice(0, 2)" xyz-bind:key="idx">
                                    <div class="flex items-center gap-2 text-xs text-neutral-300">
                                        <!-- Check Icon -->
                                        <svg class="w-3.5 h-3.5 text-amber-400 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <polyline points="20 6 9 17 4 12" />
                                        </svg>
                                        <span class="truncate" xyz-text="kf.title"></span>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>

                    <!-- Price Footer -->
                    <div class="p-6 pt-0">
                        <div class="pt-4 border-t border-white/5 flex items-center justify-between">
                            <div>
                                <span class="text-[10px] text-neutral-500 block">شروع قیمت از</span>
                                <span class="text-lg font-black text-white" xyz-text="formatCurrency(product.licenses[0].price)"></span>
                            </div>

                            <div class="flex items-center gap-2">
                                <a
                                    xyz-bind:href="product.url"
                                    class="px-3 py-2 rounded-xl bg-white/5 hover:bg-white/10 text-neutral-300 hover:text-white border border-white/10 text-xs transition">
                                    جزییات کالا
                                </a>

                                <button
                                    type="button"
                                    xyz-on:click="buyProduct(product, $event)"
                                    class="px-3.5 py-2 rounded-xl bg-amber-500 hover:bg-amber-400 text-black font-extrabold text-xs transition active:scale-95 shadow-lg shadow-amber-500/25 flex items-center justify-center gap-1.5 min-w-[70px]">
                                    <span>خرید</span>
                                    <!-- ArrowLeft Icon -->
                                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="m12 19-7-7 7-7" />
                                        <path d="M19 12H5" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        <!-- No Products Found -->
        <template xyz-if="filteredProducts().length === 0">
            <div class="glass-panel p-12 text-center rounded-2xl border border-white/10 space-y-3 bg-white/5 backdrop-blur-md">
                <p class="text-neutral-400 text-sm">هیچ محصولی با مشخصات و فیلترهای انتخابی یافت نشد.</p>
                <button
                    xyz-on:click="filterType = 'all'; selectedTag = 'همه'; searchQuery = '';"
                    class="text-xs text-amber-400 underline">
                    پاک کردن تمام فیلترها
                </button>
            </div>
        </template>

    </div>
</main>

<script>
    function romonetShop() {
        return {
            filterType: 'all',
            selectedTag: 'همه',
            searchQuery: '',
            sortBy: 'popular',

            // دریافت اتوماتیک تگ‌ها از PHP
            tags: <?php echo wp_json_encode($dynamic_tags); ?>,

            // دریافت اتوماتیک محصولات از PHP
            products: <?php echo wp_json_encode($js_products); ?>,

            filteredProducts() {
                let list = this.products.filter((p) => {
                    const matchesType = this.filterType === 'all' || p.type === this.filterType;
                    const matchesTag = this.selectedTag === 'همه' || p.tags.includes(this.selectedTag) || (this.selectedTag === 'گوتنبرگ' && p.tags.includes('Gutenberg'));
                    const q = this.searchQuery.toLowerCase().trim();
                    const matchesSearch = !q ||
                        p.name.toLowerCase().includes(q) ||
                        p.tagline.toLowerCase().includes(q) ||
                        p.tags.some(t => t.toLowerCase().includes(q));
                    return matchesType && matchesTag && matchesSearch;
                });

                // Sorting logic
                if (this.sortBy === 'popular') {
                    list.sort((a, b) => b.downloads - a.downloads);
                } else if (this.sortBy === 'rating') {
                    list.sort((a, b) => parseFloat(b.rating) - parseFloat(a.rating));
                } else if (this.sortBy === 'price-asc') {
                    list.sort((a, b) => a.licenses[0].price - b.licenses[0].price);
                } else if (this.sortBy === 'price-desc') {
                    list.sort((a, b) => b.licenses[0].price - a.licenses[0].price);
                }

                return list;
            },

            async buyProduct(product, event) {
                // تغییر وضعیت دکمه به حالت لودینگ
                const btn = event.currentTarget;
                const originalText = btn.innerHTML;
                btn.innerHTML = '<svg class="w-4 h-4 animate-spin" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 12a9 9 0 1 1-6.219-8.56"/></svg>';
                btn.style.pointerEvents = 'none';
                btn.style.opacity = '0.8';

                try {
                    // ارسال درخواست به سرور ووکامرس (AJAX)
                    const formData = new URLSearchParams();
                    formData.append('product_id', product.id);
                    formData.append('quantity', 1);

                    const response = await fetch('/?wc-ajax=add_to_cart', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: formData
                    });

                    const data = await response.json();

                    if (data.error) {
                        alert('خطا: ' + (data.error_message || 'محصول به سبد خرید اضافه نشد.'));
                        return;
                    }

                    // اضافه کردن به سبد خرید فرانت‌اند (برای نمایش سریع در هدر)
                    if (typeof this.cart !== 'undefined') {
                        // بررسی موجود بودن محصول بر اساس id در سبد (میتواند cart item key باشد پس مقایسه دقیق انجام نمیشود)
                        const existing = this.cart.find(i => i.productId == product.id || i.id == product.id);
                        if (existing) {
                            existing.quantity += 1;
                        } else {
                            this.cart.push({
                                id: product.id, // آیدی موقت تا رفرش بعدی
                                productId: product.id,
                                itemType: 'product',
                                title: product.name,
                                subtitle: '', // مقادیر فیک لایسنس حذف شد
                                price: product.licenses[0].price,
                                quantity: 1
                            });
                        }
                        this.isCartDrawerOpen = true;
                    } else {
                        // در صورت عدم دسترسی به متغیر هدر، صفحه رفرش شود
                        window.location.reload();
                    }

                    window.dispatchEvent(new CustomEvent('show-toast', {
                        detail: `محصول «${product.name}» با موفقیت به سبد سفارشات افزوده شد.`
                    }));

                } catch (error) {
                    console.error('Error adding to cart:', error);
                    alert('خطا در برقراری ارتباط با سرور.');
                } finally {
                    // بازگردانی دکمه به حالت عادی
                    btn.innerHTML = originalText;
                    btn.style.pointerEvents = 'auto';
                    btn.style.opacity = '1';
                }
            },

            formatCurrency(amount) {
                if (!amount) return 'رایگان';
                return new Intl.NumberFormat('fa-IR').format(Math.round(amount)) + ' تومان';
            }
        };
    }
</script>

<?php
get_footer();
?>