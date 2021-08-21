<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
?>
<?php
if (Yii::$app->user->isGuest) {  ?>
<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

    <div class="footer-top">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-info">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <img src="theme/styles/assets/img/logo.png" alt="">
                    </a>
                    <p>Connect with us</p>
                    <div class="social-links mt-3">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram bx bxl-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin bx bxl-linkedin"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">WebTechnologies</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">TRA</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">ZRB</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">EFD</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">vfd</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Security Device</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4>Contact Us</h4>
                    <p>
                        Livingstone/Msimbazi Street, Al Falah (KFC) Building, Fourth Floor
                        <br><br>
                        <strong>Phone:</strong> +255 22 2182912
                        <br>
                        <strong>Email:</strong> info@WebTechnologies.co.tz<br>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>WebTechnologies</span></strong>. All Rights Reserved
        </div>
    </div>
</footer>
<!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<!-- Vendor JS Files -->
<script src="theme/styles/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="theme/styles/assets/vendor/aos/aos.js"></script>
<script src="theme/styles/assets/vendor/php-email-form/validate.js"></script>
<script src="theme/styles/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="theme/styles/assets/vendor/purecounter/purecounter.js"></script>
<script src="theme/styles/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="theme/styles/assets/vendor/glightbox/js/glightbox.min.js"></script>
<!-- Template Main JS File -->
<script src="theme/styles/assets/js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Calling Slick Library -->
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
    $("#carousel-slider").slick({
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
    $(document).ready(function() {
        $('.customer-logos').slick({
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

<?php }else { ?>

    </div>

    <script src="theme/styles/dashboard/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="theme/styles/dashboard/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="theme/styles/dashboard/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="theme/styles/dashboard/assets/libs/js/main-js.js"></script>

<?php } ?>
