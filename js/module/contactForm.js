function contactForm(container) {

  const SPARK_ID = 'CwUzyZDMs'; // ID DEL FORMULARIO ID
  let notices;

  const protocolo = window.location.protocol;
  const baseURL = "https://www.alohaus.uy/";

  const form = container.querySelector("#contact-form");
  const ajax_form_url = 'https://submit-form.com/' + SPARK_ID;
  const result = container.querySelector('#result');

  if (form) {

    let from, subject, agency;

    const lang = form.querySelector('[name=lang]');
    const name = form.querySelector('[name=name]');
    const email = form.querySelector('[type=email]');
    const message = form.querySelector('[name=message]');
    const btn_submit = form.querySelector('[type=submit]');

    const nameRegex = /^[A-Za-z]+ [A-Za-z]+$/;
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    const messageRegex = /^.{16,}$/; // min 16 caracteres

    /* ///////////////////// GET AGENCY ///////////////////////*/

    function formatDateTime() {
      const now = new Date();
    
      const day = String(now.getDate()).padStart(2, '0');
      const month = String(now.getMonth() + 1).padStart(2, '0');
      const year = now.getFullYear();
    
      const hours = String(now.getHours()).padStart(2, '0');
      const minutes = String(now.getMinutes()).padStart(2, '0');
    
      return `${day}-${month}-${year} ${hours}:${minutes} hs`;
    }

    function updateAgency() {

      agency = form.querySelector('[name=agency]:checked');
     
      if (agency.value === "Spain") {
        from = "AloHaus España";
        subject = "AloHaus - Contacto España | "+ formatDateTime();
      } else {
        from = "AloHaus Uruguay";
        subject = "AloHaus - Contacto Uruguay | "+ formatDateTime();
      }

      // console.log("From:", from);
      // console.log("Subject:", subject);
    }

    // Escuchar cambios en los inputs radio
    form.querySelectorAll('[name=agency]').forEach(radio => {
      radio.addEventListener('change', updateAgency);
    });

    // Ejecutar la función inicialmente para verificar el valor por defecto
    updateAgency();

    /* ///////////////////// NOTICES ///////////////////////*/

    /* Notices */
    if (lang.value === "en") {

      notices = {
        success: 'Thank you for contacting us. We will get back to you shortly.',
        error: 'Error. Please try again.',
      }

    } else if (lang.value === "pt") {

      notices = {
        success: 'Obrigado por entrar em contato conosco. Em breve retornaremos.',
        error: 'Erro. Por favor, tente novamente.',
      }

    } else {

      notices = {
        success: 'Gracias por contactarnos. En breve nos pondremos en contacto.',
        error: 'Error. Por favor, intenta de nuevo.',
      }

    }

    /* ////////////////// TEMPORIZADORES ///////////////////*/
    // Definir una variable para el temporizador de retraso
    let typingTimer;

    // Tiempo de espera en milisegundos antes de ejecutar la validación
    const doneTypingInterval = 500; // 500 milisegundos (0.5 segundos)

    // Función para manejar el evento de entrada en el campo
    function handleInput(field, regex) {
      // Limpiar el temporizador existente
      clearTimeout(typingTimer);

      // Comenzar un nuevo temporizador
      typingTimer = setTimeout(function () {
        // Ejecutar la validación después del tiempo de espera
        validField(field, regex);
      }, doneTypingInterval);
    }

    /* ////////////////// VALIDAR ///////////////////*/

    function validField(field, regex) {
      let field_val = field.value;

      // if ( !regex.test(field_val) ) {
      if (!field_val.match(regex)) {
        field.classList.add('invalid');
        return false;
      }

      field.classList.remove('invalid');
      return true;
    }

    /* ////////////////// CHECK FORM ///////////////////*/
    function checkForm() {

      let formStatus = '';

      if (validField(name, nameRegex) && validField(email, emailRegex) && validField(message, messageRegex)) {
        btn_submit.disabled = false;
        formStatus = true;
      } else {
        btn_submit.disabled = true;
        formStatus = false;
      }

      return formStatus;

    }

    /* ////////////////// EVENT HANDLING ///////////////////*/

    name.addEventListener('input', function () {
      handleInput(name, nameRegex);
    });

    email.addEventListener('input', function () {
      handleInput(email, emailRegex);
    });

    message.addEventListener('input', function () {
      handleInput(message, messageRegex);
    });

    form.onchange = () => {
      checkForm()
    }

    /* ////////////////// SUBMIT ///////////////////*/

    form.addEventListener("submit", async (e) => {
      e.preventDefault();

      let loader = container.querySelector(".loader");
      loader.style.display = "block";

      if (checkForm()) {

        const formData = {
          "name": name.value,
          "email": email.value,
          "agency": agency.value,
          "message": message.value,
          // "g-recaptcha-response": grecaptcha.getResponse()
        };

        const json = JSON.stringify({
          ...formData,
          _email: {
            from: from,
            subject: subject,
            template: {
              title: false,
              footer: false,
            }
          }
        });

        fetch(ajax_form_url, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
          },
          body: json
        }).then(async (response) => {

          let json = await response.json();

          if (response.status == 200) {

            // window.location.href = baseURL + "/gracias";
            loader.style = "display: none";
            result.innerHTML = notices.success;

          } else {
            console.log(response);
            result.innerHTML = notices.error;
          }

        }).catch(error => {

          console.log(error);
          result.innerHTML = notices.error;

        }).then(function () {

          form.reset();
          setTimeout(() => {
            result.style.display = "none";
          }, 3000);

        });

      }

    });

  }

}

export default contactForm;