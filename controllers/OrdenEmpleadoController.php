<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 20/10/16
 * Time: 10:55 PM
 */

namespace app\controllers;


use app\models\OrdenEmpleado;
use yii\console\Response;
use yii\web\Controller;

class OrdenEmpleadoController extends Controller
{

    public function actionLoadTeam(){

        $params = \Yii::$app->request->post();
        $team   = $params['team'];
        $orden  = $params['orden'];
        $result = \Yii::$app->db->createCommand("CALL loadTeam (:team,:orden)")
            ->bindValue(':team' , $team)
            ->bindValue(':orden', $orden)
            ->execute();
        echo $result;
    }



    public function actionDelete(){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        try{
            $orden = \Yii::$app->request->post('orden');
            $empleado = \Yii::$app->request->post('empleado');

            $model = $this->findModel($orden,$empleado);

            return ['success' => $model->delete()];
        }catch(\Exception $e){
            return ['success' => 0];
        }
    }

    public function findModel($orden, $empleado){
        $model = OrdenEmpleado::findOne(['id_orden'=>$orden,'id_empleado'=>$empleado]);
        if($model !==null){
            return $model;
        }else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionCreate(){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        try{
            $empleado = \Yii::$app->request->post('empleado');
            $orden = \Yii::$app->request->post('orden');
            $model = new OrdenEmpleado();
            $model->id_orden= $orden;
            $model->id_empleado= $empleado;
            return ['success' => $model->save()];
        }catch(\Exception $e){
            return ['success' => 0];
        }
    }

}