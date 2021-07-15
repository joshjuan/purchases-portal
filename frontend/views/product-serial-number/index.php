<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ProductSerialNumberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('yii', 'Product Serial Numbers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-serial-number-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('yii', 'Create Product Serial Number'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'product_id',
            'serial_number',
            'status',
            'transfer_date',
            //'transfer_by',
            //'created_at',
            //'created_by',
            //'assigned_to',
            //'comment:ntext',
            //'supplier',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
