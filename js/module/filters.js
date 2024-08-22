function filters(container) {

  const filterList = container.querySelector(".filter");
  const filterButtons = filterList.querySelectorAll(".filter-btn");
  const filterItems = container.querySelectorAll(".filter-item");

  let filterItemIndex = 0;

  filterItems.forEach((filterItem) => {
    filterItem.style.viewTransitionName = `item-${++filterItemIndex}`;
  });

  filterButtons.forEach((button) => {
    button.addEventListener("click", (e) => {
      // Obtener las categorías seleccionadas del botón, separadas por comas y eliminando espacios adicionales
      let selectedFilters = e.target.getAttribute("data-filter").split(',').map(filter => filter.trim());

      if (!document.startViewTransition) {
        updateActiveButton(e.target);
        filterEvents(selectedFilters);
      }

      document.startViewTransition(() => {
        updateActiveButton(e.target);
        filterEvents(selectedFilters);
      });
    });
  });

  function updateActiveButton(newButton) {
    filterList.querySelector(".active").classList.remove("active");
    newButton.classList.add("active");
  }

  function filterEvents(filters) {
    filterItems.forEach((filterItem) => {
      // Obtener las categorías del ítem, separadas por comas y eliminando espacios adicionales
      let dataTypes = filterItem.getAttribute("data-type").split(',').map(type => type.trim());

      // Verificar si alguna de las categorías seleccionadas coincide con las categorías del ítem
      let match = filters.includes("all") || filters.some(filter => dataTypes.includes(filter));

      if (match) {
        filterItem.removeAttribute("hidden");
      } else {
        filterItem.setAttribute("hidden", "");
      }
    });
  }
}

export default filters;
