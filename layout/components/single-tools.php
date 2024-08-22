<div class="single-tools hidden xg:flex justify-between">
  <div class="prev-next flex xg:translate-y-[2rem]">

    <?php if( $prev_link ): ?>
      <a href="<?= $base_url ?>case/<?= $prev_link ?>" class="pointer-1x" >
        <svg width="44" height="46" viewBox="0 0 44 46" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M43.1921 25.732L12.1844 25.732L27.8001 41.3479L23.6215 45.5266L0.87207 22.7773L23.6215 0.0278565L27.8002 4.20657L12.1844 19.8224L43.1921 19.8225V25.732Z" fill="currentColor" />
        </svg>
      </a>
    <?php endif ?>

    <?php if( $next_link ): ?>
      <a href="<?= $base_url ?>case/<?= $next_link ?>" class="pointer-1x" >
        <svg width="43" height="46" viewBox="0 0 43 46" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M0.0511054 19.8225L31.0588 19.8225L15.4431 4.20665L19.6217 0.0278619L42.3711 22.7773L19.6217 45.5266L15.443 41.3479L31.0588 25.7321L0.0511054 25.732V19.8225Z" fill="currentColor" />
        </svg>
      </a>
    <?php endif ?>
  </div>
  <?php sharebar("top") ?>
</div>