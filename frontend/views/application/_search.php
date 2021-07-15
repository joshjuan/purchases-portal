<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ApplicationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="application-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'app_ref_number') ?>

    <?= $form->field($model, 'app_dt') ?>

    <?= $form->field($model, 'customer_id') ?>

    <?= $form->field($model, 'branch_id') ?>

    <?php // echo $form->field($model, 'agent_id') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'technician_approval') ?>

    <?php // echo $form->field($model, 'accountant_approval') ?>

    <?php // echo $form->field($model, 'invoice') ?>

    <?php // echo $form->field($model, 'receipt_number') ?>

    <?php // echo $form->field($model, 'invoice_status') ?>

    <?php // echo $form->field($model, 'attachments_comments') ?>

    <?php // echo $form->field($model, 'invoice_maker') ?>

    <?php // echo $form->field($model, 'invoice_maker_time') ?>

    <?php // echo $form->field($model, 'user_identification_no') ?>

    <?php // echo $form->field($model, 'maker_id') ?>

    <?php // echo $form->field($model, 'maker_time') ?>

    <?php // echo $form->field($model, 'maker_id1') ?>

    <?php // echo $form->field($model, 'maker_time1') ?>

    <?php // echo $form->field($model, 'auth_status') ?>

    <?php // echo $form->field($model, 'check_id') ?>

    <?php // echo $form->field($model, 'checker_time') ?>

    <?php // echo $form->field($model, 'assigned_to') ?>

    <?php // echo $form->field($model, 'payment_confirm') ?>

    <?php // echo $form->field($model, 'confirm_date') ?>

    <?php // echo $form->field($model, 'realocation') ?>

    <?php // echo $form->field($model, 'tra_comment') ?>

    <?php // echo $form->field($model, 'send_tra') ?>

    <?php // echo $form->field($model, 'fiscal_code') ?>

    <?php // echo $form->field($model, 'processed_by') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('yii', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('yii', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
