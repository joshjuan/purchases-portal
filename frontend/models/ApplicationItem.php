<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_application_item".
 *
 * @property int $id
 * @property int|null $product_id
 * @property int|null $qty
 * @property float|null $price
 * @property float|null $total
 * @property float|null $tax_amount
 * @property int|null $app_id
 * @property int|null $app_status
 * @property string|null $maker_id
 * @property string|null $maker_time
 * @property float|null $discount_amount
 * @property string|null $discount_maker
 * @property string|null $product_changer
 * @property string|null $changed_date
 *
 * @property Product $product
 */
class ApplicationItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_application_item';
    }

    public static function getAllTotal($id)
    {
        $model = ApplicationItem::find()
        ->where(['app_id' =>$id])
        ->sum('total');
        if ($model > 0) {
            return $model;
        } else {
            return '0.00';
        }
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id'], 'required'],
            [['product_id', 'qty', 'app_id', 'app_status'], 'integer'],
            [['price', 'total', 'tax_amount', 'discount_amount'], 'number'],
            [['maker_time', 'changed_date'], 'safe'],
            [['maker_id', 'discount_maker', 'product_changer'], 'string', 'max' => 200],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product Name',
            'qty' => 'Qty',
            'price' => 'Price',
            'total' => 'Total',
            'tax_amount' => 'Tax Amount',
            'app_id' => 'App ID',
            'app_status' => 'App Status',
            'maker_id' => 'Maker ID',
            'maker_time' => 'Maker Time',
            'discount_amount' => 'Discount Amount',
            'discount_maker' => 'Discount Maker',
            'product_changer' => 'Product Changer',
            'changed_date' => 'Changed Date',
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
