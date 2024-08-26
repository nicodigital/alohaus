<?php include 'layout/header.php' ?>

<?php if( $page  == "home" ){ ?>
	<video class="hero-back" preload autoplay muted playsinline loop  >
				<source src='<?= $data["hero_back"] ?>' type='video/mp4'>
				Your browser does not support the video tag.
	</video>
<?php } ?>

	<main>
		<?php echo $content ?>
	</main>
	
<?php include 'layout/footer.php'; 
