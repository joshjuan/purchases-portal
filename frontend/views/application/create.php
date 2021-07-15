<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Application */

$this->title = Yii::t('yii', 'Create Application');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Applications'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="application-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
