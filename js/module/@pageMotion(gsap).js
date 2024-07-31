import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import barba from '@barba/core';

function pageMotion( device_data ) {

  gsap.registerPlugin(ScrollTrigger);

  ScrollTrigger.defaults({
    // toggleActions: "restart pause resume none",
    markers: true,
  });

  const triangle = document.querySelector(".triangle");

  const tl = gsap.timeline({
    scrollTrigger: {
      trigger: ".scroll-trigger", 
      start: "top top", 
      end: "bottom bottom", 
      scrub: 3, 
      pin: true
    },
  });

  console.log(tl);

  tl.to( triangle, {
    scale: 0.5,
    y: "30vh",
    duration: 2,
  })

  tl.to( ".box-1", {
    y: "-50vh",
    scale: 1.3,
    duration: 4,
    opacity: 1,
  })

  tl.to( ".box-2", {
    y: "-50vh",
    scale: 1.3,
    duration: 4,
    opacity: 1,
  }, "-=4")
  

  tl.to( triangle, {
    rotate: 60,
    duration: 1,
    ease: "power2.out",
  })

  tl.to( triangle, {
    x: "-45vw",
    duration: 2,
    ease: "power2.out",
  })

  tl.to( ".box-3", {
    y: "-100vh",
    scale: 1.3,
    duration: 4,
    opacity: 1,
  }, "-=4")

  tl.to( ".box-4", {
    y: "-50vh",
    scale: 1.3,
    duration: 4,
    opacity: 1,
  }, "-=4")

  tl.to( triangle, {
    rotate: 0,
    duration: 1,
    ease: "power2.out",
  })

  tl.to( triangle, {
    y: "90vh",
    duration: 2,
    ease: "power2.out",
  })

  tl.to( triangle, {
    rotate: "-60deg",
    duration: 1,
    ease: "power2.out",
  })

  tl.to( triangle, {
    rotate: 0,
    x: 0,
    duration: 2,
    ease: "power2.out",
  })

  // tl.to( triangle, {
  //   y: "-33vw",
  //   duration: 2,
  //   ease: "power2.out",
  // })

  // tl.to(".box-1",{
  //   duration: 1,
  //   x: "75vw",
  //   ease: "power2.out",
  // })

  // tl.to(".box-2",{
  //   duration: 1,
  //   x: 500,
  //   rotate: 360,
  //   ease: "power2.out",
  // },"-=1")

  // tl.to(".box-3",{
  //   duration: 1,
  //   x: 500,
  //   borderRadius: 100,
  //   ease: "power2.out",
  // },"-=1")

  // tl.to(".box-4",{
  //   duration: 1,
  //   x: 500,
  //   scale: 2,
  //   ease: "power2.out",
  // },"-=1")


}

export default pageMotion