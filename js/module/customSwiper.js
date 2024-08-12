import Swiper from 'swiper';
import { Autoplay, Pagination } from 'swiper/modules';

function customSwiper(device_data) {

  const CLIENTS = document.querySelector("#clients");

  if ( CLIENTS ) {
    
    let customPagination;

    if( device_data.isDesktop === true ) {
      customPagination = ".custom-pag-desktop";
    }else{
      customPagination = ".custom-pag-mobile";
    }

    var swiper = new Swiper("#clients", {
      modules: [Autoplay, Pagination],
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
        el: customPagination,
        type: "fraction",
        clickable: true,
      },
      breakpoints: {
        0: {
          slidesPerView: 1.7,
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

}

export default customSwiper;
