import Alpine from "alpinejs";
import { romonetHeader } from "./header-component.js";
import { romonetFooter, romonetToast } from "./footer-component.js";
import { romonetFrontPage } from "./front-page-component.js";
import { romonetDesignPricing } from "./design-pricing-component.js";
import { romonetMaintenancePricing } from "./maintenance-pricing-component.js";
import { romonetContact } from "./contact-component.js";
import { romonetShop } from "./shop-component.js";
import { romonetCheckout } from "./checkout-component.js";
import { romonetWooCommerceDevelopment } from "./woocommerce-development-component.js";

Alpine.prefix("xyz-");

// رجیستر کردن کامپوننت هدر شما
Alpine.data("romonetHeader", romonetHeader);
Alpine.data("romonetFooter", romonetFooter);
Alpine.data("romonetToast", romonetToast);
Alpine.data("romonetFrontPage", romonetFrontPage);
Alpine.data("romonetDesignPricing", romonetDesignPricing);
Alpine.data("romonetMaintenancePricing", romonetMaintenancePricing);
Alpine.data("romonetContact", romonetContact);
Alpine.data("romonetShop", romonetShop);
Alpine.data("romonetCheckout", romonetCheckout);
Alpine.data("romonetWooCommerceDevelopment", romonetWooCommerceDevelopment);

// استارت آلپاین
Alpine.start();
