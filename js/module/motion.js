import barba from '@barba/core';
import barbaPrefetch from '@barba/prefetch';
import { brandIntro, animEnter, animLeave } from './gsap.js'

function motion( page, device_data, animations, accordion, customSwiper, modal, lenisScroll, htmx ) {

  barba.use(barbaPrefetch);

  barba.init({
    // cacheFirstPage: true,
    debug: true,
    sync: true,
    prevent: ({ event, href }) => {

      // Prevenir la transición de Barba.js si el enlace tiene la clase 'barba-ignore'
      let barbaIgnore = document.querySelector('.barba-ignore');

      if( barbaIgnore.lenght > 0 ) {
        if ( event.target.classList.contains('barba-ignore')) {
          return true;
        }
      }
      
      // Prevenir la transición de Barba.js si la URL termina con '#top'
      if (href.endsWith('#top')) {
        return true;
      }
  
      return false;
    },
    transitions: [
      {
        once( {next} ){
          // console.log(next.container);
          brandIntro()
        },
        leave: ({current}) => animLeave( current.container ),
        enter: ({next}) => {
          // console.log(next.container);
          animEnter( next.container );
          animations();
          accordion();
          modal();
          lenisScroll();
          // filters();

          if (htmx) {
            htmx.process(next.container);
          } else {
            console.error('HTMX is not defined');
          }

          page === "home" ? customSwiper() : null;

          window.scrollTo(0, 0); // Force Scroll to top
   
        }
      },
    ]
  });

}

export default motion;

