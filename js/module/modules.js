import menuMobile from './menuMobile.js';
import scrollMarkers from './scrollMarkers.js';
import customRellax from './customRellax.js';
import customSwiper from './customSwiper.js';
import modal from './modal.js';
import accordion from './accordion.js';
import cookies from './cookies.js';
import animations from './animations.js';
import alertRotateDevice from './alertRotateDevice.js';
// import goTo from './goTo.js'; // Depende de Jump.js
// import filters from './filters.js';
// import imgFadeInLoad from './imgFadeInLoad.js';
// import getUrlParams from './getUrlParams.js';

function modules(body, platform, isMobile, isDesktop, isBigTablet, isTablet) {

  const results = {};

    results.scrollMarkers = scrollMarkers(body, platform, isMobile, isDesktop, isTablet);

    results.menuMobile = menuMobile();
    results.customSwiper = customSwiper();
    results.cookies = cookies();
    results.modal = modal();
    results.accordion = accordion();
    results.customRellax = customRellax();
    results.animations = animations();
    results.alertRotateDevice = alertRotateDevice(isDesktop, isBigTablet, isMobile);
    // results.filters = filters();
    // results.getUrlParams = getUrlParams();
    // results.goTo = goTo();

  // Retornamos los resultados
  return results;

}

export default modules;
