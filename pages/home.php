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

      <?= miniTitle("Proyectos","#") ?>

      <h2 class="big-title mb-1">
        Nosotros
      </h2>

    </div>


  </div>
</section>

<section class="container projects">
  <hr class="text-orange mb-1">

  <div class="row">
    <div class="xg:col-1-9">
      <h2 class="big-title mb-1">
        Proyectos
      </h2>
      
    </div>
    <div class="xg:col-9-13 flex justify-end">
      <?php miniTitle("Ver todos","#") ?>
    </div>
  </div>

  <div class="row mt-20">

    <div class="grid grid-cols-3 gap-2">
      <div>
        <p class="w-66%">
        Combinamos creatividad y tecnología para crear marcas memorables, piezas visuales impactantes y experiencias que resuenen con el público.
        </p>
      </div>
      <?php card("Larnaudie Single Malt", ASSETS_PATH ."img/works/alohaus-larnaudie-cover.jpg" ) ?>
      <?php card("Larnaudie Single Malt", ASSETS_PATH ."img/works/alohaus-larnaudie-cover.jpg" ) ?>
      <?php card("Larnaudie Single Malt", ASSETS_PATH ."img/works/alohaus-larnaudie-cover.jpg" ) ?>
      <?php card("Larnaudie Single Malt", ASSETS_PATH ."img/works/alohaus-larnaudie-cover.jpg" ) ?>
      <?php card("Larnaudie Single Malt", ASSETS_PATH ."img/works/alohaus-larnaudie-cover.jpg" ) ?>
      <?php card("Larnaudie Single Malt", ASSETS_PATH ."img/works/alohaus-larnaudie-cover.jpg" ) ?>
      <?php card("Larnaudie Single Malt", ASSETS_PATH ."img/works/alohaus-larnaudie-cover.jpg" ) ?>
      <div>
        <p class="w-66%">
        Cada nuevo proyecto, un crecimiento, <br>
        Cada nueva herramienta, una conquista.
        </p>
      </div>

  </div>
</section>

<!-- <section class='container row'>
  <div class="col-1-4">
  <h2>Proyectos</h2>
  </div>
  <div class="col-4-13">
    <div class="grid grid-cols-2 gap-2">
      <div class="mod">xxx</div>
      <div class="mod">xxx</div>
      <div class="mod">xxx</div>
    </div>
  </div>
</section> -->

<?php //include 'layout/section/contacto.php' 
?>