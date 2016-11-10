<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 29/10/16
 * Time: 8:07 PM
 */

namespace app\controllers;


use yii\db\Query;
use yii\web\Controller;

class OrdenPersonalController extends Controller
{
    public function actionListAll(){

        $params = \Yii::$app->request->get();
        if(\Yii::$app->request->isPost){
            $params = \Yii::$app->request->post();
        }
        $orden  = @$params['orden'];

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $query = new Query;
        $query->select([
            'empleado.nombres',
            'empleado.apellidos',
            'empleado.id_empleado'
        ])->from('orden_empleado')
            ->innerJoin('empleado','orden_empleado.id_empleado = empleado.id_empleado')
            ->where(['orden_empleado.id_orden'=>$orden]);
        $data = array("data"=>
            $query->all()
        );

        echo json_encode($data,JSON_NUMERIC_CHECK);


    }
}