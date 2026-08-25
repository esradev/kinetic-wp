import Alpine from "alpinejs";
import { romonetHeader } from "./header-component.js";
import { romonetFooter, romonetToast } from "./footer-component.js";
import { romonetFrontPage } from "./front-page-component.js";

Alpine.prefix("xyz-");

// رجیستر کردن کامپوننت هدر شما
Alpine.data("romonetHeader", romonetHeader);
Alpine.data("romonetFooter", romonetFooter);
Alpine.data("romonetToast", romonetToast);
Alpine.data("romonetFrontPage", romonetFrontPage);

// استارت آلپاین
Alpine.start();
