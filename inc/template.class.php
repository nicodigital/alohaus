<?php
class Template{
  private $content;

  public function __construct( $path, $layout = [] ){

    extract($layout);

    ob_start();
    include($path);
    $this->content = ob_get_clean();
    
  }

  public function __toString()  {
    return $this->content;
  }
  
}