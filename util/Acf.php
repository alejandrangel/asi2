<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17/8/16
 * Time: 11:01 PM
 */

namespace util;

use yii;

class Acf
{
	
	const ADMIN = 'ADMINISTRADOR';
	const OPER  = 'OPERADOR';
	const SUPER = 'SUPERVISOR';
	
    public static function hasRol($rol){
    	$user  = yii::$app->user->identity;

    	if($user!=null){
    		$array = $user->getRoles();
    		
    		foreach ($array as $row){
    			if ($row['rol'] === $rol){
    				return true;
    			}
    		}	
    	}
        return false;
    }

    public static function getRols(){
        $user = yii::$app->user->identity;
        return (is_null($user->getRoles())?array():$user->getRoles());
    }


}