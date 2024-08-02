import htmx from "htmx.org";

/* ////////////////////////COMPONENTS ///////////////////////// */
import PictureItem from './components/PictureItem.js';
import accordionItem from './components/accordionItem.js';
import modalItem from './components/modalItem.js';

/* ///////////////////////// MODULES ///////////////////////// */
import lenisScroll from './module/lenisScroll.js';
import getDevice from './module/getDevice.js';
import menuMobile from './module/menuMobile.js';
import scrollMarkers from './module/scrollMarkers.js';
import customSwiper from './module/customSwiper.js';
import modal from './module/modal.js';
import accordion from './module/accordion.js';
import cookies from './module/cookies.js';
// import filters from './module/filters.js';

/*Animations*/
import animations from './module/animations.js';
import motion from './module/motion.js';

import preventZoom from './module/preventZoom.js';
import alertRotateDevice from './module/alertRotateDevice.js';
// import customRellax from './module/customRellax.js';
// import getUrlParams from './module/getUrlParams.js';

/*/////////////////////////////////////////////////////////////////////*/
/*////////////////////////// GET URL, PATH  ///////////////////////////*/
/*/////////////////////////////////////////////////////////////////////*/
const host = document.location.host;
const protocol = document.location.protocol;
const curr_domain = protocol + '//' + host;
const pathname = window.location.pathname; // Returns path only
const url = window.location.href; // Returns full URL
const page = document.querySelector('body').dataset.page;
const site_type = document.querySelector('body').dataset.site_type;
const platform = document.querySelector('html').dataset.platform;
const container = document.querySelector('.row');
const container_gap = getComputedStyle(container).getPropertyValue('grid-gap');
const gap = parseInt(container_gap.substring(0, 2));
let hard_domain = "";

/*/////////////////////////////////////////////////////////////////////*/
/*///////////////////////// SERVICE WORKER ////////////////////////////*/
/*/////////////////////////////////////////////////////////////////////*/

if ('serviceWorker' in navigator) {
	navigator.serviceWorker.register(hard_domain + 'sw.js')
		.then(reg => console.log('Registro de SW exitoso', reg))
		.catch(err => console.warn('Error al tratar de registrar el sw', err))
}

/*/////////////////////////////////////////////////////////////////////*/
/*/////////////////////////// DEVICE DATA /////////////////////////////*/
/*/////////////////////////////////////////////////////////////////////*/

const device_data = getDevice();

const html = device_data.html;
const body = device_data.body;
let winH = device_data.winH;
let winW = device_data.winW;
let docH = device_data.docH;
let header = device_data.header;
let isDesktop = device_data.isDesktop;
let isMobile = device_data.isMobile;
let isTablet = device_data.isTablet;
let isBigTablet = device_data.isBigTablet;
let headerH = device_data.headerH;

/* Ejecutar el getDevice si cambia el tamaño del navegador o rota el dispositivo */
window.addEventListener("resize", getDevice);
window.addEventListener("orientationchange", getDevice);

/*/////////////////////////////////////////////////////////////////////*/
/*/////////////////////////////// EXEC ////////////////////////////////*/
/*/////////////////////////////////////////////////////////////////////*/

// 1ero. Cargamos los componentes antes de cargar el DOM
PictureItem();
accordionItem();
modalItem();

// 2do. Cargamos los módulos después que el DOM esté completamente cargado
document.addEventListener('DOMContentLoaded', function () {

	lenisScroll();
	scrollMarkers(body, platform, isMobile, isDesktop, isTablet);
	
	menuMobile();
	customSwiper();
	cookies();
	modal();
	// customRellax();
	// filters();

	// Pasamos las funciones a Barba.js
	motion( page, device_data, animations, accordion, customSwiper, modal, lenisScroll, htmx );

	// getUrlParams();
	// goTo();
	// imgFadeInLoad();
	accordion();
	animations();
	preventZoom();
	alertRotateDevice(isDesktop, isBigTablet, isMobile);

	
});

// Ejecutar animaciones cuando HTMX carga nuevo contenido
document.body.addEventListener('htmx:afterRequest', (event) => {
	// console.log("HTMX afterSettle event triggered");  // Log para depuración
  animations();
});


// Testing HTMX
// document.body.addEventListener('htmx:load', function (evt) {
//   htmx.logAll();
// });