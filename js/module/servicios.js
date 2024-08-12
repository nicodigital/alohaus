function servicios(device_data) {

  if( device_data.isDesktop === true ) {

    const SERVICIOS = document.querySelectorAll("#servicios .card");
    const TITLE = document.querySelector("#servicios .big-title");

    SERVICIOS.forEach(card => {

      card.addEventListener("mouseover", () => {
        let servTitle = card.dataset.title;
        TITLE.style.opacity = 1;
        TITLE.innerHTML = servTitle;
      });

    })

  }

}

export default servicios;