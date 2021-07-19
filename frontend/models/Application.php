<?php

namespace frontend\models;

use Yii;


/**
 * This is the model class for table "tbl_application".
 *
 * @property int $id
 * @property string $app_ref_number
 * @property string $app_dt
 * @property int $customer_id
 * @property int|null $branch_id
 * @property int|null $agent_id
 * @property int $status
 * @property string|null $technician_approval
 * @property string|null $accountant_approval
 * @property string|null $invoice
 * @property string|null $receipt_number
 * @property int|null $invoice_status
 * @property string|null $attachments_comments
 * @property string|null $invoice_maker
 * @property string|null $invoice_maker_time
 * @property string|null $user_identification_no
 * @property string|null $maker_id
 * @property string|null $maker_time
 * @property string|null $maker_id1
 * @property string|null $maker_time1
 * @property string|null $auth_status
 * @property string|null $check_id
 * @property string|null $checker_time
 * @property string|null $assigned_to
 * @property string|null $payment_confirm
 * @property string|null $confirm_date
 * @property int|null $realocation
 * @property string|null $tra_comment
 * @property int $send_tra
 * @property string|null $fiscal_code
 * @property string|null $signature
 *
 * @property Customer $customer
 * @property ApplicationUin[] $tblApplicationUins
 */
class Application extends \yii\db\ActiveRecord
{
    const SUBMITTED = -1;
    const APPLIED = 0;
    const VERIFIED = 1;
    const WAITING_FOR_NEW_DEVICE = 2;
    const DEVICE_ASSIGNED = 3;
    const WAITING_FOR_UIN = 4;
    const PHYSICAL_SETUP = 5;
    const WAITING_FOR_DELIVERY = 6;
    const DELIVERED = 7;
    const UIN_FAIL = 8;
    const FISCAL_FAIL = 9;
    const CANCELED = 10;

    const TECHNICIAN_APPROVAL = 1;
    const ACCOUNTANT_APPROVAL = 2;
    const NO_INVOICE = 3;
    const WITH_INVOICE = 4;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_application';
    }

    
    
    public static function OnProgress()
    {
        $model = Application::findAll(['status' =>0,'customer_id'=>\Yii::$app->user->identity->getId()]);
        if (count($model) > 0) {
            return count($model);
        } else {
            return 0;
        }
        
    }
    public static function Paid()
    {
        $model = Application::findAll(['status' =>1,'fiscal_code'=>1,'customer_id'=>\Yii::$app->user->identity->getId()]);
        if (count($model) > 0) {
            return count($model);
        } else {
            return 0;
        }
        
    }
    public static function Completed()
    {
        $model = ApplicationUin::findAll(['status' =>7]);
        if (count($model) > 0) {
            return count($model);
        } else {
            return 0;
        }
        
    }
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['app_ref_number', 'app_dt', 'customer_id', 'status'], 'required'],
            [['app_dt', 'invoice_maker_time', 'maker_time', 'maker_time1', 'checker_time', 'confirm_date'], 'safe'],
            [['customer_id', 'branch_id', 'agent_id', 'status', 'invoice_status', 'realocation', 'send_tra'], 'integer'],
            [['attachments_comments', 'tra_comment', 'signature'], 'string'],
            [['app_ref_number', 'technician_approval', 'accountant_approval', 'invoice', 'receipt_number', 'invoice_maker', 'user_identification_no', 'maker_id', 'maker_id1', 'check_id', 'assigned_to', 'payment_confirm', 'fiscal_code'], 'string', 'max' => 200],
            [['auth_status'], 'string', 'max' => 1],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'app_ref_number' => 'App Ref Number',
            'app_dt' => 'App Dt',
            'customer_id' => 'Company Name',
            'branch_id' => 'Branch ID',
            'agent_id' => 'Agent ID',
            'status' => 'Status',
            'technician_approval' => 'Technician Approval',
            'accountant_approval' => 'Accountant Approval',
            'invoice' => 'Invoice',
            'receipt_number' => 'Receipt Number',
            'invoice_status' => 'Invoice Status',
            'attachments_comments' => 'Attachments Comments',
            'invoice_maker' => 'Invoice Maker',
            'invoice_maker_time' => 'Invoice Maker Time',
            'user_identification_no' => 'User Identification No',
            'maker_id' => 'Maker ID',
            'maker_time' => 'Maker Time',
            'maker_id1' => 'Maker Id1',
            'maker_time1' => 'Maker Time1',
            'auth_status' => 'Auth Status',
            'check_id' => 'Check ID',
            'checker_time' => 'Checker Time',
            'assigned_to' => 'Assigned To',
            'payment_confirm' => 'Payment Confirm',
            'confirm_date' => 'Confirm Date',
            'realocation' => 'Realocation',
            'tra_comment' => 'Tra Comment',
            'send_tra' => 'Send Tra',
            'fiscal_code' => 'Fiscal Code',
            'signature' => 'Signature',
        ];
    }

    /**
     * Gets query for [[Customer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
    }

    public function getStatus0()
    {
        return $this->hasOne(Status::className(), ['name' => 'status']);
    }

    /**
     * Gets query for [[TblApplicationUins]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblApplicationUins()
    {
        return $this->hasMany(ApplicationUin::className(), ['app_id' => 'id']);
    }
}
