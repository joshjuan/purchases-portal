<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Attachments */

$this->title = Yii::t('yii', 'Create Attachments');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Attachments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attachments-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
