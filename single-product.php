<?php

/**
 * The template for displaying a Single Product detail page
 *
 * @package Romonet_WPStorm
 */

get_header();

// فراخوانی متغیر گلوبال محصول ووکامرس
global $product;

if (! is_a($product, 'WC_Product')) {
    $product = wc_get_product(get_the_ID());
}

// در صورتی که محصول پیدا نشد
if (empty($product)) {
    return;
}

// استخراج داده‌های واقعی محصول از ووکامرس
$product_id            = $product->get_id();
$product_title         = $product->get_name();
$product_short_desc    = $product->get_short_description();
$product_desc          = $product->get_description();
$product_rating        = $product->get_average_rating();
$product_reviews_count = $product->get_review_count();
$product_price         = $product->get_price();
$product_price_html    = $product->get_price_html();
$product_badge         = $product->is_on_sale() ? 'حراج' : '';

// دریافت نام اولین دسته‌بندی محصول
$terms                 = get_the_terms($product_id, 'product_cat');
$product_category_name = ($terms && ! is_wp_error($terms)) ? $terms[0]->name : 'محصولات';

// تصاویر محصول (تصویر اصلی و گالری)
$main_image_id = $product->get_image_id();
$main_image    = $main_image_id ? wp_get_attachment_image_url($main_image_id, 'full') : wc_placeholder_img_src('full');

$gallery_ids    = $product->get_gallery_image_ids();
$gallery_images = array($main_image); // تصویر اول همیشه تصویر شاخص است
if (! empty($gallery_ids)) {
    foreach ($gallery_ids as $id) {
        $img_url = wp_get_attachment_image_url($id, 'full');
        if ($img_url) {
            $gallery_images[] = $img_url;
        }
    }
}
$gallery_json = wp_json_encode($gallery_images);
?>

<main class="min-h-screen pb-28 pt-6 space-y-12" dir="rtl" x-data="romonetProductDetail()">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

        <!-- ==================== NAVIGATION BREADCRUMB ==================== -->
        <div class="flex items-center justify-between">
            <a
                href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>"
                class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-white/5 hover:bg-white/10 text-neutral-300 hover:text-white text-xs transition border border-white/10">
                <!-- ArrowRight Icon -->
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M5 12h14" />
                    <path d="m12 5 7 7-7 7" />
                </svg>
                <span>بازگشت به فروشگاه</span>
            </a>

            <div class="flex items-center gap-2 text-xs text-neutral-400">
                <span class="text-neutral-500">فروشگاه</span>
                <span>/</span>
                <span><?php echo esc_html($product_category_name); ?></span>
                <span>/</span>
                <span class="text-amber-400 font-semibold"><?php echo esc_html($product_title); ?></span>
            </div>
        </div>

        <!-- ==================== HERO PRODUCT BUYING GRID ==================== -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">

            <!-- Gallery & Preview Column -->
            <div class="lg:col-span-7 space-y-4">
                <!-- Main Preview -->
                <div class="relative rounded-3xl overflow-hidden border border-white/15 bg-black/60 shadow-2xl group">
                    <img
                        :src="activeImage"
                        alt="<?php echo esc_attr($product_title); ?>"
                        class="w-full h-80 sm:h-[420px] object-cover transition-all duration-500" />
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0c0e17] via-transparent to-transparent opacity-60"></div>

                    <?php if (! empty($product_badge)) : ?>
                        <span class="absolute top-4 right-4 px-3 py-1 rounded-md bg-amber-500 text-black text-xs font-bold shadow-lg">
                            <?php echo esc_html($product_badge); ?>
                        </span>
                    <?php endif; ?>

                    <!-- Live Interactive Demo Trigger (Optional) -->
                    <button
                        type="button"
                        @click="isDemoModalOpen = true"
                        class="absolute bottom-4 left-4 px-4 py-2.5 rounded-xl bg-black/80 hover:bg-black backdrop-blur-md text-white text-xs border border-white/20 flex items-center gap-2 transition hover:scale-105 shadow-xl">
                        <!-- Sparkles Icon -->
                        <svg class="w-4 h-4 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z" />
                        </svg>
                        <span>مشاهده تصویر کامل</span>
                    </button>
                </div>

                <!-- Thumbnail Switcher -->
                <div class="flex items-center gap-3 overflow-x-auto pb-2" x-show="galleryImages.length > 1">
                    <template x-for="(img, idx) in galleryImages" :key="idx">
                        <button
                            type="button"
                            @click="activeImage = img"
                            class="relative w-24 h-16 rounded-xl overflow-hidden border-2 transition shrink-0"
                            :class="activeImage === img ? 'border-amber-400 scale-105' : 'border-white/10 opacity-60 hover:opacity-100'">
                            <img :src="img" :alt="'تصویر گالری ' + (idx + 1)" class="w-full h-full object-cover" />
                        </button>
                    </template>
                </div>
            </div>

            <!-- Buying Box & Actions Column -->
            <div class="lg:col-span-5 space-y-6">
                <div class="space-y-2">
                    <div class="flex items-center justify-between text-xs">
                        <span class="px-2.5 py-0.5 rounded bg-white/10 text-neutral-300">
                            <?php echo esc_html($product_category_name); ?>
                        </span>

                        <?php if ($product_reviews_count > 0) : ?>
                            <div class="flex items-center gap-1 text-amber-400 ">
                                <!-- Star Icon -->
                                <svg class="w-4 h-4 fill-current text-amber-400" viewBox="0 0 24 24">
                                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                                </svg>
                                <span class="font-bold text-sm"><?php echo esc_html($product_rating); ?></span>
                                <span class="text-neutral-500">(<?php echo esc_html($product_reviews_count); ?> دیدگاه)</span>
                            </div>
                        <?php endif; ?>
                    </div>

                    <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight"><?php echo esc_html($product_title); ?></h1>

                    <?php if ($product_short_desc) : ?>
                        <div class="text-sm text-neutral-300 leading-relaxed prose-sm prose-invert">
                            <?php echo wp_kses_post($product_short_desc); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="p-6 rounded-2xl bg-black/40 border border-white/10">
                    <div class="text-left" dir="ltr">
                        <span class="text-2xl font-extrabold text-amber-400">
                            <?php echo wp_kses_post($product_price_html); ?>
                        </span>
                    </div>
                </div>

                <!-- BUY ACTIONS -->
                <div class="space-y-3 pt-2">
                    <button
                        type="button"
                        @click="handleAddToCart($event)"
                        class="w-full py-4 rounded-2xl bg-gradient-to-r from-amber-500 via-amber-400 to-amber-500 hover:brightness-110 active:scale-95 text-black font-black text-sm transition shadow-xl shadow-amber-500/30 flex items-center justify-center gap-2">
                        <!-- ShoppingBag Icon -->
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z" />
                            <path d="M3 6h18" />
                            <path d="M16 10a4 4 0 0 1-8 0" />
                        </svg>
                        <span>افزودن به سبد خرید</span>
                    </button>

                    <div class="flex items-center justify-center gap-4 text-xs text-neutral-400 pt-1">
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z" />
                                <path d="m9 12 2 2 4-4" />
                            </svg>
                            پرداخت کاملاً امن
                        </span>
                    </div>
                </div>

            </div>
        </div>

        <!-- ==================== DETAILED TABBED SECTION ==================== -->
        <div class="pt-8 space-y-6">

            <!-- Tab Buttons -->
            <div class="flex items-center gap-2 overflow-x-auto border-b border-white/10 pb-2">
                <template x-for="tab in tabs" :key="tab.id">
                    <button
                        type="button"
                        @click="activeTab = tab.id"
                        :class="activeTab === tab.id 
              ? 'bg-amber-500 text-black shadow' 
              : 'text-neutral-400 hover:text-white hover:bg-white/5'"
                        class="px-4 py-2 rounded-xl text-xs font-semibold whitespace-nowrap transition"
                        x-text="tab.label">
                    </button>
                </template>
            </div>

            <!-- Tab Content Panes -->
            <div class="glass-panel p-6 sm:p-10 rounded-3xl border border-white/10 bg-white/5 backdrop-blur-xl">

                <!-- Overview Pane (Product Description) -->
                <div x-show="activeTab === 'description'" class="space-y-6 text-neutral-300 leading-relaxed text-sm sm:text-base">
                    <h3 class="text-xl font-bold text-white">توضیحات محصول</h3>
                    <div class="space-y-4 leading-relaxed prose prose-invert max-w-none">
                        <?php
                        if (! empty($product_desc)) {
                            echo wp_kses_post($product_desc);
                        } else {
                            echo '<p>توضیحاتی برای این محصول ثبت نشده است.</p>';
                        }
                        ?>
                    </div>
                </div>

                <!-- Reviews & Comments Pane -->
                <div x-show="activeTab === 'reviews'" class="space-y-6" style="display: none;">
                    <div class="flex items-center justify-between border-b border-white/10 pb-4 mb-4">
                        <h3 class="text-xl font-bold text-white">نظرات و دیدگاه‌ها</h3>

                        <?php if ($product_reviews_count > 0) : ?>
                            <div class="flex items-center gap-1.5 text-amber-400  text-sm">
                                <svg class="w-4 h-4 fill-current text-amber-400" viewBox="0 0 24 24">
                                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                                </svg>
                                <span class="font-bold"><?php echo esc_html($product_rating); ?></span>
                                <span class="text-neutral-500">از ۵.۰ امتیاز</span>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="reviews-section-wrapper bg-black/30 p-4 rounded-xl text-neutral-300 prose prose-invert max-w-none">
                        <?php
                        // نمایش فرم کامنت/نظرات ووکامرس در صورت فعال بودن
                        if (comments_open()) {
                            comments_template();
                        } else {
                            echo '<p class="text-neutral-400 text-sm">بخش دیدگاه‌ها برای این محصول بسته شده است.</p>';
                        }
                        ?>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <!-- ==================== DEMO / IMAGE MODAL ==================== -->
    <div
        x-show="isDemoModalOpen"
        x-cloak
        class="fixed inset-0 z-50 overflow-hidden flex items-center justify-center p-4 sm:p-6 md:p-10"
        dir="rtl"
        style="display: none;">
        <div
            class="fixed inset-0 bg-black/90 backdrop-blur-md"
            @click="isDemoModalOpen = false"></div>

        <div class="relative w-full max-w-4xl h-[85vh] bg-[#0c0e17] border border-white/20 rounded-3xl overflow-hidden shadow-2xl flex flex-col z-10">
            <!-- Header bar -->
            <div class="px-6 py-4 bg-[#111422] border-b border-white/10 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <span class="text-xs text-neutral-300 font-semibold mr-2">
                        مشاهده تصویر کامل - <?php echo esc_html($product_title); ?>
                    </span>
                </div>
                <button
                    type="button"
                    @click="isDemoModalOpen = false"
                    class="px-3 py-1.5 rounded-lg bg-white/10 hover:bg-white/20 text-white text-xs transition">
                    بستن ✕
                </button>
            </div>

            <!-- Viewport -->
            <div class="flex-1 overflow-y-auto p-6 sm:p-12 space-y-8 flex justify-center items-center">
                <div class="rounded-2xl border border-white/10 overflow-hidden shadow-2xl">
                    <img :src="activeImage" alt="<?php echo esc_attr($product_title); ?>" class="w-full h-auto max-h-[70vh] object-contain" />
                </div>
            </div>
        </div>
    </div>

</main>

<script>
    function romonetProductDetail() {
        return {
            activeImage: '<?php echo esc_url($main_image); ?>',
            activeTab: 'description',
            isDemoModalOpen: false,

            // گرفتن تصاویر گالری با PHP JSON
            galleryImages: <?php echo $gallery_json; ?>,

            tabs: [{
                    id: 'description',
                    label: 'توضیحات محصول'
                },
                {
                    id: 'reviews',
                    label: 'دیدگاه‌ها (<?php echo esc_js($product_reviews_count); ?>)'
                }
            ],

            init() {
                // کدهای حالت اولیه
            },

            async handleAddToCart(event) {
                // ۱. تغییر ظاهر دکمه به حالت "در حال لود"
                const btn = event.currentTarget;
                const originalText = btn.innerHTML;
                btn.innerHTML = '<span class="animate-pulse flex items-center justify-center gap-2"><svg class="w-4 h-4 animate-spin" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 12a9 9 0 1 1-6.219-8.56"/></svg> در حال ارتباط با سرور...</span>';
                btn.style.pointerEvents = 'none';
                btn.style.opacity = '0.8';

                try {
                    // ۲. ارسال درخواست واقعی به سرور ووکامرس (AJAX)
                    const formData = new URLSearchParams();
                    formData.append('product_id', '<?php echo esc_js($product_id); ?>');
                    formData.append('quantity', 1);

                    const response = await fetch('/?wc-ajax=add_to_cart', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: formData
                    });

                    const data = await response.json();

                    // بررسی خطا از سمت ووکامرس
                    if (data.error) {
                        alert('خطا: ' + (data.error_message || 'محصول به سبد خرید اضافه نشد.'));
                        return;
                    }

                    // ۳. اضافه کردن محصول به کشوی سبد خرید هدر (آپدیت گرافیکی)
                    const currentItem = {
                        id: 'prod-<?php echo esc_js($product_id); ?>',
                        itemType: 'product',
                        title: '<?php echo esc_js($product_title); ?>',
                        subtitle: '',
                        price: <?php echo $product_price ? esc_js($product_price) : 0; ?>,
                        quantity: 1
                    };

                    // ارتباط با متغیرهای هدر (در صورتی که اسکوپ Alpine مشترک باشد)
                    if (typeof this.cart !== 'undefined') {
                        const existing = this.cart.find(i => i.id === currentItem.id);
                        if (existing) {
                            existing.quantity += 1;
                        } else {
                            this.cart.push(currentItem);
                        }
                        this.isCartDrawerOpen = true;
                    } else {
                        // در صورتی که نتوانست کشو را باز کند، صفحه را رفرش می‌کند تا دیتای سرور خوانده شود
                        window.location.reload();
                    }

                    // نمایش پیام شناور (Toast)
                    window.dispatchEvent(new CustomEvent('show-toast', {
                        detail: `«<?php echo esc_js($product_title); ?>» به سبد خرید افزوده شد.`
                    }));

                } catch (error) {
                    console.error('Error adding to cart:', error);
                    alert('خطا در برقراری ارتباط با سرور.');
                } finally {
                    // ۴. بازگردانی دکمه به حالت اولیه
                    btn.innerHTML = originalText;
                    btn.style.pointerEvents = 'auto';
                    btn.style.opacity = '1';
                }
            }
        };
    }
</script>

<?php
get_footer();
