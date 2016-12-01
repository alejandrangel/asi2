<?php

namespace util;

use yii;
use app\models\LogUser;

class Log{
	
	
	const LOGIN  = 'Entro al sistema';
	const LOGOUT = 'Salio del sistema';

	const AC_MODULE_CARGO  = 'Ingreso a Mantenimiento de cargos';
	
	
	public static function log($accion = null){
	    try{
            $userId = Yii::$app->user->id;
            $log = new LogUser();
            $log->usuario = $userId;
            $log->accion  = $accion;
            $log->save();
        }catch (yii\db\Exception $e){

        }
	}
}
