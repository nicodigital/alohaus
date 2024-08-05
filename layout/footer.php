	<footer></footer>
</div> <!-- Barba Container -->

<?php
	include 'layout/modals.php';
	// include 'layout/components/whatsapp.php' ;
?>

</body>
</html>

<?php // Active this to write HTML to public folder
if( MODE == 'html' ){
	$htmlCache->generate();
}