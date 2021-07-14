<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?php
if (Yii::$app->user->isGuest) { ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Favicons -->
    <link href="theme/styles/assets/img/favicon.png" rel="icon">
    <link href="theme/styles/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="theme/stylesheet">
    <!-- Vendor CSS Files -->
    <link href="theme/styles/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="theme/styles/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="theme/styles/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="theme/styles/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="theme/styles/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="theme/styles/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="theme/styles/assets/css/card.css" rel="stylesheet">
    <link href="theme/styles/assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css"/>

</head>
<body>
<?php }  else { ?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="theme/styles/dashboard/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="theme/styles/dashboard/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="theme/styles/dashboard/assets/libs/css/style.css">
    <link rel="stylesheet" href="theme/styles/dashboard/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="theme/styles/dashboard/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="theme/styles/dashboard/assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <title>WebTechnologies</title>
</head>

<body>

<!-- ============================================================== -->
<!-- main wrapper -->
<!-- ============================================================== -->
<div class="dashboard-main-wrapper">
    <?php } ?>

    <?php
    if (Yii::$app->user->isGuest) {
        echo $this->render('header.php');
        echo $content;
        echo $this->render('footer.php');
    }
    else {

        echo $this->render('navBar.php');
     //   echo $this->render('dashboard.php');
        echo $content;
        echo $this->render('footer.php');

    }
    ?>


    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
