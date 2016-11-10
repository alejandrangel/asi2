<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 29/10/16
 * Time: 8:19 PM
 */

namespace app\controllers;


use app\models\Entrega;
use yii\web\Controller;

class EntregaController extends Controller
{


    public function actionListAll(){

        $params = \Yii::$app->request->get();
        if(\Yii::$app->request->isPost){
            $params = \Yii::$app->request->post();
        }
        $orden  = @$params['orden'];

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $data = array("data"=>
                Entrega::find()->where(['id_orden_trabajo'=>$orden])->asArray()->all()
        );
        echo json_encode($data,JSON_NUMERIC_CHECK);

    }


    public function actionCreate(){

        $model = new Entrega();

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_entrega]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }

    }



    public function actionDelete(){
        try{
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $entrega = \Yii::$app->request->post('entrega');
            $model = $this->findModel($entrega);
            return ['success' => $model->delete()];
        }catch(\Exception $e){
            return ['success' => 0];
        }
    }

    public function findModel($id){
        $model = Entrega::findOne(['id_entrega'=>$id]);
        if($model !==null){
            return $model;
        }else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }



}