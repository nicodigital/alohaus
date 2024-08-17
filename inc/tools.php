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

  function picture($imagePath, $alt = "", $lazy = true)
  {
      // Verifica si la ruta es una URL externa
      $isExternal = filter_var($imagePath, FILTER_VALIDATE_URL) !== false;
  
      // Si es una URL externa, obtén el tipo de la imagen desde los headers
      if ($isExternal) {
          $headers = get_headers($imagePath, 1);
          $imageType = isset($headers['Content-Type']) ? $headers['Content-Type'] : null;
  
          // Como no puedes verificar si el archivo webp existe en una URL externa, simplemente usa el formato original
          $webpImagePath = null;
      } else {
          // Si es una ruta local, sigue el proceso original
          $imagePathWithoutExtension = pathinfo($imagePath, PATHINFO_DIRNAME) . '/' . pathinfo($imagePath, PATHINFO_FILENAME);
          $webpImagePath = $imagePathWithoutExtension . '.webp';
          list($width, $height) = getimagesize($imagePath);
          $imageType = mime_content_type($imagePath);
      }
  
      // Empieza a construir el markup <picture>
      $markup = "<picture>\n";
  
      // Agrega el <source> para webp si el archivo existe y es una ruta local
      if ($webpImagePath && file_exists($webpImagePath)) {
          $markup .= "    <source srcset='{$webpImagePath}' type='image/webp'>\n";
      }
  
      // Agrega el <source> para jpeg o png según corresponda
      if ($imageType === 'image/jpeg') {
          $markup .= "    <source srcset='{$imagePath}' type='image/jpeg'>\n";
      } elseif ($imageType === 'image/png') {
          $markup .= "    <source srcset='{$imagePath}' type='image/png'>\n";
      }
  
      // Añade atributos lazy
      $lazyAttr = $lazy ? 'loading="lazy"' : '';
  
      // Escapa el atributo alt para evitar inyecciones
      $alt_stripped = strip_tags($alt);
  
      // Agrega el <img> con las dimensiones obtenidas
      if (!$isExternal) {
          $markup .= "    <img src='{$imagePath}' alt='{$alt_stripped}' title='{$alt_stripped}' {$lazyAttr} decoding='async' width='{$width}' height='{$height}' />\n";
      } else {
          $markup .= "    <img src='{$imagePath}' alt='{$alt_stripped}' title='{$alt_stripped}' {$lazyAttr} decoding='async' />\n";
      }
  
      // Cierra el markup <picture>
      $markup .= "</picture>";
  
      return $markup;
  }
  
}

/* //////////////////////////// FORMAT NUMBER  ////////////////////////////*/

function setNum($number) {
  return str_pad($number, 2, '0', STR_PAD_LEFT);
}

/* /////////////////////////// IMG ORIENTATION  ///////////////////////////*/

function img_orient($url, $getclass = '', $webp = false, $alt = '', $lazy = true, $async = true)
{

  // Obtener el ancho y alto de la imagen
  list($ancho, $alto) = getimagesize($url);

  // Evaluar WebP
  if ($webp) {

    // Obtener Extensión
    $layout_url = pathinfo($url);
    $extension = $layout_url['extension'];

    if (strpos($_SERVER['HTTP_ACCEPT'], 'image/webp') !== false) {
      $ext = 'webp';
    } else {
      $ext = $extension;
    }

    $img_path = $layout_url['dirname'] . '/' . $layout_url['filename'] . '.' . $ext;
  } else {

    $img_path = $url;
  }

  // Determinar si la imagen es vertical u horizontal
  $class = ($ancho > $alto) ? 'horizontal' : 'vertical';
  $class .= ' ' . $getclass;

  if ($lazy) {
    $lazy_attr = 'loading="lazy"';
  } else {
    $lazy_attr = '';
  }

  if ($async) {
    $async_attr = 'decoding="async"';
  } else {
    $async_attr = '';
  }

  // HTML con la imagen y la clase CSS
  echo "<img src='$img_path' alt='$alt' class='$class' width='$ancho' height='$alto' $lazy_attr  $async_attr />";
}


/*/////////////////////////// PRINT REQUIRE ///////////////////////////*/

if (!function_exists('print_require')) {

  function print_require($file)
  {
    ob_start();
    require($file);
    return ob_get_clean();
  }
}

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
