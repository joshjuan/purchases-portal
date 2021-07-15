<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>

    <!-- ============================================================== -->
    <!-- navbar -->
    <!-- ============================================================== -->
    <div class="dashboard-header">
        <nav class="navbar navbar-expand-lg bg-white fixed-top">
            <a class="navbar-brand" href="index.html">Web-Sales</a>
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
                                <div class="notification-list">
                                    <div class="list-group">
                                        <a href="#" class="list-group-item list-group-item-action active">
                                            <div class="notification-info">
                                                <div class="notification-list-user-img"><img
                                                            src="assets/images/avatar-2.jpg" alt=""
                                                            class="user-avatar-md rounded-circle"></div>
                                                <div class="notification-list-user-block"><span
                                                            class="notification-list-user-name">Jeremy Rakestraw</span>accepted
                                                    your invitation to join the team.
                                                    <div class="notification-date">2 min ago</div>
                                                </div>
                                            </div>
                                        </a>

                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="list-footer"><a href="#">View all notifications</a></div>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown nav-user">
                        <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false"><img src="assets/images/avatar-1.jpg" alt=""
                                                                           class="user-avatar-md rounded-circle"></a>
                        <div class="dropdown-menu dropdown-menu-right nav-user-dropdown"
                             aria-labelledby="navbarDropdownMenuLink2">
                            <div class="nav-user-info">
                                <h5 class="mb-0 text-white nav-user-name">John Abraham </h5>
                                <span class="status"></span><span class="ml-2">Available</span>
                            </div>
                            <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-power-off mr-2"></i>Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- ============================================================== -->
    <!-- end navbar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- left sidebar -->
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
                            <a class="nav-link " href="<?= Url::toRoute(['site/payment']) ?>" aria-controls="submenu-1"><i
                                    class="fa fa-fw fa-file"></i>Document <span
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
    <!-- ============================================================== -->
    <!-- end left sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- wrapper  -->
    <!-- ============================================================== -->
    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- accrodions style one -->
                    <!-- ============================================================== -->
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="section-block">
                            <h5 class="section-title">PAYMENT STATUS</h5>
                        </div>

                        <div class="col-md-6">
                            <div class="card border-3 border-top border-top-primary">
                                <div class="card-body">
                                    <h5 class="text-muted">Pyment-Status</h5>
                                    <div class="metric-value d-inline-block">
                                        <h3 class="mb-1">UNPAID</h3>
                                    </div>
                                    <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                        <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i
                                                    class="fa fa-fw fa-check"></i></span><span class="ml-1"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="section-block">
                            <h5 class="section-title">PAYMENT GUIDE</h5>
                            <p>Select Your Preffered method of payment to proceed..</p>
                        </div>

                        <div class="accrodion-regular">
                            <div id="accordion3">
                                <div class="card">
                                    <div class="card-header" id="headingSeven">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse"
                                                    data-target="#collapseSeven" aria-expanded="true"
                                                    aria-controls="collapseSeven">
                                                <span class="fas fa-angle-down mr-3"></span>M-PESA
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseSeven" class="collapse show" aria-labelledby="headingSeven"
                                         data-parent="#accordion3">
                                        <div class="card-body">
                                            Dial *150*00#
                                            <br>
                                            1. Select 4 - Pay by M-Pesa
                                            <br>
                                            2. Then pick 4 - Enter Business Number
                                            <br>
                                            3. Input 122122 then 60124815
                                            <br>
                                            4. Enter your deposit amount and PIN
                                            br
                                            5. Check payment confirmation on the portal
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-2">
                                    <div class="card-header" id="headingEight">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse"
                                                    data-target="#collapseEight" aria-expanded="false"
                                                    aria-controls="collapseEight">
                                                <span class="fas fa-angle-down mr-3"></span>TIGO PESA
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseEight" class="collapse" aria-labelledby="headingEight"
                                         data-parent="#accordion3">
                                        <div class="card-body">
                                            Dial *150*01#
                                            <br>
                                            1. Select 4 - Pay by TIGO
                                            <br>
                                            2. Then pick 4 - Enter Business Number
                                            <br>
                                            3. Input 122122 then 60124815
                                            <br>
                                            4. Enter your deposit amount and PIN
                                            br
                                            5. Check payment confirmation on the portal
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-2">
                                    <div class="card-header" id="headingNine">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse"
                                                    data-target="#collapseNine" aria-expanded="false"
                                                    aria-controls="collapseNine">
                                                <span class="fas fa-angle-down mr-3"></span>HALO PESA
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseNine" class="collapse" aria-labelledby="headingNine"
                                         data-parent="#accordion3">
                                        <div class="card-body">
                                            Dial *150*88#
                                            <br>
                                            1. Select 4 - Pay by Halopesa
                                            <br>
                                            2. Then pick 4 - Enter Business Number
                                            <br>
                                            3. Input 122122 then 60124815
                                            <br>
                                            4. Enter your deposit amount and PIN
                                            br
                                            5. Check payment confirmation on the portal
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>


