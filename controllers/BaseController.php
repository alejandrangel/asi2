<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17/8/16
 * Time: 10:00 PM
 */

namespace app\controllers;


use yii\web\Controller;
use yii\filters\AccessControl;
use util\Acf;


abstract class BaseController extends Controller
{

	public $rules;
	public $action;
	public $filters = array();
	 
    /**
     * @return array
     * this functiones define, rules to check for access
     */
    public function behaviors() 
    {
    	$this->rules  = $this->defineRules();
    	$access = [
    			'class'=>AccessControl::className(),
    			'only'=>['index'],
    			'rules'=>[
    					[
    							'actions'=>['index'],
    							'allow'=>true,
    							'roles' => ['@'],
    					],
    			],
    	];
    	if(!is_null($this->rules)){
    		//unset($access);
    		//--->> redefine
    		$access['class'] = AccessControl::className();
    		$access['only'] = null;
    		foreach ($this->rules  as $rul => $accessTo){
    			$access['only'][] = $rul;
    			$access['rules'][] =[
    					'actions' =>[$rul],
    					'allow'  =>true,
    					'roles'  =>['@'],
    					'denyCallback' => $this->checkRules($rul, $this->action)
    			];
    		}
    	}
	    	
    	$this->filters['access'] = $access;
         return $this->filters; 
		
     }
    /*
     * This function define custom rules on own controllers
     * if you dont define has defult rules defined
     * */
     abstract function defineRules();
     function checkRules($rule,$action){
     		  $roles = @$this->rules[$action->id];
     		  $roles = (is_null($roles)?array():$roles);
     		  foreach ($roles as $role){
	     		  	if(!Acf::hasRol($role)){
	     		  		throw new \yii\web\ForbiddenHttpException('No tienes permisos');
	     		  	}
     		  }
     }
}