<section id="proyectos" class="container mb-2">
  <hr class="text-orange hidden xg:block mb-1">

  <div class="row">
    <div class="xg:col-1-10">
      <h2 id="title-proyectos" class="big-title title-scroll text-orange xg:text-grey-bold mb-4 xg:mb-1">
        <span class="hidden xg:block">
        <?= $data["proyectos_title"] ?>
        </span>
        <span class="xg:hidden">Proyectos</span>
      </h2>
    </div>
    <div class="xg:col-11-13 hidden xg:flex justify-end items-end">
      <?php include 'layout/components/column-icons.php' ?>
    </div>
  </div>

  <div class="row xg:mt-20">
    <div class="grid xg:grid-cols-3 gap-2 xg:gap-[1.5px]">
      <div class="mb-4 xg:mb-0">
        <p class="xg:w-60% self-end pointer-1x">
          <?= $data["proyectos_txt"] ?>
        </p>
      </div>

      <?php include 'data/works.php';
      $i = 0;
      foreach ($works as $work) {
        if($i <= 6 ){
          cardCase($work["title"], $work["img"], $work["cliente"], $work["pieza"]);
        }
      $i++;} ?>

      <div class="flex items-end justify-end mt-8 xg:mt-0">
        <a href="proyectos" class="link-underline">
          <?php miniTitle("Más Proyectos", "up") ?>
        </a>
      </div>

    </div>
  </div>

</section>