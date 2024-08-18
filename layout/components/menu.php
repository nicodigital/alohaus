<div id="menu">

		<?php if(!$isDesktop){ ?>
			<svg class="xg:hidden w-15% h-auto mb-10" width="187" height="182" viewBox="0 0 187 182" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M86.1396 149.906C73.4503 154.605 61.1549 159.259 48.8676 163.934C33.5504 169.762 18.2422 175.613 2.91948 181.426C2.18835 181.704 1.35405 181.709 0.0105275 181.935C0.0105275 168.039 -0.055604 154.437 0.14363 140.839C0.158599 139.817 1.89137 138.338 3.12292 137.891C14.418 133.794 25.7187 129.69 37.1591 126.03C40.3796 124.999 41.071 123.516 41.0552 120.496C40.9518 100.671 40.8948 80.8445 41.1018 61.0212C41.1385 57.4997 39.9282 56.1948 36.777 55.1407C24.5086 51.037 12.3419 46.6294 0.102706 42.3227C0.102706 28.3356 0.102706 14.521 0.102706 0C62.1842 23.4859 124 46.8714 186.001 70.3266C186.001 83.5837 186.136 96.7368 185.821 109.879C185.784 111.426 183.56 113.645 181.863 114.31C170.383 118.809 158.764 122.951 147.205 127.251C126.976 134.775 106.759 142.329 86.1396 149.906ZM73.1071 113.756C94.5174 106.297 115.928 98.837 138.07 91.1226C115.844 83.2117 94.1947 75.5064 72.2874 67.7091C72.2874 83.2937 72.2874 98.402 73.1071 113.756Z" fill="var(--grey-dark)"/></svg>
		<?php } ?>
		
		<nav>
			<a href="<?= transPath( '' , $lang) ?>" class="item togg <?= status( $page, "home" ) ?>">
				<?= $i18n["menu"][0][0] ?>
			</a>

			<a href="<?php anchor("#nosotros", "home" ) ?> " class="item togg <?php anchor_class($page,"home") ?>" >
				<?= $i18n["menu"][1][0] ?>
			</a>

			<a href="<?php anchor("#team", "home" ) ?>" class="item togg <?php anchor_class($page,"home") ?>" >
				<?= $i18n["menu"][2][0] ?>
			</a>

			<a href="<?= transPath( 'proyectos' , $lang) ?>" class="item" >
				<?= $i18n["menu"][3][0] ?>
			</a>

			<div href="#contacto" class="item togg anchor barba-ignore">
				<?= $i18n["menu"][4][0] ?>
			</div>
		</nav>

		<?php if(!$isDesktop){ ?>
			<div class="flex xg:hidden justify-between mt-10 text-grey-dark">
				<a href="">Español</a>
				<a href="">English</a>
			</div>
		<?php } ?>

	</div>
