import Lenis from '@studio-freight/lenis'

function lenisScroll(container) {
  const lenis = new Lenis({
    smoothWheel: true,
    wheelMultiplier: 1,
    duration: 1,
    easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
    smoothTouch: false, // Mobile
    touchMultiplier: 2, // Sensibility on mobile
    infinite: false // Infinite scrolling
  });

  const smoothLinks = container.querySelectorAll('.anchor');

  smoothLinks.forEach(link => {
    let anchor = link.getAttribute('href');
    link.addEventListener('click', (e) => {
      e.preventDefault();

      // Obtener la posición del elemento objetivo
      const targetElement = document.querySelector(anchor);
      const targetPosition = targetElement.getBoundingClientRect().top + window.scrollY;

      // Obtener la posición actual del scroll
      const currentScrollPosition = window.scrollY;

      // Obtener el valor de la variable CSS --header-height
      let headerHeight = getComputedStyle(document.documentElement).getPropertyValue('--header-height');

      // Convertir el valor de rem a píxeles si es necesario
      if (headerHeight.includes('rem')) {
        const rootFontSize = parseFloat(getComputedStyle(document.documentElement).fontSize);
        headerHeight = parseFloat(headerHeight) * rootFontSize;
      } else {
        headerHeight = parseFloat(headerHeight); // Asumir que está en píxeles si no tiene rem
      }

      // Determinar si el target está en una posición superior al scroll actual
      let scrollTargetPosition = targetPosition;

      // Si estás scrolleando hacia arriba (target está más arriba que el scroll actual), resta la altura del header
      if (currentScrollPosition > targetPosition) {
        scrollTargetPosition -= headerHeight;
      }

      // Hacer scroll a la posición calculada
      lenis.scrollTo(scrollTargetPosition, {
        duration: 2, // Puedes ajustar la duración según tus necesidades
        easing: (t) => 1 - Math.pow(1 - t, 6) // Ejemplo de una función de easing personalizada
      });

    });
  });

  function raf(time) {
    lenis.raf(time);
    requestAnimationFrame(raf);
  }

  requestAnimationFrame(raf);
}


export default lenisScroll