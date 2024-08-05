import { gsap } from "gsap";
import SplitType from 'split-type'

export function brandIntro( container ) {
  
  return gsap.timeline()
  .to( "#A", { scale: 1, duration: 1, ease: "power2.out" } )
  .to( "#A path", { fill: "var(--orange)", duration: .3, ease: "power2.out" }, "-=.6" )
  .to( "#A", { rotate: 0, scale: 1, duration: .6, ease: "power2.out" }, "=.1" )
  .to( "#A", {translateX: 0, duration: .5, ease: "power2.out" } )
  .fromTo( "#L", { translateX: "-5vw", autoAlpha: 0 }, { translateX: "0", autoAlpha: 1, duration: .6, ease: "power2.out" }, "-=.45" )
  .fromTo( "#O", { translateX: "-5vw", autoAlpha: 0 }, { translateX: "0", autoAlpha: 1, duration: .6, ease: "power2.out" }, "-=.45" )
  .fromTo( "#H", { translateX: "-5vw", autoAlpha: 0 }, { translateX: "0", autoAlpha: 1, duration: .6, ease: "power2.out" }, "-=.45" )
  .fromTo( "#A2", { translateX: "-5vw", autoAlpha: 0 }, { translateX: "0", autoAlpha: 1, duration: .6, ease: "power2.out" }, "-=.45" )
  .fromTo( "#U", { translateX: "-5vw", autoAlpha: 0 }, { translateX: "0", autoAlpha: 1, duration: .6, ease: "power2.out" }, "-=.45" )
  .fromTo( "#S", { translateX: "-5vw", autoAlpha: 0 }, { translateX: "0", autoAlpha: 1, duration: .6, ease: "power2.out" }, "-=.45" )
  // .to( "#A", {translateY: 0, duration: .75, ease: "power2.out" } )

}

export function heroTitle( container ) {
  
  const heroTitle1 = new SplitType('#hero-title-1');
  const heroTitle2 = new SplitType('#hero-title-2');

  return gsap.timeline()
  .to( "#hero-title-1 .char", { y: 0, stagger: 0.05, delay: 0.2, duration: .2, ease: "power2.out" } )
  .to( "#hero-title-1 .char", { yPercent: -107, stagger: 0.05, delay: 0.2, duration: .2, ease: "power2.out" } )
  .to( "#hero-title-2 .char", { y: 0, stagger: 0.05, delay: 0.2, duration: .2, ease: "power2.out" }, "-=1.7" );

}

export function animEnter( container ) {
  container.classList.remove('first-load');
  return gsap.from(container, { autoAlpha: 0, duration: 1, y: 20, clearProps: "all" } );
}

export function animLeave( container ) {
  return gsap.to( container, { autoAlpha: 0, duration: 0.5, y: -20 } );
}
