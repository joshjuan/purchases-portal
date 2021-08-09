<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "packages_items".
 *
 * @property int $id
 * @property int $product_id
 * @property string $name
 * @property int $status
 */
class PackagesItems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'packages_items';
    }

    public static function getAll($id)
    {
        $product=PackagesItems::findAll(['product_id'=>$id,'status'=>1]);
        return $product;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'name'], 'required'],
            [['product_id', 'status'], 'integer'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'product_id' => Yii::t('yii', 'Product ID'),
            'name' => Yii::t('yii', 'Name'),
            'status' => Yii::t('yii', 'Status'),
        ];
    }
}
