<?php

namespace frontend\controllers;


use frontend\models\Application;
use frontend\models\ApplicationItem;
use frontend\models\ApplicationSearch;
use frontend\models\Attachments;
use frontend\models\Customer;
use frontend\models\PackagesItems;
use frontend\models\Product;
use frontend\models\ProductSearch;
use frontend\models\Reference;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\User;
use frontend\models\VerifyEmailForm;

use Yii;
use yii\base\InvalidArgumentException;
use yii\base\UserException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\web\Response;
use yii\web\UploadedFile;
use frontend\models\AttachmentsSearch;
use  yii\web\NotFoundHttpException;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex1()
    {
        return $this->render('index');
    }

    public function actionIndex()
    {
        //     if (Yii::$app->user->isGuest) {
        //   $model = new Product();
        $searchModel = new ApplicationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            //  'model' => $model,
        ]);
        //       }
//        else{
//            $model=new Product();
//            if ($model->load(Yii::$app->request->post())) {
//                print_r($model->product_name);
//
//            }
//            return $this->render('signup-mobile', [
//                'model' => $model,
//            ]);
//
//
//        }


    }


    public function actionDashboard()
    {
        $searchModel = new ApplicationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDocument()
    {
        $searchModel = new AttachmentsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('document', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionViewDocument($id)
    {
        return $this->render('view_document', [
            'model' => $this->findModel($id),
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Attachments::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('yii', 'The requested page does not exist.'));
    }


    public function actionEfd()
    {
        return $this->render('efd');
    }

    public function actionPayment()
    {
        return $this->render('payment');
    }


    public function actionOrder()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('payment', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */


    public function actionSignup()
    {
        $product = new Product();
        //  $app = new Application();
        $appItem = new ApplicationItem();
        $customer = new Customer();
        $attachment = new Attachments();
        $user = new User();
        //  $user->signup()

        if ($customer->load(Yii::$app->request->post()) && $appItem->load(Yii::$app->request->post()) &&
            $attachment->load(Yii::$app->request->post()) && $user->load(Yii::$app->request->post())) {

            $customer->status = 0;
            $customer->in_contract = 0;
            $customer->branch_id = 27;
            $customer->maker_id = 'ONLINE REGISTRATION';
            $customer->maker_time = date('Y-m-d H:i:s');

            if ($customer->save(false)) {

                $checkUser = User::findOne(['username' => $customer->tin_number]);
                if (empty($checkUser)) {
                    $user->full_name = $customer->name;
                    $user->username = $customer->tin_number;
                    $user->email = $customer->email;
                    $user->branch_id = $customer->branch_id;
                    $user->created_at = date('YmdHis');
                    $user->updated_at = date('YmdHis');
                    $user->user_type = 2;
                    $user->emp_id = 0;
                    $user->customer_id = $customer->id;
                    $user->role = 'Customer';
                    $user->password_hash = Yii::$app->security->generatePasswordHash($user->password);
                    $user->auth_key = Yii::$app->security->generateRandomString() . '_' . time();
                    $user->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
                    $user->save(false);
                }

                $attachment->business = UploadedFile::getInstance($attachment, 'business');
                $attachment->identity = UploadedFile::getInstance($attachment, 'identity');
                $attachment->tax_form = UploadedFile::getInstance($attachment, 'tax_form');

                if ($attachment->business) {
                    $attachment->business = UploadedFile::getInstance($attachment, 'business');
                    $attachment->business->saveAs('uploads/' . 'BL' . $_POST['Customer']['tin_number'] . date('YmdHi') . '.' . $attachment->business->extension);
                    $attachment->business_licence = 'BL' . $_POST['Customer']['tin_number'] . date('YmdHi') . '.' . $attachment->business->extension;
                }


                if ($attachment->identity && $attachment->tax_form) {

                    $attachment->identity = UploadedFile::getInstance($attachment, 'identity');
                    $attachment->identity->saveAs('uploads/' . 'OWNER-ID' . $_POST['Customer']['tin_number'] . date('YmdHi') . '.' . $attachment->identity->extension);
                    $attachment->identification = 'OWNER-ID' . $_POST['Customer']['tin_number'] . date('YmdHi') . '.' . $attachment->identity->extension;


                    $attachment->tax_form = UploadedFile::getInstance($attachment, 'tax_form');
                    $attachment->tax_form->saveAs('uploads/' . 'TIN' . $_POST['Customer']['tin_number'] . date('YmdHi') . '.' . $attachment->tax_form->extension);
                    $attachment->tax_identification = 'TIN' . $_POST['Customer']['tin_number'] . date('YmdHi') . '.' . $attachment->tax_form->extension;
                }

                $attachment->customer_id = $customer->id;
                $attachment->created_at = date('Y-m-d H:i:s');
                $attachment->created_by = $customer->maker_id;
                $attachment->branch_id = 10;
                if ($attachment->save(false)) {
                    $app = new Application();
                    $app->status = Application::SUBMITTED;
                    $app->maker_id = $customer->maker_id;
                    $app->branch_id = 10;
                    $app->customer_id = $customer->id;
                    $app->maker_time = date('Y-m-d:H:i:s');
                    $app->auth_status = 'U';
                    $app->send_tra = 0;
                    $app->app_dt = date('Y-m-d H:i:s');
                    $app->app_ref_number = Reference::findLast();
                    if ($app->save(false)) {

                        $newItem = new ApplicationItem();
                        $newItem->product_id = $appItem->product_id;
                        $newItem->app_id = $app->id;
                        $newItem->qty = 1;
                        $newItem->price = Product::getPrice($appItem->product_id); //gets product price

                        $TAX_COEF = (Product::getTax($appItem->product_id) / 100) + 1;
                        $total = $TAX_COEF * $newItem->price * $newItem->qty;

                        $taxAmount = $total - ($newItem->price * $newItem->qty);

                        $newItem->total = $total;
                        $newItem->tax_amount = $taxAmount;
                        $newItem->app_status = Application::SUBMITTED;
                        $newItem->maker_id = $customer->maker_id;
                        $newItem->maker_time = date('Y-m-d H:i:s');
                        $newItem->save();
                    }

                    Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
                    return $this->redirect(['site/login']);
                }


            }
            //  print_r($customer->tin_number);
            // die;

            //   Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'customer' => $customer,
            'product' => $product,
            'attachment' => $attachment,
            'user' => $user,
            'appItem' => $appItem,
        ]);
    }


    public function actionData($id)

    {

        Yii::$app->response->format = Response::FORMAT_JSON;


        $data = Yii::$app->response->data = PackagesItems::find()
            ->where(['product_id' => intval($id)])
            ->asArray()
            ->all();
        $plan = Product::findOne(['id' => $id]);

        $all = [
            'plan' => $plan->product_name,
            'items' => $data,
        ];

        return json_encode($all);
//        $request = Yii::$app->request;
//
//        $post    = $request->post();
//
//        if ($request->isAjax && !empty($post['id'])) {
//
//            Yii::$app->response->format = Response::FORMAT_JSON;
//            $get=Product::findOne(['id'=>$post['id']]);
//
//            $all= [
//                'status' => 'success',
//                'data'=>$get,
//            ];
//            return json_encode($all);
//
//        }

    }


//    public function actionMobile($id)
//    {
//        $req = Yii::$app->request;
//
//     //   return json_encode($all);
//            print_r($req);
//        die;
//        $model = new Product();
//        $id = Yii::$app->request->get('product_name');
//        //$id =$_POST['Product']['id'];
//        print_r($id);
//        die;
//        // $productID =$id;
//        //   $GLOBALS['ref']=$id;
//        $product = new Product();
//        //  $app = new Application();
//        $appItem = new ApplicationItem();
//        $customer = new Customer();
//        $attachment = new Attachments();
//        $user = new User();
//        //  $user->signup()
//        //  $appItem->product_id =  $id;
//        if ($model->load(Yii::$app->request->post())) {
//            print_r($model->product_name);
//            die;
//
//        }
//        return $this->render('signupMobile', [
//            'customer' => $customer,
//            'product' => $product,
//            'attachment' => $attachment,
//            'user' => $user,
//            'appItem' => $appItem,
//        ]);
//
//    }


    public function actionSignupMobile()
    {
        $id= Yii::$app->request->post('id');
        $productID= json_decode($id);

//            if (isset($_POST['data'])) {
//                var_dump(json_encode($_POST['data']));
//                echo "success";
//            } else {
//                $productID=21;
//            }

     //   die;
     //  $id= Yii::$app->request->post('id');
     //   Yii::$app->response->format = Response::FORMAT_JSON;


//        $data = Yii::$app->response->data = PackagesItems::find()
//            ->where(['product_id' => intval($id)])
//            ->asArray()
//            ->all();
//        $plan = Product::findOne(['id' => $id]);
//
//        $all = [
//            'plan' => $plan->product_name,
//            'items' => $data,
//        ];

      //  $productID= json_encode($id);
     //   return $productID;


     //   print_r($data);
     //   die;
//
//        if (isset($data)) {
//            $test = $data;
//        } else {
//            $test = 23;
//        }
        //    $getAll= \yii\helpers\Json::encode($test);
       // $getAll = 23;

        $model = new Product();
        //  $model->load(Yii::$app->request->post());

        $product = new Product();
        $appItem = new ApplicationItem();
        $customer = new Customer();
        $attachment = new Attachments();
        $user = new User();

        $appItem->product_id = $productID;

        // print_r($productID);
        //   die;
        if ($customer->load(Yii::$app->request->post()) && $appItem->load(Yii::$app->request->post()) &&
            $attachment->load(Yii::$app->request->post()) && $user->load(Yii::$app->request->post())) {


            $customer->status = 0;
            $customer->in_contract = 0;
            $customer->branch_id = 27;
            $customer->maker_id = 'ONLINE REGISTRATION';
            $customer->maker_time = date('Y-m-d H:i:s');


            if ($customer->save(false)) {

                $checkUser = User::findOne(['username' => $customer->tin_number]);
                if (empty($checkUser)) {
                    $user->full_name = $customer->name;
                    $user->username = $customer->tin_number;
                    $user->email = $customer->email;
                    $user->branch_id = $customer->branch_id;
                    $user->created_at = date('YmdHis');
                    $user->updated_at = date('YmdHis');
                    $user->user_type = 2;
                    $user->emp_id = 0;
                    $user->role = 'Customer';
                    $user->password_hash = Yii::$app->security->generatePasswordHash($user->password);
                    $user->auth_key = Yii::$app->security->generateRandomString() . '_' . time();
                    $user->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
                    $user->save(false);
                }


                $attachment->business = UploadedFile::getInstance($attachment, 'business');
                $attachment->identity = UploadedFile::getInstance($attachment, 'identity');
                $attachment->tax_form = UploadedFile::getInstance($attachment, 'tax_form');

                if ($attachment->business) {
                    $attachment->business = UploadedFile::getInstance($attachment, 'business');
                    $attachment->business->saveAs('uploads/' . 'BL' . $_POST['Customer']['tin_number'] . date('YmdHi') . '.' . $attachment->business->extension);
                    $attachment->business_licence = 'BL' . $_POST['Customer']['tin_number'] . date('YmdHi') . '.' . $attachment->business->extension;
                }


                if ($attachment->identity && $attachment->tax_form) {

                    $attachment->identity = UploadedFile::getInstance($attachment, 'identity');
                    $attachment->identity->saveAs('uploads/' . 'OWNER-ID' . $_POST['Customer']['tin_number'] . date('YmdHi') . '.' . $attachment->identity->extension);
                    $attachment->identification = 'OWNER-ID' . $_POST['Customer']['tin_number'] . date('YmdHi') . '.' . $attachment->identity->extension;


                    $attachment->tax_form = UploadedFile::getInstance($attachment, 'tax_form');
                    $attachment->tax_form->saveAs('uploads/' . 'TIN' . $_POST['Customer']['tin_number'] . date('YmdHi') . '.' . $attachment->tax_form->extension);
                    $attachment->tax_identification = 'TIN' . $_POST['Customer']['tin_number'] . date('YmdHi') . '.' . $attachment->tax_form->extension;
                }

                $attachment->customer_id = $customer->id;
                $attachment->created_at = date('Y-m-d H:i:s');
                $attachment->created_by = $customer->maker_id;
                $attachment->branch_id = 27;
                if ($attachment->save(false)) {
                    $app = new Application();
                    $app->status = Application::SUBMITTED;
                    $app->maker_id = $customer->maker_id;
                    $app->branch_id = 27;
                    $app->customer_id = $customer->id;
                    $app->maker_time = date('Y-m-d:H:i:s');
                    $app->auth_status = 'U';
                    $app->send_tra = 0;
                    $app->app_dt = date('Y-m-d H:i:s');
                    $app->app_ref_number = Reference::findLast();
                    if ($app->save(false)) {

                        $newItem = new ApplicationItem();
                        $newItem->product_id = $appItem->product_id;
                        $newItem->app_id = $app->id;
                        $newItem->qty = 1;
                        $newItem->price = Product::getPrice($appItem->product_id); //gets product price

                        $TAX_COEF = (Product::getTax($appItem->product_id) / 100) + 1;
                        $total = $TAX_COEF * $newItem->price * $newItem->qty;

                        $taxAmount = $total - ($newItem->price * $newItem->qty);

                        $newItem->total = $total;
                        $newItem->tax_amount = $taxAmount;
                        $newItem->app_status = Application::SUBMITTED;
                        $newItem->maker_id = $customer->maker_id;
                        $newItem->maker_time = date('Y-m-d H:i:s');
                        $newItem->save();
                    }

                    Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
                    return $this->redirect(['site/login']);
                }


            }
            //  print_r($customer->tin_number);
            // die;

            //   Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signupMobile', [
            'customer' => $customer,
            'product' => $product,
            'attachment' => $attachment,
            'user' => $user,
            'appItem' => $appItem,
        ]);
    }

    public function actionSignupOld()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }


    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @return yii\web\Response
     * @throws BadRequestHttpException
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }


    public function checkOut($params)
    {
        $payer = new Payer();
        $payer->setPaymentMethod($params['method']);
        $orderList = [];

        foreach ($params['order']['items'] as $orderItem) {
            $item = new PackagesItems();
            $item->setName($orderItem['name'])
                ->setCurrency($orderItem['currency'])
                ->setQuantity($orderItem['quantity'])
                ->setPrice($orderItem['price']);
            $orderList[] = $item;
        }
        $itemList = new ItemList();
        $itemList->setItems($orderList);
        $details = new Details();
        $details->setShipping($params['order']['shippingCost'])
            ->setSubtotal($params['order']['subtotal']);
        $amount = new Amount();
        $amount->setCurrency($params['order']['currency'])
            ->setTotal($params['order']['total'])
            ->setDetails($details);
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription($params['order']['description'])
            ->setCustom(Yii::$app->user->id)
            ->setInvoiceNumber(uniqid());

        $redirectUrl = Url::to([$this->redirectUrl], true);
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl("$redirectUrl?success=true")
            ->setCancelUrl("$redirectUrl?success=false");
        $payment = new Payment();
        $payment->setIntent($params['intent'])
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));
        try {
            $payment->create($this->apiContext);
            return \Yii::$app->controller->redirect($payment->getApprovalLink());
        } catch (PayPalConnectionException $ex) {
            // This will print the detailed information on the exception.
            //REALLY HELPFUL FOR DEBUGGING
            \Yii::$app->response->format = \yii\web\Response::FORMAT_HTML;
            \Yii::$app->response->data = $ex->getData();
        }
    }

}
