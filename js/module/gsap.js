import { gsap } from "gsap";
import SplitType from 'split-type'

export function brandIntro( container ) {

  const heroTitle1 = new SplitType('#hero-title-1');
  const heroTitle2 = new SplitType('#hero-title-2');
  
  return gsap.timeline()
  .to( ".brand-intro", { translateY: 0, duration: .6, ease: "power2.out" })
  .to( "#A path", { fill: "var(--orange)", duration: .3, ease: "power2.out" }, "-=.1"  )
  .to( "#A", { rotate: 0, scale: 1, duration: .6, ease: "power2.out" }, "-=.1")
  .to( "#A", {translateX: 0, duration: .5, ease: "power2.out" } )
  .fromTo( "#L", { translateX: "-5vw", autoAlpha: 0 }, { translateX: "0", autoAlpha: 1, duration: .6, ease: "power2.out" }, "-=.45" )
  .fromTo( "#O", { translateX: "-5vw", autoAlpha: 0 }, { translateX: "0", autoAlpha: 1, duration: .6, ease: "power2.out" }, "-=.45" )
  .fromTo( "#H", { translateX: "-5vw", autoAlpha: 0 }, { translateX: "0", autoAlpha: 1, duration: .6, ease: "power2.out" }, "-=.45" )
  .fromTo( "#A2", { translateX: "-5vw", autoAlpha: 0 }, { translateX: "0", autoAlpha: 1, duration: .6, ease: "power2.out" }, "-=.45" )
  .fromTo( "#U", { translateX: "-5vw", autoAlpha: 0 }, { translateX: "0", autoAlpha: 1, duration: .6, ease: "power2.out" }, "-=.45" )
  .fromTo( "#S", { translateX: "-5vw", autoAlpha: 0 }, { translateX: "0", autoAlpha: 1, duration: .6, ease: "power2.out" }, "-=.45" )
  .to( ".line-txt span", {translateY: 0, duration: .6, stagger: .04, ease: "power2.out" }, "-=.2" )
  .to( "#A", {translateY: "-18rem", duration: .4, ease: "power2.out" } )
  .to( "#L", {translateY: "-18rem", duration: .4, ease: "power2.out" }, "-=.35" )
  .to( "#O", {translateY: "-18rem", duration: .4, ease: "power2.out" }, "-=.35" )
  .to( "#H", {translateY: "-18rem", duration: .4, ease: "power2.out" }, "-=.35" )
  .to( "#A2", {translateY: "-18rem", duration: .4, ease: "power2.out" }, "-=.35" )
  .to( "#U", {translateY: "-18rem", duration: .4, ease: "power2.out" }, "-=.35" )
  .to( "#S", {translateY: "-18rem", duration: .4, ease: "power2.out" }, "-=.35" )
  .to( "#hero-title-1 .char", { y: 0, stagger: 0.05, delay: 0.2, duration: .2, ease: "power2.out" }, "-=1" )
  .to( "#hero-title-1 .char", { yPercent: -107, stagger: 0.05, delay: 0.2, duration: .2, ease: "power2.out" } )
  .to( "#hero-title-2 .char", { y: 0, stagger: 0.05, delay: 0.2, duration: .2, ease: "power2.out" }, "-=1.7" )
  .to( ".brand path:nth-child(7)", {translateY: "0", duration: .4, ease: "power2.out" } )
  .to( ".brand path:nth-child(6)", {translateY: "0", duration: .4, ease: "power2.out" }, "-=.35" )
  .to( ".brand path:nth-child(5)", {translateY: "0", duration: .4, ease: "power2.out" }, "-=.35" )
  .to( ".brand path:nth-child(4)", {translateY: "0", duration: .4, ease: "power2.out" }, "-=.35" )
  .to( ".brand path:nth-child(3)", {translateY: "0", duration: .4, ease: "power2.out" }, "-=.35" )
  .to( ".brand path:nth-child(2)", {translateY: "0", duration: .4, ease: "power2.out" }, "-=.35" )
  .to( ".brand path:nth-child(1)", {translateY: "0", duration: .4, ease: "power2.out" }, "-=.35" )
  .to( "#menu", {translateY: "0", autoAlpha: 1, duration: .4, ease: "power2.out" }, "-=.75" )
  .to( ".arrow-intro svg", {translateY: "0", translateX: "0", duration: .4, ease: "power2.out" }, "=.3" )

}


export function animEnter( container ) {
  container.classList.remove('first-load');
  return gsap.from(container, { autoAlpha: 0, duration: 1, y: 20, clearProps: "all" } );
}

export function animLeave( container ) {
  return gsap.to( container, { autoAlpha: 0, duration: 0.5, y: -20 } );
}
