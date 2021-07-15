<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\ProductSerialNumber */

$this->title = Yii::t('yii', 'Create Product Serial Number');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Product Serial Numbers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-serial-number-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
