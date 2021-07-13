<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Web';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>WebTechnologies</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="assets/css/card.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" />
</head>

<body>
<!-- ======= Header ======= -->
<!--<header id="header" class="header fixed-top">-->
<!--    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">-->
<!--        <a href="index.html" class="logo d-flex align-items-center">-->
<!--            <img src="assets/img/logo.png" alt="">-->
<!--        </a>-->
<!--        <nav id="navbar" class="navbar">-->
<!--            <ul>-->
<!--                <li><a class="nav-link scrollto active" href="index.html">Home</a></li>-->
<!---->
<!--                <li><a class="nav-link scrollto" href="#devices">Devices</a></li>-->
<!--                <li><a class="getstarted scrollto pil" href="login.html">Login</a></li>-->
<!--            </ul>-->
<!--            <i class="bi bi-list mobile-nav-toggle"></i>-->
<!--        </nav>-->
<!--        -->
<!--    </div>-->
<!--</header>-->
<!-- End Header -->
<!-- ======= Hero Section ======= -->

<!-- End Hero -->

<!-- device section -->
	<section id="devices">
		<div class="product-area ">
			<div class="container">
				<header class="section-header">
					<p>Our Devices</p>
				</header>
				<div class="carousel-inner ">
					<div class="item carousel-item active">
						<div class="card-area row p-3">
							<?php
							$items = \frontend\models\Product::getAllItems();
							if ($items != null) {
								foreach ($items as $item) {
                            ?>

							<div class="col-md-3">
								<div class="card">
									<div class="d-flex justify-content-between align-items-center">
										<h5 class="product-name">
											<?= $item->product_name?>
										</h5>
									</div>
									<div class="image-container">
										<img src="<?php
									if ($item->image != '') {
										echo Yii::$app->request->baseUrl . '/theme/styles/img/' . $item->image;
									} else {
										echo Yii::$app->request->baseUrl . '/theme/styles/img/'.$item->image;
									}

                                                  ?>"
											class="img-fluid rounded thumbnail-image" />
									</div>
									<div class="product-detail-container p-2">
										<div class="d-flex justify-content-between align-items-center pt-1 bottom-prod-div">
											<div>
												<span class="product-price">
													TZS <?php

									$price= $item->price;
									$amount = number_format($price, 2, '.', ',');
									echo $amount;
                                                        ?>
												</span>
											</div>
											<a href="<?=Url::toRoute(['site/signup']) ?>" class="productModal">
												<span class="view-product-btn">
													Buy
												</span>
											</a>
										</div>
									</div>
								</div>
							</div>
							<?php }
							}?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
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
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Calling Slick Library -->
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
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
    TSH(document).ready(function() {
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