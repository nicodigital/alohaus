import barba from '@barba/core';
import barbaPrefetch from '@barba/prefetch';
import { brandIntro, animTitle, pageOut, heroBackOut, homeBack, homeLeave } from './gsap.js'
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

import alertRotateDevice from './alertRotateDevice.js';
// import preventZoom from './module/preventZoom.js';
// import modal from './modal.js';
// import cookies from './cookies.js';

function motion(page, device_data) {

  barba.use(barbaPrefetch);

  let clickedItem = null;
  let clickedItemIndex = null;
  let clickedAnchor = null;

  document.addEventListener('click', (event) => {
    const target = event.target.closest('a');
  
    if (target) {
      clickedItem = target;
      const allLinks = Array.from(document.querySelectorAll('a'));
      clickedItemIndex = allLinks.indexOf(target);
  
      // Obtiene el valor del href
      const href = target.getAttribute('href');
  
      // Extrae el anchor (si existe)
      if (href && href.includes('#')) {
        clickedAnchor = href.split('#')[1]; // Obtiene solo la parte después del '#'
      } else {
        clickedAnchor = null; // No hay anchor en el href
      }
    }
  });
  

  function globalFunctions(container) {
    // lenisScroll(container)
    cursor(container)
    menuMobile(device_data)
    animations(container)
    scrollMarkers(device_data.body, device_data.platform, device_data.isMobile, device_data.isDesktop, device_data.isTablet)
    alertRotateDevice(device_data.isDesktop, device_data.isBigTablet, device_data.isMobile)
  }

  barba.init({
    // cacheFirstPage: true,
    debug: true,
    sync: true,
    timeout: 8000, // default is 2000ms
    transitions: [
      // HOME
      {
        name: 'Home',
        to: {
          namespace: 'home',
        },
        once({ next }) {
          console.log("ONCE HOME");
          lenisScroll(next.container, clickedAnchor )
          globalFunctions(next.container)
          brandIntro(next.container, device_data ) 
          customSwiper(device_data.isDesktop)
          servicios(device_data)
          // caseCardAnim(next.container)

          if (device_data.isDesktop === true) {
            animTitle(next.container)
          } else {
            accordion();
          }

          window.scrollTo(0, 0)

          setTimeout(() => { // Removemos la clase first-load para que saber que ya se ha cargado el ONCE
            document.querySelector('body').classList.remove('once');
          },3000)

        },
        leave: ({ current, next }) => {
          console.log("LEAVE HOME");
          pageOut(current.container)
          return new Promise(resolve => {
            setTimeout(() => {
              resolve();
            }, 400);
          });

        },
        enter: ({ next }) => {
          console.log("ENTER HOME");
          // console.log(next.container )
          lenisScroll(next.container, clickedAnchor )
          globalFunctions(next.container)
          homeLeave(next.container)
         
          customSwiper(device_data.isDesktop)
          servicios(device_data)
          if (device_data.isDesktop === true) {
            animTitle(next.container)
          }

          setTimeout( ()=>  homeBack(next.container) , 100 )
          // window.scrollTo(0, 0)
        }
      },
      // PROYECTOS
      {
        name: 'Proyectos',
        to: {
          namespace: 'proyectos',
        },
        once({ next }) {
          console.log("ONCE PROYECTOS")
          lenisScroll(next.container, clickedAnchor )
          globalFunctions(next.container)
          filters(next.container);
        },
        leave: ({ current }) => {
          console.log("LEAVE PROYECTOS")
          pageOut(current.container)
          heroBackOut(current.container)
          return new Promise(resolve => {
            setTimeout(() => {
              resolve();
            }, 400);
          });

        },
        enter: ({ next }) => {
          console.log("ENTER PROYECTOS");
          lenisScroll(next.container, clickedAnchor )
          globalFunctions(next.container)
          filters(next.container);
          window.scrollTo(0, 0)
        }
      },
      // CASE
      {
        name: 'Case',
        to: {
          namespace: 'case',
        },
        once({ next }) {
          console.log("ONCE CASE");
          lenisScroll(next.container, clickedAnchor )
          globalFunctions(next.container)
          caseToggle(next.container)
        },
        leave: ({ current }) => {
          console.log("LEAVE CASE")
          // globalFunctions(current.container)
          pageOut(current.container)
          heroBackOut(current.container)
          return new Promise(resolve => {
            setTimeout(() => {
              resolve();
            }, 400);
          });
        },
        enter: ({ next }) => {
          console.log("ENTER CASE");
          lenisScroll(next.container, clickedAnchor )
          globalFunctions(next.container)
          caseToggle(next.container)
          window.scrollTo(0, 0)
        }
      },
    ]
  });

}

export default motion;

