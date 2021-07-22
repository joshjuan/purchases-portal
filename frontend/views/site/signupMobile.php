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
<!-- step form style -->
<style>
    /* Style the form */

    #regForm {
        background-color: #ffffff;
        margin: 100px auto;
        padding: 40px;
        width: 70%;
        min-width: 300px;
    }

    /* Style the input fields */

    input {
        padding: 40px;
        width: 100%;
        font-size: 17px;
        background-color: #EBEBEB;
        border: 1px solid #DADADA;
        border-radius: 7px;
        padding: 7px;
        min-height: 45px;
    }

    option {
        padding: 40px;
        width: 100%;
        font-size: 17px;
        background-color: #EBEBEB;
        border: 1px solid #DADADA;
        border-radius: 7px;
        padding: 7px;
        min-height: 55px;
    }

    /* Mark input boxes that gets an error on validation: */

    input.invalid {
        background-color: #ffdddd;
    }

    /* Hide all steps by default: */

    .tab {
        display: none;
    }

    /* Make circles that indicate the steps of the form: */

    .step {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
    }

    /* Mark the active step: */

    .step.active {
        opacity: 1;
    }

    /* Mark the steps that are finished and valid: */

    .step.finish {
        background-color: #04AA6D;
    }

    .form-section {
        width: aito;
        position: relative;
        background: #eaeaea;
    }

    .step-btn {
        margin: auto;
    }

    .step-btn button {
        width: 200px;
        color: #ffffff;
        border: 1px solid #DADADA;
        border-radius: 7px;
        padding: 7px;
        min-height: 55px;
        background-color: #37517E;
    }

    @media only screen and (max-width: 600px) {
        #regForm {
            margin: 100px auto;
            width: 100%;
            min-width: 300px;
        }

        .form-control {
            background-color: #EBEBEB;
            border: 1px solid #DADADA;
            border-radius: 7px;
            padding: 7px;
            min-height: 55px;
        }

        .step-btn button {
            width: 100px;
            color: #ffffff;
            border: 1px solid #DADADA;
            border-radius: 7px;
            padding: 7px;
            min-height: 35px;
            background-color: #37517E;
        }
    }
</style>
<script>
    
</script>

<!-- forn area -->
<section class="form-section">
    <div class="container">
        <div class="form-area text-center mt-auto">
            <?php $form = ActiveForm::begin([
                'options' => [
                    'enctype' => 'multipart/form-data',
                    'id' => 'regForm',
                    'class' => 'fombody',
                ],
            ]); ?>
            <form id="regForm" action="" class="fombody">

                <header class="section-header">
                    <p> Application Form</p>
                </header>

                <div class="tab m-4">
                    <div class="col-md-6 mb-3 m-auto">
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
                </div>

                <!-- One "tab" for each step in the form: -->
                <div class="tab">Basic Details
                    <hr/>
                    <div class="row ">
                        <div class="col-md-4 mb-3 m-auto">
                            <?= $form->field($customer, 'name')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeHolder' => 'Name', 'required' => true]) ?>
                        </div>

                        <div class="col-md-4 mb-3">

                            <?= $form->field($customer, 'applicant_title')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeHolder' => 'Applicant title', 'required' => true]) ?>
                        </div>
                        <div class="col-md-4 mb-3">

                            <?= $form->field($customer, 'email')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeHolder' => 'Email']) ?>
                        </div>
                    </div>
                    <div class="row ">
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
                    <div class="row ">
                        <div class="col-md-4 mb-3">

                            <?= $form->field($customer, 'house_no')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeHolder' => 'House']) ?>
                        </div>
                        <div class="col-md-4 mb-3">

                            <?= $form->field($user, 'password')->passwordInput(['required' => true]) ?>
                        </div>
                        <div class="col-md-4 mb-3">
                            <?= $form->field($user, 'repassword')->passwordInput(['required' => true]) ?>
                        </div>
                    </div>


                </div>

                <!-- One "tab" for each step in the form: -->
                <div class="tab">Tin Information
                    <hr/>
                    <div class="row ">
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
                    <div class="row ">
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

                </div>

                <div class="tab">Attachment
                    <hr/>
                    <div class="row ">
                        <div class="col-md-6 mb-3">

                            <?= $form->field($attachment, "business")->fileInput() ?>
                        </div>
                        <div class="col-md-6 mb-3">

                            <?= $form->field($attachment, "identity")->fileInput(['required' => true]) ?>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-6 mb-3">

                            <?= $form->field($attachment, "tax_form")->fileInput(['required' => true]) ?>
                        </div>

                    </div>
                </div>
                <div class="mt-4" style="overflow:auto;">
                    <div class="step-btn">
                        <button class="getstarted scrollto pil" type="button" id="prevBtn" onclick="nextPrev(-1)"
                                style="background-color:#77BD43;">Previous
                        </button>
                        <button class="getstarted scrollto pil" type="button" id="nextBtn" onclick="nextPrev(1)">Next
                        </button>
                    </div>
                </div>

                <!-- Circles which indicates the steps of the form: -->
                <div style="text-align:center;margin-top:40px;">
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                </div>

            </form>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</section>

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
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
        // This function will display the specified tab of the form ...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        // ... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }
        // ... and run a function that displays the correct step indicator:
        fixStepIndicator(n)
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form... :
        if (currentTab >= x.length) {
            //...the form gets submitted:
            document.getElementById("regForm").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
                // add an "invalid" class to the field:
                y[i].className += " invalid";
                // and set the current valid status to false:
                valid = false;
            }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
    }

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class to the current step:
        x[n].className += " active";
    }
</script>
