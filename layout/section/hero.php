<section class='hero container'>

  <div class="row w-full">
    <div class="xg:col-10-13 relative flex xg:justify-end">

      <p class="pointer-1x relative">

        <span class="arrow-intro">
          <svg class="w-full h-auto translate-x-[2rem] translate-y-[-1rem]" width="17" height="17" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M28.1394 0.289888L6.21361 22.2157L6.21357 0.131577L0.303991 0.131556L0.303988 32.304H32.4764V26.3944L10.3923 26.3944L32.3181 4.4686L28.1394 0.289888Z" fill="currentColor" />
          </svg>
        </span>

        <span>
          <?php foreach ($data["hero_text"] as $line) { ?>
            <span class="line-txt">
              <span>
                <?= $line["text_line"] ?>
              </span>
            </span>
          <?php } ?>
        </span>
      </p>

    </div>
  </div>

  <div class="row-brand">
    <div class="col-1-13 relative h-full xg:min-h-[61.5vh] text-orange">

      <?php include "layout/components/brand-intro.php"; ?>

      <h2 id="hero-title" class="big-title hero-title mt-[40rem] xg:mt-0 pb-1">
        <?= $data["hero_title"] ?>
      </h2>
    </div>
  </div>

</section>