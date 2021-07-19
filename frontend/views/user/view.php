<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\User */

$this->title = 'Name: ' . $model->full_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Users'), 'url' => ['index']];
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

                        <div class="container" style="padding-top: 20px">
                            <div class="text-center">
                                <h3>USER PROFILE INFORMATION</h3>
                            </div>
                            <h3><?= Html::encode($this->title) ?></h3>
                            <p>
                                <?php Html::a(Yii::t('yii', 'Update'), ['update', 'id' => $model->id], [
                                    'class' => 'btn btn-danger',
                                    'data' => [
                                        'confirm' => Yii::t('yii', 'Are you sure you want to update this item?'),
                                        'method' => 'post',
                                    ],
                                ]) ?>
                            </p>

                            <?= DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    // 'id',
                                    'full_name',
                                    'username',
                                    'email:email',
                                    'user_type',
                                    //         'user_signature:ntext',
                                    'branch_id',
                                    //   'auth_key',
                                    //   'password_hash',
                                    //   'password_reset_token',
                                    //    'PIN',
                                    //    'emp_id',
                                    //    'agent_id',
                                    //    'role',
                                    'status',
                                    //    'created_at',
                                    //     'updated_at',
                                ],
                            ]) ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


<?php } ?>
