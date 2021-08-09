<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_customer".
 *
 * @property int $id
 * @property string|null $name
 * @property int $tin_number
 * @property string|null $phone_number
 * @property string|null $phone_number2
 * @property string|null $vrn
 * @property string $street
 * @property string|null $plot_no
 * @property string|null $house_no
 * @property string|null $applicant_title
 * @property string|null $business_type
 * @property int|null $branch_id
 * @property string|null $address
 * @property string $tax_regional
 * @property string|null $email
 * @property string|null $maker_id
 * @property string|null $maker_time
 * @property int $status
 * @property int|null $customer_type
 * @property int|null $in_contract
 * @property string|null $representative_name
 *
 * @property ServicePassword[] $servicePasswords
 * @property Application[] $tblApplications
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_customer';
    }

    public static function getData($data)
    {

        $applications = Customer::find()
            ->andWhere(['id'=>$data])
            ->count();
        if ($applications > 0) {
            return $applications;
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
            [['tin_number', 'street','name','phone_number','tax_regional','business_type','applicant_title','address'], 'required'],
         //   [['tin_number', 'street','name'], 'required'],
            [['tin_number'], 'unique'],
            [['tin_number', 'branch_id', 'status', 'customer_type', 'in_contract'], 'integer'],
            [['email'], 'string'],
            ['email', 'email'],
            [['tin_number'], 'string', 'min' => 9,'max'=>9],
            [['maker_time'], 'safe'],
            [['name', 'phone_number', 'phone_number2', 'vrn', 'street', 'plot_no', 'house_no', 'applicant_title', 'business_type', 'address', 'tax_regional', 'maker_id', 'representative_name'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Company Name',
            'tin_number' => 'Tin Number',
            'phone_number' => 'Phone Number',
            'phone_number2' => 'Phone Number2',
            'vrn' => 'Vrn',
            'street' => 'Street',
            'plot_no' => 'Plot No',
            'house_no' => 'House No',
            'applicant_title' => 'Applicant Title',
            'business_type' => 'Business Type',
            'branch_id' => 'Branch ID',
            'address' => 'Address',
            'tax_regional' => 'Tax Regional',
            'email' => 'Email',
            'maker_id' => 'Maker ID',
            'maker_time' => 'Maker Time',
            'status' => 'Status',
            'customer_type' => 'Customer Type',
            'in_contract' => 'In Contract',
            'representative_name' => 'Representative Name',
        ];
    }

    /**
     * Gets query for [[ServicePasswords]].
     *
     * @return \yii\db\ActiveQuery
     */


    /**
     * Gets query for [[TblApplications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblApplications()
    {
        return $this->hasMany(Application::className(), ['customer_id' => 'id']);
    }
}
