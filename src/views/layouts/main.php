<?php

/**
 * @var string $content
 * @var  $reviews
 */

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <?php include_once ('_analytics/yandex-metrics.php') ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="/public/assets/images/logo/fav-icon.png" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/public/assets/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="/public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/public/assets/css/swiper.min.css"/>
    <link rel="stylesheet" type="text/css" href="/public/assets/css/aos.css">
    <link rel="stylesheet" type="text/css" href="/public/assets/css/style.css">
    <title>PRO Music</title>
    <?php include_once ('_analytics/google-analytics.php') ?>
</head>
<body>
<!-- Preloader -->
<div class="preloader">
    <div class="loader">
        <div class="loader-inner"></div>
        <div class="loader-inner"></div>
    </div>
</div>
<!-- end Preloader -->

<div id="wrap">
    <?php include_once('src/views/includes/_header.php') ?>

    <?php include_once 'src/views/' . $content; ?>

    <?php include_once('src/views/includes/_footer.php') ?>

    <?php include_once ('src/views/includes/_modal.php') ?>

    <!-- scroll bottom-top  -->
    <div class="scroll-top">
        <svg class="border-circle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
        </svg>
    </div>
</div>
</body>

<script src="/public/assets/js/jquery-min-3.6.0.js"></script>
<script src="/public/assets/js/bootstrap.bundle.min.js"></script>
<script src="/public/assets/js/swiper.min.js"></script>
<script src="/public/assets/js/aos.js"></script>
<script src="/public/assets/js/tilt.min.js"></script>
<script src="/public/assets/js/custom.js"></script>
</html>
