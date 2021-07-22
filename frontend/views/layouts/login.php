<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use kartik\form\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="theme/styles/assets/css/login.css">
    <!-- ===== BOX ICONS ===== -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <title>WebTechnologies</title>
</head>

<body>
    <div class="l-form">
        <div class="form">
            <img style="margin-left: -260px;" src="theme/styles/img/login.png" alt="" class="form__img">
            <form action="" class="form__content">
                <h1 class="form__title">LOGIN BELOW</h1>
                <div class="form__div form__div-one">
                    <div class="form__icon">
                        <i class='bx bx-user-circle'></i>
                    </div>
                    <div class="form__div-input">
                        <label for="" class="form__label">Username</label>
                        <input type="text" class="form__input">
                    </div>
                </div>
                <div class="form__div">
                    <div class="form__icon">
                        <i class='bx bx-lock'></i>
                    </div>
                    <div class="form__div-input">
                        <label for="" class="form__label">Password</label>
                        <input type="password" class="form__input">
                    </div>
                </div>
                <a href="index.html" class="form__forgot">Back to home</a>
                <input type="submit" class="form__button" value="Login">
            </form>
        </div>
    </div>
    <!-- ===== MAIN JS ===== -->
    <script src="js/login.js"></script>
</body>

</html>