function servicios() {

  const SERVICIOS = document.querySelectorAll("#servicios .card");
  const TITLE = document.querySelector("#servicios .big-title");

  SERVICIOS.forEach(card => {

    card.addEventListener("mouseover", () => {
      let servTitle = card.dataset.title;
      TITLE.innerHTML = servTitle;
    });

  })

}

export default servicios;