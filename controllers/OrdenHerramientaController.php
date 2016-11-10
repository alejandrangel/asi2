<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 29/10/16
 * Time: 7:44 PM
 */

namespace app\controllers;



use app\models\OrdenHerramienta;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class OrdenHerramientaController extends Controller
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
            'herramienta.id_herramienta',
            'herramienta.descripcion'
        ])->from('orden_herramienta')
            ->innerJoin('herramienta','orden_herramienta.id_herramienta = herramienta.id_herramienta')
            ->where(['orden_herramienta.id_orden'=>$orden]);
        $data = array("data"=>
            $query->all()
        );

        echo json_encode($data,JSON_NUMERIC_CHECK);


    }

    public function actionCreate(){
        try{
            \Yii::$app->response->format = Response::FORMAT_JSON;
             $orden = \Yii::$app->request->post('orden');
             $heram = \Yii::$app->request->post('herramienta');
             $model = new OrdenHerramienta();
             $model->id_orden = $orden;
             $model->id_herramienta =$heram;
             return ['success' => $model->save()];
        }catch(\Exception $e){
          return ['success' => 0];
        }
    }

    public function actionDelete(){
        try{
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $orden = \Yii::$app->request->post('orden');
            $heram = \Yii::$app->request->post('herrameinta');

            $model = $this->findModel($orden,$heram);

            return ['success' => $model->delete()];
        }catch(\Exception $e){
            return ['success' => 0];
        }
    }

    public function findModel($orden, $herramienta){
            $model = OrdenHerramienta::findOne(['id_orden'=>$orden,'id_herramienta'=>$herramienta]);
            if($model !==null){
                return $model;
            }else{
                throw new NotFoundHttpException('The requested page does not exist.');
            }
    }
}