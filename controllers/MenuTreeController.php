<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 19/9/16
 * Time: 11:05 PM
 */

namespace app\controllers;


use util\MenuMaker;
use yii;

class MenuTreeController extends BaseController
{

    public function actionIndex(){
        $this->renderJSON(MenuMaker::make(\Yii::$app->user->id));

    }

    function defineRules(){}

    protected function renderJSON($data)
    {
        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_JSON;
        $response->data = $data;
    }
}