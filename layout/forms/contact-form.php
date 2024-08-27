<form id="contact-form" class="form translate-y-[-2.5rem]" action="" method="POST" accept-charset="utf-8">

    <input type="checkbox" name="_honeypot" style="display:none" tabindex="-1" autocomplete="off"/>
    <input type="hidden" name="lang" value="<?= $lang ?>" >

    <div class="field">
        <input type="text" name="name" placeholder="<?= $i18n["form"]["name"] ?>" pattern="^[A-Za-z]+ [A-Za-z]+$" required />
        <div class="valid-msg">
            <?= $i18n["form"]["name_msg"] ?>
        </div>
    </div>

    <div class="field">
        <input type="email" name="email" placeholder="<?= $i18n["form"]["email"] ?>" required />
        <div class="valid-msg">
        <?= $i18n["form"]["email_msg"] ?>
        </div>
    </div>

    <div class="field">
        <textarea name="message" placeholder="<?= $i18n["form"]["message"] ?>" minlength="16" rows="4" cols="50" ></textarea>
        <div class="valid-msg">
            <?= $i18n["form"]["message_msg"] ?>
        </div>
    </div>

    <div class="flex gap-2 md:gap-4">
    
        <button type="submit" disabled class="text-orange mt-2">
            <span class="flex align-center">
                <span class="loader mr-1"></span>
                <span class="txt">
                    <?= $i18n["form"]["send"] ?>
                </span>
            </span>
        </button>

        <!-- <div class="g-recaptcha" data-sitekey="<?php //echo $GLOBALS['recaptcha_key'] ?>"></div> -->

        <div class="flex items-end">
            <div id="result"></div>
        </div>

    </div>
    
</form>

<script type="module">
    import contactForm from '<?= BASE_URL ?>js/module/contactForm.js';
    contactForm();
</script>

