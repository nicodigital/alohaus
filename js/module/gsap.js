import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import SplitType from 'split-type'

gsap.registerPlugin(ScrollTrigger)

export function brandIntro( container ) {

  const heroTitle = new SplitType('#hero-title');
  const brandIntro = container.querySelector( ".brand-intro" );

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
    .to( ".hero .brand-intro path:nth-child(7)", { yPercent: -120, duration: .4, ease: "power2.out" }, "=.3" )
    .to( ".hero .brand-intro path:nth-child(6)", { yPercent: -120, duration: .4, ease: "power2.out" }, "-=.35" )
    .to( ".hero .brand-intro path:nth-child(5)", { yPercent: -120, duration: .4, ease: "power2.out" }, "-=.35" )
    .to( ".hero .brand-intro path:nth-child(4)", { yPercent: -120, duration: .4, ease: "power2.out" }, "-=.35" )
    .to( ".hero .brand-intro path:nth-child(3)", { yPercent: -120, duration: .4, ease: "power2.out" }, "-=.35" )
    .to( ".hero .brand-intro path:nth-child(2)", { yPercent: -120, duration: .4, ease: "power2.out" }, "-=.35" )
    .to( ".hero .brand-intro path:nth-child(1)", { yPercent: -120, duration: .4, ease: "power2.out" }, "-=.35" )
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

}

export function pageTrans( container, status = "out" ){

  const pageTrans = document.querySelector( ".page-trans" );
  const brandPaths = ".page-trans .brand-intro path";

  if( status === "in" ){
    // pageTrans.setAttribute("data-status", "in");

    gsap.timeline()
    .to( brandPaths, { autoAlpha:1, translateY: "120%", duration: 0 })
    .to( pageTrans , { autoAlpha: 1, duration: .0 } ) 
    .to( pageTrans , { clipPath: "polygon(0 100%, 100% 100%, 100% 0, 0 0)" } ) 
    .to( brandPaths, {translateY: "0", duration: .3, stagger: 0.04, ease: "power2.out" }, "=.4" )

  }else{ // out
    setTimeout(() => {
      // pageTrans.setAttribute("data-status", "out");
      gsap.timeline()
      .to( brandPaths, { translateY: "-120%", duration: .3, stagger: 0.04, ease: "power2.out" }, "=.4" )
      .to( brandPaths, { autoAlpha: 0, duration: .0 }, "=.2" )
      .to( pageTrans , { clipPath: "polygon(0 0, 100% 0, 100% 0, 0 0)" }, "-=1" ) 
      .to( brandPaths, { translateY: "120%", duration: .0 }, "=.2" )
      .to( pageTrans , { autoAlpha: 0, duration: .0 } )
      .to( pageTrans , { clipPath: "polygon(0 100%, 100% 100%, 100% 100%, 0 100%)", duration: .0 } )
    }, 400);
  }

}

// export function caseCardAnim( container ){

//   const caseCard = document.querySelectorAll( "#proyectos .card" );

//   const tl = gsap.timeline({
//     scrollTrigger: {
//       trigger: caseCard, 
//       markers: true,
//       start: "top 80%", 
//       end: "top 50%", 
//       scrub: true,
//       // toggleActions: 'play reverse play reverse',
//     }
//   })

//   tl.fromTo( caseCard, { translateY: "-2rem", clipPath: "polygon(0 100%, 0 100%, 0 100%, 0 100%)"}, { translateY: "0", clipPath: "polygon(0 100%, 100% 100%, 100% 0, 0 0)", stagger: 0.04 } )

// }