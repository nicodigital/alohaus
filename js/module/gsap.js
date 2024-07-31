import { gsap } from "gsap";

export function animEnter( container ) {
  container.classList.remove('first-load');
  return gsap.from(container, { autoAlpha: 0, duration: 1, y: 20, clearProps: "all" } );
}

export function animLeave( container ) {
  return gsap.to( container, { autoAlpha: 0, duration: 0.5, y: -20 } );
}
