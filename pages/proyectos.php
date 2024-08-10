<section id="all-works" class="container xg:mt-12 xg:mb-10 3xl:mt-16 3xl:mb-12">

  <div class="row filter ctr-pb">

    <div class="xg:col-1-5">
      <h1>
        Cada nuevo proyecto, <br> 
        un crecimiento, <br>
        Cada nueva herramienta,<br>
         una conquista.
      </h1>
    </div>

    <div class="xg:col-5-9">
      <?php include 'layout/components/filter.php' ?>
    </div>

    <div class="xg:col-9-13 flex justify-end">
        <?php include 'layout/components/sharebar.php' ?>
    </div>

  </div>

  <div class="grid grid-cols-3 gap-2">
    <?php include 'data/works.php';

    foreach ($works as $work) { ?>

      <a class="card pointer-arrow">
        <figure>
          <img src='<?php echo $work["img"] ?>' <?php img_size($work["img"]) ?> <?php img_size($work["img"]) ?> alt='<?php echo $work["title"] ?>' loading='lazy' decoding='async' />
          <figcaption>
            <span><?= $work["title"]  ?></span>
            <span>
              <span>
                Cliente: <?= $work["cliente"]  ?>
              </span>
              <span>
                Pieza: <?= $work["pieza"]  ?>
              </span>
            </span>
          </figcaption>
        </figure>
      </a>

    <?php } ?>
  </div>
</section>