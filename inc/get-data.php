<?php

$cache_file = 'cache.json'; // Nombre del archivo de caché
$cache_time = 3600; // Tiempo de caché en segundos (1 hora)

/*//////////////////////////// GET DATA /////////////////////////////*/
// Función para obtener datos desde una URL (API)
function get_data($url) {
  $JSON = file_get_contents($url);
  return json_decode($JSON, true);
}

/*///////////////////////// GET POST TYPE ////////////////////////////*/
// Función para obtener datos desde un POST TYPE
function get_postype( $slug, $api_url ) {
    $endpoint = $api_url ."/". $slug;
    $JSON = file_get_contents($endpoint);
    return json_decode($JSON, true);
  }

/*//////////////////////////// GET POST /////////////////////////////*/
// Función para obtener un post específico desde la API
function get_post($slug, $api_url) {
  $post_url = $api_url . '/pages?slug=' . $slug;
  $post_data = get_data($post_url);
  return $post_data;
}

/*//////////////////////////// CLEAN CACHE ///////////////////////////*/
// Verificar si el parámetro cache=0 está presente en la URL
if (isset($_GET['cache']) && $_GET['cache'] == '0') {
// Intentar borrar el archivo de caché si existe
if (file_exists($cache_file)) {
    if (unlink($cache_file)) {
        echo "Debug: El archivo de caché ha sido borrado.\n";
    } else {
        echo "Debug: Error al intentar borrar el archivo de caché.\n";
    }
} else {
    echo "Debug: No se encontró un archivo de caché para borrar.\n";
}
}

/*//////////////////////////// CHECK CACHE ///////////////////////////*/
// Función para verificar y manejar el caché
function get_cached_data($slug, $api_url, $cache_file, $cache_time) {

  // Comprobar si el archivo de caché existe y si aún es válido
  if (file_exists($cache_file)) {

      // Obtener el tiempo de modificación del archivo
      $file_time = filemtime($cache_file); 

      if ((time() - $file_time) < $cache_time) {

          // Leer datos del archivo de caché si aún es válido
          $cached_data = file_get_contents($cache_file);
          return json_decode($cached_data, true);

          // Mensaje de debug
          // echo "Debug: Obteniendo datos desde el caché.\n"; 

      }
  }

  // Si el caché no es válido o no existe, consultar la API
  // Mensaje de debug
  // echo "Debug: Consultando la API.\n"; 
  $acf = get_post($slug, $api_url);

  // Guardar los datos en un archivo de caché
  if ($acf) {
      file_put_contents($cache_file, json_encode($acf));
      // Mensaje de debug
      // echo "Debug: Datos obtenidos desde la API y guardados en el caché.\n"; 
  } else {
      echo "Debug: Error al obtener datos desde la API.\n"; // Mensaje de error
  }

  return $acf;

}
