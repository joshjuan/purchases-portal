<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Attachments */

$this->title = 'My Attachments';
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Attachments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
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

                        <h3><?= Html::encode($this->title) ?></h3>

                        <p>
                            <?= Html::a(Yii::t('yii', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('Back Home', ['index', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
                        </p>

                        <?= DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                [
                                    'attribute' => 'customer_id',
                                    'label' => 'Customer',
                                    'value' => $model->customer->name,
                                ],
                                [
                                    'attribute' => 'customer_id',
                                    'label' => 'TIN No',
                                    'value' => $model->customer->tin_number,
                                ],
                                [
                                    'label' => 'BUSINESS LICENCE',
                                    'format' => 'raw',
                                    'value' => function ($model) {
                                        if ($model->business_licence == null) {
                                            return '';
                                        } elseif ($model->business_licence != null) {


                                            $basepath = Yii::$app->request->baseUrl . '/../uploads/' . $model->business_licence;
                                            //$path = str_replace($basepath, '', $model->attachment);
                                            return Html::a('<i class="fa fa-file text-green"></i>', $basepath, ['target' => '_blank', 'data-pjax' => "0"]);


                                        }
                                    }
                                ],
                                [
                                    'label' => 'TAX IDENTIFICATION',
                                    'format' => 'raw',
                                    'value' => function ($model) {
                                        if ($model->tax_identification == null) {
                                            return '';
                                        } elseif ($model->tax_identification != null) {


                                            $basepath = Yii::$app->request->baseUrl . '/../uploads/' . $model->tax_identification;
                                            //$path = str_replace($basepath, '', $model->attachment);
                                            return Html::a('<i class="fa fa-file text-green"></i>', $basepath, ['target' => '_blank', 'data-pjax' => "0"]);


                                        }
                                    }
                                ],
                                [
                                    'label' => 'IDENTIFICATION',
                                    'format' => 'raw',
                                    'value' => function ($model) {
                                        if ($model->identification == null) {
                                            return '';
                                        } elseif ($model->identification != null) {


                                            $basepath = Yii::$app->request->baseUrl . '/../uploads/' . $model->identification;
                                            //$path = str_replace($basepath, '', $model->attachment);
                                            return Html::a('<i class="fa fa-file text-green"></i>', $basepath, ['target' => '_blank', 'data-pjax' => "0"]);


                                        }
                                    }
                                ],



                            ],
                        ]) ?>

                    </div>
                </div>

            </div>
        </div>
    </div>


<?php } ?>
