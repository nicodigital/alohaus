<video class="hero-back" preload autoplay muted playsinline loop  >
      <source src='public/video/Background.mp4' type='video/mp4'>
      Your browser does not support the video tag.
</video>

<?php include 'layout/section/hero.php' ?>

<!-- NOSOTROS-->
<section id="nosotros" class="container">
  <hr class="text-orange mb-2">

  <div class="row relative mb-20">

    <div class="xg:col-1-13">

      <article class="w-[24%]">
        <p class="mb-2 pointer-1x">
          AloHaus nace de la inquietud de un equipo caracterizado por tener un pie en lo digital y otro en la comunicación impresa, brindando soluciones globales. No hay proyecto pequeño, ni menos importante, ni desafío que no queramos afrontar.El compromiso con nuestros clientes, con sus tiempos y sus necesidades, nos ha definido y fortalecido a lo largo del tiempo como socios estratégicos.
        </p>
      </article>

      <p class="absolute top-0 left-[44%] w-[24%] pointer-1x">
        Uno de los pilares de nuestro equipo es disfrutar de la investigación, de continuar creciendo en un rubro donde aparecen nuevas herramientas, lo que conlleva a nuevas posibilidades.
      </p>
    </div>

  </div>

  <div class="row">
    <div class="xg:col-1-13 flex justify-between items-end">
      <div class="translate-y-[-1rem]">
        <?php miniTitle("Proyectos") ?>
      </div>
      <h2 id="title-nosotros" class="big-title title-scroll text-grey-bold mb-1">
        Nosotros
      </h2>
    </div>
  </div>

</section>

<!-- PROJECTS -->
<section id="proyectos" class="container mb-2">
  <hr class="text-orange mb-1">

  <div class="row">
    <div class="xg:col-1-10">
      <h2 id="title-proyectos" class="big-title title-scroll top text-grey-bold mb-1">
        Our pride
      </h2>
    </div>
    <div class="xg:col-11-13 flex justify-end items-end">
      <?php include 'layout/components/column-icons.php' ?>
    </div>
  </div>

  <div class="row mt-20">
    <div class="grid grid-cols-3 gap-[1.5px]">
      <div>
        <p class="w-60% self-end pointer-1x">
          Combinamos creatividad y tecnología para crear marcas memorables, piezas visuales impactantes y experiencias que resuenen con el público.
        </p>
      </div>

      <?php include 'data/works.php';
      foreach ($works as $work) {
        cardCase($work["title"], $work["img"], $work["cliente"], $work["pieza"]);
      }
      ?>

      <div class="flex items-end justify-end">
        <a href="proyectos" class="link-underline">
          <?php miniTitle("Más Proyectos", "up") ?>
        </a>
      </div>

    </div>
  </div>

</section>

<!-- SERVICIOS -->
<section id="servicios" class="mt-[33vh] xl:h-[210vh] 2xl:h-[240vh] 3xl:h-[215vh] 4xl:h-[210vh] 5xl:h-[200vh]">

  <div class="container sticky flex h-screen items-end top-2 mt-[-25vh]">
    <h2 id="title-servicios" class="big-title text-grey-bold mb-2 opacity-0 transition-all duration-[.6s]">
      Modelado y visualiación 3d
    </h2>
  </div>

  <div class="container mt-[-75vh]">
    <div class="row mb-6">
      <?php miniTitle("Servicios") ?>
    </div>
    <div class="row h-full">

      <div class="xg:col-1-13 grid grid-cols-3 gap-2">

        <?php
        foreach ($GLOBALS['servicios'] as $serv) {
          cardServ($serv['num'], $serv['slug'], $serv['title'], $serv['text']);
        } ?>

      </div>

    </div>
  </div>
</section>

<!-- TEAM & CLIENTS-->
<section id="team" class=" bg-orange min-h-screen ctr-pb text-grey-dark">

  <div class="container flex justify-between items-end mb-20">
    <div class="translate-y-[-2.5rem]">
      <?php miniTitle("Team") ?>
    </div>
    <h2 id="title-team" class="big-title text-right mb-2 opacity-20">
      We handle it!
    </h2>
  </div>

  <div class="container grid grid-cols-5">
    <?php include 'data/team.php';
    $x = 1;
    foreach ($team as $t) { ?>

      <figure class="card">
        <img src="public/img/team/team-<?= $x ?>.webp" alt='' loading='lazy' decoding='async' />
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
      <div class="xg:col-11-13 text-right">
        <div class='custom-pagination'></div>
      </div>
    </div>
    <div class="row">
      <div class="col-1-13">

        <div id="clients" class='swiper'>
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
    </div>
  </div>

</section>
