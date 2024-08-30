<section id="proyectos" class="container mb-2">
  <hr class="text-orange hidden xg:block mb-1">

  <div class="row">
    <div class="xg:col-1-10">
      <h2 id="title-proyectos" class="big-title title-scroll text-orange xg:text-grey-bold mb-4 xg:mb-1 xg:translate-y-[-.5rem]">
        <span class="hidden xg:block">
        <?= $data["proyectos_title"] ?>
        </span>
        <span class="xg:hidden">Proyectos</span>
      </h2>
    </div>
  </div>

  <div class="row xg:mt-20">
    <div class="grid xg:grid-cols-3 gap-2 xg:gap-[1.5px]">
      <div class="mb-4 xg:mb-0">
        <p class="xg:w-60% self-end pointer-1x">
          <?= $data["proyectos_txt"] ?>
        </p>
      </div>

      <?php 
      $i = 0;
      foreach ($GLOBALS["cases"] as $case) {

        // debug($case);
        $acf = $case["acf"];
        $lang = $GLOBALS["lang"];

        if( @$acf["featured"] == 1 && $i <= 6 ){

          cardProject( 
              $case["title"]["rendered"], 
              $case["slug"], 
              $acf["main_img"]["url"], 
              $acf["main_img"]["width"], 
              $acf["main_img"]["height"], 
              $acf["detalles_".$lang ],
              $lang
            );

        }

      $i++;} ?>

      <div class="flex items-end justify-end mt-8 xg:mt-0">
        <a href="<?= transPath( 'proyectos' , $GLOBALS["lang"] ) ?>" class="link-underline">
          <?php miniTitle( $i18n["words"]["more_projects"] , "up") ?>
        </a>
      </div>

    </div>
  </div>

</section>