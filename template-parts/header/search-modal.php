<div id="header-search-modal" xyz-show="isSearchOpen" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;" role="dialog" aria-modal="true" aria-labelledby="header-search-title">
	<div class="absolute inset-0 bg-black/75 backdrop-blur-sm" xyz-on:click="isSearchOpen = false"></div>
	<div class="relative mx-auto mt-20 w-[calc(100%-2rem)] max-w-2xl rounded-2xl p-4 shadow-2xl sm:mt-28 sm:p-6" style="background-color: var(--rm-drawer-bg);">
		<div class="mb-4 flex items-center justify-between gap-4">
			<h2 id="header-search-title" class="text-lg font-bold" style="color: var(--text-primary, #ffffff);">جستجو</h2>
			<button type="button" xyz-on:click="isSearchOpen = false" class="rm-header-control flex h-10 w-10 items-center justify-center rounded-xl" aria-label="بستن جستجو">
				<svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m6 6 12 12M18 6 6 18"/></svg>
			</button>
		</div>

		<label for="header-search-input" class="sr-only">عبارت جستجو</label>
		<div class="rm-header-control flex items-center gap-3 rounded-xl px-4">
			<svg class="h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="11" cy="11" r="7"/><path d="m20 20-4-4"/></svg>
			<input id="header-search-input" xyz-ref="searchInput" xyz-model="searchQuery" type="search" class="min-w-0 flex-1 bg-transparent py-3 text-sm outline-none" style="color: var(--text-primary, #ffffff);" placeholder="عبارت مورد نظر را وارد کنید..." autocomplete="off">
			<svg xyz-show="isSearchLoading" class="h-5 w-5 shrink-0 animate-spin text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M21 12a9 9 0 1 1-6.219-8.56"/></svg>
		</div>

		<p xyz-show="searchError" xyz-text="searchError" class="mt-3 text-sm text-red-400"></p>
		<div xyz-show="!isSearchLoading && searchQuery.trim().length > 0 && searchQuery.trim().length < 2" class="mt-4 text-sm" style="color: var(--text-muted, #9ca3af);">حداقل دو حرف وارد کنید.</div>
		<div xyz-show="!isSearchLoading && searchQuery.trim().length >= 2 && !searchError && searchResults.length === 0" class="mt-4 text-sm" style="color: var(--text-muted, #9ca3af);">نتیجه‌ای پیدا نشد.</div>

		<div xyz-show="searchResults.length > 0" class="mt-4 grid gap-2">
			<template xyz-for="result in searchResults" xyz-bind:key="result.id">
				<a xyz-bind:href="result.url" xyz-on:click="isSearchOpen = false" class="rm-nav-link block rounded-xl border p-3" style="border-color: var(--border-subtle, rgba(255, 255, 255, 0.1));">
					<span class="block text-sm font-bold" xyz-text="result.title"></span>
					<span class="mt-1 block text-xs" style="color: var(--text-muted, #9ca3af);" xyz-text="result.excerpt || result.type"></span>
				</a>
			</template>
		</div>
	</div>
</div>
