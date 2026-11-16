<section id="inquiry" class="scroll-mt-24">
    <div class="mx-auto grid max-w-7xl gap-12 px-4 py-20 sm:px-6 lg:grid-cols-[0.8fr_1.2fr] lg:items-start lg:px-8">
        <div>
            <p class="text-sm font-semibold text-amber-400">درخواست بررسی پروژه</p>
            <h2 class="mt-3 text-3xl font-bold leading-[1.45] text-white sm:text-4xl">برای دریافت برآورد هزینه، از نیازتان بگویید</h2>
            <p class="mt-5 text-sm leading-8 text-neutral-400">اطلاعات اولیه پروژه را ارسال کنید. پس از بررسی، درباره مسیر مناسب اجرا و محدوده تقریبی کار با شما تماس می‌گیریم.</p>
            <div class="mt-8 space-y-4 text-sm text-neutral-300">
                <p class="flex gap-3"><span class="text-amber-400">۱</span> نوع کسب‌وکار و هدف سایت را مشخص کنید.</p>
                <p class="flex gap-3"><span class="text-amber-400">۲</span> امکانات و نمونه‌های موردنظر را توضیح دهید.</p>
                <p class="flex gap-3"><span class="text-amber-400">۳</span> برای گفت‌وگوی دقیق‌تر، شماره تماس خود را وارد کنید.</p>
            </div>
        </div>

        <form xyz-on:submit.prevent="submitBooking()" class="rounded-2xl border border-white/10 bg-white/[0.03] p-6 sm:p-8">
            <div xyz-show="!submitSuccess" class="space-y-5">
                <div class="grid gap-5 sm:grid-cols-2">
                    <label class="block text-sm text-neutral-300">نام و نام خانوادگی *
                        <input type="text" xyz-model="customerName" required autocomplete="name" class="mt-2 w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none transition focus:border-amber-400" placeholder="مثال: علی احمدی">
                    </label>
                    <label class="block text-sm text-neutral-300">شماره تماس *
                        <input type="tel" xyz-model="customerPhone" required autocomplete="tel" inputmode="tel" dir="ltr" class="mt-2 w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-left text-sm text-white outline-none transition focus:border-amber-400" placeholder="09123456789">
                    </label>
                </div>
                <label class="block text-sm text-neutral-300">نوع وب‌سایت موردنیاز *
                    <select xyz-model="projectType" required class="mt-2 w-full rounded-xl border border-white/10 bg-[#11131c] px-4 py-3 text-sm text-white outline-none transition focus:border-amber-400">
                        <option value="شرکتی / آژانسی">سایت شرکتی یا خدماتی</option>
                        <option value="فروشگاه تخصصی ووکامرس">فروشگاه اینترنتی</option>
                        <option value="هدلس Next.js">سایت با امکانات اختصاصی</option>
                    </select>
                </label>
                <label class="block text-sm text-neutral-300">امکانات یا توضیحات پروژه
                    <textarea xyz-model="projectDetails" rows="4" class="mt-2 w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm leading-7 text-white outline-none transition focus:border-amber-400" placeholder="هدف سایت، امکانات مهم یا نمونه‌های موردنظر را بنویسید."></textarea>
                </label>
                <label class="block text-sm text-neutral-300">بودجه تقریبی <span class="text-neutral-500">(اختیاری)</span>
                    <input type="text" xyz-model="budget" inputmode="numeric" class="mt-2 w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none transition focus:border-amber-400" placeholder="در صورت تمایل وارد کنید">
                </label>
                <p xyz-show="submitError" xyz-text="submitError" class="text-sm leading-6 text-rose-300" style="display: none;"></p>
                <button type="submit" xyz-bind:disabled="isSubmitting" class="inline-flex min-h-12 w-full items-center justify-center rounded-xl bg-amber-500 text-sm font-bold text-black transition hover:bg-amber-400 disabled:cursor-not-allowed disabled:opacity-70">
                    <span xyz-show="!isSubmitting">درخواست بررسی و برآورد هزینه</span>
                    <span xyz-show="isSubmitting" style="display: none;">در حال ارسال...</span>
                </button>
            </div>
            <div xyz-show="submitSuccess" class="py-8 text-center" style="display: none;">
                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-emerald-500/10 text-emerald-400">✓</div>
                <h3 class="mt-5 text-xl font-bold text-white">درخواست شما ثبت شد</h3>
                <p class="mt-3 text-sm leading-7 text-neutral-300" xyz-text="successMessage"></p>
            </div>
        </form>
    </div>
</section>
