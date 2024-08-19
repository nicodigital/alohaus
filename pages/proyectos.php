<section id="all-works" class="container mt-12 xg:mt-12 xg:mb-10 3xl:mt-16 3xl:mb-12">

  <div class="row filter ctr-pb">

    <div class="xg:col-1-5 hidden xg:block animate" data-anim="bottom" data-delay="900" >
      <h1>
        <?= $data["projects_intro"] ?>
      </h1>
    </div>

    <div class="xg:col-5-9 animate" data-anim="bottom" data-delay="1000">
      <?php include 'layout/components/filter.php' ?>
    </div>

    <div class="xg:col-9-13 hidden xg:flex justify-end">
        <?php include 'layout/components/sharebar.php' ?>
    </div>

  </div>

  <div class="grid filter-items xg:grid-cols-3 gap-2 animate force-anim" data-anim="bottom" data-delay="1100" >

    <?php 
    foreach ($GLOBALS["cases"] as $case) {

        $c = $case["acf"];
        $types_txt = "";
        
        $type_count = count($c["types"]);
        $z = 0;

        foreach($c["types"] as $type) {

          if( $z < $type_count-1 ){
            $types_txt.= $type["slug"].",";
          }else{
            $types_txt.= $type["slug"];
          }
          
        $z++; }

         ?>

      <a href="case/<?= $case["slug"] ?>" class="card filter-item pointer-arrow " data-type="<?= $types_txt ?>" >
        <figure>
    
          <?= picture( $c["main_img"]["url"], $case["title"]["rendered"], true, $c["main_img"]["width"], $c["main_img"]["height"] ) ?>

          <figcaption>

            <span>
              <?= $case["title"]["rendered"]  ?>
            </span>

            <span>

              <?php $w = 0;

              foreach( $c["details"] as $detail ) { 

                if( $w < 2 ){ ?>

                <span>
                  <?= $detail["label"]  ?>: <?= $detail["txt"]  ?>
                </span>

              <?php }

              $w++; } ?>

            </span>
          </figcaption>
        </figure>
      </a>

    <?php } ?>
  </div>
</section>