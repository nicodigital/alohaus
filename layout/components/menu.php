<?php

	if( $isMobile || $isTablet ){
		$togg = 'togg';
	}

	?>
	<nav id="menu">

		<?php if(!$isDesktop){ ?>
			<a href="<?=$base_url?>">
				<img class="brand xg:hidden" src="<?=$base_url?>/img/logos/logo.svg<?=$cache?>" alt="<?=$site_name?>">
			</a>
		<?php } ?>

		<a href="<?= transPath( '' , $lang) ?>" class="<?= status( $page, "home" ) ?>">
			<?= $i18n["menu"][0][0] ?>
		</a>

		<a href="<?= transPath( '#nosotros' , $lang) ?> " class="anchor barba-ignore" >
			<?= $i18n["menu"][1][0] ?>
		</a>

		<a href="<?= transPath( '#equipo' , $lang) ?> " class="anchor barba-ignore" >
			<?= $i18n["menu"][2][0] ?>
		</a>

		<a href="<?= transPath( 'proyectos' , $lang) ?>" class="anchor barba-ignore" >
			<?= $i18n["menu"][3][0] ?>
		</a>

		<a href="<?php anchor("#contact-form", "home") ?>" class="ancho barba-ignore">
			<?= $i18n["menu"][4][0] ?>
		</a>

	</nav>
