<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
?>
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
            <img src="theme/styles/assets/img/logo.png" alt="">
        </a>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="<?= Url::toRoute(['site/index']) ?>">Home</a></li>
                <li><a class="nav-link scrollto" href="#about">About</a></li>
                <li>
                    <a class="nav-link scrollto" href="#pricing">Pricing</a></li>
                <li><a class="nav-link scrollto" href="#faq">FAQ</a></li>
                <li><a class="nav-link scrollto" href="<?= Url::toRoute(['site/efd']) ?>">EFD</a></li>
                <li><a class="getstarted scrollto pil" href="<?= Url::toRoute(['site/login']) ?>">Login</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i></nav>         <!-- .navbar -->     </div>
</header> <!-- End Header -->