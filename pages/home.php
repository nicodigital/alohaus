<?php include 'layout/section/hero.php' ?>

<section class="container">
  <hr class="text-orange mb-2">

  <div class="row relative mb-20">

    <div class="xg:col-1-13">

      <article class="w-[24%]">
        <p class="mb-2">
          AloHaus nace de la inquietud de un equipo caracterizado por tener un pie en lo digital y otro en la comunicación impresa, brindando soluciones globales. No hay proyecto pequeño, ni menos importante, ni desafío que no queramos afrontar.El compromiso con nuestros clientes, con sus tiempos y sus necesidades, nos ha definido y fortalecido a lo largo del tiempo como socios estratégicos.
        </p>
      </article>

      <p class="absolute top-0 left-[44%] w-[24%]">
        Uno de los pilares de nuestro equipo es disfrutar de la investigación, de continuar creciendo en un rubro donde aparecen nuevas herramientas, lo que conlleva a nuevas posibilidades.
      </p>
    </div>

  </div>

  <div class="row">
    <div class="xg:col-1-13 flex justify-between items-end">
      <?= miniTitle("Proyectos", "#") ?>
      <h2 class="big-title text-orange mb-1">
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
      <h2 class="big-title text-orange mb-1">
        LO QUE HACEMOS
      </h2>
    </div>
    <div class="xg:col-11-13 flex justify-end items-end">
      <?php include 'layout/components/column-icons.php' ?>
    </div>
  </div>

  <div class="row mt-20">

    <div class="grid grid-cols-3 gap-2">
      <div>
        <p class="w-60% self-end">
          Combinamos creatividad y tecnología para crear marcas memorables, piezas visuales impactantes y experiencias que resuenen con el público.
        </p>
      </div>
      <?php cardCase("Larnaudie Single Malt", ASSETS_PATH . "img/works/alohaus-larnaudie-cover.jpg") ?>
      <?php cardCase("Larnaudie Single Malt", ASSETS_PATH . "img/works/alohaus-larnaudie-cover.jpg") ?>
      <?php cardCase("Larnaudie Single Malt", ASSETS_PATH . "img/works/alohaus-larnaudie-cover.jpg") ?>
      <?php cardCase("Larnaudie Single Malt", ASSETS_PATH . "img/works/alohaus-larnaudie-cover.jpg") ?>
      <?php cardCase("Larnaudie Single Malt", ASSETS_PATH . "img/works/alohaus-larnaudie-cover.jpg") ?>
      <?php cardCase("Larnaudie Single Malt", ASSETS_PATH . "img/works/alohaus-larnaudie-cover.jpg") ?>
      <?php cardCase("Larnaudie Single Malt", ASSETS_PATH . "img/works/alohaus-larnaudie-cover.jpg") ?>
      <div class="flex items-end justify-end">
        <?= miniTitle("Más Proyectos", "#", "up") ?>
      </div>

    </div>
</section>

<!-- SERVICIOS -->
<section id="servicios" class="mt-[33vh] h-[200vh]">

  <div class="container sticky flex h-screen items-end top-2 mt-[-25vh]">
    <h2 class="big-title text-orange mb-2">
      Modelado y visualiación 3d
    </h2>
  </div>

  <div class="container mt-[-75vh]">
    <div class="row mb-6">
      <?= miniTitle("Servicios", "#") ?>
    </div>
    <div class="row h-full">

      <div class="xg:col-1-13 grid grid-cols-3 gap-2 grilla">

        <?php
        foreach ($GLOBALS['servicios'] as $serv) {
          cardServ($serv['num'], $serv['slug'], $serv['title'], $serv['text']);
        } ?>

      </div>

    </div>
  </div>
</section>

<!-- TEAM & CLIENTS-->
<section id="team" class=" bg-orange min-h-screen ctr-pb text-grey-dark ">

  <div class="container flex justify-between items-end mb-20">
    <?= miniTitle("Team", "#") ?>
    <h2 class="big-title text-right mb-2">
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
        <?= miniTitle("Clientes", "#") ?>
      </div>
      <div class="xg:col-5-8">
        <p>
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



<?php //include 'layout/section/contacto.php' 
?>