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
    <?php include 'data/works.php';

    foreach ($works as $work) { ?>

      <a href="case" class="card filter-item pointer-arrow " data-type="<?= $work["cat"] ?>" >
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