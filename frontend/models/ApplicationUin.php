<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_application_uin".
 *
 * @property int $id
 * @property int|null $app_id
 * @property string|null $product_serial_number
 * @property string|null $sim_card
 * @property string|null $sim_card_maker
 * @property string|null $user_identification_number
 * @property int|null $status
 * @property string|null $comment
 * @property string|null $fiscal_comment
 * @property string|null $z_report
 * @property string|null $uin_document
 * @property string|null $maker_id
 * @property string|null $maker_time
 * @property string|null $maker_id1
 * @property string|null $maker_time1
 * @property string|null $maker_id2
 * @property string|null $maker_time2
 * @property string|null $maker_id3
 * @property string|null $maker_time3
 * @property string|null $maker_id4
 * @property string|null $maker_time4
 * @property string|null $maker_id5
 * @property string|null $maker_time5
 * @property string|null $maker_id6
 * @property string|null $maker_time6
 * @property string|null $assigned_to
 * @property int|null $branch_id
 * @property string|null $uin_application_comment
 * @property string|null $delivery_note
 * @property string|null $delivered_by
 * @property string|null $received_by
 * @property string|null $left_seal
 * @property string|null $right_seal
 * @property string|null $bottom_seal
 * @property string|null $charger_seal
 * @property string|null $seal_maker
 * @property string|null $seal_time
 * @property string|null $training_by
 *
 * @property Application $app
 */
class ApplicationUin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_application_uin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['app_id', 'status', 'branch_id'], 'integer'],
            [['comment', 'fiscal_comment', 'uin_application_comment'], 'string'],
            [['maker_time', 'maker_time1', 'maker_time2', 'maker_time3', 'maker_time4', 'maker_time5', 'maker_time6', 'seal_time'], 'safe'],
            [['product_serial_number', 'sim_card_maker', 'user_identification_number', 'z_report', 'uin_document', 'maker_id', 'maker_id1', 'maker_id2', 'maker_id3', 'maker_id4', 'maker_id5', 'maker_id6', 'assigned_to', 'delivery_note', 'delivered_by', 'received_by', 'left_seal', 'right_seal', 'bottom_seal', 'charger_seal', 'seal_maker'], 'string', 'max' => 200],
            [['sim_card', 'training_by'], 'string', 'max' => 255],
            [['app_id'], 'exist', 'skipOnError' => true, 'targetClass' => Application::className(), 'targetAttribute' => ['app_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'app_id' => 'App ID',
            'product_serial_number' => 'Product Serial Number',
            'sim_card' => 'Sim Card',
            'sim_card_maker' => 'Sim Card Maker',
            'user_identification_number' => 'User Identification Number',
            'status' => 'Status',
            'comment' => 'Comment',
            'fiscal_comment' => 'Fiscal Comment',
            'z_report' => 'Z Report',
            'uin_document' => 'Uin Document',
            'maker_id' => 'Maker ID',
            'maker_time' => 'Maker Time',
            'maker_id1' => 'Maker Id1',
            'maker_time1' => 'Maker Time1',
            'maker_id2' => 'Maker Id2',
            'maker_time2' => 'Maker Time2',
            'maker_id3' => 'Maker Id3',
            'maker_time3' => 'Maker Time3',
            'maker_id4' => 'Maker Id4',
            'maker_time4' => 'Maker Time4',
            'maker_id5' => 'Maker Id5',
            'maker_time5' => 'Maker Time5',
            'maker_id6' => 'Maker Id6',
            'maker_time6' => 'Maker Time6',
            'assigned_to' => 'Assigned To',
            'branch_id' => 'Branch ID',
            'uin_application_comment' => 'Uin Application Comment',
            'delivery_note' => 'Delivery Note',
            'delivered_by' => 'Delivered By',
            'received_by' => 'Received By',
            'left_seal' => 'Left Seal',
            'right_seal' => 'Right Seal',
            'bottom_seal' => 'Bottom Seal',
            'charger_seal' => 'Charger Seal',
            'seal_maker' => 'Seal Maker',
            'seal_time' => 'Seal Time',
            'training_by' => 'Training By',
        ];
    }

    /**
     * Gets query for [[App]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApp()
    {
        return $this->hasOne(Application::className(), ['id' => 'app_id']);
    }
}
