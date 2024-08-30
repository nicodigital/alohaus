<?php

/*//////////////////////////// GET DATA /////////////////////////////*/
// Función para obtener datos desde una URL (API)
function get_data($url) {
    $data = file_get_contents($url);
    return json_decode($data, true);
}

/*///////////////////////// GET POST TYPE ////////////////////////////*/
// Función para obtener datos desde un POST TYPE
function get_postype($slug, $api_url) {

    $endpoint = $api_url . "/" . $slug;
    $response = file_get_contents($endpoint);

    if ($response === FALSE) {
        return null;
    }

    return json_decode($response, true);

}

/*//////////////////////////// GET POST /////////////////////////////*/
// Función para obtener un post específico desde la API
function get_post($slug, $api_url) {

    $post_url = $api_url . '/pages?slug=' . $slug;
    $data = file_get_contents($post_url);

    return json_decode($data, true);

}

