<div class="lang-switcher" >
    <?php if( $lang == 'es'){ ?>
      <a href="<?= switchPath( 'en') ?>" class="pointer-1x" >
        EN
      </a>
      <a href="<?= switchPath( 'pt') ?>" class="pointer-1x" >
        PT
      </a>
    <?php }else if( $lang == 'pt'){ ?>
      <a href="<?= switchPath( 'en') ?>" class="pointer-1x" >
        EN
      </a>
      <a href="<?= switchPath( 'es' ) ?>" class="pointer-1x" >
        ES
      </a>
    <?php }else{ // ENGLISH  ?>
      <a href="<?= switchPath( 'es' ) ?>" class="pointer-1x" >
        ES
      </a>
      <a href="<?= switchPath( 'pt') ?>" class="pointer-1x" >
        PT
      </a>
    <?php } ?>
</div>