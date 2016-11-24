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
    static $fecha_;
    static function dateFormat($date){

        if(empty($date)){
            return $date;
        }
        $formateador = \DateTime::createFromFormat('d/m/Y',$date);
        return $formateador->format('Y-m-d');
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