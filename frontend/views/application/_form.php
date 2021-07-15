<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Application */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="application-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'app_ref_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'app_dt')->textInput() ?>

    <?= $form->field($model, 'customer_id')->textInput() ?>

    <?= $form->field($model, 'branch_id')->textInput() ?>

    <?= $form->field($model, 'agent_id')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'technician_approval')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accountant_approval')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'invoice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'receipt_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'invoice_status')->textInput() ?>

    <?= $form->field($model, 'attachments_comments')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'invoice_maker')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'invoice_maker_time')->textInput() ?>

    <?= $form->field($model, 'user_identification_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'maker_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'maker_time')->textInput() ?>

    <?= $form->field($model, 'maker_id1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'maker_time1')->textInput() ?>

    <?= $form->field($model, 'auth_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'check_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'checker_time')->textInput() ?>

    <?= $form->field($model, 'assigned_to')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'payment_confirm')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'confirm_date')->textInput() ?>

    <?= $form->field($model, 'realocation')->textInput() ?>

    <?= $form->field($model, 'tra_comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'send_tra')->textInput() ?>

    <?= $form->field($model, 'fiscal_code')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('yii', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
