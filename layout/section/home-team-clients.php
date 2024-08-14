<section id="team" class=" bg-orange min-h-screen py-3 xg:pt-1 ctr-pb text-grey-dark">

  <div class="container flex justify-between items-end mb-20">
    <div class="xg:translate-y-[-2.5rem]">
      <?php miniTitle("Team") ?>
    </div>
    <h2 id="title-team" class="big-title hidden xg:block text-right mb-2 opacity-20">
      We handle it!
    </h2>
  </div>

  <div class="container grid xg:grid-cols-5">
    <?php include 'data/team.php';
    $x = 1;
    foreach ($team as $t) { ?>

      <figure class="card">
        <img src="public/img/team/team-<?= $x ?>.webp" <?php img_size('public/img/team/team-'.$x .'.webp' ) ?> alt='' loading='lazy' decoding='async' />
        <figcaption>
          <h3><?= $t['name'] ?></h3>
          <h4><?= $t['rol'] ?></h4>
          <div>
            <?php if (isset($t['linkedin'])) {
              echo '<a href="' . $t['linkedin'] . '">Likedin</a>';
            }
            if (isset($t['instagram'])) {
              echo '<a href="' . $t['instagram'] . '">Instagram</a>';
            } ?>
          </div>
        </figcaption>
      </figure>

    <?php $x++;
    } ?>

  </div>

  <div class="container mt-[25vh]">
    <hr class="text-grey-dark mb-1">
    <div class="row mb-[25vh]">
      <div class="xg:col-1-5">
        <?= miniTitle("Clientes") ?>
      </div>
      <div class="xg:col-5-8">
        <p class="pointer-1x">
          Su satisfacción es nuestra mayor recompensa, y nos enorgullece haber contribuido al éxito de sus proyectos. Juntos, hemos logrado resultados excepcionales, y esperamos seguir colaborando para alcanzar nuevas metas.
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
            <?php include 'data/clients.php';
            foreach ($clientes as $c) { ?>
              <div class='swiper-slide'>
                <img src="public/img/clients/<?= $c ?>" alt='' loading='lazy' decoding='async' />
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