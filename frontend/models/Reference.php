<?php
/**
 * Created by PhpStorm.
 * User: adotech
 * Date: 5/16/18
 * Time: 3:29 PM
 */

namespace frontend\models;


class Reference
{

    public $reference;
    public $job_card;
    public $quot;

    public static function findLast()
    {

        $model = Application::find()->all();

        if ($model != null) {
            $reference = '17' . date('YmdH') . 'WEB' . sprintf("%06d", count($model) + 1);
            return $reference;
        } else {

            $reference = '17'. date('YmdH') . 'WEB' . '000001';
            return $reference;

        }

    }



}