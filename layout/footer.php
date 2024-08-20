	<footer id="contacto" class="container flex flex-col justify-between min-h-screen text-orange">

		<div class="row pt-4 xg:pt-7 pb-10">

			<h2 class="big-title mb-12 xg:hidden">
				<?= $i18n["words"]["contact"] ?>
			</h2>

			<div class="xg:col-1-4 h-full flex flex-col order-3 xg:order-1 mt-8 xg:mt-0">
				<div class="mb-3">
					<p class="contact-data mb-4 pointer-1x">
						<span>
						<?= $i18n["words"]["spain"] ?>
						</span>
						<span>
							<?= $options["spain"]["tel"] ?> <br>
							<?= $options["spain"]["correo_electronico"] ?>
						</span>
					</p>
					<p class="contact-data mb-4 pointer-1x">
						<span>Uruguay</span>
						<span>
							<?= $options["uruguay"]["tel"] ?> <br>
							<?= $options["uruguay"]["correo_electronico"] ?>
						</span>
					</p>

					<p class="contact-data pointer-1x">
						<span>
						<?= $i18n["words"]["follow_us"] ?>
						</span>
						<span>
							<?php foreach ($options["social"] as $social ) { ?>
								<a href="<?= $social["link"] ?>" target='_blank' rel='noreferrer noopener'>
									<?= $social["label"] ?>
								</a> <br>
							<?php } ?>
						</span>
					</p>
				</div>
			</div>

			<div class="xg:col-6-11 order-2">
				<?php include 'layout/forms/contact-form.php' ?>
			</div>

			<div class="col-11-13 hidden xg:flex justify-end pt-7 xg:order-3">
				<?php include 'layout/components/go-top.php' ?>
			</div>

		</div>

		<div class="row">
			<div class="col-10-13 xg:col-1-9 flex items-end justify-end xg:justify-start order-2 xg:order-1">
				<h2 class="big-title mb-2 hidden xg:block">
					<?= $i18n["words"]["contact"] ?>
				</h2>
				<div class="xg:hidden">
					<?php include 'layout/components/go-top.php' ?>
				</div>
			</div>
			<div class="col-1-10 xg:col-9-13 flex xg:justify-end items-end order-1 xg:order-2">
				<p class="mb-3 text-small">
					© <?= date('Y') ?> AloHaus <br class="xg:hidden" ><?= $i18n["words"]["design_studio"] ?>. <br> All rights reserved.
				</p>
			</div>
		</div>

	</footer>

</div> <!-- Barba Container -->

	<?php
	// include 'layout/modals.php';
	// include 'layout/components/whatsapp.php' ;
	?>

	</body>
	</html>

	<?php // Active this to write HTML to public folder
	if (MODE == 'html') {
		$htmlCache->generate();
	}
