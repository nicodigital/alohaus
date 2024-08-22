function cursor(container) {
  // console.log(container);

  const pointer = container.querySelector(".pointer");
  const pointer_1x = container.querySelectorAll('.pointer-1x');
  const pointer_2x = container.querySelectorAll('.pointer-2x');
  const pointer_arrow = container.querySelectorAll('.pointer-arrow');
  const pointer_expand = container.querySelectorAll('.pointer-expand');

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

        if (hover_x == 'hover-expand') {
          container.classList.add('pointer-expand');
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

  if (pointer_expand) {
    hoverItems(pointer_expand, 'hover-expand');
  }

}

export default cursor