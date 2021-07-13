<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "attachments".
 *
 * @property int $id
 * @property int|null $customer_id
 * @property int|null $branch_id
 * @property string|null $business_licence
 * @property string|null $identification
 * @property string|null $tax_identification
 * @property string|null $uin
 * @property string|null $representative_id
 * @property string|null $app_letter
 * @property string|null $created_by
 * @property string|null $created_at
 */
class Attachments extends \yii\db\ActiveRecord
{

    public  $business;
    public  $identity;
    public  $tax_form;
    public  $uin_form;
    public  $representative;
    public  $letter;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'attachments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['business','identity','tax_form','uin_form','letter'], 'file'],
            [['identity','tax_form','uin_form'], 'file', 'extensions' => 'pdf,jpg, jpeg, png', 'skipOnEmpty' => false,
                'checkExtensionByMimeType' => false],

            [['customer_id', 'branch_id'], 'integer'],
            [['created_at'], 'safe'],
            [['business_licence', 'identification', 'tax_identification', 'uin', 'representative_id', 'app_letter', 'created_by'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'branch_id' => 'Branch ID',
            'business_licence' => 'Business Licence',
            'identification' => 'Identification',
            'tax_identification' => 'Tax Identification',
            'business' => 'Business License',
            'identity' => 'Identification(Driving License/NIDA/Voter ID)',
            'uin' => 'Uin',
            'tax_form' => 'TIN certificate',
            'representative_id' => 'Representative ID',
            'app_letter' => 'App Letter',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
        ];
    }
}
