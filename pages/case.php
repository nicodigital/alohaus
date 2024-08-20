<?php
$lang = $GLOBALS["lang"];

foreach ( $GLOBALS["cases"] as $item) {

  $title = $item["title"]["rendered"];
  $film_slug = slugify($title);

  if ( $film_slug == $case ) {

    $main_img = @$item['acf']['main_img'];
    $gallery  = @$item['acf']['gallery'];
    $desc     = @$item['acf']['descripcion_'.$lang];

?>

<section class="container my-14 xg:my-12 3xl:my-16">

  <div class="columns relative">

    <div class="flex flex-wrap xg:flex-nowrap gap-2">

      <div class="col-1 w-full xg:w-33%">

        <aside class="xg:sticky single-content xg:top-10">
          <div class="flex flex-col justify-between h-full">

            <div class="text-content xg:w-[36rem] animate" data-anim="bottom"  >
              <h1 class="text-h1 font-title mb-2 leading-[1.25]">
                <?= $title ?>
              </h1>
              <p>
                <?= $desc ?>
              </p>
              <p class="mt-6 text-right xg:text-left">
                Packaging
              </p>
            </div>

          </div>

        </aside>

      </div>

      <div class="col-2  w-full xg:w-66% flex flex-col gap-2 animate force-anim" data-anim="bottom" data-delay="400" >

      <?php foreach ( $gallery as $item ) {

        // debug( $item );

          if( checkFileType( $item["filename"] ) == "video" ) { ?>

            <video class="w-full aspect-video transition-all" controls preload playsinline  >
                <source src='<?php echo $item["url"] ?>' type='video/mp4'>
                Your browser does not support the video tag.
            </video>
          
          <?php }else{ // IMAGEN 
          
            echo picture( $item["url"], $title, true, $item["width"], $item["height"], true, "transition-all"  ) ;

          } ?>
          
        <?php } ?>

      </div>

    </div>

    <?php include 'layout/components/single-tools.php' ?>
    <?php include 'layout/components/single-socket.php' ?>

  </div>

</section>

<?php } 

}
