import Swiper from 'swiper';
import {  Autoplay, Pagination } from 'swiper/modules';

function customSwiper() {
  var swiper = new Swiper("#clients", {
    modules: [ Autoplay , Pagination ],
    spaceBetween: 0,
    // centeredSlides: true,
    loop: true,
    autoplay: {
      delay: 3500,
      disableOnInteraction: false,
    },
    speed: 750,
    // effect: "fade",
    // allowTouchMove: false
    pagination: {
    	el: '.custom-pagination',
      type: "fraction",
    	clickable: true,
    },
    breakpoints: {
      640: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 3,
      },
      1024: {
        slidesPerView: 6,
      },
    },
  });
}

export default customSwiper;
