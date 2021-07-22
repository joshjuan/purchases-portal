<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "tbl_product".
 *
 * @property int $id
 * @property string $product_name
 * @property int $category
 * @property int $type_id
 * @property float $price
 * @property int|null $tax_percent
 * @property int $status
 * @property string|null $image
 * @property string $maker_id
 * @property string $maker_time
 *
 * @property TblApplicationItem[] $tblApplicationItems
 * @property TblCategory $category0
 */
class Product extends \yii\db\ActiveRecord
{
    const UNAVAILABLE = 1;
    const AVAILABLE = 0;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_product';
    }

    public static function getAllItems()
    {
        $items = Product::find()
            ->where(['status' => 0])
            ->andWhere(['type_id' => 1])
            ->All();
        if ($items != null) {
            return $items;
        } else {
            return null;
        }
    }

    public static function getAllPackages()
    {
        $items = Product::find()
            ->where(['status' => 0])
            ->andWhere(['category' => 6])
            ->All();
        if ($items != null) {
            return $items;
        } else {
            return null;
        }
    }


    public static function getPosPackages()
    {
        $items = Product::find()
            ->where(['status' => 0])
            ->andWhere(['category' => 7])
            ->All();
        if ($items != null) {
            return $items;
        } else {
            return null;
        }
    }


    public static function getPackagesById($id)
    {
        $items = Product::find()
            ->where(['status' => 0])
            ->andWhere(['category' => 7])
            ->All();
        if ($items != null) {
            return $items;
        } else {
            return null;
        }
    }

    public static function getAll()
    {
        return ArrayHelper::map(Product::find()
            ->where(['status'=>Product::AVAILABLE])
            ->andWhere(['type_id'=>1])
            ->all(),'id',function ($model){
            return $model->product_name.' ( Price '.number_format($model->price, 2, '.', ',').')';
        });

    }

    public static function getMobilePackageAll()
    {
        return ArrayHelper::map(Product::find()
            ->where(['status'=>Product::AVAILABLE])
            ->andWhere(['category'=>6])
            ->all(),'id',function ($model){
            return $model->product_name.' ( Price '.number_format($model->price, 2, '.', ',').')';
        });

    }

    public static function getPrice($id){

        $product=Product::findOne($id);
        return $product->price;
    }

    public static function getTax($id){

        $product=Product::findOne($id);
        return $product->tax_percent;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_name', 'category', 'type_id', 'price', 'status', 'maker_id', 'maker_time'], 'required'],
            [['category', 'type_id', 'tax_percent', 'status'], 'integer'],
            [['price'], 'number'],
            [['maker_time'], 'safe'],
            [['product_name', 'maker_id'], 'string', 'max' => 200],
            [['image'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Product Name',
            'product_name' => 'Product Name',
            'category' => 'Category',
            'type_id' => 'Type ID',
            'price' => 'Price',
            'tax_percent' => 'Tax Percent',
            'status' => 'Status',
            'image' => 'Image',
            'maker_id' => 'Maker ID',
            'maker_time' => 'Maker Time',
        ];
    }

    /**
     * Gets query for [[TblApplicationItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblApplicationItems()
    {
        return $this->hasMany(ApplicationItem::className(), ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Category0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory0()
    {
        return $this->hasOne(Category::className(), ['id' => 'category']);
    }
}
