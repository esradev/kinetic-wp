import Alpine from "alpinejs";
import { romonetHeader } from "./header-component.js";

// تخصیص آلپاین به دامنه Window در صورت نیاز افزونه‌های دیگر
// window.Alpine = Alpine;

Alpine.prefix("xyz-");

// رجیستر کردن کامپوننت هدر شما
Alpine.data("romonetHeader", romonetHeader);

// استارت آلپاین
Alpine.start();
