<?php

/*/////////////////////////////// SANITY ////////////////////////////////*/

if (!function_exists('sanity')) {

  function sanity($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
}

/*///////////////////////////// CLEAR HTML ///////////////////////////////*/

function clearHtml($texto, $echo = true)
{
  // Utiliza la función strip_tags para eliminar las etiquetas HTML
  $textoSinTags = strip_tags($texto);

  // Retorna el texto sin etiquetas
  if ($echo == false) {
    return $textoSinTags;
  } else {
    echo $textoSinTags;
  }
}

/*///////////////////////////// FIX URL ///////////////////////////////*/

function fixUrl($url, $echo = true)
{
  // Utiliza filter_var con FILTER_SANITIZE_URL para sanear la URL
  $urlSaneada = filter_var($url, FILTER_SANITIZE_URL);

  // Retorna la URL saneada
  if ($echo == false) {
    return $urlSaneada;
  } else {
    echo $urlSaneada;
  }
}

/*///////////////////////////// IMAGE SIZE ///////////////////////////////*/

if (!function_exists('img_size')) {

  function img_size($path, $echo = true)
  {

    list($width, $height, $type, $attr) = getimagesize($path);

    if ($echo == false) {
      return $attr;
    } else {
      echo $attr;
    }
  }
}

/*/////////////////////////////// SLUGIFY /////////////////////////////////*/

if (!function_exists('slugify')) {

  function slugify($text, string $divider = '-')
  {

    // Reemplaza las letras con tildes y la letra "ñ"
    $caracteres_especiales = array(
      'á' => 'a',
      'é' => 'e',
      'í' => 'i',
      'ó' => 'o',
      'ú' => 'u',
      'ñ' => 'n'
    );

    $text = str_replace(array_keys($caracteres_especiales), array_values($caracteres_especiales), $text);

    // replace non letter or digits by divider
    $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, $divider);

    // remove duplicate divider
    $text = preg_replace('~-+~', $divider, $text);

    // lowercase
    $text = strtolower($text);

    if (empty($text)) {
      return 'n-a';
    }

    return $text;
  }
}

/* ///////////////////////////// TOWEBP /////////////////////////////*/

function toWebp($imgurl, $echo = true)
{

  if ($imgurl) {
    // Obtener la información de la ruta del archivo
    $imgInfo = pathinfo($imgurl);

    // Cambiar la extensión
    if ((strpos($_SERVER['HTTP_ACCEPT'], 'image/webp') !== false) && ($imgInfo['extension'] != "gif"  && $imgInfo['extension'] != "svg")) {

      $webp = $imgInfo['dirname'] . '/' . $imgInfo['filename'] . '.webp';
    } else {

      $webp = $imgInfo['dirname'] . '/' . $imgInfo['filename'] . '.' . $imgInfo['extension'];
    }

    if ($echo == false) {
      return $webp;
    } else {
      echo $webp;
    }
  }
}

/* /////////////////////////// WEBP HACK ///////////////////////////*/

if (!function_exists('webp')) {

  function webp($ext, $echo = true)
  {

    if (strpos($_SERVER['HTTP_ACCEPT'], 'image/webp') !== false) {
      $ext = 'webp';
    }

    if ($echo == false) {
      return $ext;
    } else {
      echo $ext;
    }
  }
}

/*///////////////////////////// PICTURE ///////////////////////////////*/

  /**
   * // Retorna el markup <picture> para la imagen
   * @param mixed $imagePath
   * @return string
   */

  if (!function_exists('picture')) {

    function picture($imagePath, $alt = "", $lazy = true, $width = null, $height = null, $forceWebP = false, $class = "" )
    {
        // Obtén la ruta sin la extensión
        $imagePathWithoutExtension = pathinfo($imagePath, PATHINFO_DIRNAME) . '/' . pathinfo($imagePath, PATHINFO_FILENAME);
        $webpImagePath = $imagePathWithoutExtension . '.webp';

        // Si no se proporcionan $width y $height, los calculamos
        if (is_null($width) || is_null($height)) {
            list($width, $height) = getimagesize($imagePath);
        }

        // Escapa el atributo alt para evitar inyecciones
        $alt_stripped = htmlspecialchars(strip_tags($alt), ENT_QUOTES);

        // Construye el markup <picture>
        $markup = "<picture>\n";

        // Agrega el <source> para webp si el archivo existe o si se fuerza su generación
        if ($forceWebP || file_exists($webpImagePath)) {
            $markup .= "    <source srcset='{$webpImagePath}' type='image/webp'>\n";
        }

        // Determina el tipo de imagen basado en la extensión del archivo
        $extension = strtolower(pathinfo($imagePath, PATHINFO_EXTENSION));
        $imageType = null;

        if (in_array($extension, ['jpg', 'jpeg'])) {
            $imageType = 'image/jpeg';
        } elseif ($extension === 'png') {
            $imageType = 'image/png';
        }

        // Agrega el <source> para jpeg o png según corresponda
        if ($imageType === 'image/jpeg') {
            $markup .= "    <source srcset='{$imagePath}' type='image/jpeg'>\n";
        } elseif ($imageType === 'image/png') {
            $markup .= "    <source srcset='{$imagePath}' type='image/png'>\n";
        }

        // Añade atributos lazy
        $lazyAttr = $lazy ? 'loading="lazy"' : '';

        // Agrega el <img> con las dimensiones y el título, unificando title con alt
        $markup .= "    <img class='{$class}' src='{$imagePath}' alt='{$alt_stripped}' title='{$alt_stripped}' {$lazyAttr} decoding='async' width='{$width}' height='{$height}' />\n";

        // Cierra el markup <picture>
        $markup .= "</picture>";

        return $markup;
    }

}


/* //////////////////////////// FORMAT NUMBER  ////////////////////////////*/

function setNum($number) {
  return str_pad($number, 2, '0', STR_PAD_LEFT);
}

/*/////////////////////////// CHECK FILE TYPE //////////////////////////*/

function checkFileType($filename) {
  // Listado de extensiones de imagen y video
  $imageExtensions = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
  $videoExtensions = ['mp4', 'mov', 'avi', 'mkv', 'webm', 'flv', 'wmv', 'm4v'];

  // Extraer la extensión del archivo
  $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

  // Verificar si es una imagen
  if (in_array($extension, $imageExtensions)) {
      return 'image';
  }

  // Verificar si es un video
  if (in_array($extension, $videoExtensions)) {
      return 'video';
  }

  // No es ni imagen ni video
  return false;
}

// Ejemplos de uso
// echo checkFileType('example.jpg'); // Retorna 'image'
// echo checkFileType('example.mp4'); // Retorna 'video'
// echo checkFileType('example.txt'); // Retorna false


/*////////////////////////// THE PAGE STATUS //////////////////////////*/

if (!function_exists('status')) {

  function status($fileName,  $target, $echo = true)
  {

    $active = 'active';

    if ($fileName == $target) {

      if ($echo == true) {
        echo $active;
      } else {
        return $active;
      }
    }
  }
}

/*/////////////////////////// THE ANCHOR /////////////////////////////*/

if (!function_exists('anchor')) {

  function anchor($hash, $target, $echo = true)
  {

    if ($target == 'home') {
      $anchor = $hash;
    } else {
      $anchor = BASE_URL . $target . $hash;
    }

    if ($echo == true) {
      echo $anchor;
    } else {
      return $anchor;
    }
  }
}


/*/////////////////////////// ANCHOR CLASS /////////////////////////////*/

if (!function_exists('anchor_class')) {

  function anchor_class($fileName,  $target, $echo = true)
  {

    $anchor = 'anchor';

    if ($fileName == $target) {

      if ($echo == true) {
        echo $anchor;
      } else {
        return $anchor;
      }
    }
  }
}

/*////////////////////////// THE SMOOTH LINK //////////////////////////*/

if (!function_exists('smooth')) {

  function smooth($target, $echo = true)
  {

    $class = '';

    if ($target == 'home' && $GLOBALS['curr_page'] == 'home') {
      $class = 'smooth';

      if ($GLOBALS['detect']->isMobile()) {
        $class .= ' togg';
      }
    }

    if ($echo == true) {
      echo $class;
    } else {
      return $class;
    }
  }
}

/*///////////////////////////// HOME LINK ///////////////////////////*/

function homeLink( $modo = 'link' ) {

    $anchor = $barbaIgnore = "";

  if( $GLOBALS["page"] == "home" ){
    
    $homeLink = "#top";
    $anchor = "anchor";
    $barbaIgnore = "data-barba-prevent='self'";

  }else{ // not home

    if ( $GLOBALS["lang"] != 'es') {
      $homeLink = $GLOBALS["base_url"] . $GLOBALS["lang"] . "/#top";
   }else{
     $homeLink = "#top";
   }

  }

  if( $modo == 'link' ){
    echo $homeLink;
  }else if( $modo == 'barba-ignore' ){
    echo $barbaIgnore;
  }else{
    echo $anchor;
  }

}

/*//////////////////////////// CROP TXT ////////////////////////////*/

if (!function_exists('crop_txt')) {

  function crop_txt($string, $word_limit)
  {
    $words = explode(' ', $string, ($word_limit + 1));
    if (count($words) > $word_limit)
      array_pop($words);
    return implode(' ', $words);
  }
}

/*/////////////////////////////// WAPLINK ////////////////////////////////*/

function wapplink($detect, $phone)
{

  if ($detect) {

    $whapp_link = 'https://wa.me/' . $phone;
  } else {
    $whapp_link = 'https://web.whatsapp.com/send?phone=' . $phone;
  }

  echo $whapp_link;
}


/*///////////////////////////// LOG GENERATOR ////////////////////////////*/

if (!function_exists('log_gen')) {

  function log_gen($data)
  {
    file_put_contents('log_gen.txt', $data . PHP_EOL, FILE_APPEND | LOCK_EX);
  }
}


/*////////////////////////// PREV & NEXT //////////////////////////*/

function get_prev_next( $cases, $current_slug ) {

  $previous_slug = false;
  $next_slug = false;

  // Recorremos el array para encontrar el slug actual y determinar los slugs anterior y siguiente.
  foreach ($cases as $index => $case) {
      if ($case['slug'] === $current_slug) {
          // Verificar si existe un post anterior.
          if (isset($cases[$index - 1])) {
              $previous_slug = $cases[$index - 1]['slug'];
          }

          // Verificar si existe un post siguiente.
          if (isset($cases[$index + 1])) {
              $next_slug = $cases[$index + 1]['slug'];
          }

          // Una vez encontrado el slug actual, podemos salir del loop.
          break;
      }
  }

  // Retornar un array con los slugs anteriores y siguientes, o false si no existen.
  return [
      'prev' => $previous_slug,
      'next' => $next_slug
  ];
  
}

// Ejemplo de uso:
// $cases = [
//   ['slug' => 'case-1'],
//   ['slug' => 'case-2'],
//   ['slug' => 'case-3'],
//   // Otros elementos...
// ];

// $current_slug = 'case-2';
// $result = get_prev_next($cases, $current_slug);

// print_r($result);
// Devolverá algo como:
// Array
// (
//     [previous] => case-1
//     [next] => case-3
// )


/*///////////////////////////// DEBUG ////////////////////////////*/

if (!function_exists('debug')) {

  function debug($arr, $die = false)
  {
    echo "<pre class='debug lenis lenis-scrolling lenis-smooth'>";
    $out = print_r($arr, true);
    echo htmlentities($out);
    echo "</pre>";

    if ($die) {
      die();
    }
  }
}
