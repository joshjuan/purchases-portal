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

?>
<!-- ============================================================== -->
<!-- main wrapper -->
<!-- ============================================================== -->
<div class="dashboard-main-wrapper">
    <!-- ============================================================== -->
    <!-- navbar -->
    <!-- ============================================================== -->
    <div class="dashboard-header">
        <nav class="navbar navbar-expand-lg bg-white fixed-top">

            <a class="navbar-brand" href="<?= Url::toRoute(['site/index']) ?>">Web-Sales</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto navbar-right-top">

                    <li class="nav-item dropdown notification">
                        <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span
                                    class="indicator"></span></a>
                        <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                            <li>
                                <div class="notification-title"> Notification</div>

                            </li>
                            <li>
                                <div class="list-footer"><a href="#">View all notifications</a></div>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown nav-user">
                        <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false"><img src="theme/styles/dashboard/assets/images/images.png" alt=""
                                                                           class="user-avatar-md rounded-circle"></a>
                        <div class="dropdown-menu dropdown-menu-right nav-user-dropdown"
                             aria-labelledby="navbarDropdownMenuLink2">
                            <div class="nav-user-info">
                                <h5 class="mb-0 text-white nav-user-name">John Abraham </h5>
                            </div>
                            <a class="dropdown-item" href="<?= Url::toRoute(['user/account']) ?>" ><i class="fas fa-user mr-2"></i>My Account</a>
                            <?= Html::a('<i class="fas fa-power-off mr-2"> </i> Logout', ['/site/logout'], ['data-method' => 'post', 'class' => 'dropdown-item']) ?>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- ============================================================== -->
    <!-- end navbar -->
    <!-- ============================================================== -->

    <div class="nav-left-sidebar sidebar-dark">
        <div class="menu-list">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-divider">
                            Menu
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="<?= Url::toRoute(['site/dashboard']) ?>"
                               aria-controls="submenu-1"><i
                                        class="fa fa-fw fa-dolly"></i>My Order <span
                                        class="badge badge-success">6</span></a>
                        </li>
                        <li class="nav-item active ">
                            <a class="nav-link " href="<?= Url::toRoute(['site/payment']) ?>" aria-controls="submenu-1"><i
                                        class="fa fa-fw fa-dollar-sign"></i>Payment <span
                                        class="badge badge-success">6</span></a>
                        </li>
                   <li class="nav-item ">
                        <a class="nav-link " href="<?= Url::toRoute(['attachments/index']) ?>" aria-controls="submenu-1"><i
                                    class="fa fa-fw fa-file"></i>My Document <span
                                    class="badge badge-success">6</span></a>
                    </li>


                        <li class="nav-item ">
                            <a class="nav-link " href="<?= Url::toRoute(['site/payment']) ?>" aria-controls="submenu-1"><i
                                        class="fa fa-fw fa-exclamation-circle"></i>Support <span
                                        class="badge badge-success">6</span></a>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>
    </div>


