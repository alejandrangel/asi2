<?php

namespace util;

use yii\web\Session as S;

class Session{
	private static $session;
	
	protected function __contruct(){
		
	}
	
	public static function getInstance(){
		if (null === static::$session) {
			
            static::$session = new S;
            static::$session->open();
        }
        
        return static::$session;
	}	
	
	public static function set($key,$value){
		static::getInstance()->set($key,$value);
	}
	public static function get($key){
		static::getInstance()->get($key);
	}
}