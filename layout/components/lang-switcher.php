<div class="lang-switcher" data-barba-prevent="all" >
    <?php if( $lang == 'es'){ ?>
      <a href="<?= switchPath( 'en') ?>" class="barba-ignore pointer-1x" >
        EN
      </a>
      <a href="<?= switchPath( 'pt') ?>" class="barba-ignore pointer-1x" >
        PT
      </a>
    <?php }else if( $lang == 'pt'){ ?>
      <a href="<?= switchPath( 'en') ?>" class="barba-ignore pointer-1x" >
        EN
      </a>
      <a href="<?= switchPath( 'es' ) ?>" class="barba-ignore pointer-1x" >
        ES
      </a>
    <?php }else{ // ENGLISH  ?>
      <a href="<?= switchPath( 'es' ) ?>" class="barba-ignore pointer-1x" >
        ES
      </a>
      <a href="<?= switchPath( 'pt') ?>" class="barba-ignore pointer-1x" >
        PT
      </a>
    <?php } ?>
</div>