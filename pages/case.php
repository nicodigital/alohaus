<?php
$cases = $GLOBALS["cases"];
$lang = $GLOBALS["lang"];

foreach ($cases as $item) {

  $title = $item["title"]["rendered"];
  $case_slug = $item["slug"];

  if ($case_slug == $case) {

    $acf = $item['acf'];

    $main_img = $acf['main_img'];
    $gallery  = $acf['gallery'];
    $desc     = $acf['descripcion_' . $lang];
    $details  = $acf['detalles_' . $lang];
    $types  = $acf['types'];

    $prev_next = get_prev_next( $cases, $case_slug );
    $prev_link = $prev_next["prev"];
    $next_link = $prev_next["next"];

?>

    <section class="container my-14 xg:my-12 3xl:my-16 xg:min-h-screen">

      <div class="columns relative">

        <div class="flex flex-wrap xg:flex-nowrap gap-2">

           <!-- LEFT -->
          <div class="col-1 w-full xg:w-33%">

            <aside class="xg:sticky single-content xg:top-10">
              <div class="flex flex-col justify-between h-full">

                <div class="text-content xg:w-[36rem] animate" data-anim="bottom">
                  <h1 class="text-h1 font-title font-bold mb-2 leading-[1.25]">
                    <?= $title ?>
                  </h1>
                  <p>
                    <?= $desc ?>
                  </p>
                  <p class="mt-6 grid grid-cols-2">
                    <span> Type </span>
                    <span>
                      <?php

                      $z = 1;
                      $type_count = count($types);

                      foreach ($types as $type) {

                        ($z < $type_count) ? $divider = "//" : $divider = ""; ?>

                        <span><?= $type["name"] ?></span> <?= $divider ?>

                      <?php $z++;
                      } ?>
                    </span>
                  </p>

                  <p class="mt-2 grid grid-cols-2 gap-y-2">

                  <?php foreach ( $details as $detail ) { ?>
                        <span> <?= $detail["label"]  ?> </span>
                        <span> <?= $detail["txt"]  ?> </span>
                  <?php } ?>

                  </p>
                </div>

              </div>

            </aside>

          </div>

          <!-- RIGHT -->
          <div class="col-2 w-full xg:w-66% flex flex-col gap-2 xg:min-h-screen animate force-anim" data-anim="bottom" data-delay="400">

            <?php foreach ($gallery as $item) {

              if (checkFileType($item["filename"]) == "video") { ?>

                <video class="w-full aspect-video transition-all" controls preload playsinline>
                  <source src='<?php echo $item["url"] ?>' type='video/mp4'>
                  Your browser does not support the video tag.
                </video>

              <?php } else { // IMAGEN 

                echo picture($item["url"], $title, true, $item["width"], $item["height"], true, "togg-me pointer-expand transition-all");

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
