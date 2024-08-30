<?php 
$data = "";
include 'data/get-data.php';
  
$api_domain = "https://www.alohaus.uy/gestor";
$api_url        = $api_domain . "/wp-json/wp/v2";
$options_url    = $api_domain . "/wp-json/acf/v3/options/options";

// Detectar si queremos borrar el cache
if( isset($_GET['cache']) && !empty($_GET['cache']) ){
    $cache = false;
}else{
    $cache = true;
}


$get_options = get_data( $options_url, $cache );
$options = $get_options["acf"];

$cases = get_postype( "cases", $api_url, $cache );

/* Get Page Content */
if( $page == 'home' || $page == 'en' ){
    $slug = 'home-'.$lang; // home_es || home_en
    $content = get_post( $slug, $api_url, $cache );
    $page_type = $content[0]["type"];
    // debug($content);
}

if( $page == 'proyectos' ){
    $slug = 'proyectos-'.$lang; // home_es || home_en
    $content = get_post( $slug, $api_url, $cache );
    $page_type = $content[0]["type"];
}

if( $page != 'home' && $page != 'proyectos' ){ // Case -> Cambiamos el type para saber que tipo de página es.
    $page_type = $cases[0]["type"];
}

// Ahora $data contiene los datos ya sea desde el caché o desde la API
if ( isset($content) ) {
    $data = $content[0]["acf"];
} 

