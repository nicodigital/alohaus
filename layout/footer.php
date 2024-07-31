	<footer class="container py-4">
		<div class="row">
			<div class="col-[1/7] md:col-[1/6]">
				© <?= date('Y') ?>
			</div>
			<div class="col-[7/13]">
				Lorem ipsum dolor sit amet.
			</div>
		</div>
	</footer>

</div> <!-- Barba Container -->

<?php
	include 'layout/modals.php';
	include 'layout/components/go-top.php';
	// include 'layout/components/whatsapp.php' ;
?>

</body>
</html>

<?php // Active this to write HTML to public folder
if( MODE == 'html' ){
	$htmlCache->generate();
}