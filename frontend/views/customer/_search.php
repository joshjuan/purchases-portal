<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CustomerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'tin_number') ?>

    <?= $form->field($model, 'phone_number') ?>

    <?= $form->field($model, 'phone_number2') ?>

    <?php // echo $form->field($model, 'vrn') ?>

    <?php // echo $form->field($model, 'street') ?>

    <?php // echo $form->field($model, 'plot_no') ?>

    <?php // echo $form->field($model, 'house_no') ?>

    <?php // echo $form->field($model, 'applicant_title') ?>

    <?php // echo $form->field($model, 'business_type') ?>

    <?php // echo $form->field($model, 'customer_type') ?>

    <?php // echo $form->field($model, 'in_contract') ?>

    <?php // echo $form->field($model, 'representative_name') ?>

    <?php // echo $form->field($model, 'branch_id') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'tax_regional') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'maker_id') ?>

    <?php // echo $form->field($model, 'maker_time') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('yii', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('yii', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
