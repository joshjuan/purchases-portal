<?php

/* @var $this yii\web\View */
use frontend\models\Application;
use frontend\models\ApplicationItem;
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Web';
?>
<?php if (Yii::$app->user->isGuest) { ?>


<?php } else { ?>


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

                                <?php

    $gridColumns = [
        [
            'class' => 'kartik\grid\SerialColumn',
            'contentOptions' => [
                'class' => 'kartik-sheet-style'
            ],
            'width' => '36px',
            'headerOptions' => [
                'class' => 'kartik-sheet-style'
            ]
        ],

        [
            'attribute' => 'customer_id',
            'label' => 'Customer',
            'value' => 'customer.name'
        ],
        [
            'attribute' => 'customer_id',
            'label' => 'TIN No',
            'value' => 'customer.tin_number'
        ],
        [
            'label' => 'BUSINESS LICENCE',
            'format' => 'raw',
            'value' => function ($model) {
                if ($model->business_licence == null) {
                    return '';
                } elseif ($model->business_licence != null) {

                    $basepath = Yii::$app->request->baseUrl . '/../uploads/' . $model->business_licence;
                    // $path = str_replace($basepath, '', $model->attachment);
                    return Html::a('<i class="fa fa-file text-green"></i>', $basepath, [
                        'target' => '_blank',
                        'data-pjax' => "0"
                    ]);
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
                    // $path = str_replace($basepath, '', $model->attachment);
                    return Html::a('<i class="fa fa-file text-green"></i>', $basepath, [
                        'target' => '_blank',
                        'data-pjax' => "0"
                    ]);
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
                    // $path = str_replace($basepath, '', $model->attachment);
                    return Html::a('<i class="fa fa-file text-green"></i>', $basepath, [
                        'target' => '_blank',
                        'data-pjax' => "0"
                    ]);
                }
            }
        ],
        [
            'label' => 'UIN APPLICATION FORM',
            'format' => 'raw',
            'value' => function ($model) {
                if ($model->uin == null) {
                    return '';
                } elseif ($model->uin != null) {

                    $basepath = Yii::$app->request->baseUrl . '/../uploads/' . $model->uin;
                    // $path = str_replace($basepath, '', $model->attachment);
                    return Html::a('<i class="fa fa-file text-green"></i>', $basepath, [
                        'target' => '_blank',
                        'data-pjax' => "0"
                    ]);
                }
            }
        ],
        // 'uin',
        // 'created_by',
        // 'created_at',

        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update}',
            'header' => 'Actions',
            'buttons' => [
                'view' => function ($url, $model) {
                    return Html::a('<span class="btn btn-sm btn-default"><b class="fa fa-eye"></b></span>', [
                        'view',
                        'id' => $model['id']
                    ], [
                        'title' => 'View',
                        'id' => 'modal-btn-view'
                    ]);
                },
                'update' => function ($id, $model) {
                    return Html::a('<span class="btn btn-sm btn-default"><b class="fa fa-edit"></b></span>', [
                        'update',
                        'id' => $model['id']
                    ], [
                        'title' => 'Update',
                        'id' => 'modal-btn-view'
                    ]);
                }
            ]
        ]
    ];

    // the GridView widget (you must use kartik\grid\GridView)
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => $gridColumns,
        'id' => 'grid',
        'containerOptions' => [
            'style' => 'overflow: auto'
        ], // only set when $responsive = false
        'beforeHeader' => [
            [
                'options' => [
                    'class' => 'skip-export'
                ] // remove this row from export
            ]
        ],

        'pjax' => true,
        'bordered' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        // 'floatHeader' => true,

        // 'floatHeaderOptions' => ['scrollingTop' => true],
        'showPageSummary' => true,
        'panel' => [
            'type' => GridView::TYPE_DEFAULT,
            'heading' => 'Uploaded Documents',
            'before' => '<span class ="text text-orange"></span>'
        ],

        'exportConfig' => [
            GridView::EXCEL => [
                'filename' => Yii::t('app', 'Purchases Orders-') . date('Y-m-d'),
                'showPageSummary' => true,
                'options' => [
                    'title' => 'Custom Title',
                    'subject' => 'PDF export',
                    'keywords' => 'pdf'
                ]
            ]
        ]
    ]);
    ?>

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