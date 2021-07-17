<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
     //  'css/site.css',
//        'theme/assets/vendor/bootstrap/css/bootstrap.min.css',
//        'theme/assets/vendor/aos/aos.css',
//        'theme/assets/vendor/remixicon/remixicon.css',
//        'theme/assets/vendor/swiper/swiper-bundle.min.css',
//        'theme/assets/vendor/glightbox/css/glightbox.min.css',
//        'theme/assets/css/card.css',
//        'theme/assets/css/style.css',
//        'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css',
//        'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
