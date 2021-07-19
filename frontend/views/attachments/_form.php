<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Attachments */
/* @var $form yii\widgets\ActiveForm */
?>

<?php if (!Yii::$app->user->isGuest) { ?>


<!-- ============================================================== -->
<!-- end left sidebar -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->
<div class="dashboard-wrapper">
	<div class="container-fluid  dashboard-content">


		<div class="row">
			<!-- ============================================================== -->
			<!-- basic table  -->
			<!-- ============================================================== -->
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="card">


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'customer_id')->textInput() ?>

    <?= $form->field($model, 'branch_id')->textInput() ?>

    <?= $form->field($model, 'business_licence')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'identification')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tax_identification')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'uin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'representative_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'app_letter')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('yii', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
            </div>
			</div>
			<!-- ============================================================== -->
			<!-- end basic table  -->
			<!-- ============================================================== -->
		</div>
	</div>

	<!-- ============================================================== -->
	<!-- end footer -->
	<!-- ============================================================== -->
</div>


<?php } ?>
