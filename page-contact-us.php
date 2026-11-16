<?php
/**
 * Template Name: تماس با رومونت
 * Template Post Type: page
 *
 * @package Romonet_WPStorm
 */

get_header();
?>

<main class="min-h-screen pb-24" dir="rtl" xyz-data="romonetContact()">
    <section class="mx-auto max-w-7xl px-4 pb-16 pt-16 sm:px-6 lg:px-8 lg:pt-24">
        <div class="max-w-3xl">
            <p class="text-sm font-semibold text-amber-400">شروع گفتگو</p>
            <h1 class="mt-4 text-4xl font-bold leading-[1.4] tracking-tight text-white sm:text-6xl">ارتباط با رومونت</h1>
            <p class="mt-4 text-xl font-semibold text-neutral-200 sm:text-2xl">برای شروع همکاری با ما در ارتباط باشید</p>
            <p class="mt-6 max-w-2xl text-base leading-8 text-neutral-300 sm:text-lg">اگر برای کسب‌وکار خود به طراحی سایت، راه‌اندازی فروشگاه اینترنتی، پشتیبانی وردپرس یا توسعه اختصاصی نیاز دارید، درخواست خود را برای ما ارسال کنید.</p>
            <a href="#inquiry" class="mt-8 inline-flex min-h-12 items-center justify-center rounded-xl bg-amber-500 px-7 text-sm font-bold text-black transition hover:bg-amber-400">ثبت درخواست مشاوره</a>
        </div>
    </section>

    <section class="border-y border-white/10 bg-white/[0.02]">
        <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
            <div class="grid gap-4 md:grid-cols-3">
                <div class="rounded-2xl border border-white/10 bg-white/[0.03] p-6"><h2 class="font-bold text-white">تلفن</h2><a href="tel:+989155772051" dir="ltr" class="mt-4 inline-block text-sm text-neutral-300 transition hover:text-amber-300">09155772051</a></div>
                <div class="rounded-2xl border border-white/10 bg-white/[0.03] p-6"><h2 class="font-bold text-white">ایمیل</h2><a href="mailto:info@romonet.ir" dir="ltr" class="mt-4 inline-block text-sm text-neutral-300 transition hover:text-amber-300">info@romonet.ir</a></div>
                <div class="rounded-2xl border border-white/10 bg-white/[0.03] p-6"><h2 class="font-bold text-white">آدرس</h2><p class="mt-4 text-sm leading-7 text-neutral-300">مشهد مقدس، بلوار موسوی قوچانی، موسوی قوچانی ۱۹، برج فدک، بلوک A شمالی، واحد ۳۰۸</p></div>
            </div>
        </div>
    </section>

    <section id="inquiry" class="scroll-mt-24">
        <div class="mx-auto grid max-w-7xl gap-12 px-4 py-20 sm:px-6 lg:grid-cols-[0.8fr_1.2fr] lg:items-start lg:px-8 lg:py-28">
            <div>
                <p class="text-sm font-semibold text-amber-400">درخواست بررسی پروژه</p>
                <h2 class="mt-3 text-3xl font-bold leading-[1.45] text-white sm:text-4xl">درخواست مشاوره و بررسی پروژه</h2>
                <p class="mt-5 text-sm leading-8 text-neutral-400">اطلاعات اولیه پروژه خود را ثبت کنید تا بتوانیم درخواست شما را بهتر بررسی کنیم.</p>
                <p class="mt-8 text-sm leading-8 text-neutral-300">وب‌سایت: <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-amber-400 hover:text-amber-300">romonet.ir</a></p>
            </div>

            <form xyz-on:submit.prevent="submitContactRequest()" class="rounded-2xl border border-white/10 bg-white/[0.03] p-6 sm:p-8">
                <div xyz-show="!submitSuccess" class="space-y-5">
                    <div class="grid gap-5 sm:grid-cols-2">
                        <label class="block text-sm text-neutral-300">نام و نام خانوادگی *
                            <input type="text" xyz-model="customerName" required autocomplete="name" class="mt-2 w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none transition focus:border-amber-400" placeholder="مثال: علی احمدی">
                        </label>
                        <label class="block text-sm text-neutral-300">شماره تماس *
                            <input type="tel" xyz-model="customerPhone" required autocomplete="tel" inputmode="tel" dir="ltr" class="mt-2 w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-left text-sm text-white outline-none transition focus:border-amber-400" placeholder="09123456789">
                        </label>
                    </div>
                    <label class="block text-sm text-neutral-300">آدرس وب‌سایت <span class="text-neutral-500">(اختیاری)</span>
                        <input type="url" xyz-model="website" dir="ltr" class="mt-2 w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-left text-sm text-white outline-none transition focus:border-amber-400" placeholder="https://example.com">
                    </label>
                    <label class="block text-sm text-neutral-300">نوع درخواست *
                        <select xyz-model="requestType" required class="mt-2 w-full rounded-xl border border-white/10 bg-[#11131c] px-4 py-3 text-sm text-white outline-none transition focus:border-amber-400">
                            <option>طراحی سایت شرکتی</option><option>طراحی سایت فروشگاهی</option><option>پشتیبانی وردپرس</option><option>توسعه اختصاصی افزونه یا قالب</option><option>خدمات پنل پیامکی</option><option>سایر موارد</option>
                        </select>
                    </label>
                    <label class="block text-sm text-neutral-300">بودجه تقریبی <span class="text-neutral-500">(اختیاری)</span>
                        <select xyz-model="budget" class="mt-2 w-full rounded-xl border border-white/10 bg-[#11131c] px-4 py-3 text-sm text-white outline-none transition focus:border-amber-400">
                            <option>کمتر از ۲۰ میلیون تومان</option><option>۲۰ تا ۵۰ میلیون تومان</option><option>۵۰ تا ۱۰۰ میلیون تومان</option><option>بیش از ۱۰۰ میلیون تومان</option><option>هنوز مشخص نیست</option>
                        </select>
                    </label>
                    <label class="block text-sm text-neutral-300">توضیحات پروژه *
                        <textarea xyz-model="description" required rows="5" class="mt-2 w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm leading-7 text-white outline-none transition focus:border-amber-400" placeholder="نیاز، هدف یا مسئله اصلی پروژه را توضیح دهید."></textarea>
                    </label>
                    <p xyz-show="submitError" xyz-text="submitError" class="text-sm leading-6 text-rose-300" style="display: none;"></p>
                    <button type="submit" xyz-bind:disabled="isSubmitting" class="inline-flex min-h-12 w-full items-center justify-center rounded-xl bg-amber-500 text-sm font-bold text-black transition hover:bg-amber-400 disabled:cursor-not-allowed disabled:opacity-70"><span xyz-show="!isSubmitting">ارسال درخواست مشاوره</span><span xyz-show="isSubmitting" style="display: none;">در حال ارسال...</span></button>
                </div>
                <div xyz-show="submitSuccess" class="py-8 text-center" style="display: none;"><div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-emerald-500/10 text-emerald-400">✓</div><h3 class="mt-5 text-xl font-bold text-white">درخواست شما ثبت شد</h3><p class="mt-3 text-sm leading-7 text-neutral-300" xyz-text="successMessage"></p></div>
            </form>
        </div>
    </section>

    <section class="px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-5xl rounded-3xl border border-amber-400/25 bg-amber-500/[0.07] px-6 py-14 text-center sm:px-12">
            <h2 class="text-3xl font-bold text-white sm:text-4xl">آماده شروع پروژه خود هستید؟</h2>
            <p class="mx-auto mt-5 max-w-2xl text-sm leading-8 text-neutral-300">درخواست خود را ثبت کنید تا درباره نیازهای پروژه و راهکار مناسب با شما گفت‌وگو کنیم.</p>
            <a href="#inquiry" class="mt-8 inline-flex min-h-12 items-center justify-center rounded-xl bg-amber-500 px-7 text-sm font-bold text-black transition hover:bg-amber-400">ثبت درخواست همکاری</a>
        </div>
    </section>
</main>

<?php get_footer(); ?>