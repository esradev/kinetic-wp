import { defineConfig } from "vite";

export default defineConfig({
  build: {
    outDir: "assets",
    emptyOutDir: false, // جلوگیری از پاک شدن سایر فایل‌های موجود در پوشه assets
    rollupOptions: {
      input: "src/js/app.js",
      output: {
        entryFileNames: "js/app.bundle.js",
      },
    },
  },
});
