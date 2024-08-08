<section id="all-works" class="container grid grid-cols-3 gap-2 xg:mt-15 3xl:my-20">

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

</section>