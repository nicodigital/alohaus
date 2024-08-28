import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import SplitType from 'split-type'

gsap.registerPlugin(ScrollTrigger)

export function brandIntro( container, device_data ) {

  const heroTitle = new SplitType('#hero-title');
  const brandIntro = container.querySelector( ".brand-intro" );
  let brandTransOut;

  if ( device_data.isIphone ) { 
    brandTransOut = "-37rem";
  } else { 
    brandTransOut = "-20rem";
  }

  if( brandIntro ){
    return gsap.timeline()
    .to( "#hero-title", { opacity: 1, duration: .1 })
    .to( ".hero .brand-intro path:nth-child(7)", {translateY: "0", duration: .4, ease: "power2.out" })
    .to( ".hero .brand-intro path:nth-child(6)", {translateY: "0", duration: .4, ease: "power2.out" }, "-=.35" )
    .to( ".hero .brand-intro path:nth-child(5)", {translateY: "0", duration: .4, ease: "power2.out" }, "-=.35" )
    .to( ".hero .brand-intro path:nth-child(4)", {translateY: "0", duration: .4, ease: "power2.out" }, "-=.35" )
    .to( ".hero .brand-intro path:nth-child(3)", {translateY: "0", duration: .4, ease: "power2.out" }, "-=.35" )
    .to( ".hero .brand-intro path:nth-child(2)", {translateY: "0", duration: .4, ease: "power2.out" }, "-=.35" )
    .to( ".hero .brand-intro path:nth-child(1)", {translateY: "0", duration: .4, ease: "power2.out" }, "-=.35" )
    .to( ".hero .brand-intro path:nth-child(7)", { translateY: brandTransOut, duration: .4, ease: "power2.out" }, "=.3" )
    .to( ".hero .brand-intro path:nth-child(6)", { translateY: brandTransOut, duration: .4, ease: "power2.out" }, "-=.35" )
    .to( ".hero .brand-intro path:nth-child(5)", { translateY: brandTransOut, duration: .4, ease: "power2.out" }, "-=.35" )
    .to( ".hero .brand-intro path:nth-child(4)", { translateY: brandTransOut, duration: .4, ease: "power2.out" }, "-=.35" )
    .to( ".hero .brand-intro path:nth-child(3)", { translateY: brandTransOut, duration: .4, ease: "power2.out" }, "-=.35" )
    .to( ".hero .brand-intro path:nth-child(2)", { translateY: brandTransOut, duration: .4, ease: "power2.out" }, "-=.35" )
    .to( ".hero .brand-intro path:nth-child(1)", { translateY: brandTransOut, duration: .4, ease: "power2.out" }, "-=.35" )
    .to( ".brand path:nth-child(7)", {translateY: "0", duration: .4, ease: "power2.out" }, "-=.4" )
    .to( ".brand path:nth-child(6)", {translateY: "0", duration: .4, ease: "power2.out" }, "-=.35" )
    .to( ".brand path:nth-child(5)", {translateY: "0", duration: .4, ease: "power2.out" }, "-=.35" )
    .to( ".brand path:nth-child(4)", {translateY: "0", duration: .4, ease: "power2.out" }, "-=.35" )
    .to( ".brand path:nth-child(3)", {translateY: "0", duration: .4, ease: "power2.out" }, "-=.35" )
    .to( ".brand path:nth-child(2)", {translateY: "0", duration: .4, ease: "power2.out" }, "-=.35" )
    .to( ".brand path:nth-child(1)", {translateY: "0", duration: .4, ease: "power2.out" }, "-=.35" )
    .to( "#hero-title .char", { y: 0, stagger: 0.04, duration: .15, ease: "power2.out" }, "-=1.2" )
    .to( ".line-txt span", { y: 0, stagger: 0.06, duration: .6, ease: "power4.out" }, "=.1" )
    .to( "header .item", {translateY: "0", autoAlpha: 1, stagger: 0.04, duration: .4, ease: "ease.out" }, "-=1.5" )
    .to( ".arrow-intro svg", {translateY: "0", translateX: "0", duration: .4, ease: "power2.out" }, "=.1" )
    .to( ".hero-back", { opacity: 0.05, duration: 5, ease: "power2.out" }, "-=2.5" )
  }

}

export function animTitle( container ){
  
   // Limpiar las instancias previas de ScrollTrigger
   ScrollTrigger.getAll().forEach(trigger => trigger.kill());

  const nosotros_title = container.querySelector( "#title-nosotros" );
  const proyectos_title = container.querySelector( "#title-proyectos" );
  const servicios_title = container.querySelector( "#title-servicios" );
  const team_title = container.querySelector( "#title-team" );

  const tl1 = gsap.timeline({
    scrollTrigger: {
      trigger: "#nosotros", 
      // markers: true,
      start: "top 50%", 
      end: "bottom 50%", 
      toggleActions: 'play reverse play reverse',
    }
  })

  const tl2 = gsap.timeline({
    scrollTrigger: {
      trigger: "#proyectos", 
      // markers: true,
      start: "top 50%", 
      end: "bottom 50%",
      toggleActions: 'play reverse play reverse',
    }
  })

  const tl3 = gsap.timeline({
    scrollTrigger: {
      trigger: "#servicios", 
      // markers: true,
      start: "top 50%", 
      end: "bottom 50%",
      toggleActions: 'play reverse play reverse',
    }
  })

  const tl4 = gsap.timeline({
    scrollTrigger: {
      trigger: "#team", 
      // markers: true,
      start: "top 50%", 
      end: "bottom 50%",
      toggleActions: 'play reverse play reverse',
    }
  })

  tl1.to( nosotros_title , { color: "#EB671C", duration: 0.65, ease: "linear" } )
  tl2.to( proyectos_title , { color: "#EB671C", duration: 0.65, ease: "linear" } )
  tl3.to( servicios_title , { color: "#EB671C", duration: 0.65, ease: "linear" } )
  tl4.to( team_title , { opacity: 1, duration: 0.65, ease: "linear" } )

  ScrollTrigger.refresh();

}

export function pageOut( container ) {

  const sections = container.querySelectorAll( "section" );
  const footer = container.querySelector( "footer" );

  gsap.timeline().to( sections, {autoAlpha: 0, translateY: "-2rem", duration: 0.4, ease: "power4.out" } )
  .to( footer, {autoAlpha: 0, translateY: "-2rem", duration: 0.4, ease: "power4.out" }, "-=0.4" )

}

export function heroBackOut( container ) {
  const heroBack = container.querySelector( ".hero-back" );
  gsap.timeline().to( heroBack, {autoAlpha: 0, duration: 0.4, ease: "power4.out" } )
}

export function homeBack( container ){

  const heroBack = container.querySelector( ".hero-back" );
  const heroTitle = container.querySelector( "#hero-title" );
  const txtIntro = container.querySelector( ".txt-intro" );
  const sections = container.querySelectorAll( "section:not(.hero)" );

  heroBack.play();

  gsap.timeline().to( heroBack, { opacity: 0.05, duration: 0.8, ease: "power4.out" } )
  .to( heroTitle, {autoAlpha: 1, translateY: "0", duration: 1, ease: "power4.out" }, "-=0.8" )
  .to( txtIntro, {autoAlpha: 1, translateY: "0", duration: 0.8, ease: "power4.out" }, "-=0.6" )
  .to( sections, { autoAlpha: 1, translateY: "0", duration: 0.8, ease: "power4.out" }, "-=0.8" )
  

}

export function homeLeave( container ) {
  container.classList.add("home-leave");
}

export function contactoIn( container ) {

  const row1 = container.querySelector( "#contacto .row:first-child" );
  const row2 = container.querySelector( "#contacto .row:last-child" );

  gsap.timeline().fromTo( row1, {autoAlpha: 0, translateY: "2rem", duration: 0.6, ease: "power4.out" } , {autoAlpha: 1, translateY: "0", duration: 0.6, ease: "power4.out" } )
  .fromTo( row2, {autoAlpha: 0, translateY: "2rem", duration: 0.6, ease: "power4.out" } , {autoAlpha: 1, translateY: "0", duration: 0.6, ease: "power4.out" } )

}

export function removeOnce( container ) {
  setTimeout(() => { // Removemos la clase "once" para que saber que ya se ha cargado el ONCE
    document.querySelector('body').classList.remove('once');
  },3000)
}