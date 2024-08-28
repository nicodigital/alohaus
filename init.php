<?php
include 'inc/identity.php';
include 'inc/url.php';
include 'inc/tools.php';
include 'inc/html-cache.php';
/*//////////////////////////// PHP ////////////////////////////////*/
error_reporting(E_ALL);
ini_set('display_errors', 1);
// ini_set( 'log_errors', 1 );
// ini_set( 'error_log', WP_CONTENT_DIR . '/debug.log' );

ini_set('upload_max_size', '64M');
ini_set('post_max_size', '64M');
ini_set('max_execution_time', '300');
// ini_set("mail.log", "mail.log");
// ini_set("mail.add_x_header", TRUE);

/*//////////////////////////// ROUTING ////////////////////////////*/
/*
Debes configurar las siguientes variables para que todo funcione correctamente
$base_url -> Es la url absoluta del sitio
$root_folder -> Es la carpeta donde se encuentra el proyecto
*/

$protocol     = 'https';
$root_url     = $protocol . "://$_SERVER[HTTP_HOST]";
$domain       = $root_url;
$assets_path  = "public/";

if ($_SERVER['SERVER_NAME'] == "localhost") { // <-- LOCALHOST

  $base_url     = $protocol . "://$_SERVER[HTTP_HOST]" . '/' . $site_slug . '/'; // <-- Tiene que tener slash al final

} else if ($_SERVER['SERVER_NAME'] == $site_slug . ".test") { //<-- .TEST

  $base_url     = $protocol . "://" . $site_slug . ".test/";
  
} else if ( $_SERVER['SERVER_NAME'] == "nicolook.com" ) { //<-- TESTING

  $base_url     = 'https://' . "$_SERVER[HTTP_HOST]" . '/' . $site_slug . '/'; // <-- Tiene que tener slash al final

} else {

  $base_url     = $domain . '/'; // <-- Tiene que tener slash al final

}

$port           = $_SERVER['SERVER_PORT'];
$url            = strtok("https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", '?');
$uri            = $_SERVER['REQUEST_URI'];
$current_folder = dirname($_SERVER['PHP_SELF']);
$current_page   = $root_url . $current_folder;
$current_url    = $_SERVER['REQUEST_URI'];
$url_array      = explode('/', $url);

$page           = end($url_array);
$slug           = get_slug($url);
$bfe_slug       = isset($url_array[count($url_array) - 2]) ? $url_array[count($url_array) - 2] : '';

/*///////////////////////// CONSTANTES ////////////////////////*/

/* Define mode site */
define('MODE', "php" );
// define('MODE', "html" );

define('LAYOUT', 'layout/');
define('CODEX', 'codex/');

/* Comentar esto si queremos urls absolutas en modo html */
// if( MODE == 'html' ){
//   $base_url = "./";
//   $assets_path = "";
// }

define('BASE_URL', $base_url );

/* Assets path */
define('ASSETS_PATH', $assets_path );
// define('ASSETS_PATH', "" );

/* Get IP */
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
  $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
  $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
  $ip = $_SERVER['REMOTE_ADDR'];
}

/*///////////////////////// FORCE PAGE NAME ////////////////////////*/

if ($page == '' || $page == 'index.php' || $page == 'index') {
  $page = 'home';
}

/*/////////////////////////// CANONICAL URL /////////////////////////*/

$canonical_url = $url;

/*//////////////////////// MOBILE DETECT /////////////////////////////*/
require 'inc/Mobile_Detect.php';
$detect = new Mobile_Detect;

/*/////////////////// FILES VERSIÓN & BROWSER CACHE //////////////////*/
$cache = '?v=' . time();
// $cache = '';

if ($cache != "") {
  header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");
}

/* //////////////////////////// INCLUDES ///////////////////////////*/
include 'inc/detect-platform.php';
include 'inc/get-lang.php';
include 'data/data.php';
include 'inc/get-page.php';
include 'lang/' . $lang . '.php';
include 'inc/contact-info.php';
include 'inc/components.php';
include 'inc/meta-tags.php';
include_once 'inc/template.class.php';

/* Data */
include 'data/servicios.php';

$recaptcha_key = "123";
/*//////////////////////// CHECK FUNCTION MAIL ////////////////////////////*/
// if ( function_exists( 'mail' ) ){
//     echo 'mail() is available';
// }else{
//     echo 'mail() has been disabled';
// }

$htmlCache = new HTMLCache(MODE, $page);


