function menuMobile(device_data) {

  if( device_data.isDesktop === true ) {
    return;
  }

  const html = device_data.html;
  const body = device_data.body;
  const btn_togg = document.querySelectorAll('.togg');

  function menuToggler() {

    const toggler = document.querySelector('.menu-toggler');

    if ( toggler.classList.contains('menu-in') ) {

      toggler.classList.toggle('menu-in');
      // html.style.overflowY = 'auto';
      // body.style.overflowY = 'auto';
    } else {
      toggler.classList.toggle('menu-in');
      // html.style.overflowY = 'hidden';
      // body.style.overflowY = 'hidden';
    }

  }

  btn_togg.forEach(btn => {
    btn.onclick = () => menuToggler();
  });


}

export default menuMobile