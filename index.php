<?php include 'init.php';


if( $bfe_slug == 'film' ){ // CASO SINGLE

	$uri = get_uri( $lang, 'film' ); 
	// $uri[1] <-- Aqui esta el nombre del archivo del single correspondiente

	$content = new Template( 'pages/'.$uri[1].'.php', [
		'base_url' => $base_url,
		'i18n' => $i18n,
		'film' => $uri[0],
		'data' => $data,
	] );

}else{ // CASO NORMAL

	$uri = get_uri( $lang ); 

	$content = new Template( 'pages/'.$uri[0].'.php', [
		'base_url' => $base_url,
		'i18n' => $i18n,
		'data' => $data
	] );

}

include 'layout/layout.php';