<?php

/* Detect Device */
if ( $detect->isMobile() && !$detect->isTablet() ) {

  $device = 'mobile';
  $isMobile = true;
  $isTablet = false;
  $isDesktop = false;

}else if( $detect->isTablet() ){ // is Tablet

  $device = 'tablet';
  $isMobile = false;
  $isTablet = true;
  $isDesktop = false;

}else{ // is Desktop
  $device = 'desktop';
  $isMobile = false;
  $isTablet = false;
  $isDesktop = true;

}

switch ($page) {

	case 'home':
		$theme = 'dark';
		break;

	default:
		$theme = 'light';
		break;
    
}