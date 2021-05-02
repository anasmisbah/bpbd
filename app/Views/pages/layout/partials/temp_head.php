<head>

  <!-- Basic Page Needs
================================================== -->
  <meta charset="utf-8">

  <?= $this->renderSection('title-meta'); ?>
  <meta http-equiv="Content-Security-Policy" content="block-all-mixed-content">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="author" content="bpbd.kaltimprov.go.id">
  <meta name="robots" content="all,index,follow">
  <meta http-equiv="Content-Language" content="id-ID">
  <meta NAME="Distribution" CONTENT="Global">
  <meta NAME="Rating" CONTENT="General">
  <!-- Mobile Specific Metas
================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">

  <!-- CSS
================================================== -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="<?= base_url('pages_assets/plugins/bootstrap/bootstrap.min.css'); ?>">
  <!-- FontAwesome -->
  <link rel="stylesheet" href="<?= base_url('pages_assets/plugins/fontawesome/css/all.min.css'); ?>">
  <!-- Animation -->
  <link rel="stylesheet" href="<?= base_url('pages_assets/plugins/animate-css/animate.css'); ?>">
  <!-- slick Carousel -->
  <link rel="stylesheet" href="<?= base_url('pages_assets/plugins/slick/slick.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('pages_assets/plugins/slick/slick-theme.css'); ?>">
  <!-- Colorbox -->
  <link rel="stylesheet" href="<?= base_url('pages_assets/plugins/colorbox/colorbox.css'); ?>">
  <!-- Template styles-->
  <link rel="stylesheet" href="<?= base_url('pages_assets/css/style.css'); ?>">
  <style>
    .logo img {
        height: 80px;
    }
    .footer-logo {
        max-height: 75px;
    }
    .preloader {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 9999;
      background-color: #fff;
    }
    .preloader .loading {
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%,-50%);
      font: 14px arial;
    }
  </style> 

  <?= $this->renderSection('css'); ?>
</head>