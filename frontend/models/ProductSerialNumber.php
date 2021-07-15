<?php

namespace frontend\models;

use frontend\models\Product;
use Yii;

/**
 * This is the model class for table "tbl_product_serial_number".
 *
 * @property int $id
 * @property int $product_id
 * @property string $serial_number
 * @property int $status
 * @property string|null $transfer_date
 * @property string|null $transfer_by
 * @property string|null $created_at
 * @property string|null $created_by
 * @property string|null $assigned_to
 * @property string|null $comment
 * @property int|null $supplier
 */
class ProductSerialNumber extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_product_serial_number';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'serial_number'], 'required'],
            [['product_id', 'status', 'supplier'], 'integer'],
            [['transfer_date', 'created_at'], 'safe'],
            [['comment'], 'string'],
            [['serial_number', 'transfer_by', 'created_by', 'assigned_to'], 'string', 'max' => 200],
            [['serial_number'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'serial_number' => 'Serial Number',
            'status' => 'Status',
            'transfer_date' => 'Transfer Date',
            'transfer_by' => 'Transfer By',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'assigned_to' => 'Assigned To',
            'comment' => 'Comment',
            'supplier' => 'Supplier',
        ];
    }

    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
