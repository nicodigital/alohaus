<section class="container py-6">

  <div class="row mb-10">

    <div class="col-[1/13] xg:col-[1/7]">
      <h2 class="text-h1 font-bold" >
        <?= $layout['i18n']['words']['about'] ?>
      </h2>
    </div>

    <div class="col-[1/13] xg:col-[8/13]">
      <img src='img/demo/1920x1080.png' alt='' loading='lazy' decoding='async' style="view-transition-name: trans-1;" />
    </div>

  </div>
  
  <div class="row">
    <div class="col-[1/13] md:col-[1/6]">
      <?php include 'codex/accordion.php' ?>
    </div>
    <div class="col-[1/13] md:col-[8/13]">
      <?php include 'codex/accordion.php' ?>
    </div>
  </div>
</section>
