import barba from '@barba/core';
import barbaPrefetch from '@barba/prefetch';
import { brandIntro, animTitle, pageTrans } from './gsap.js'
import lenisScroll from './lenisScroll.js';
import cursor from './cursor.js';
import menuMobile from './menuMobile.js';
import scrollMarkers from './scrollMarkers.js';
import customSwiper from './customSwiper.js';
import accordion from './accordion.js';
import servicios from './servicios.js';
import filters from './filters.js';
import caseToggle from './caseToggle.js';
// import animations from './animations.js';
// import modal from './modal.js';
// import cookies from './cookies.js';

function motion( page, device_data  ) {

  barba.use(barbaPrefetch);

  function globalFunctions(container) {
    lenisScroll(container)
    cursor(container);
    menuMobile(device_data);
    // animations();
    scrollMarkers(device_data.body, device_data.platform, device_data.isMobile, device_data.isDesktop, device_data.isTablet);
  }

  barba.init({
    // cacheFirstPage: true,
    debug: true,
    sync: true,
    prevent: ({ event, href }) => {

      // Prevenir la transición de Barba.js si el enlace tiene la clase 'barba-ignore'
      let barbaIgnore = document.querySelectorAll('.barba-ignore');

      if( barbaIgnore.lenght > 0 ) {
        if ( event.target.classList.contains('barba-ignore')) {
          return true;
        }
      }
      
      // Prevenir la transición de Barba.js si la URL termina con '#top'
      if ( href.includes('#') ) { 
        return true
      }
  
      return false;
    },
    transitions: [
      // DEFAULT
      {
        name: 'default',
        once( { next } ){
          console.log("ONCE DEFAULT");
          globalFunctions(next.container)
        },
        leave: ({ current }) => {
          console.log("LEAVE DEFAULT");
          globalFunctions(next.container)
        },
        enter: ({ next }) => {
          console.log("ENTER DEFAULT");
          globalFunctions(next.container)
        }
      },
      // HOME
      {
        name: 'Home',
        to: {
          namespace: 'home',
        },
        once( { next } ){
          console.log("ONCE HOME");
          globalFunctions(next.container)
          brandIntro(next.container)
          customSwiper(device_data.isDesktop) 
          servicios(device_data)

          if( device_data.isDesktop === true ) {
            animTitle( next.container )
          }else{
            accordion();
          }

          window.scrollTo(0, 0)

        },
        leave: ( { current } ) => {
            console.log("LEAVE HOME");
            
        },
        enter: ( { next } ) => {
          console.log("ENTER HOME");
          // console.log(next.container )
          globalFunctions(next.container)
          brandIntro(next.container)
          customSwiper(device_data.isDesktop) 
          servicios(device_data)
          if( device_data.isDesktop === true ) {
            animTitle( next.container )
          }
          window.scrollTo(0, 0)
        }
      },
      // PROYECTOS
      {
        name: 'Proyectos',
        to: {
          namespace: 'proyectos',
        },
        once( { next } ){
          console.log("ONCE PROYECTOS");
          globalFunctions(next.container)
          filters();
        },
        leave: ( { current } ) => {
            console.log("LEAVE PROYECTOS");

            return new Promise( resolve => {
              pageTrans(current.container, "in")
                setTimeout(() => {
                    resolve();
                }, 300);
            });
 
        },
        enter: ( { next } ) => {
          console.log("ENTER PROYECTOS");

          return new Promise( resolve => {
              setTimeout(() => {
                  resolve();
                  pageTrans(next.container, "out")
                  globalFunctions(next.container)
                  filters();
                  window.scrollTo(0, 0)
              }, 600);
          });
         
        }
      },
      // CASE
      {
        name: 'Case',
        to: {
          namespace: 'case',
        },
        once( { next } ){
          console.log("ONCE CASE");
          globalFunctions(next.container)
          caseToggle(next.container)
        },
        leave: ( { current } ) => {
            console.log("LEAVE CASE")
            // globalFunctions(current.container)
            return new Promise( resolve => {
              pageTrans(current.container, "in")
                setTimeout(() => {
                    resolve();
                }, 600);
            });
        },
        enter: ( { next } ) => {
          console.log("ENTER CASE");
          globalFunctions(next.container)
          caseToggle(next.container)
          pageTrans(next.container, "out")
          window.scrollTo(0, 0)
        }
      },
    ]
  });

}

export default motion;

