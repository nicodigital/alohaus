<?php
// META TITLE -> Lo ideal es de 65 caracteres
$page_title = str_replace('-',' ', $page );

if( $page == 'home'){
  $meta_title = $site_name." — ".$claim;
}else{
  $meta_title = ucfirst($page_title)." — ".$site_name;
}

// META description -> Esta debe tener hasta 150 caracteres
$description = '';