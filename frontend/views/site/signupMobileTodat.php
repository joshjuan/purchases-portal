<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \frontend\models\SignupForm */

use frontend\models\Product;
use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\helpers\Url;
use kartik\select2\Select2;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!-- step form style -->
<style>
    /* Latest compiled and minified CSS included as External Resource*/

    /* Optional theme */

    /*@import url('//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css');*/
    body {
        margin-top: 30px;
    }

    .stepwizard-step p {
        margin-top: 0px;
        color: #666;
    }

    .stepwizard-row {
        display: table-row;
    }

    .stepwizard {
        display: table;
        width: 100%;
        position: relative;
    }

    .stepwizard-step button[disabled] {
        /*opacity: 1 !important;
        filter: alpha(opacity=100) !important;*/
    }

    .stepwizard .btn.disabled, .stepwizard .btn[disabled], .stepwizard fieldset[disabled] .btn {
        opacity: 1 !important;
        color: #bbb;
    }

    .stepwizard-row:before {
        top: 14px;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 100%;
        height: 1px;
        background-color: #ccc;
        z-index: 0;
    }

    .stepwizard-step {
        display: table-cell;
        text-align: center;
        position: relative;
    }

    .btn-circle {
        width: 30px;
        height: 30px;
        text-align: center;
        padding: 6px 0;
        font-size: 12px;
        line-height: 1.428571429;
        border-radius: 15px;
    }

</style>
<!-- forn area -->

<div class="container" style="padding-top: 150px">
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step col-xs-3">
                <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
                <p><small>Product Selection</small></p>
            </div>
            <div class="stepwizard-step col-xs-3">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p><small>Basic Information</small></p>
            </div>
            <div class="stepwizard-step col-xs-3">
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p><small>TIN Information</small></p>
            </div>
            <div class="stepwizard-step col-xs-3">
                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                <p><small>Documents Attachment</small></p>
            </div>
        </div>
    </div>
    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data',
            'id' => 'dynamic-form'
        ],
    ]); ?>
    <div class="container">
        <div class="col-xs-12">
            <form role="form">
                <div class="panel panel-info setup-content" id="step-1">
                    <div class="panel-heading">
                        <h3 class="panel-title">Mobile Package Selection</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <?=
                            $form->field($appItem, 'product_id')->widget(Select2::classname(), [
                                'data' => Product::getMobilePackageAll(),

                                'options' => ['placeholder' => 'Select a Product ...',
                                    'required' => true,
                                    'id' => 'purpose',
                                ],
                                'pluginEvents' => [
                                    "change" => 'function() { 
                                                var data_id = $(this).val();
                                               $("#business").css(\'display\', (this.value != \'" "\') ? \'block\' : \'none\');
                                                
                                            }',
                                ],
                                'pluginOptions' => [
                                    'allowClear' => true,

                                ],

                            ]);
                            ?>

                        </div>
                        <button class="btn btn-primary nextBtn pull-right"  id="business" type="button"
                                style="display: none;background-color:#77BD43;">Next
                        </button>
                    </div>
                </div>
                <div class="panel panel-info setup-content" id="step-2">
                    <div class="panel-heading">
                        <h3 class="panel-title">Basic Information</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <?= $form->field($customer, 'name')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeHolder' => 'Name', 'required' => true]) ?>

                                </div>
                                <div class="col-md-4 mb-3">

                                    <?= $form->field($customer, 'applicant_title')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeHolder' => 'Applicant title', 'required' => true]) ?>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <?= $form->field($customer, 'email')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeHolder' => 'Email']) ?>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-4 mb-3">
                                    <?= $form->field($customer, 'address')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeHolder' => 'Address']) ?>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <?= $form->field($customer, 'street')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeHolder' => 'Street', 'required' => true]) ?>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <?= $form->field($customer, 'plot_no')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeHolder' => 'Plot No']) ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <?= $form->field($customer, 'house_no')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeHolder' => 'House']) ?>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <?= $form->field($user, 'password')->passwordInput(['required' => true,'id'=>'pswd1']) ?>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <?= $form->field($user, 'repassword')->passwordInput(['required' => true,'id'=>'pswd2']) ?>
                                </div>

                            </div>

                            <button class="btn btn-primary nextBtn pull-right"  id="customerInfo" type="button"  onclick="validateForm()"
                                    style="display: block;background-color:#77BD43;">Next
                            </button>
                        </div>
                    </div>
                </div>
                <div class="panel panel-info setup-content" id="step-3">
                    <div class="panel-heading">
                        <h3 class="panel-title">TIN Information</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <?= $form->field($customer, 'tin_number')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeHolder' => 'TIN Number', 'required' => true]) ?>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <?= $form->field($customer, 'vrn')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeHolder' => 'VRN']) ?>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <?= $form->field($customer, 'phone_number')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeHolder' => 'TIN Phone Number', 'required' => true]) ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <?= $form->field($customer, 'business_type')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeHolder' => 'Business Type']) ?>
                            </div>
                            <div class="col-md-4 mb-3">
                                <?= $form->field($customer, 'tax_regional')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeHolder' => 'Tax Regional', 'required' => true]) ?>
                            </div>
                            <div class="col-md-4 mb-3">
                                <?= $form->field($customer, 'phone_number2')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeHolder' => 'Additional Phone Number']) ?>
                            </div>
                        </div>

                        <button class="btn btn-primary nextBtn pull-right"  id="business" type="button"
                                style="display: block;background-color:#77BD43;">Next
                        </button>

                    </div>
                </div>
                <div class="panel panel-info setup-content" id="step-4">
                    <div class="panel-heading">
                        <h3 class="panel-title">Documents Attachment</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <?= $form->field($attachment, "business")->fileInput() ?>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <?= $form->field($attachment, "identity")->fileInput(['required' => true]) ?>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <?= $form->field($attachment, "tax_form")->fileInput(['required' => true]) ?>
                                </div>
                            </div>
                        </div>
                        <?= Html::submitButton('Signup', ['class' => 'btn btn-primary pull-right', 'name' => 'signup-button']) ?>

                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<section class="card-new">
    <div class="forma-section">

    </div>
</section>


<!-- End Footer -->
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/purecounter/purecounter.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Calling Slick Library -->
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
    function validateForm() {
        var pw1 = document.getElementById("pswd1");
        var pw2 = document.getElementById("pswd2");
        if(pw1 != pw2)
        {
            alert("Passwords did not match");
            isValid = false;
        } else {
            alert("Password created successfully");
        }
    }

    $(document).ready(function () {

        var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

        allWells.hide();

        navListItems.click(function (e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                $item = $(this);

            if (!$item.hasClass('disabled')) {
                navListItems.removeClass('btn-success').addClass('btn-default');
                $item.addClass('btn-success');
                allWells.hide();
                $target.show();
                $target.find('input:eq(0)').focus();
            }
        });

        allNextBtn.click(function () {
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input[type='text'],input[type='url']"),
                isValid = true;

            $(".form-group").removeClass("has-error");
            for (var i = 0; i < curInputs.length; i++) {
                if (!curInputs[i].validity.valid) {
                    isValid = false;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");
                }
            }


            if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
        });

        $('div.setup-panel div a.btn-success').trigger('click');
    });
</script>
