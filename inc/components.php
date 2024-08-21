<?php

/*////////////////////////////// CARD SERVICIOS /////////////////////////////////*/

function cardServ($num = "01", $slug = '', $title = '', $text = '')
{ ?>

  <div class="card" data-serv="<?= $slug ?>" data-title="<?= $title ?>">
    <span class="xg:hidden"><?= $title ?>.</span>
    <span class="hidden xg:block"><?= $num ?>.</span>
    <p class="pointer-1x">
      <?= $text ?>
    </p>
  </div>

<?php }

/*////////////////////////////// CARD CASE ////////////////////////////////*/

function cardCase($title, $link = '#', $img, $imgW = '', $imgH = '', $cliente = '', $pieza = '')
{ ?>
  <a href="case" class="card pointer-arrow black">
    <figure>
      <?= picture( $img, $title , true, $imgW, $imgH ) ?>
      <figcaption class="info">
        <span><?= $title ?></span>
        <span class="dots"></span>
        <span>
          <span>
            Cliente: <?= $cliente ?>
          </span>
          <span>
            Pieza: <?= $pieza ?>
          </span>
        </span>
      </figcaption>
    </figure>
  </a>

<?php }

/*//////////////////////////// MINI-TITLE ///////////////////////////////*/
function miniTitle($text, $arrow = "down")
{ ?>

  <div class="mini-title">
    <span>
      <?= $text ?>
    </span>
    <span>
      <?php if ($arrow == "down") { ?>
        <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M4.64116 0.28968L26.5669 22.2155L26.567 0.131369L32.4766 0.131348L32.4766 32.3038H0.304133V26.3942L22.3882 26.3942L0.462447 4.46839L4.64116 0.28968Z" fill="currentColor" />
        </svg>
      <?php } else { ?>
        <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M4.64074 32.7103L26.5665 10.7845L26.5666 32.8686L32.4762 32.8687V0.696201H0.303711V6.6058H22.3878L0.462025 28.5316L4.64074 32.7103Z" fill="currentColor" />
        </svg>
      <?php } ?>
    </span>
  </div>

<?php }

/*///////////////////////////// SHAREBAR ////////////////////////////////*/
function sharebar($items_position = "")
{ ?>

  <div class="sharebar <?= $items_position ?> flex flex-col items-end text-right">

    <svg width="73" height="79" viewBox="0 0 73 79" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M57.0306 31.796C65.8001 31.796 72.9286 24.6671 72.9286 15.898C72.9286 7.1289 65.7997 0 57.0306 0C48.2611 0 41.1326 7.1289 41.1326 15.898C41.1326 17.3433 41.3279 18.7496 41.699 20.0777L27.285 28.3785C24.3944 25.4097 20.3514 23.5543 15.898 23.5543C7.1285 23.5543 0 30.6832 0 39.4523C0 48.2214 7.1289 55.3503 15.898 55.3503C20.3511 55.3503 24.3941 53.4948 27.285 50.5261L41.68 58.8464C41.3089 60.1745 41.1136 61.5808 41.1136 63.0261C41.1136 71.7956 48.2425 78.9241 57.0116 78.9241C65.7807 78.9241 72.9096 71.7952 72.9096 63.0261C72.9096 54.2566 65.7807 47.1281 57.0116 47.1281C52.4999 47.1281 48.4178 49.0226 45.5276 52.05L31.1916 43.7688C31.5822 42.4016 31.7971 40.9368 31.7971 39.4524C31.7971 37.9485 31.5822 36.5032 31.1916 35.136L45.5276 26.8548C48.4378 29.9017 52.5198 31.7962 57.0316 31.7962L57.0306 31.796ZM65.1165 63.046C65.1165 67.4991 61.4837 71.1319 57.0306 71.1319C52.5775 71.1319 48.9447 67.4991 48.9447 63.046C48.9447 58.5929 52.5775 54.9601 57.0306 54.9601C61.4837 54.9601 65.1165 58.5929 65.1165 63.046ZM7.81149 39.472C7.81149 35.0189 11.4443 31.3861 15.8974 31.3861C20.3505 31.3861 23.9833 35.0189 23.9833 39.472C23.9833 43.9251 20.3505 47.5579 15.8974 47.5579C11.4443 47.5579 7.81149 43.9251 7.81149 39.472ZM57.0305 7.812C61.4836 7.812 65.1164 11.4448 65.1164 15.8979C65.1164 20.351 61.4836 23.9838 57.0305 23.9838C52.5774 23.9838 48.9446 20.351 48.9446 15.8979C48.9446 11.4448 52.5579 7.812 57.0305 7.812Z" fill="currentColor" />
    </svg>

    <div class="items flex flex-col mt-[3.1rem] gap-[.5rem]">
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?=$GLOBALS["url"]?>" target='_blank' rel='noreferrer noopener' >
            Facebook
        </a>
        <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?=$GLOBALS["url"]?>" target='_blank' rel='noreferrer noopener'>
            Linkedin
        </a>
        <a href="https://twitter.com/intent/tweet?text=<?= $GLOBALS["meta_desc"] ?>&amp;url=<?=$GLOBALS["url"]?>">
            X
        </a>
        <a href="whatsapp://send?text=<?=$GLOBALS["url"]?>" >
          WhatsApp
        </a>
    </div>

  </div>

<?php }
