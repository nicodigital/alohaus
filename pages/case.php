<section class="container xg:mt-12 xg:mb-10 3xl:mt-16 3xl:mb-12">

  <div class="columns relative">

    <div class="flex gap-2">

      <div class="col-1 xg:w-33%">

        <aside class="sticky single-content top-2">
          <div class="flex flex-col justify-between h-full">

            <div class="text-content xg:w-[36rem]">
              <h1 class="text-h1 font-title mb-2">
                Volta
              </h1>
              <p>
                Nunc interdum lacus sit amet orci. Nunc nulla. Etiam ultricies nisi vel augue. Vestibulum dapibus nunc ac augue. Praesent ut ligula non mi varius sagittis.
              </p>
              <p class="mt-6">
                Packaging
              </p>
            </div>

            <div class="flex justify-between items-end  pr-2">

              <div class="togg-col pointer-1x translate-x-[-2rem] translate-y-[1.8rem]">
                <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M28.1394 0.289888L6.21361 22.2157L6.21357 0.131577L0.303991 0.131556L0.303988 32.304H32.4764V26.3944L10.3923 26.3944L32.3181 4.4686L28.1394 0.289888Z" fill="currentColor" />
                </svg>
              </div>

              <?php sharebar("top") ?>

            </div>

          </div>

        </aside>

      </div>

      <div class="col-2 xg:w-66% flex flex-col gap-2">

        <?php include 'data/works.php';

        foreach ($works as $work) { ?>

          <img class="w-full transition-all" src='<?php echo $work["img"] ?>' <?php img_size($work["img"]) ?> <?php img_size($work["img"]) ?> alt='<?php echo $work["title"] ?>' loading='lazy' decoding='async' />

        <?php } ?>

      </div>

    </div>

    <?php include 'layout/components/single-socket.php' ?>

  </div>

</section>

<script>
  const columns = document.querySelector('.columns');
  const col1 = document.querySelector('.col-1');
  const toggCols = document.querySelectorAll('.togg-col');

  toggCols.forEach(toggCol => {
    toggCol.addEventListener('click', () => {
      columns.classList.toggle('toggle-column');
    });
  })
</script>