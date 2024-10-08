<?php 
$types = [];

foreach ($GLOBALS["cases"] as $case) {

  foreach($case["acf"]["types"] as $type) {

      // Verifica si el slug ya existe en el array multidimensional $types
      $exists = false;

      foreach($types as $existingType) {
          if ($existingType[1] === $type["slug"]) {
              $exists = true;
              break;
          }
      }

      // Si no existe, lo añadimos al array $types
      if (!$exists) {

          $types[] = [
              checkTrans($type["name"], $i18n), 
              $type["slug"]
          ];

      }
  }
}


?>

<div class="grid filter grid-cols-2 xg:flex flex-col gap-1 xg:gap-[.5rem]">

  <button class="filter-btn active" data-filter="all">
    <?= $i18n["words"]["all"] ?>
  </button>
  <?php foreach ($types as $type) { ?>

    <button class="filter-btn" data-filter="<?= $type[1] ?>">
      <?= $type[0] ?>
    </button>

  <?php } ?>

</div>