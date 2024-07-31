function PropertyCard() {
  
  class PropertyCard extends HTMLElement {
    constructor() {
      super();

      /* Get attributes */
      const LINK = this.getAttribute("link");
      const TITLE = this.getAttribute("title");
      const THUMB = this.getAttribute("thumb");

      /* Create HTML */
      const HTML = /*html*/ 
              `<a href="${LINK}" class="card-property">
                  <figure>
                    <img src="${THUMB}" alt="" />
                    <figcaption>${TITLE}</figcaption>
                  </figure>
                </a>`;

      this.insertAdjacentHTML("beforeend", HTML);
    }
  }

  customElements.define("property-card", PropertyCard );
}

export default PropertyCard;
