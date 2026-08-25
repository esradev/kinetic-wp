<div
  xyz-data="romonetToast()"
  xyz-show="visible"
  xyz-cloak
  xyz-transition:enter="transition ease-out duration-300"
  xyz-transition:enter-start="opacity-0 translate-y-5"
  xyz-transition:enter-end="opacity-100 translate-y-0"
  xyz-transition:leave="transition ease-in duration-200"
  xyz-transition:leave-start="opacity-100 translate-y-0"
  xyz-transition:leave-end="opacity-0 translate-y-5"
  xyz-on:show-toast.window="triggerToast($event.detail)"
  class="fixed bottom-6 right-6 z-50"
  dir="rtl"
  style="display: none;">
  <div class="glass-panel px-4 py-3 rounded-2xl border border-amber-500/40 shadow-2xl bg-[#0f121d]/95 backdrop-blur-xl flex items-center gap-3 text-xs text-white font-medium max-w-sm">
    <div class="p-1.5 rounded-lg bg-amber-500/20 text-amber-400 shrink-0">
      <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"></path>
      </svg>
    </div>
    <p class="flex-1 leading-relaxed" xyz-text="message"></p>
  </div>
</div>