<?php

/**
 * Created by PhpStorm.
 * User: alex
 * Date: 13/10/16
 * Time: 9:47 PM
 */

namespace util;

use yii\db\Query;

class Util
{
    static function dateFormat($date){

        if(empty($date)){
            return $date;
        }
        $time = strtotime($date);
        $date = date('Y-m-d',$time);
        return $date;
    }

    public static function countSolicitud(){
        $query = new Query;
        $query->select('*')
              ->from('solicitud');
             // ->where(['fecha' => 'curdate()']);
        $rows = $query->all();
        return count($rows);
    }
}