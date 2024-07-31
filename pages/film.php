<?php

$films =  $layout['data']['films'];
$film =   $layout['film'];

foreach ($films as $item) {

  $title = @$item['acfe_flexible_layout_title'];
  $film_slug = slugify($title);

  if ( $film_slug == $film ) {

    $desc = @$item['genero'];
    $cat = @$item['cat'];
    $img = @$item['poster'];
    $intro = @$item['intro_es'];

?>

    <section class="container section py-6">

      <div class='row'>

        <div class='col-[1/13] xg:col-[1/6]'>
            <h2 class="h1 font-bold">
              <?= $title ?>
            </h2>
            <p>
              <?= $desc ?>
            </p>
            <p class="mt-5">
              <?=$intro?>
            </p>
        </div>

        <div class='col-[1/13] xg:col-[7/13]'>
            <img src="<?php echo $img['url'] ?>" alt='' loading='lazy' decoding='async' />
        </div>

      </div>

    </section>

<?php }

}
