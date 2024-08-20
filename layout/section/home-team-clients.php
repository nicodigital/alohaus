<section id="team" class=" bg-orange min-h-screen py-3 xg:pt-1 ctr-pb text-grey-dark">

  <div class="container flex justify-between mb-10 3xl:mb-20">
    <div class="xg:translate-y-[1.5rem]">
      <?php miniTitle("Team") ?>
    </div>
    <h2 id="title-team" class="big-title hidden xg:block text-right mb-2 opacity-20">
      <?= $data["team_title"] ?>
    </h2>
  </div>

  <div class="container grid xg:grid-cols-5">
    <?php 
    $x = 1;
    foreach ( $data["team"] as $t) { ?>

      <figure class="card">
        <?= picture ($t["foto"]["url"], $t["name"]  ) ?>
        <figcaption>
          <h3><?= $t['name'] ?></h3>
          <h4><?= $t['role'] ?></h4>
          <div>
            <?php if ( $t['linkedin'] ) {
              echo '<a href="' . $t['linkedin'] . '"  class="pointer-1x" target="_blank" rel="noreferrer noopener"  >Likedin</a>';
            }
            if ( $t['instagram'] ) {
              echo '<a href="' . $t['instagram'] . '" class="pointer-1x" target="_blank" rel="noreferrer noopener"  >Instagram</a>';
            }
            if ( $t['behance'] ) {
              echo '<a href="' . $t['behance'] . '" class="pointer-1x" target="_blank" rel="noreferrer noopener"  >Behance</a>';
            }
             ?>
          </div>
        </figcaption>
      </figure>

    <?php $x++;
    } ?>

  </div>

  <div class="container mt-[25vh]">
    <hr class="text-grey-dark mb-1">
    <div class="row mb-[15vh] 3xl:mb-[25vh]">
      <div class="xg:col-1-5 pt-1">
        <?= miniTitle( $i18n["words"]["clients"]) ?>
      </div>
      <div class="xg:col-5-8">
        <p class="pointer-1x pt-1">
          <?= $data["clientes_text"] ?>
        </p>
      </div>
      <div class="xg:col-11-13 hidden xg:block text-right">
        <div class='custom-pag-desktop'></div>
      </div>
    </div>
    <div class="row">
      <div class="col-1-13">

        <div id="clients" class='swiper mobile-wide-fit text-grey-dark'>
          <div class='swiper-wrapper'>
            <?php 
            foreach ($data["clientes_logos"] as $logo) { ?>
              <div class='swiper-slide'>
                <img src="<?= $logo["url"] ?>" alt='<?= $logo["title"] ?>' title='<?= $logo["title"] ?>' loading='lazy' decoding='async' />
              </div>
            <?php } ?>
          </div>
        </div>

      </div>
      <div class="xg:hidden pt-6">
        <div class='custom-pag-mobile text-right'></div>
      </div>
    </div>
  </div>

</section>