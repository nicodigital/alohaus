<?php include 'inc/get-data.php';

$api_domain = "https://nicolook.com/alohaus/gestor";

$api_url        = $api_domain . "/wp-json/wp/v2";
$options_url    = $api_domain . "/wp-json/acf/v3/options/options";
//https://nicolook.com/alohaus/gestor/wp-json/wp/v2

// Experimental - Get Data from Cache or API
// $get_data = get_cached_data($slug, $api_url, $cache_file, $cache_time);
$get_options = get_data($options_url);
$options = $get_options["acf"];

/* Get Page Content */
if( $page == 'home' || $page == 'en' ){
    $slug = 'home-'.$lang; // home_es || home_en
    $content = get_post( $slug, $api_url );
}

if( $page == 'proyectos' ){
    $slug = 'proyectos-'.$lang; // home_es || home_en
    $content = get_post( $slug, $api_url );
    $get_cases = get_postype( "cases", $api_url );
    $cases = $get_cases;
    // debug($cases);
}

// Ahora $data contiene los datos ya sea desde el caché o desde la API
if ( $content ) {

    $data = $content[0]["acf"];
    // print_r($data);

} else {

    echo "Error al obtener los datos.";

}

