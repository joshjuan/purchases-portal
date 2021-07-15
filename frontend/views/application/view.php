<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Application */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Applications'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="application-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('yii', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('yii', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'app_ref_number',
            'app_dt',
            'customer_id',
            'branch_id',
            'agent_id',
            'status',
            'technician_approval',
            'accountant_approval',
            'invoice',
            'receipt_number',
            'invoice_status',
            'attachments_comments:ntext',
            'invoice_maker',
            'invoice_maker_time',
            'user_identification_no',
            'maker_id',
            'maker_time',
            'maker_id1',
            'maker_time1',
            'auth_status',
            'check_id',
            'checker_time',
            'assigned_to',
            'payment_confirm',
            'confirm_date',
            'realocation',
            'tra_comment:ntext',
            'send_tra',
            'fiscal_code',
            'processed_by',
        ],
    ]) ?>

</div>
