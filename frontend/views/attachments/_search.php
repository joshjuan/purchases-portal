<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\AttachmentsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="attachments-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'customer_id') ?>

    <?= $form->field($model, 'branch_id') ?>

    <?= $form->field($model, 'business_licence') ?>

    <?= $form->field($model, 'identification') ?>

    <?php // echo $form->field($model, 'tax_identification') ?>

    <?php // echo $form->field($model, 'uin') ?>

    <?php // echo $form->field($model, 'representative_id') ?>

    <?php // echo $form->field($model, 'app_letter') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('yii', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('yii', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
