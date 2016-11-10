<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 27/10/16
 * Time: 9:18 PM
 */

namespace app\models;


use yii\db\ActiveRecord;

class ViewOrdenes extends ActiveRecord
{

    public static function primaryKey()
    {
        return 'id';
    }
}