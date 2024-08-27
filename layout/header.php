<!DOCTYPE html>
<html lang="<?= $lang ?>" data-platform="<?= $platform ?>">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $meta_title ?></title>
  <meta name="description" content="<?php echo $meta_desc ?>">
  <meta name='viewport' content='initial-scale=1, viewport-fit=cover'>
  <link rel="canonical" href="<?= $canonical_url ?>" />
  <base href="<?= $base_url ?>" target="_self">
  <meta name="view-transition" content="same-origin" />
  <?php include 'inc/css.php'; ?>
  <!--preload-->
  <?php include 'inc/preload.php'; ?>
  <!--js-->
  <?php include 'inc/js.php' ?>
  <?php
  include 'inc/open-graph.php';
  include 'inc/richsnippets.php';
  include 'inc/track-codes.php';
  ?>

  <?php include 'inc/favicon.php' ?>
  <meta http-equiv="cleartype" content="on">
  <meta name="MobileOptimized" content="width">
  <meta name="HandheldFriendly" content="true">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <meta name="format-detection" content="telephone=no">
  <meta name="author" content="web: [<?= $author_name ?>]: <?= $author_url ?>">

</head>

<body id="top" class="once" data-scroll="top" data-page="<?= $page ?>" data-barba="wrapper" >
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K585PZ4F"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

  <div class="<?= $page ?> menu-toggler" data-barba="container" data-barba-namespace="<?= ( !is_array($page_type) ) ? $page_type : 'case' ?>" data-screen="<?= $screen ?>"  >
  <div class="pointer"></div>

  <header class="container">
    <div class="row items-center">
      <div class="sm:col-1-3 flex align-middle">
        <?php include 'layout/components/brand.php'; ?>
      </div>
      <div class="xg:col-5-10">
        <?php include 'layout/components/menu.php'; ?>
      </div>
      <div class="xg:col-12-13 hidden xg:flex justify-end">
        <?php include 'layout/components/lang-switcher.php'; ?>
      </div>
    </div>

  </header>

<?php include 'layout/components/burger.php';

