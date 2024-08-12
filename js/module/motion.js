import barba from '@barba/core';
import barbaPrefetch from '@barba/prefetch';
import { brandIntro, animTitle } from './gsap.js'
import lenisScroll from './lenisScroll.js';
import cursor from './cursor.js';
import menuMobile from './menuMobile.js';
import scrollMarkers from './scrollMarkers.js';
import customSwiper from './customSwiper.js';
import accordion from './accordion.js';
import servicios from './servicios.js';
import filters from './filters.js';
import animations from './animations.js';
// import modal from './modal.js';
// import cookies from './cookies.js';

function motion( page, device_data  ) {

  barba.use(barbaPrefetch);

  function globalFunctions() {
    lenisScroll()
    cursor(device_data.body);
    menuMobile(device_data.html,device_data.body);
    animations();
    scrollMarkers(device_data.body, device_data.platform, device_data.isMobile, device_data.isDesktop, device_data.isTablet);
  }

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
      // DEFAULT
      {
        name: 'default',
        once( next ){
          console.log("ONCE DEFAULT");
          globalFunctions()
        },
        leave: ({current}) => {
          console.log("LEAVE DEFAULT");
          globalFunctions()
        },
        enter: ({next}) => {
          console.log("ENTER DEFAULT");
          globalFunctions()
        }
      },
      // HOME
      {
        name: 'Home',
        to: {
          namespace: 'home',
        },
        once( {next} ){
          console.log("ONCE HOME");
          globalFunctions()
          brandIntro(next.container)
          customSwiper(device_data.isDesktop) 

          if( device_data.isDesktop === true ) {
            animTitle( next.container )
          }else{
            accordion();
          }

          if( page === "home" ) {
            servicios(device_data);
          }
          
        },
        leave: ( current ) => {
            console.log("LEAVE HOME");
          // animLeave( current.container )
        },
        enter: ( next ) => {
          console.log("ENTER HOME");
          if( device_data.isDesktop === true ) {
            animTitle( next.container )
          }

          // animations();
          // accordion();
          // filters();

          // if (htmx) {
          //   htmx.process(next.container);
          // } else {
          //   console.error('HTMX is not defined');
          // }

          //window.scrollTo(0, 0); // Force Scroll to top
   
        }

      },
      // PROYECTOS
      // HOME
      {
        name: 'Proyectos',
        to: {
          namespace: 'proyectos',
        },
        once( {next} ){
          console.log("ONCE PROYECTOS");
          globalFunctions()
          filters();
        },
        leave: ( current ) => {
            console.log("LEAVE PROYECTOS");

        },
        enter: ( next ) => {
          console.log("ENTER PROYECTOS");
         
        }
      },
    ]
  });

}

export default motion;

