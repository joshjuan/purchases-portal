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

        <div class="row">
            <div class="col-lg-8">
                <?php $form = ActiveForm::begin(['id' => 'login-form', 'class' => 'form__content']); ?>
                <h1 class="form__title">LOGIN FORM</h1>
                <?= $form->field($model, 'username', [
                    'template' => "{label}\n<i class='fa fa-user'></i>\n{input}\n{hint}\n{error}"
                ])->textInput(array('placeholder' => 'Username'));  ?>

<!--                <div class="form__div form__div-one">-->
<!--                    <div class="form__icon">-->
<!--                        <i class='bx bx-user-circle'></i>-->
<!--                    </div>-->
<!---->
<!--                    <div class="form__div-input">-->
<!--                        <label for="" class="form__label">Username</label>-->
<!--                        <input type="text" class="form__input">-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="form__div">-->
<!--                    <div class="form__icon">-->
<!--                        <i class='bx bx-lock'></i>-->
<!--                    </div>-->
<!--                    <div class="form__div-input">-->
<!--                        <label for="" class="form__label">Password</label>-->
<!--                        <input type="password" class="form__input">-->
<!--                    </div>-->
<!--                </div>-->
                <?= $form->field($model, 'password', [
                    'template' => "{label}\n<i class='fa fa-user'></i>\n{input}\n{hint}\n{error}"
                ])->passwordInput(array('placeholder' => 'Username'));  ?>
                <a href="<?= \yii\helpers\Url::toRoute(['site/index']) ?>" class="form__forgot">Back to home</a>
                <?= Html::submitButton('Login', ['class' => 'form__button', 'name' => 'login-button']) ?>
                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
    <!-- ===== MAIN JS ===== -->
</body>

</html>