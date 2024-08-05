function cursor() {

  const pointer = document.querySelector(".pointer");
  const all_links = document.querySelectorAll('a');
  const pointer_1x = document.querySelectorAll('.pointer-1x');
  const pointer_2x = document.querySelectorAll('.pointer-2x');

  document.addEventListener("mousemove", (e) => {
    pointer.classList.add('active');
    pointer.style.left = e.clientX + "px";
    pointer.style.top = e.clientY + "px";
  });

  function hoverItems(hoverItems, hover_x) {

    hoverItems.forEach(items => {

      items.addEventListener('mouseover', () => {

        pointer.classList.add(hover_x);

        if (hover_x == 'hover-2x') {
          body.classList.add('pointer-hover');
        }

      });

      items.addEventListener('mouseleave', () => {
        pointer.classList.remove(hover_x);

        if (hover_x == 'hover-2x') {
          body.classList.remove('pointer-hover');
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


  // Invertir color de pantalla en el Home al hacer Hover en Contacto
  // const item_contacto = document.querySelector('.item[href="contacto"]');

  // if (item_contacto) {

  //   item_contacto.addEventListener('mouseover', () => {
  //     body.classList.add('invert-screen');
  //   });

  //   item_contacto.addEventListener('mouseleave', () => {
  //     body.classList.remove('invert-screen');
  //   });

  // }

}

export default cursor