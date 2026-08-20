<?php

/**
 * The template for displaying a Single Product detail page
 *
 * @package Romonet_WPStorm
 */

get_header();

// Fetch product details (fallback datasets provided if not using WooCommerce custom post types yet)
$product_title = get_the_title() ?: 'قالب اختصاصی آژانسی و شرکتی Apex Studio';
$product_tagline = 'سرعت لود فوق‌العاده با بلوک‌های بومی گوتنبرگ، طراحی مدرن با Tailwind CSS و پنل تنظیمات پیشرفته';
$product_category = 'قالب اختصاصی وردپرس';
$product_rating = '۴.۹';
$product_reviews_count = '۲۸';
$product_version = '2.4.0';
$product_wp_version = '6.7+';
$product_php_version = '8.2 / 8.3';
$product_badge = 'پرفروش‌ترین';
$main_image = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1200&q=80';
?>

<main class="min-h-screen pb-28 pt-6 space-y-12" dir="rtl" x-data="romonetProductDetail()">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

        <!-- ==================== NAVIGATION BREADCRUMB ==================== -->
        <div class="flex items-center justify-between">
            <a
                href="<?php echo esc_url(home_url('/shop')); ?>"
                class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-white/5 hover:bg-white/10 text-neutral-300 hover:text-white text-xs transition border border-white/10">
                <!-- ArrowRight Icon -->
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M5 12h14" />
                    <path d="m12 5 7 7-7 7" />
                </svg>
                <span>بازگشت به مارکت‌پلیس محصولات wpstorm</span>
            </a>

            <div class="flex items-center gap-2 text-xs text-neutral-400">
                <span class="text-neutral-500">رومونت</span>
                <span>/</span>
                <span><?php echo esc_html($product_category); ?></span>
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

                    <?php if (!empty($product_badge)) : ?>
                        <span class="absolute top-4 right-4 px-3 py-1 rounded-md bg-amber-500 text-black text-xs font-bold shadow-lg">
                            <?php echo esc_html($product_badge); ?>
                        </span>
                    <?php endif; ?>

                    <!-- Live Interactive Demo Trigger -->
                    <button
                        type="button"
                        @click="isDemoModalOpen = true"
                        class="absolute bottom-4 left-4 px-4 py-2.5 rounded-xl bg-black/80 hover:bg-black backdrop-blur-md text-white text-xs border border-white/20 flex items-center gap-2 transition hover:scale-105 shadow-xl">
                        <!-- Sparkles Icon -->
                        <svg class="w-4 h-4 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z" />
                        </svg>
                        <span>مشاهده محیط دمو آنلاین (Live Sandbox)</span>
                        <!-- ExternalLink Icon -->
                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" />
                            <polyline points="15 3 21 3 21 9" />
                            <line x1="10" x2="21" y1="14" y2="3" />
                        </svg>
                    </button>
                </div>

                <!-- Thumbnail Switcher -->
                <div class="flex items-center gap-3" x-show="galleryImages.length > 1">
                    <template x-for="(img, idx) in galleryImages" :key="idx">
                        <button
                            type="button"
                            @click="activeImage = img"
                            class="relative w-24 h-16 rounded-xl overflow-hidden border-2 transition"
                            :class="activeImage === img ? 'border-amber-400 scale-105' : 'border-white/10 opacity-60 hover:opacity-100'">
                            <img :src="img" :alt="'تصویر ' + (idx + 1)" class="w-full h-full object-cover" />
                        </button>
                    </template>
                </div>
            </div>

            <!-- Buying Box & License Selector Column -->
            <div class="lg:col-span-5 space-y-6">
                <div class="space-y-2">
                    <div class="flex items-center justify-between text-xs">
                        <span class="px-2.5 py-0.5 rounded bg-white/10 text-neutral-300">
                            <?php echo esc_html($product_category); ?>
                        </span>
                        <div class="flex items-center gap-1 text-amber-400 font-mono">
                            <!-- Star Icon -->
                            <svg class="w-4 h-4 fill-current text-amber-400" viewBox="0 0 24 24">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                            </svg>
                            <span class="font-bold text-sm"><?php echo esc_html($product_rating); ?></span>
                            <span class="text-neutral-500">(<?php echo esc_html($product_reviews_count); ?> دیدگاه تاییدشده)</span>
                        </div>
                    </div>

                    <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight"><?php echo esc_html($product_title); ?></h1>
                    <p class="text-sm text-neutral-300 leading-relaxed"><?php echo esc_html($product_tagline); ?></p>
                </div>

                <!-- Specs Summary Pill -->
                <div class="p-3.5 rounded-2xl bg-white/5 border border-white/10 grid grid-cols-3 gap-2 text-center text-xs backdrop-blur-md">
                    <div>
                        <span class="text-neutral-400 block text-[10px]">نسخه انتشار</span>
                        <span class="text-white font-bold font-mono">v<?php echo esc_html($product_version); ?></span>
                    </div>
                    <div>
                        <span class="text-neutral-400 block text-[10px]">سازگاری وردپرس</span>
                        <span class="text-emerald-400 font-bold font-mono"><?php echo esc_html($product_wp_version); ?></span>
                    </div>
                    <div>
                        <span class="text-neutral-400 block text-[10px]">موتور PHP</span>
                        <span class="text-cyan-400 font-bold font-mono"><?php echo esc_html($product_php_version); ?></span>
                    </div>
                </div>

                <!-- LICENSE TIER SELECTION -->
                <div class="space-y-3">
                    <label class="text-xs text-neutral-400 font-semibold block">
                        انتخاب نوع لایسنس و دسترسی:
                    </label>

                    <div class="space-y-2.5">
                        <template x-for="lic in licenses" :key="lic.tier">
                            <div
                                @click="selectedLicense = lic"
                                class="p-4 rounded-2xl border cursor-pointer transition flex items-center justify-between relative"
                                :class="selectedLicense.tier === lic.tier 
                  ? 'border-amber-500/80 bg-amber-500/10 shadow-lg shadow-amber-500/10' 
                  : 'border-white/10 bg-black/40 hover:border-white/20'">
                                <template x-if="lic.popular">
                                    <span class="absolute -top-2.5 left-4 px-2 py-0.2 rounded bg-amber-500 text-black text-[10px] font-bold">
                                        پیشنهاد ویژه
                                    </span>
                                </template>

                                <div class="space-y-0.5 text-right">
                                    <div class="text-sm font-bold text-white flex items-center gap-2">
                                        <span x-text="lic.name"></span>
                                    </div>
                                    <div class="text-xs text-neutral-400 flex items-center gap-2">
                                        <span x-text="lic.sitesCount"></span>
                                        <span>•</span>
                                        <span x-text="lic.supportDuration"></span>
                                    </div>
                                </div>

                                <div class="text-left" dir="ltr">
                                    <span class="text-lg font-extrabold text-amber-400" x-text="formatCurrency(lic.price)"></span>
                                    <div class="text-[10px] text-neutral-500">پرداخت یک‌باره</div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>

                <!-- BUY ACTIONS -->
                <div class="space-y-3 pt-2">
                    <button
                        type="button"
                        @click="handleAddToCart()"
                        class="w-full py-4 rounded-2xl bg-gradient-to-r from-amber-500 via-amber-400 to-amber-500 hover:brightness-110 active:scale-95 text-black font-black text-sm transition shadow-xl shadow-amber-500/30 flex items-center justify-center gap-2">
                        <!-- ShoppingBag Icon -->
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z" />
                            <path d="M3 6h18" />
                            <path d="M16 10a4 4 0 0 1-8 0" />
                        </svg>
                        <span>افزودن به سبد خرید (<span x-text="formatCurrency(selectedLicense.price)"></span>)</span>
                    </button>

                    <div class="flex items-center justify-center gap-4 text-xs text-neutral-400 pt-1">
                        <span class="flex items-center gap-1">
                            <!-- ShieldCheck Icon -->
                            <svg class="w-4 h-4 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z" />
                                <path d="m9 12 2 2 4-4" />
                            </svg>
                            گارانتی ۳۰ روزه بازگشت وجه
                        </span>
                        <span>•</span>
                        <span class="flex items-center gap-1">
                            <!-- DownloadCloud Icon -->
                            <svg class="w-4 h-4 text-cyan-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242" />
                                <path d="M12 12v9" />
                                <path d="m8 17 4 4 4-4" />
                            </svg>
                            تحویل آنی فایل و لایسنس
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

                <!-- Overview Pane -->
                <div x-show="activeTab === 'overview'" class="space-y-6 text-neutral-300 leading-relaxed text-sm sm:text-base">
                    <h3 class="text-xl font-bold text-white">معماری و ساختار مهندسی محصول</h3>
                    <div class="space-y-4 whitespace-pre-line leading-relaxed">
                        قالب و افزونه‌های توسعه‌یافته در دپارتمان wpstorm با تمرکز بر بالاترین استانداردهای مهندسی وب ساخته شده‌اند.
                        حذف کامل جی‌کوئری‌های سنگین، کدنویسی با معماری مدرن بر پایه PHP 8.3 و بلوک‌های بومی گوتنبرگ به همراه استایل‌دهی ماژولار با Tailwind CSS باعث شده است تا این محصول بدون نیاز به کانفیگ‌های پیچیده، در آزمون‌های تست سرعت گوگل (Core Web Vitals) امتیاز کامل ۱۰۰ را در موبایل و دسکتاپ کسب کند.
                    </div>
                </div>

                <!-- Key Features Pane -->
                <div x-show="activeTab === 'features'" class="space-y-6" style="display: none;">
                    <h3 class="text-xl font-bold text-white">طراحی شده برای بیشترین سرعت و پایداری</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <template x-for="(feat, idx) in keyFeatures" :key="idx">
                            <div class="p-5 rounded-2xl bg-black/40 border border-white/10 space-y-2">
                                <div class="w-10 h-10 rounded-xl bg-amber-500/10 text-amber-400 flex items-center justify-center">
                                    <!-- Zap Icon -->
                                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2" />
                                    </svg>
                                </div>
                                <h4 class="text-base font-bold text-white" x-text="feat.title"></h4>
                                <p class="text-xs text-neutral-400 leading-relaxed" x-text="feat.desc"></p>
                            </div>
                        </template>
                    </div>
                </div>

                <!-- Requirements Pane -->
                <div x-show="activeTab === 'requirements'" class="space-y-6" style="display: none;">
                    <h3 class="text-xl font-bold text-white">ماتریس سازگاری و ملزومات سرور</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div class="p-4 rounded-xl bg-black/40 border border-white/10">
                            <span class="text-[10px] text-neutral-500 block">نسخه PHP</span>
                            <span class="text-base font-bold text-white font-mono"><?php echo esc_html($product_php_version); ?></span>
                        </div>
                        <div class="p-4 rounded-xl bg-black/40 border border-white/10">
                            <span class="text-[10px] text-neutral-500 block">هسته وردپرس</span>
                            <span class="text-base font-bold text-emerald-400 font-mono"><?php echo esc_html($product_wp_version); ?></span>
                        </div>
                        <div class="p-4 rounded-xl bg-black/40 border border-white/10">
                            <span class="text-[10px] text-neutral-500 block">دیتابیس</span>
                            <span class="text-base font-bold text-white font-mono">MySQL 8.0+ / MariaDB 10.5+</span>
                        </div>
                        <div class="p-4 rounded-xl bg-black/40 border border-white/10">
                            <span class="text-[10px] text-neutral-500 block">وب‌سرور</span>
                            <span class="text-base font-bold text-cyan-400 font-mono">LiteSpeed / Nginx / Apache</span>
                        </div>
                    </div>
                </div>

                <!-- Changelog Pane -->
                <div x-show="activeTab === 'changelog'" class="space-y-6" style="display: none;">
                    <h3 class="text-xl font-bold text-white">گزارش تغییرات و به‌روزرسانی‌ها</h3>
                    <div class="space-y-4">
                        <div class="p-5 rounded-2xl bg-black/40 border border-white/10 space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="text-base font-bold text-amber-400 font-mono">نسخه v<?php echo esc_html($product_version); ?></span>
                                <span class="text-xs text-neutral-400 font-mono">امروز (آخرین نسخه)</span>
                            </div>
                            <ul class="space-y-1.5 text-xs text-neutral-300">
                                <li class="flex items-center gap-2">
                                    <!-- CheckCircle2 Icon -->
                                    <svg class="w-3.5 h-3.5 text-emerald-400 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <circle cx="12" cy="12" r="10" />
                                        <path d="m9 12 2 2 4-4" />
                                    </svg>
                                    <span>بهینه‌سازی کدهای رندرینگ با آخرین نسخه گوتنبرگ و وردپرس ۶.۷</span>
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="w-3.5 h-3.5 text-emerald-400 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <circle cx="12" cy="12" r="10" />
                                        <path d="m9 12 2 2 4-4" />
                                    </svg>
                                    <span>بهبود عملکرد فیلترهای ایجکس ووکامرس در موبایل</span>
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="w-3.5 h-3.5 text-emerald-400 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <circle cx="12" cy="12" r="10" />
                                        <path d="m9 12 2 2 4-4" />
                                    </svg>
                                    <span>سازگاری کامل با کش آبجکت ردیس (Redis Object Cache)</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- FAQ Pane -->
                <div x-show="activeTab === 'faq'" class="space-y-6" style="display: none;">
                    <h3 class="text-xl font-bold text-white">سوالات پرتکرار خریداران</h3>
                    <div class="space-y-4">
                        <template x-for="(item, idx) in faqList" :key="idx">
                            <div class="p-5 rounded-2xl bg-black/40 border border-white/10 space-y-2">
                                <h4 class="text-sm font-bold text-white" x-text="item.q"></h4>
                                <p class="text-xs text-neutral-400 leading-relaxed" x-text="item.a"></p>
                            </div>
                        </template>
                    </div>
                </div>

                <!-- Reviews Pane -->
                <div x-show="activeTab === 'reviews'" class="space-y-6" style="display: none;">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-bold text-white">نظرات خریداران تاییدشده</h3>
                        <div class="flex items-center gap-1.5 text-amber-400 font-mono text-sm">
                            <svg class="w-4 h-4 fill-current text-amber-400" viewBox="0 0 24 24">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                            </svg>
                            <span class="font-bold"><?php echo esc_html($product_rating); ?></span>
                            <span class="text-neutral-500">از ۵.۰ امتیاز</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <template x-for="(rev, idx) in reviewsList" :key="idx">
                            <div class="p-5 rounded-2xl bg-black/40 border border-white/10 space-y-2">
                                <div class="flex items-center gap-1 text-amber-400">
                                    <template x-for="s in 5" :key="s">
                                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24">
                                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                                        </svg>
                                    </template>
                                </div>
                                <p class="text-xs text-neutral-300 italic leading-relaxed" x-text="'«' + rev.comment + '»'"></p>
                                <div class="text-[11px] text-neutral-400" x-text="'— ' + rev.user"></div>
                            </div>
                        </template>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <!-- ==================== LIVE DEMO SANDBOX MODAL ==================== -->
    <div
        x-show="isDemoModalOpen"
        x-cloak
        class="fixed inset-0 z-50 overflow-hidden flex items-center justify-center p-4 sm:p-6 md:p-10"
        dir="rtl"
        style="display: none;">
        <div
            class="fixed inset-0 bg-black/90 backdrop-blur-md"
            @click="isDemoModalOpen = false"></div>

        <div class="relative w-full max-w-6xl h-[85vh] bg-[#0c0e17] border border-white/20 rounded-3xl overflow-hidden shadow-2xl flex flex-col z-10">
            <!-- Header bar -->
            <div class="px-6 py-4 bg-[#111422] border-b border-white/10 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <span class="w-3 h-3 rounded-full bg-rose-500"></span>
                    <span class="w-3 h-3 rounded-full bg-yellow-500"></span>
                    <span class="w-3 h-3 rounded-full bg-emerald-500"></span>
                    <span class="text-xs text-neutral-300 font-semibold mr-2">
                        محیط دمو زنده // <?php echo esc_html($product_title); ?> (دپارتمان wpstorm - Romonet.ir)
                    </span>
                </div>
                <button
                    type="button"
                    @click="isDemoModalOpen = false"
                    class="px-3 py-1.5 rounded-lg bg-white/10 hover:bg-white/20 text-white text-xs transition">
                    بستن پنجره دمو ✕
                </button>
            </div>

            <!-- Sandbox Simulation Viewport -->
            <div class="flex-1 overflow-y-auto p-6 sm:p-12 space-y-8">
                <div class="max-w-3xl mx-auto text-center space-y-4">
                    <span class="px-3 py-1 rounded-full bg-amber-500/20 text-amber-300 text-xs">
                        پیش‌نمایش آنلاین
                    </span>
                    <h2 class="text-3xl font-extrabold text-white">معرفی و تست زنده <?php echo esc_html($product_title); ?></h2>
                    <p class="text-sm text-neutral-400"><?php echo esc_html($product_tagline); ?></p>
                    <div class="pt-4 flex justify-center gap-4">
                        <button
                            type="button"
                            @click="isDemoModalOpen = false; handleAddToCart();"
                            class="px-6 py-3 rounded-xl bg-amber-500 text-black font-extrabold text-xs shadow-lg shadow-amber-500/30 transition hover:bg-amber-400">
                            خرید و دانلود آنی <?php echo esc_html($product_title); ?>
                        </button>
                    </div>
                </div>

                <div class="rounded-2xl border border-white/10 overflow-hidden shadow-2xl">
                    <img :src="activeImage" alt="دموی کامل محصول" class="w-full h-auto" />
                </div>
            </div>
        </div>
    </div>

</main>

<script>
    function romonetProductDetail() {
        return {
            activeImage: '<?php echo esc_url($main_image); ?>',
            activeTab: 'overview',
            isDemoModalOpen: false,

            galleryImages: [
                '<?php echo esc_url($main_image); ?>',
                'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1557821552-17105176677c?auto=format&fit=crop&w=800&q=80'
            ],

            licenses: [{
                    tier: 'single',
                    name: 'لایسنس استاندارد (۱ دامنه)',
                    sitesCount: '۱ دامنه فعال',
                    supportDuration: '۶ ماه پشتیبانی فنی و آپدیت',
                    price: 2450000,
                    popular: false
                },
                {
                    tier: 'multi',
                    name: 'لایسنس توسعه‌دهنده (۵ دامنه)',
                    sitesCount: '۵ دامنه فعال',
                    supportDuration: '۱ سال پشتیبانی فنی طلایی',
                    price: 4850000,
                    popular: true
                },
                {
                    tier: 'agency',
                    name: 'لایسنس نامحدود سازمانی',
                    sitesCount: 'نامحدود دامنه',
                    supportDuration: 'پشتیبانی مادام‌العمر VIP',
                    price: 8900000,
                    popular: false
                }
            ],

            selectedLicense: null,

            tabs: [{
                    id: 'overview',
                    label: 'معرفی و معماری فنی'
                },
                {
                    id: 'features',
                    label: 'ویژگی‌های کلیدی'
                },
                {
                    id: 'requirements',
                    label: 'پیش‌نیازها و سازگاری'
                },
                {
                    id: 'changelog',
                    label: 'تاریخچه تغییرات (نسخه <?php echo esc_js($product_version); ?>)'
                },
                {
                    id: 'faq',
                    label: 'سوالات متداول'
                },
                {
                    id: 'reviews',
                    label: 'دیدگاه‌های خریداران (<?php echo esc_js($product_reviews_count); ?>)'
                }
            ],

            keyFeatures: [{
                    title: 'طراحی شده بر پایه بلوک‌های بومی گوتنبرگ',
                    desc: 'بدون نیاز به نصب المنتور، ویژوال کامپوزر یا هر افزونه سنگین صفحه‌ساز دیگر.'
                },
                {
                    title: 'استایل‌دهی مدرن با Tailwind CSS',
                    desc: 'حجم CSS نهایی کمتر از ۳۰ کیلوبایت با بارگذاری بحرانی استایل‌ها در هد سایت.'
                },
                {
                    title: 'سازگاری کامل با کش آبجکت ردیس (Redis)',
                    desc: 'تحمل ترافیک‌های میلیونی بدون فشار آمدن به پایگاه‌داده MySQL سرور.'
                },
                {
                    title: 'پشتیبانی اختصاصی و آپدیت‌های دائمی',
                    desc: 'به‌روزرسانی خودکار کلیدهای لایسنس از طریق پیشخوان وردپرس.'
                }
            ],

            faqList: [{
                    q: 'آیا برای استفاده از این محصول نیاز به افزونه‌های صفحه‌ساز دارم؟',
                    a: 'خیر، این محصول به صورت ۱۰۰٪ اختصاصی بر پایه ادیتور گوتنبرگ وردپرس توسعه داده شده و نیازی به هیچ صفحه‌ساز جانبی ندارد.'
                },
                {
                    q: 'فرآیند دریافت آپدیت‌ها چگونه است؟',
                    a: 'پس از ثبت سفارش و خرید، کلید لایسنس اختصاصی برای شما صادر شده و تمام آپدیت‌ها به صورت مستقیم از پیشخوان وردپرس قابل دریافت است.'
                },
                {
                    q: 'آیا امکان تغییر دامنه لایسنس وجود دارد؟',
                    a: 'بله، از طریق پنل کاربری رومونت می‌توانید در هر زمان دامنه فعال لایسنس خود را بدون هزینه بازنشانی یا تغییر دهید.'
                }
            ],

            reviewsList: [{
                    user: 'مهندس حسینی (مدیر فنی)',
                    comment: 'قالب را جایگزین المنتور کردیم و زمان لود LCP روی موبایل از ۳.۸ ثانیه به ۰.۴ ثانیه کاهش پیدا کرد. نرخ تبدیل فروشگاه دو برابر شد.'
                },
                {
                    user: 'سارا رضایی (مدیر آژانس تبلیغاتی)',
                    comment: 'تمیزترین و استانداردترین کدنویسی وردپرسی که در ۱۰ سال فعالیت حرفه‌ای دیدم. تیم توسعه ما واقعاً از سرعت کار لذت برد.'
                },
                {
                    user: 'علی کاظمی (فروشگاه اینترنتی)',
                    comment: 'بهینه‌سازی صفحه تسویه‌حساب ووکامرس در این قالب فوق‌العاده است. پشتیبانی رومونت هم در کمتر از ۱۰ دقیقه تیکت من رو حل کرد.'
                }
            ],

            init() {
                this.selectedLicense = this.licenses.find(l => l.popular) || this.licenses[0];
            },

            handleAddToCart() {
                const currentItem = {
                    id: 'prod-<?php echo get_the_ID() ?: 'apex-studio'; ?>-' + this.selectedLicense.tier,
                    itemType: 'product',
                    title: '<?php echo esc_js($product_title); ?>',
                    subtitle: this.selectedLicense.name,
                    price: this.selectedLicense.price,
                    quantity: 1,
                    licenseTier: this.selectedLicense.tier,
                    licenseLabel: this.selectedLicense.name
                };

                // Push into header Alpine cart if parent component exists
                if (typeof this.cart !== 'undefined') {
                    const existing = this.cart.find(i => i.id === currentItem.id);
                    if (existing) {
                        existing.quantity += 1;
                    } else {
                        this.cart.push(currentItem);
                    }
                    this.isCartDrawerOpen = true;
                }

                // Trigger global toast event
                window.dispatchEvent(new CustomEvent('show-toast', {
                    detail: `«<?php echo esc_js($product_title); ?>» با لایسنس ${this.selectedLicense.name} به سبد سفارشات افزوده شد.`
                }));
            },

            formatCurrency(amount) {
                return new Intl.NumberFormat('fa-IR').format(Math.round(amount)) + ' تومان';
            }
        };
    }
</script>

<?php
get_footer();
