function caseToggle(container){	

  const columns = container.querySelector('.columns');
  const col1 = container.querySelector('.col-1');
  const toggMe = container.querySelectorAll('.togg-me');

  toggMe.forEach( togg => {
    togg.addEventListener('click', () => {
      columns.classList.toggle('toggle-column');
    });
  })

}

export default caseToggle