<!-- SERVICIOS -->
<section id="servicios" class="mt-20 mb-10 xg:mb-0 xg:mt-[33vh] xl:h-[210vh] 2xl:h-[240vh] 3xl:h-[215vh] 4xl:h-[210vh] 5xl:h-[200vh]">

  <div class="container sticky hidden xg:flex h-screen items-end top-2 mt-[-25vh]">
    <h2 id="title-servicios" class="big-title text-grey-bold mb-2 opacity-0 transition-all duration-[.6s]">
      Modelado y visualiación 3d
    </h2>
  </div>

  <div class="container xg:mt-[-75vh]">

    <div class="row mb-2">
      <div class="xg:hidden">
        <!-- <hr class="text-orange mb-1"> -->
        <h2 class="big-title text-orange">
          Servicios
        </h2>
      </div>
      <div class="hidden xg:block">
        <?php miniTitle("Servicios") ?>
      </div>
    </div>

    <div class="row h-full">

      <div class="xg:col-1-13 hidden xg:grid xg:grid-cols-3 gap-2">
        <?php $x = 1;
        foreach ( $data["serv_list"] as $serv) {
          $num = setNum($x);
          $slug = slugify($serv['title']);
          cardServ( $num , $slug , $serv['title'], $serv['text']);
        $x++; } ?>
      </div>

      <div class="xg:hidden accordion text-white">
        <?php foreach ( $data["serv_list"] as $serv) { ?>
          <acc-item title="<?= $serv['title'] ?>">
            <?= $serv['text'] ?>
          </acc-item>
        <?php } ?>
      </div>

    </div>
  </div>
</section>