<?php

/* @var $this yii\web\View */

use frontend\models\Application;
use frontend\models\ApplicationItem;
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Web';
?>
<?php if (Yii::$app->user->isGuest) { ?>
    <style>
        .project-tab {
            padding: 10%;
            margin-top: -8%;
        }

        .project-tab #tabs {
            background: #007b5e;
            color: #eee;
        }

        .project-tab #tabs h6.section-title {
            color: #eee;
        }

        .project-tab #tabs .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
            color: #37517E;
            background-color: transparent;
            border-color: transparent transparent #f3f3f3;
            border-bottom: 3px solid !important;
            font-size: 16px;
            font-weight: bold;
        }

        .project-tab .nav-link {
            border: 1px solid transparent;
            border-top-left-radius: .25rem;
            border-top-right-radius: .25rem;
            color: #37517E;
            font-size: 16px;
            font-weight: 600;
        }

        .project-tab .nav-link:hover {
            border: none;
        }

        .project-tab thead {
            background: #f3f3f3;
            color: #333;
        }

        .project-tab a {
            text-decoration: none;
            color: #333;
            font-weight: 600;
        }
    </style>

    <script type="text/javascript">

        function check(a) {
            var value = a;
            $id = value;

        }

    </script>


    <body>

    <section id="hero" class="hero d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">WebVFD Solution</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">A new generation online
                        cash register substitute of Electronic Fiscal Device (EFD)
                        designed for issurance of TRA Authorized fiscal receipts by
                        taxpayers in a real time.</h2>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            <a href="#pricing"
                               class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Buy Now</span> <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out"
                     data-aos-delay="200">
                    <img src="theme/styles/img/products.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero -->

    <!-- ======= Values Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">
            <div class="row gx-0">
                <div class="col-lg-12 d-flex flex-column justify-content-center"
                     data-aos="fade-up" data-aos-delay="200">
                    <div class="content">

                        <h2 class="text-center">About VFD.</h2>
                        <p class="text-center">Virtual Fiscal Device is a new generation
                            online cash register substitute of Electronic Fiscal Device
                            designed for issuance of fiscal digital receipts by taxpayers for
                            every sale transaction through online and signed by the tax
                            administrator server in real-time.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-4">
                    <div class="box" data-aos="fade-up" data-aos-delay="200">
                        <img src="theme/styles/img/mb.png" class="img-fluid" alt="">
                        <h3>WEB VFD MOBILE</h3>
                        <p>The application is available online in which the tax payer
                            (business person) in addition to being able to make various
                            transactions and register products, is also able to see
                            individual sales of all store..... .</p>
                    </div>
                </div>
                <div class="col-lg-4 mt-4 mt-lg-0">
                    <div class="box" data-aos="fade-up" data-aos-delay="400">
                        <img src="theme/styles/img/pos.png" class="img-fluid" alt="">
                        <h3>WEB VFD POS</h3>
                        <p>The application is available on the POS device on which the tax
                            payer (business person) is able to register their products, make
                            sales and print fiscal receipts in real-time through the device..</p>
                    </div>
                </div>
                <div class="col-lg-4 mt-4 mt-lg-0">
                    <div class="box" data-aos="fade-up" data-aos-delay="600">
                        <img src="theme/styles/img/pc.png" class="img-fluid" alt="">
                        <h3>WEB VFD PORTAL.</h3>
                        <p>The application system is available on the mobile application
                            on which the tax payer (business person) is able to install on
                            their phone, register products, make sales and print fiscal
                            receipts..

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Values Section -->
    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <h2>Pricing</h2>
                <p>Check our Pricing</p>

                <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">

                    <li><a href="#orange" class="nav-link active text-center"
                           data-toggle="tab">WEB VFD MOBILE</a></li>
                    <li><a href="#yellow" class="nav-link text-center "
                           data-toggle="tab">WEB VFD POS</a></li>

                </ul>
            </header>


            <div id="my-tab-content" class="tab-content">

                <div class="tab-pane fade show active" id="orange">

                    <div class="row gy-4" data-aos="fade-left">

                        <?php
                        $items = \frontend\models\Product::getAllPackages();
                        if ($items != null) {
                            foreach ($items as $key => $item) {
                                $idP = $item->id;
                                $tax = $item->tax_percent;
                                $coef = ($tax / 100) + 1;
                                $total = $coef * $item->price ;
                                $total= number_format((float)$total, 2, '.', ',');
                                ?>

                                <div class="col-lg-3 col-md-6"
                                     data-aos="zoom-in" data-aos-delay="200">
                                    <div class="box">
                                        <span class="featured"><?= $item->product_name ?></span>
                                        <h3 style="color: #65c600;"><?= $item->product_name ?></h3>
                                        <div class="price">
                                            <sup>TSH</sup><?= $total ?><span> / year</span>
                                        </div>
                                        <img src="theme/styles/img/pricing-starter.png" class="img-fluid"
                                             alt="">
                                        <ul>
                                            <li><i class="bi bi-check2"></i>Sales and receipt printing</li>
                                            <li><i class="bi bi-check2"></i>Barcode scanning</li>
                                            <li><i class="bi bi-check2"></i>Track and manage inventory</li>
                                            <li><i class="bi bi-check2"></i>Manage Single Store</li>
                                            <li><i class="bi bi-check2"></i>Single User</li>
                                        </ul>
                                        <!-- Button trigger modal -->
                                        <!--                                        <button type="button" class="btn btn-buy" data-toggle="modal" data-target="#exampleModalLong">-->
                                        <!--                                            Buy Now-->
                                        <!--                                        </button>-->
                                        <?= Html::a('<span class="btn-label">Buy Now</span>', ['site/signup-mobile'], ['class' => 'btn btn-info', 'id' => 'appId', 'onClick' => "check($idP)", 'value' => 'Result', 'data-toggle' => "modal", 'data-target' => "#exampleModalLong"]) ?>
                                    </div>
                                </div>

                                <?php
                            }
                        }

                        ?>

                    </div>
                </div>
                <div class="tab-pane" id="yellow">

                    <div class="row gy-4" data-aos="fade-left">
                        <?php
                        $items = \frontend\models\Product::getPosPackages();
                        if ($items != null) {
                            foreach ($items as $item) {
                                $tax = $item->tax_percent;
                                $coef = ($tax / 100) + 1;
                                $total = $coef * $item->price ;
                                $total= number_format((float)$total, 2, '.', ',');


                                ?>


                                <div class="col-lg-4 col-md-6" data-aos="zoom-in"
                                     data-aos-delay="300">
                                    <div class="box">
                                        <h3 style="color: #ff901c;"><?= $item->product_name ?></h3>
                                        <div class="price">
                                            <sup>TSH</sup><?= $total ?><span> / year</span>
                                        </div>
                                        <img src="theme/styles/img/pricing-business.png" class="img-fluid" alt="">
                                        <ul>
                                            <li><i class="bi bi-check2"></i>Sales and receipt printing</li>
                                            <li><i class="bi bi-check2"></i>Barcode scanning</li>
                                            <li><i class="bi bi-check2"></i>Track and manage inventory</li>
                                            <li><i class="bi bi-check2"></i>Manage Single Store</li>
                                            <li><i class="bi bi-check2"></i>Single User</li>
                                        </ul>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-buy" data-toggle="modal"
                                                data-target="#exampleModalLong">Buy Now
                                        </button>
                                    </div>
                                </div>

                                <?php

                            }
                        }

                        ?>

                    </div>
                </div>

            </div>

        </div>
    </section>


    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
         aria-hidden="true">


        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Entry Plan</h5>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="text-left">
                        <li><i class="bi bi-check2"></i>


                        </li>
                        <li><i class="bi bi-check2"></i>Barcode scanning</li>
                        <li><i class="bi bi-check2"></i>Track and manage inventory</li>
                        <li><i class="bi bi-check2"></i>Unlimited products</li>
                        <li><i class="bi bi-check2"></i>Manage customer data</li>
                        <li><i class="bi bi-check2"></i>-reports</li>
                        <li><i class="bi bi-check2"></i>Basic reporting</li>
                        <li><i class="bi bi-check2"></i>Multi-users (Two (2) users)</li>
                        <li><i class="bi bi-check2"></i>Manage single store/branch (One
                            store)
                        </li>
                        <li><i class="bi bi-check2"></i>Basic reporting</li>
                        <li><i class="bi bi-check2"></i>Basic reporting</li>
                        <li><i class="bi bi-check2"></i><b> Installation & Configuration
                                fee 200,000/TSH </b></li>
                        <li><i class="bi bi-check2"></i><b>#First Year Free</b></li>
                        <li><i class="bi bi-check2"></i><b>Second Year Onward 60,000/TSH
                                per year</b></li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn " data-dismiss="modal">Close</button>
                    <?= Html::a('<span class="btn-label">Buy</span>', ['site/signup-mobile'], ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Pricing Section -->

    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <h2>F.A.Q</h2>
                <p>Frequently Asked Questions</p>
            </header>
            <div class="row">
                <div class="col-lg-6">
                    <!-- F.A.Q List 1-->
                    <div class="accordion accordion-flush" id="faqlist1">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#faq-content-1">What
                                    is WebVFD?
                                </button>
                            </h2>
                            <div id="faq-content-1" class="accordion-collapse collapse"
                                 data-bs-parent="#faqlist1">
                                <div class="accordion-body">WebVFD is an application system
                                    that�s been developed and directly connected to TRA tax
                                    administrator server to enable the tax payer easily issuing of
                                    fiscal receipts with QR Code in real-time.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#faq-content-2">What
                                    is Web VFD-POS ?
                                </button>
                            </h2>
                            <div id="faq-content-2" class="accordion-collapse collapse"
                                 data-bs-parent="#faqlist1">
                                <div class="accordion-body">WebVFD-POS The application is
                                    available on the POS device on which the tax payer (business
                                    person) is able to register their products, make sales and
                                    print receipts through the device.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#faq-content-3">What
                                    is Web VFD-Mobile ?
                                </button>
                            </h2>
                            <div id="faq-content-3" class="accordion-collapse collapse"
                                 data-bs-parent="#faqlist1">
                                <div class="accordion-body">The application system is available
                                    on the mobile application on which the tax payer (business
                                    person) is able to install on their phone, register products,
                                    make sales and print receipts through the device, and send
                                    receipts to clients through email, or what�s app, etc
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- F.A.Q List 2-->
                    <div class="accordion accordion-flush" id="faqlist2">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#faq2-content-1">
                                    Should I need to send dairly Z-reports manually to TRA ?
                                </button>
                            </h2>
                            <div id="faq2-content-1" class="accordion-collapse collapse"
                                 data-bs-parent="#faqlist2">
                                <div class="accordion-body">No, with WebVFD, Z-reports will be
                                    sent automaticall to TRA before end of the day.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#faq2-content-2">Can
                                    i integrate WebVFD account with third party applications?
                                </button>
                            </h2>
                            <div id="faq2-content-2" class="accordion-collapse collapse"
                                 data-bs-parent="#faqlist2">
                                <div class="accordion-body">Yes, currently we are develeping API
                                    that will allow third-part applications integration to WebVFD
                                    portal.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#faq2-content-3">Can
                                    I know the procedures to get a new WebVFD account?
                                </button>
                            </h2>
                            <div id="faq2-content-3" class="accordion-collapse collapse"
                                 data-bs-parent="#faqlist2">
                                <div class="accordion-body">
                                    In order to get a new WebVFD account, The following documment
                                    must be submitted; <br> 1. TIN Certificate TIN Owner ID (NIDA,
                                    Driving Licence, Passport, Voter�s ID) Business License UIN
                                    Form (well filled and signed by business owner) <br> 2.VFD
                                    Application letter
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End F.A.Q Section -->
    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <p>Our Partner</p>
            </header>
            <div class="clients-slider swiper-container">
                <div class="swiper-wrapper align-items-center">
                    <div class="swiper-slide">
                        <img src="theme/styles/img/tra.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="theme/styles/img/ura.png" class="img-fluid" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="theme/styles/img/brand.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="theme/styles/img/zrb.png" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <!-- End Clients Section -->
    <!-- ======= Footer ======= -->

    <!-- End Footer -->
    <a href="#"
       class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>
    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script
            src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Calling Slick Library -->
    <script
            src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        TSH("#carousel-slider").slick({
            arrows: false,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2500,
            mobileFirst: true
        });
    </script>
    <script>
        TSH(document).ready(function () {
            TSH('.customer-logos').slick({
                slidesToShow: 6,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 1500,
                arrows: false,
                dots: false,
                pauseOnHover: false,
                responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 4
                    }
                }, {
                    breakpoint: 520,
                    settings: {
                        slidesToShow: 3
                    }
                }]
            });
        });
    </script>
    </body>

    </html>
<?php } else { ?>


    <!-- ============================================================== -->
    <!-- end left sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- wrapper  -->
    <!-- ============================================================== -->
    <div class="dashboard-wrapper">
        <div class="container-fluid  dashboard-content">
            <!-- ============================================================== -->
            <!-- pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">STATUS</h2>

                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-md-4">
                    <div class="card border-3 border-top border-top-primary">
                        <div class="card-body">
                            <h5 class="text-muted">Payment-Status</h5>
                            <div class="metric-value d-inline-block">
                                <h3 class="text-muted">
                                    UNPAID-
                                    <?= Application::OnProgress() ?>
                                </h3>
                            </div>
                            <div
                                    class="metric-label d-inline-block float-right text-success font-weight-bold">
							<span
                                    class="icon-circle-small icon-box-xs text-danger bg-danger-light"><i
                                        class="fa fa-fw fa-stop"></i></span><span class="ml-1"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-3 border-top border-top-primary">
                        <div class="card-body">
                            <h5 class="text-muted">Document Checkup</h5>
                            <div class="metric-value d-inline-block">
                                <h3 class="text-muted">ONPROGRESS-
                                    <?= Application::OnProgress() ?>
                                </h3>
                            </div>
                            <div
                                    class="metric-label d-inline-block float-right text-success font-weight-bold">
							<span
                                    class="icon-circle-small icon-box-xs text-info bg-info-light"><i
                                        class="fa fa-fw fa-step-forward"></i></span><span class="ml-1"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-3 border-top border-top-primary">
                        <div class="card-body">
                            <h5 class="text-muted">Application-Status</h5>
                            <div class="metric-value d-inline-block">
                                <h3 class="text-muted">COMPLETED-
                                    <?= Application::OnProgress() ?>
                                </h3>
                            </div>
                            <div
                                    class="metric-label d-inline-block float-right text-success font-weight-bold">
							<span
                                    class="icon-circle-small icon-box-xs text-success bg-success-light"><i
                                        class="fa fa-fw fa-check"></i></span><span class="ml-1"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">My Orders</h2>
                        <p class="pageheader-text">Proin placerat ante duiullam scelerisque
                            a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis
                            pulvinar quam.</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Tables</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Data
                                        Tables
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- ============================================================== -->
                <!-- basic table  -->
                <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">

                        <?php

                        $gridColumns = [
                            [
                                'class' => 'kartik\grid\SerialColumn',
                                'contentOptions' => [
                                    'class' => 'kartik-sheet-style'
                                ],
                                'width' => '36px',
                                'headerOptions' => [
                                    'class' => 'kartik-sheet-style'
                                ]
                            ],

                            [
                                'attribute' => 'app_ref_number',
                                'label' => 'Reference No'
                            ],
                            [
                                'attribute' => 'app_dt',
                                'label' => 'Application Date'
                            ],
                            [
                                'attribute' => 'customer_id',
                                'contentOptions' => [
                                    'class' => 'truncate'
                                ],
                                // 'label' => 'Customer',
                                'value' => 'customer.name'
                            ],
                            [
                                'attribute' => 'tins',
                                'label' => 'TIN No',
                                'value' => 'customer.tin_number'
                            ],
                            [
                                'attribute' => 'phone',
                                'label' => 'Phone No',
                                'value' => 'customer.tin_number'
                            ],
                            [
                                'attribute' => 'fiscal_code'
                            ],
                            [
                                'attribute' => 'id',
                                'value' => 'tblApplicationUins.product0.product.product_name',
                                'label' => 'Product'
                            ],
                            [
                                'class' => 'kartik\grid\FormulaColumn',
                                'header' => 'Amount',
                                'vAlign' => 'middle',
                                'hAlign' => 'right',
                                'width' => '7%',
                                'attribute' => 'id',
                                'value' => function ($model) {
                                    if (!empty($model)) {
                                        return ApplicationItem::getAllTotal($model->id);
                                    }
                                },
                                'format' => [
                                    'decimal',
                                    2
                                ],
                                'headerOptions' => [
                                    'class' => 'kartik-sheet-style'
                                ],
                                'mergeHeader' => false,
                                'pageSummary' => true,
                                'footer' => false
                            ],
                            [
                                'attribute' => 'status',
                                'value' => function ($model) {
                                    if ($model->status == Application::SUBMITTED) {

                                        return 'Submitted';
                                    } elseif ($model->status == Application::APPLIED) {
                                        return 'Ordered';
                                    } elseif ($model->status == Application::VERIFIED) {
                                        return 'Payment Done';
                                    } elseif ($model->status == Application::WAITING_FOR_NEW_DEVICE) {
                                        return 'Waiting for new device';
                                    } elseif ($model->status == Application::DEVICE_ASSIGNED) {
                                        return 'Customers assigned Devices';
                                    } elseif ($model->status == Application::WAITING_FOR_UIN) {
                                        return 'Waiting for UIN';
                                    } elseif ($model->status == Application::PHYSICAL_SETUP) {
                                        return 'Physical setup';
                                    } elseif ($model->status == Application::WAITING_FOR_DELIVERY) {
                                        return 'Waiting for delivery';
                                    } elseif ($model->status == Application::DELIVERED) {
                                        return 'Delivered';
                                    } elseif ($model->status == Application::CANCELED) {
                                        return 'Cancelled';
                                    }
                                }
                            ]
                        ];

                        // the GridView widget (you must use kartik\grid\GridView)
                        echo GridView::widget([
                            'dataProvider' => $dataProvider,
                            // 'filterModel' => $searchModel,
                            'columns' => $gridColumns,
                            'id' => 'grid',
                            'containerOptions' => [
                                'style' => 'overflow: auto'
                            ], // only set when $responsive = false
                            'beforeHeader' => [
                                [
                                    'options' => [
                                        'class' => 'skip-export'
                                    ] // remove this row from export
                                ]
                            ],

                            'pjax' => true,
                            'bordered' => true,
                            'striped' => true,
                            'condensed' => true,
                            'responsive' => true,
                            'hover' => true,
                            // 'floatHeader' => true,

                            // 'floatHeaderOptions' => ['scrollingTop' => true],
                            'showPageSummary' => true,
                            'panel' => [
                                'type' => GridView::TYPE_DEFAULT,
                                'heading' => 'List of Company Orders',
                                'before' => '<span class ="text text-orange"></span>'
                            ],

                            'exportConfig' => [
                                GridView::EXCEL => [
                                    'filename' => Yii::t('app', 'Purchases Orders-') . date('Y-m-d'),
                                    'showPageSummary' => true,
                                    'options' => [
                                        'title' => 'Custom Title',
                                        'subject' => 'PDF export',
                                        'keywords' => 'pdf'
                                    ]
                                ]
                            ]
                        ]);
                        ?>

                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end basic table  -->
                <!-- ============================================================== -->
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- end footer -->
        <!-- ============================================================== -->
    </div>


<?php } ?>