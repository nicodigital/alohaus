<section id="nosotros" class="container mt-16 xg:mt-0">
  <hr class="text-orange hidden xg:block mb-1 xg:mb-2">

  <div class="row relative mb-20">

    <div class="xg:col-1-13">

      <h2 class="big-title xg:hidden text-orange mb-4">
        <?= $i18n["words"]["about_us"] ?>
      </h2>

      <article class="xg:w-[24%]">
        <p class="mb-2 pointer-1x">
          <?= $data["nosotros_txt_1"] ?>
        </p>
      </article>

      <p class="xg:absolute top-0 left-[44%] xg:w-[24%] pointer-1x">
        <?= $data["nosotros_txt_2"] ?>
      </p>
    </div>

  </div>

  <div class="row">
    <div class="xg:col-1-13 flex justify-between items-end">
      <div class="hidden xg:block mb-2">
        <?php miniTitle( $i18n["words"]["projects"] ) ?>
      </div>
      <h2 id="title-nosotros" class="big-title hidden xg:block title-scroll text-grey-bold mb-1">
        <?= $i18n["words"]["about_us"] ?>
      </h2>
    </div>
  </div>

</section>