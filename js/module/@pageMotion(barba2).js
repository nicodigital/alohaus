import { gsap } from "gsap";
import barba from '@barba/core';

function pageMotion( device_data, animations ) {

  /* Clicked Item */
  let clickedItem;
  let cards = document.querySelectorAll('.card');

  cards.forEach( card => {
    card.addEventListener('click', (event) => {
      clickedItem = card;
      console.log(clickedItem);
    });
  });

  const leaveAnim = (container) => {

    const title = clickedItem.querySelector('h3');
    const cardImg = clickedItem.querySelector('img');

    console.log(title);

    const tl = gsap.timeline({
      defaults: {
        ease: "expo.inOut",
        duration: 1
      }
    });

    tl.to(title, {
      y: -100,
      autoAlpha: 0
    }).to(cardImg, {
      y: -100,
      autoAlpha: 0
    });

    return tl;  // Añadir el return aquí para que la animación pueda ser encadenada

  }

  const nextAnim = (container) => {
    
  }

  barba.init({
    transitions: [{
      name: 'default-transition',
      leave({ current }) {
        // animations();
      },
      enter({ next }) {
        animations();
      }
    },{
      name: 'card-trans',
      from: {
        namespace: ["home"],
      },
      to: {
        namespace: ["buitres"],
      },
      leave({ current }) {
        console.log(current);
        return leaveAnim(current.container);
      },
      enter({ next }) {
        // console.log(next);
        nextAnim(next.container);
      }
    }]
  });
}

export default pageMotion;
