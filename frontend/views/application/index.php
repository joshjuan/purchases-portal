<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ApplicationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('yii', 'Applications');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="application-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('yii', 'Create Application'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'app_ref_number',
            'app_dt',
            'customer_id',
            'branch_id',
            //'agent_id',
            //'status',
            //'technician_approval',
            //'accountant_approval',
            //'invoice',
            //'receipt_number',
            //'invoice_status',
            //'attachments_comments:ntext',
            //'invoice_maker',
            //'invoice_maker_time',
            //'user_identification_no',
            //'maker_id',
            //'maker_time',
            //'maker_id1',
            //'maker_time1',
            //'auth_status',
            //'check_id',
            //'checker_time',
            //'assigned_to',
            //'payment_confirm',
            //'confirm_date',
            //'realocation',
            //'tra_comment:ntext',
            //'send_tra',
            //'fiscal_code',
            //'processed_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
