import barba from '@barba/core';
import barbaPrefetch from '@barba/prefetch';
import { brandIntro, animTitle, pageOut, heroBackOut } from './gsap.js'
import lenisScroll from './lenisScroll.js';
import cursor from './cursor.js';
import menuMobile from './menuMobile.js';
import scrollMarkers from './scrollMarkers.js';
import customSwiper from './customSwiper.js';
import accordion from './accordion.js';
import servicios from './servicios.js';
import filters from './filters.js';
import caseToggle from './caseToggle.js';
import animations from './animations.js';
// import modal from './modal.js';
// import cookies from './cookies.js';

function motion( page, device_data  ) {

  barba.use(barbaPrefetch);

  function globalFunctions(container) {
    lenisScroll(container)
    cursor(container);
    menuMobile(device_data);
    animations(container);
    scrollMarkers(device_data.body, device_data.platform, device_data.isMobile, device_data.isDesktop, device_data.isTablet);
  }


  barba.init({
    // cacheFirstPage: true,
    debug: true,
    sync: true,
    timeout: 8000, // default is 2000ms
    prevent: ({ event, href }) => {

      // Prevenir la transición de Barba.js si la URL termina con '#top'
      if ( href.includes('#') ) { 
        return true
      }

      if ( !href.includes('http') ) { 
        return true
      }
  
      return false;
    },
    transitions: [
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
          // caseCardAnim(next.container)

          if( device_data.isDesktop === true ) {
            animTitle( next.container )
          }else{
            accordion();
          }

          window.scrollTo(0, 0)

        },
        leave: ( { current } ) => {
            console.log("LEAVE HOME");
            pageOut( current.container );
            return new Promise( resolve => {
                setTimeout(() => {
                    resolve();
                }, 400);
            });

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
          console.log("ONCE PROYECTOS")
          globalFunctions(next.container)
          filters();
        },
        leave: ( { current } ) => {
            console.log("LEAVE PROYECTOS")
            pageOut( current.container )
            heroBackOut( current.container )
            return new Promise( resolve => {
                setTimeout(() => {
                    resolve();
                }, 400);
            });
 
        },
        enter: ( { next } ) => {
          console.log("ENTER PROYECTOS");
          globalFunctions(next.container)
          filters();
          window.scrollTo(0, 0)
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
            pageOut( current.container )
            heroBackOut( current.container )
            return new Promise( resolve => {
                setTimeout(() => {
                    resolve();
                }, 400);
            });
        },
        enter: ( { next } ) => {
          console.log("ENTER CASE");
          globalFunctions(next.container)
          caseToggle(next.container)
          window.scrollTo(0, 0)
        }
      },
    ]
  });

}

export default motion;

