<?php

/**
 * Template Name: مارکت‌پلیس قالب‌ها و افزونه‌ها
 * Template Post Type: page
 *
 * @package Romonet_WPStorm
 */

get_header();
?>

<main class="min-h-screen pb-24 pt-8 space-y-12" dir="rtl" x-data="romonetShop()">
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
                        @click="filterType = 'all'"
                        :class="filterType === 'all' ? 'bg-amber-500 text-black shadow' : 'text-neutral-400 hover:text-white'"
                        class="flex-1 sm:flex-none px-4 py-2 rounded-lg text-xs font-bold transition">
                        همه محصولات (<span x-text="products.length"></span>)
                    </button>

                    <button
                        type="button"
                        @click="filterType = 'theme'"
                        :class="filterType === 'theme' ? 'bg-amber-500 text-black shadow' : 'text-neutral-400 hover:text-white'"
                        class="flex-1 sm:flex-none px-4 py-2 rounded-lg text-xs font-bold transition">
                        فقط قالب‌ها
                    </button>

                    <button
                        type="button"
                        @click="filterType = 'plugin'"
                        :class="filterType === 'plugin' ? 'bg-amber-500 text-black shadow' : 'text-neutral-400 hover:text-white'"
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
                            x-model="searchQuery"
                            placeholder="جستجو در محصولات..."
                            class="w-full bg-black/50 border border-white/10 focus:border-amber-400 rounded-xl pr-10 pl-4 py-2 text-xs text-white placeholder-neutral-500 focus:outline-none transition font-sans" />
                    </div>

                    <select
                        x-model="sortBy"
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
                <template x-for="tag in tags" :key="tag">
                    <button
                        type="button"
                        @click="selectedTag = tag"
                        :class="selectedTag === tag 
              ? 'bg-amber-500/20 text-amber-300 border border-amber-500/40 font-semibold' 
              : 'bg-white/5 text-neutral-400 hover:text-white hover:bg-white/10'"
                        class="px-3 py-1 rounded-lg text-xs whitespace-nowrap transition"
                        x-text="tag">
                    </button>
                </template>
            </div>
        </div>

        <!-- ==================== PRODUCTS GRID ==================== -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <template x-for="product in filteredProducts()" :key="product.id">
                <div
                    class="glass-card rounded-2xl border border-white/10 overflow-hidden flex flex-col justify-between group hover:border-amber-500/50 transition-all shadow-xl hover:shadow-2xl bg-white/5 backdrop-blur-md">
                    <div>
                        <!-- Banner & Badges -->
                        <a
                            :href="product.url"
                            class="relative h-56 overflow-hidden bg-black/60 block">
                            <img
                                :src="product.bannerImage"
                                :alt="product.name"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
                            <div class="absolute inset-0 bg-gradient-to-t from-[#0d0f17] via-black/20 to-transparent"></div>

                            <template x-if="product.badge">
                                <span class="absolute top-3 right-3 px-3 py-1 rounded-md bg-amber-500 text-black text-[11px] font-bold shadow-md" x-text="product.badge"></span>
                            </template>

                            <span
                                class="absolute top-3 left-3 px-2.5 py-1 rounded bg-black/80 backdrop-blur text-neutral-300 text-[10px] border border-white/15"
                                x-text="product.type === 'theme' ? 'قالب وردپرس' : 'افزونه وردپرس'"></span>

                            <div class="absolute bottom-3 left-3 right-3 flex items-center justify-between text-xs text-neutral-300">
                                <span class="bg-black/70 px-2 py-0.5 rounded border border-white/10">
                                    نسخه <span x-text="product.version"></span>
                                </span>
                                <span class="bg-black/70 px-2 py-0.5 rounded border border-white/10 text-emerald-400">
                                    وردپرس <span x-text="product.wpVersion"></span>
                                </span>
                            </div>
                        </a>

                        <!-- Body Content -->
                        <div class="p-6 space-y-3">
                            <div class="flex items-center justify-between text-xs">
                                <span class="text-neutral-400" x-text="product.category"></span>
                                <div class="flex items-center gap-1 text-amber-400 font-mono">
                                    <!-- Star Icon -->
                                    <svg class="w-3.5 h-3.5 fill-current text-amber-400" viewBox="0 0 24 24">
                                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                                    </svg>
                                    <span class="font-bold" x-text="product.rating"></span>
                                    <span class="text-neutral-500">(<span x-text="product.reviewsCount"></span> نظر)</span>
                                </div>
                            </div>

                            <a :href="product.url" class="block">
                                <h2
                                    class="text-lg font-bold text-white group-hover:text-amber-400 transition cursor-pointer line-clamp-1"
                                    x-text="product.name"></h2>
                            </a>

                            <p class="text-xs text-neutral-400 line-clamp-2 leading-relaxed" x-text="product.tagline"></p>

                            <!-- Feature Bullets -->
                            <div class="space-y-1.5 pt-2">
                                <template x-for="(kf, idx) in product.keyFeatures.slice(0, 2)" :key="idx">
                                    <div class="flex items-center gap-2 text-xs text-neutral-300">
                                        <!-- Check Icon -->
                                        <svg class="w-3.5 h-3.5 text-amber-400 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <polyline points="20 6 9 17 4 12" />
                                        </svg>
                                        <span class="truncate" x-text="kf.title"></span>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>

                    <!-- Price Footer -->
                    <div class="p-6 pt-0">
                        <div class="pt-4 border-t border-white/5 flex items-center justify-between">
                            <div>
                                <span class="text-[10px] text-neutral-500 block">لایسنس استاندارد</span>
                                <span class="text-lg font-black text-white" x-text="formatCurrency(product.licenses[0].price)"></span>
                            </div>

                            <div class="flex items-center gap-2">
                                <a
                                    :href="product.url"
                                    class="px-3 py-2 rounded-xl bg-white/5 hover:bg-white/10 text-neutral-300 hover:text-white border border-white/10 text-xs transition">
                                    جزییات و دمو
                                </a>

                                <button
                                    type="button"
                                    @click="buyProduct(product)"
                                    class="px-3.5 py-2 rounded-xl bg-amber-500 hover:bg-amber-400 text-black font-extrabold text-xs transition active:scale-95 shadow-lg shadow-amber-500/25 flex items-center gap-1.5">
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
        <template x-if="filteredProducts().length === 0">
            <div class="glass-panel p-12 text-center rounded-2xl border border-white/10 space-y-3 bg-white/5 backdrop-blur-md">
                <p class="text-neutral-400 text-sm">هیچ محصولی با مشخصات و فیلترهای انتخابی یافت نشد.</p>
                <button
                    @click="filterType = 'all'; selectedTag = 'همه'; searchQuery = '';"
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

            tags: ['همه', 'گوتنبرگ', 'ووکامرس', 'سرعت', 'امنیت', 'پیامک', 'فوق سریع', 'شرکتی', 'پورتفولیو'],

            products: [{
                    id: 'apex-studio-pro',
                    slug: 'apex-studio-pro',
                    name: 'قالب اختصاصی آژانسی و شرکتی Apex Studio',
                    type: 'theme',
                    category: 'قالب اختصاصی وردپرس',
                    tagline: 'سرعت لود فوق‌العاده با بلوک‌های بومی گوتنبرگ و Tailwind CSS',
                    rating: '۴.۹',
                    reviewsCount: '۲۸',
                    downloads: 480,
                    badge: 'پرفروش‌ترین',
                    version: '2.4.0',
                    wpVersion: '6.7+',
                    tags: ['گوتنبرگ', 'شرکتی', 'پورتفولیو', 'Gutenberg'],
                    bannerImage: 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=800&q=80',
                    url: '<?php echo esc_url(home_url('/shop/apex-studio-pro')); ?>',
                    licenses: [{
                        name: 'لایسنس تک دامنه',
                        price: 2450000
                    }],
                    keyFeatures: [{
                            title: 'سازگاری کامل با بلوک‌های گوتنبرگ و Tailwind'
                        },
                        {
                            title: 'سرعت لود زیر ۳۰۰ میلی‌ثانیه'
                        }
                    ]
                },
                {
                    id: 'aerocommerce-max',
                    slug: 'aerocommerce-max',
                    name: 'قالب فروشگاهی ایروکامرس مکس (AeroCommerce)',
                    type: 'theme',
                    category: 'ووکامرس فوق سریع',
                    tagline: 'معماری مدرن سبد خرید ایجکس و بهینه‌سازی شده برای نرخ تبدیل موبایل',
                    rating: '۵.۰',
                    reviewsCount: '۴۲',
                    downloads: 620,
                    badge: 'جدید',
                    version: '3.1.2',
                    wpVersion: '6.7+',
                    tags: ['ووکامرس', 'فوق سریع', 'سرعت', 'WooCommerce'],
                    bannerImage: 'https://images.unsplash.com/photo-1557821552-17105176677c?auto=format&fit=crop&w=800&q=80',
                    url: '<?php echo esc_url(home_url('/shop/aerocommerce-max')); ?>',
                    licenses: [{
                        name: 'لایسنس تک دامنه',
                        price: 2890000
                    }],
                    keyFeatures: [{
                            title: 'سبد خرید کشویی ایجکس و فیلترهای آنی بدون رفرش'
                        },
                        {
                            title: 'تسویه‌حساب تک‌مرحله‌ای بهینه‌شده'
                        }
                    ]
                },
                {
                    id: 'telepulse-sms-engine',
                    slug: 'telepulse-sms-engine',
                    name: 'افزونه درگاه هوشمند پیامک رومونت (TelePulse)',
                    type: 'plugin',
                    category: 'افزونه پیامکی وردپرس',
                    tagline: 'ارسال پیامک با خطوط خدماتی بدون بلک‌لیست و کدهای OTP زیر ۳ ثانیه',
                    rating: '۴.۸',
                    reviewsCount: '۱۹',
                    downloads: 350,
                    badge: 'ضروری',
                    version: '1.8.0',
                    wpVersion: '6.7+',
                    tags: ['پیامک', 'ووکامرس', 'SMS', 'OTP'],
                    bannerImage: 'https://images.unsplash.com/photo-1563986768609-322da13575f3?auto=format&fit=crop&w=800&q=80',
                    url: '<?php echo esc_url(home_url('/shop/telepulse-sms-engine')); ?>',
                    licenses: [{
                        name: 'لایسنس تک دامنه',
                        price: 890000
                    }],
                    keyFeatures: [{
                            title: 'ارسال با خطوط خدماتی بدون مسدودی و بلک‌لیست'
                        },
                        {
                            title: 'کدهای ورود OTP زیر ۳ ثانیه'
                        }
                    ]
                },
                {
                    id: 'pulsespeed-turbo-cache',
                    slug: 'pulsespeed-turbo-cache',
                    name: 'افزونه بهینه‌ساز کش و دیتابیس PulseSpeed Turbo',
                    type: 'plugin',
                    category: 'سرعت و عملکرد',
                    tagline: 'تضمین نمره بالای ۹۵ در تست PageSpeed گوگل بدون باگ رندرینگ',
                    rating: '۴.۹',
                    reviewsCount: '۳۴',
                    downloads: 510,
                    badge: 'ویژه',
                    version: '2.0.4',
                    wpVersion: '6.7+',
                    tags: ['سرعت', 'فوق سریع', 'Speed', 'Cache'],
                    bannerImage: 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=800&q=80',
                    url: '<?php echo esc_url(home_url('/shop/pulsespeed-turbo-cache')); ?>',
                    licenses: [{
                        name: 'لایسنس تک دامنه',
                        price: 1150000
                    }],
                    keyFeatures: [{
                            title: 'بهینه‌سازی خودکار دیتابیس و کش Redis'
                        },
                        {
                            title: 'رساندن امتیاز Core Web Vitals به ۱۰۰'
                        }
                    ]
                },
                {
                    id: 'fortress-shield-secops',
                    slug: 'fortress-shield-secops',
                    name: 'افزونه امنیتی و فایروال Fortress Shield',
                    type: 'plugin',
                    category: 'امنیت و پایش',
                    tagline: 'فایروال WAF پیشرفته، مسدودسازی حملات Brute Force و پایش روز صفر',
                    rating: '۴.۹',
                    reviewsCount: '۲۲',
                    downloads: 290,
                    badge: 'امنیت',
                    version: '1.5.0',
                    wpVersion: '6.7+',
                    tags: ['امنیت', 'Security', 'WAF'],
                    bannerImage: 'https://images.unsplash.com/photo-1563986768494-4dee2763ff3f?auto=format&fit=crop&w=800&q=80',
                    url: '<?php echo esc_url(home_url('/shop/fortress-shield-secops')); ?>',
                    licenses: [{
                        name: 'لایسنس تک دامنه',
                        price: 1350000
                    }],
                    keyFeatures: [{
                            title: 'فایروال WAF اختصاصی و مسدودسازی هوشمند IP های مخرب'
                        },
                        {
                            title: 'اسکن پیوسته تروجان و بدافزار'
                        }
                    ]
                },
                {
                    id: 'nova-headless-bridge',
                    slug: 'nova-headless-bridge',
                    name: 'پل ارتباطی هدلس وردپرس Nova Headless Bridge',
                    type: 'plugin',
                    category: 'توسعه و زیرساخت',
                    tagline: 'اتصال فوق سریع به Next.js 15 و React 19 با وب‌هوک و کش آنی Edge',
                    rating: '۴.۷',
                    reviewsCount: '۱۵',
                    downloads: 180,
                    badge: 'انترپرایز',
                    version: '1.2.0',
                    wpVersion: '6.7+',
                    tags: ['گوتنبرگ', 'فوق سریع', 'Next.js', 'GraphQL'],
                    bannerImage: 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?auto=format&fit=crop&w=800&q=80',
                    url: '<?php echo esc_url(home_url('/shop/nova-headless-bridge')); ?>',
                    licenses: [{
                        name: 'لایسنس تک دامنه',
                        price: 1750000
                    }],
                    keyFeatures: [{
                            title: 'پشتیبانی کامل از Next.js 15 App Router'
                        },
                        {
                            title: 'کش آنی و بازتولید ایستا (ISR)'
                        }
                    ]
                }
            ],

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

            buyProduct(product) {
                if (typeof this.cart !== 'undefined') {
                    const existing = this.cart.find(i => i.id === product.id);
                    if (existing) {
                        existing.quantity += 1;
                    } else {
                        this.cart.push({
                            id: product.id,
                            itemType: 'product',
                            title: product.name,
                            subtitle: product.licenses[0].name,
                            price: product.licenses[0].price,
                            quantity: 1,
                            licenseTier: 'single',
                            licenseLabel: 'لایسنس تک دامنه'
                        });
                    }
                    this.isCartDrawerOpen = true;
                }

                window.dispatchEvent(new CustomEvent('show-toast', {
                    detail: `محصول «${product.name}» با موفقیت به سبد سفارشات افزوده شد.`
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
