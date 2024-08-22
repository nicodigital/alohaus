function caseToggle(container) {	

  const columns = container.querySelector('.columns');
  const toggMe = container.querySelectorAll('.togg-me');
  const pointer = container.querySelector('.pointer');

  toggMe.forEach(togg => {

    togg.addEventListener('click', () => {

      columns.classList.toggle('toggle-column');
      
      toggMe.forEach(item => {
        item.classList.toggle('pointer-expand');
      });

      pointer.classList.toggle('hover-expand');

    });

  });

}

export default caseToggle