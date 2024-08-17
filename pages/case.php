<section class="container my-14 xg:my-12 3xl:my-16">

  <div class="columns relative">

    <div class="flex flex-wrap xg:flex-nowrap gap-2">

      <div class="col-1 w-full xg:w-33%">

        <aside class="xg:sticky single-content xg:top-10">
          <div class="flex flex-col justify-between h-full">

            <div class="text-content xg:w-[36rem] animate" data-anim="bottom" data-delay="900" >
              <h1 class="text-h1 font-title mb-2 leading-[1.25]">
                Larnaudie Single Malt
              </h1>
              <p>
                Nunc interdum lacus sit amet orci. Nunc nulla. Etiam ultricies nisi vel augue. Vestibulum dapibus nunc ac augue. Praesent ut ligula non mi varius sagittis.
              </p>
              <p class="mt-6 text-right xg:text-left">
                Packaging
              </p>
            </div>

          </div>

        </aside>

      </div>

      <div class="col-2  w-full xg:w-66% flex flex-col gap-2 animate force-anim" data-anim="bottom" data-delay="1100" >

        <?php include 'data/works.php';

        foreach ($works as $work) { ?>

          <img class="w-full transition-all" src='<?php echo $work["img"] ?>' <?php img_size($work["img"]) ?> <?php img_size($work["img"]) ?> alt='<?php echo $work["title"] ?>' loading='lazy' decoding='async' />

        <?php } ?>

      </div>

    </div>

    <?php include 'layout/components/single-tools.php' ?>
    <?php include 'layout/components/single-socket.php' ?>

  </div>

</section>
