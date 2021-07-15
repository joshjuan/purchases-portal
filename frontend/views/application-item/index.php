<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ApplicationItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('yii', 'Application Items');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="application-item-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('yii', 'Create Application Item'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'product_id',
            'qty',
            'price',
            'total',
            //'tax_amount',
            //'app_id',
            //'app_status',
            //'maker_id',
            //'maker_time',
            //'discount_amount',
            //'discount_maker',
            //'product_changer',
            //'changed_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
