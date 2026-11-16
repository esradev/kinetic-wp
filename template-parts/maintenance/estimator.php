<section id="inquiry" class="scroll-mt-24">
    <div class="mx-auto grid max-w-7xl gap-12 px-4 py-20 sm:px-6 lg:grid-cols-[0.8fr_1.2fr] lg:items-start lg:px-8">
        <div>
            <p class="text-sm font-semibold text-amber-400">درخواست بررسی سایت</p>
            <h2 class="mt-3 text-3xl font-bold leading-[1.45] text-white sm:text-4xl">برای انتخاب پلن مناسب، اطلاعات سایت را ارسال کنید</h2>
            <p class="mt-5 text-sm leading-8 text-neutral-400">پس از بررسی اولیه، محدوده خدمات، سطح پشتیبانی و هزینه متناسب با شرایط سایت به شما پیشنهاد می‌شود.</p>
        </div>
        <form xyz-on:submit.prevent="submitMaintenanceRequest()" class="rounded-2xl border border-white/10 bg-white/[0.03] p-6 sm:p-8">
            <div xyz-show="!submitSuccess" class="space-y-5">
                <div class="grid gap-5 sm:grid-cols-2">
                    <label class="block text-sm text-neutral-300">نام و نام خانوادگی *
                        <input type="text" xyz-model="customerName" required autocomplete="name" class="mt-2 w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none focus:border-amber-400" placeholder="مثال: علی احمدی">
                    </label>
                    <label class="block text-sm text-neutral-300">شماره تماس *
                        <input type="tel" xyz-model="customerPhone" required autocomplete="tel" inputmode="tel" dir="ltr" class="mt-2 w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-left text-sm text-white outline-none focus:border-amber-400" placeholder="09123456789">
                    </label>
                </div>
                <label class="block text-sm text-neutral-300">آدرس سایت *
                    <input type="url" xyz-model="siteUrl" required dir="ltr" class="mt-2 w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-left text-sm text-white outline-none focus:border-amber-400" placeholder="https://example.com">
                </label>
                <div class="grid gap-5 sm:grid-cols-2">
                    <label class="block text-sm text-neutral-300">نوع سایت *
                        <select xyz-model="siteType" required class="mt-2 w-full rounded-xl border border-white/10 bg-[#11131c] px-4 py-3 text-sm text-white outline-none focus:border-amber-400"><option>شرکتی</option><option>فروشگاهی</option><option>شخصی</option><option>سایر</option></select>
                    </label>
                    <label class="block text-sm text-neutral-300">نوع درخواست *
                        <select xyz-model="requestType" required class="mt-2 w-full rounded-xl border border-white/10 bg-[#11131c] px-4 py-3 text-sm text-white outline-none focus:border-amber-400"><option>پشتیبانی ماهانه</option><option>رفع مشکل</option><option>بررسی فنی</option><option>توسعه سایت</option></select>
                    </label>
                </div>
                <label class="block text-sm text-neutral-300">توضیحات تکمیلی
                    <textarea xyz-model="notes" rows="4" class="mt-2 w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm leading-7 text-white outline-none focus:border-amber-400" placeholder="مشکل یا نیاز اصلی سایت را توضیح دهید."></textarea>
                </label>
                <p xyz-show="submitError" xyz-text="submitError" class="text-sm leading-6 text-rose-300" style="display: none;"></p>
                <button type="submit" xyz-bind:disabled="isSubmitting" class="inline-flex min-h-12 w-full items-center justify-center rounded-xl bg-amber-500 text-sm font-bold text-black transition hover:bg-amber-400 disabled:cursor-not-allowed disabled:opacity-70"><span xyz-show="!isSubmitting">درخواست بررسی و استعلام قیمت</span><span xyz-show="isSubmitting" style="display: none;">در حال ارسال...</span></button>
            </div>
            <div xyz-show="submitSuccess" class="py-8 text-center" style="display: none;"><div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-emerald-500/10 text-emerald-400">✓</div><h3 class="mt-5 text-xl font-bold text-white">درخواست شما ثبت شد</h3><p class="mt-3 text-sm leading-7 text-neutral-300" xyz-text="successMessage"></p></div>
        </form>
    </div>
</section>
