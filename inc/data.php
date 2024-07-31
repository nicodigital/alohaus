<?php include 'inc/get-data.php';

$api_url = "https://api.id.net.uy/wp-json/wp/v2";

// Definir el slug específico
$slug = 'ufilms'; 

$get_data = get_cached_data($slug, $api_url, $cache_file, $cache_time);

// Ahora $data contiene los datos ya sea desde el caché o desde la API
if ( $get_data ) {

    $data = $get_data[0]["acf"];
    // print_r($data);

} else {

    echo "Error al obtener los datos.";

}

