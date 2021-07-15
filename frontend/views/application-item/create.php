<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\ApplicationItem */

$this->title = Yii::t('yii', 'Create Application Item');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Application Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="application-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
