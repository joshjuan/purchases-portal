<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tin_number')->textInput() ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_number2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vrn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'street')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'plot_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'house_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'applicant_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'business_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customer_type')->textInput() ?>

    <?= $form->field($model, 'in_contract')->textInput() ?>

    <?= $form->field($model, 'representative_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'branch_id')->textInput() ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tax_regional')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'maker_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'maker_time')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('yii', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
