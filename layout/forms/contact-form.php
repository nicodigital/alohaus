<form id="contact-form" class="form" action="" method="POST" accept-charset="utf-8">

    <input type="checkbox" name="_honeypot" style="display:none" tabindex="-1" autocomplete="off"/>

    <div class="field">
        <input type="text" name="name" placeholder="Nombre y Apellido" pattern="^[A-Za-z]+ [A-Za-z]+$" required />
        <div class="valid-msg">Debes colocar tu nombre y apellido</div>
    </div>

    <div class="field">
        <input type="email" name="email" placeholder="ejemplo@email.com" required />
        <div class="valid-msg">Debes colocar un correo válido</div>
    </div>

    <div class="field">
        <input type="tel" name="phone" placeholder="Teléfono" required minlength="9" maxlength="18" />
        <div class="valid-msg">Debes colocar un teléfono válido</div>
    </div>

    <div class="field">
        <textarea name="message" placeholder="Mensaje..." minlength="16"></textarea>
        <div class="valid-msg">Tu mensaje debe ser de mas de 16 caracteres.</div>
    </div>

    <div class="flex gap-2 md:gap-4">
    
        <button type="submit" disabled class="mt-2">
            <span class="flex align-center">
                <span class="loader mr-1"></span>
                <span class="txt">
                    Enviar
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                        <path fill="currentColor" d="m2 21l21-9L2 3v7l15 2l-15 2z" />
                    </svg>
                </span>
            </span>
        </button>

        <div class="g-recaptcha" data-sitekey="<?= $GLOBALS['recaptcha_key'] ?>"></div>

        <div id="result"></div>

    </div>
    
</form>

<script type="module">
    import contactForm from '<?= BASE_URL ?>js/module/contactForm.js';
    contactForm();
</script>

