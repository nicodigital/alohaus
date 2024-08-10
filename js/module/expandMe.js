function expandMe() {

  const items = document.querySelectorAll('.expand-next');

  items.forEach(item => {
    item.addEventListener('click', function () {
      this.classList.toggle('active');
    });
  });

}

export default expandMe