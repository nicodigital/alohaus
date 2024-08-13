function cursor(container) {
  // console.log(container);

  const pointer = container.querySelector(".pointer");
  const pointer_1x = container.querySelectorAll('.pointer-1x');
  const pointer_2x = container.querySelectorAll('.pointer-2x');
  const pointer_arrow = container.querySelectorAll('.pointer-arrow');

  document.addEventListener("mousemove", (e) => {
    pointer.classList.add('active');
    pointer.style.left = e.clientX + "px";
    pointer.style.top = e.clientY + "px";
  });

  function hoverItems(hoverItems, hover_x) {

    hoverItems.forEach(items => {

      items.addEventListener('mouseover', () => {

        pointer.classList.add(hover_x);

        if (hover_x == 'hover-arrow') {
          container.classList.add('pointer-arrow');
        }

      });

      items.addEventListener('mouseleave', () => {
        pointer.classList.remove(hover_x);

        if (hover_x == 'hover-2x') {
          container.classList.remove('pointer-hover');
        }

      });

    })

  }


  if (pointer_1x) {
    hoverItems(pointer_1x, 'hover-1x');
  }

  if (pointer_2x) {
    hoverItems(pointer_2x, 'hover-2x');
  }

  if (pointer_arrow) {
    hoverItems(pointer_arrow, 'hover-arrow');
  }


  // Invertir color de pantalla en el Home al hacer Hover en Contacto
  // const item_contacto = document.querySelector('.item[href="contacto"]');

  // if (item_contacto) {

  //   item_contacto.addEventListener('mouseover', () => {
  //     container.classList.add('invert-screen');
  //   });

  //   item_contacto.addEventListener('mouseleave', () => {
  //     container.classList.remove('invert-screen');
  //   });

  // }

}

export default cursor