<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_category".
 *
 * @property int $id
 * @property int|null $parent
 * @property string|null $title
 * @property string|null $description
 * @property string $maker_id
 * @property string $maker_time
 *
 * @property Product[] $tblProducts
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent'], 'integer'],
            [['maker_id', 'maker_time'], 'required'],
            [['maker_time'], 'safe'],
            [['title', 'description', 'maker_id'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent' => 'Parent',
            'title' => 'Title',
            'description' => 'Description',
            'maker_id' => 'Maker ID',
            'maker_time' => 'Maker Time',
        ];
    }

    /**
     * Gets query for [[TblProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblProducts()
    {
        return $this->hasMany(Product::className(), ['category' => 'id']);
    }
}
