<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \frontend\models\SignupForm */

use frontend\models\Product;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\helpers\Url;
use kartik\select2\Select2;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .form-section {
        background-color: #F2F3F8;
        height: auto;
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
        width: 80%;
        position: relative;
        text-align: center;
        background-color: #fff;
        margin: auto;
    }

    .stepwizard .btn.disabled,
    .stepwizard .btn[disabled],
    .stepwizard fieldset[disabled] .btn {
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

    form {
        margin: 2% 10%;
    }

    input {
        font-size: 17px;
        background-color: #EBEBEB;
        border: 1px solid #DADADA;
        border-radius: 7px;
        padding: 7px;
        min-height: 45px;
    }

    option {
        width: 100%;
        font-size: 17px;
        background-color: #EBEBEB;
        border-radius: 7px;
        padding: 20px;
        min-height: 65px;
    }

    button {
        width: 200px;
        height: 45px;
        background-color: #37517E;
    }

    .btn-color {
        background-color: #37517E;
        color: #fff;
    }

    /* Mark input boxes that gets an error on validation: */

    input.invalid {
        background-color: #ffdddd;
    }

    .control-label {
        color: #37517E;
    }

    @media only screen and (max-width: 600px) {
    }

    .formRegion {
        background-color: #fff;
        margin: 20px auto;
        padding: 20px;
        min-width: 300px;
        border-style: solid 1px #eaea;
    }

    input {
        min-height: ;
        width: 100%;
    }

    }
    }
</style>
<script type="text/javascript">
    function validateForm() {


        if (document.getElementById("password").value.trim() == "") {
            alert("Please enter  Password");
            return false;
        }

        if (document.getElementById("repassword").value.trim() == "") {
            alert("Please enter Repeated Password");
            return false;
        }


        if (document.getElementById("password").value.trim() != document.getElementById("repassword").value.trim()) {
            alert("Password and Repeated Password do not match");
            return false;
        }
    };
</script>

<!-- forn area -->
<section class="form-section">
    <div class="container" style="width: 90%;">

        <div class="formRegion">
            <header class="section-header">
                <p>VFD Application Form</p>
            </header>

            <div class="stepwizard">
                <div class="stepwizard-row setup-panel">
                    <div class="stepwizard-step col-xs-3">
                        <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
                        <p><small>Mobile Package Selection</small></p>
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
            <form role="form">
                <div class="panel panel-primary setup-content" id="step-1">

                    <div class="panel-body">
                        <div class="form-group mt-3">
                            <?=
                            $form->field($appItem, 'product_id')->widget(Select2::classname(), [
                                'disabled' => true,
                                'data' => Product::getMobilePackageAll(),
                            ]);
                            ?>

                            <?php
                            $form->field($appItem, 'product_id')->widget(Select2::classname(), [
                                'data' => Product::getMobilePackageAll(),

                                'options' => ['placeholder' => 'Select a Product ...',
                                    'required' => true,
                                    'id' => 'product',
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


                        <button class="btn btn-color nextBtn pull-right mt-5" type="button" >Next</button>
                    </div>
                </div>

                <div class="panel panel-primary setup-content" id="step-2">

                    <div class="panel-body">
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
                                <?= $form->field($customer, 'address')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeHolder' => 'Address','required' => true]) ?>
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
                                <?= $form->field($user, 'password')->passwordInput(['required' => true,'id'=>'password']) ?>
                            </div>
                            <div class="col-md-4 mb-3">
                                <?= $form->field($user, 'repassword')->passwordInput(['required' => true,'id'=>'repassword']) ?>
                            </div>

                        </div>

                        <button class="btn btn-info prevBtn pull-right" type="button">Previous</button>
                        <button class="btn btn-color nextBtn pull-right" type="button">Next</button>
                    </div>
                </div>

                <div class="panel panel-primary setup-content" id="step-3">

                    <div class="panel-body">


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
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <?= $form->field($customer, 'business_type')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeHolder' => 'Business Type','required' => true]) ?>
                            </div>
                            <div class="col-md-4 mb-3">
                                <?= $form->field($customer, 'tax_regional')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeHolder' => 'Tax Regional', 'required' => true]) ?>
                            </div>
                            <div class="col-md-4 mb-3">
                                <?= $form->field($customer, 'phone_number2')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeHolder' => 'Additional Phone Number']) ?>
                            </div>
                        </div>

                        <button class="btn btn-color nextBtn pull-right" type="button">Next</button>
                    </div>
                </div>

                <div class="panel panel-primary setup-content" id="step-4">

                    <div class="panel-body">

                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <?= $form->field($attachment, "business")->fileInput() ?>
                            </div>
                            <div class="col-md-4 mb-4">
                                <?= $form->field($attachment, "identity")->fileInput(['required' => true]) ?>
                            </div>
                            <div class="col-md-4 mb-4">
                                <?= $form->field($attachment, "tax_form")->fileInput(['required' => true]) ?>
                            </div>
                        </div>
                        <?= Html::submitButton('Signup', ['class' => 'btn btn-primary pull-right', 'name' => 'signup-button','onclick'=>"validateForm()"]) ?>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</section>

<!-- End Footer -->
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
<!-- Vendor JS Files -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Calling Slick Library -->
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>





    $(document).ready(function () {

        var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');
            allPrevBtn = $('.prevBtn');

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



        allPrevBtn.click(function(){
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                prevStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a");
            prevStepWizard.removeAttr('disabled').trigger('click');
        });


        $('div.setup-panel div a.btn-info').trigger('click');


    });
</script>

