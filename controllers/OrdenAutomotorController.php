<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 29/10/16
 * Time: 4:55 PM
 */

namespace app\controllers;


use app\models\Automotor;
use app\models\OrdenAutomotor;
use conquer\select2\Select2Action;
use yii\bootstrap\ActiveForm;
use yii\db\ActiveQuery;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class OrdenAutomotorController extends Controller
{
    public function actionIndex(){

    }
    public function actionListAll(){
        $params = \Yii::$app->request->get();
        if(\Yii::$app->request->isPost){
            $params = \Yii::$app->request->post();
        }
        $orden  = @$params['orden'];

        \Yii::$app->response->format = Response::FORMAT_JSON;



        $query = new Query;
        $query->select([
            'automotor.id_automotor',
            'automotor.placa',
            'orden_automotor.km_inicial',
            'orden_automotor.km_final',
            'orden_automotor.codigo_vale',
            'orden_automotor.monto',
        ])->from('orden_automotor')
          ->innerJoin('automotor','orden_automotor.id_automotor = automotor.id_automotor')
          ->where(['orden_automotor.id_orden'=>$orden]);

        //var_dump($query->all());
        $data = array("data"=>
            $query->all()
        );

       echo json_encode($data,JSON_NUMERIC_CHECK);

    }


    public function actionCreate(){
            $model = new OrdenAutomotor();
            $model->load(\Yii::$app->request->post());
            try{
                \Yii::$app->response->format = Response::FORMAT_JSON;
                return ['success' => $model->save()];
            }catch(\Exception $e){
                return ActiveForm::validate($model);
                \Yii::$app->session->addFlash('error','No se puede almacenar');
            }
    }


    public function actions()
    {
        return [
            'automotorList'=>[
                'class'=>Select2Action::className(),
                'dataCallback'=>[$this,'automotorCallback']
            ]
        ];
    }


    public function automotorCallback($q){
        $query = new ActiveQuery(Automotor::className());
        return [
            'results' =>  $query->select([
                'id_automotor as id',
                'placa as text',
            ])
                ->filterWhere(['like', 'placa', $q])
                ->asArray()
                ->limit(10)
                ->all(),
        ];
    }

    public function actionValidateForm() {
        \Yii::$app->response->format = Response::FORMAT_JSON;

        $model = new OrdenAutomotor();
        $model->load(\Yii::$app->request->post());
        return ActiveForm::validate($model);
    }

    public function actionDelete(){
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $orden  = \Yii::$app->request->post('orden');
        $autom  = \Yii::$app->request->post('automotor');
        $model  =  $this->findModel($orden,$autom);
        return ['success' => $model->delete()];
    }


    protected function findModel($orden,$automotor)
    {
        $model = OrdenAutomotor::findOne(['id_orden'=>$orden,'id_automotor'=>$automotor]);
        if ($model !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionLoadForm(){
        $orden  = \Yii::$app->request->post('orden');
        $autom  = \Yii::$app->request->post('automotor');
        $model = $this->findModel($orden,$autom);
        $model->edit = 0;
        return $this->renderAjax('_form', [
            'model' =>  $model,
            'name' => 'OrdenAutomotor_edit_dlg',
            'action'=> '@web/orden-automotor/update'
        ]);
    }

    public function actionUpdate(){
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $model = new OrdenAutomotor();
        $model->load(\Yii::$app->request->post());
        $orden = $model->id_orden;
        $autom = $model->id_automotor;
        $model = $this->findModel($orden,$autom);
        $model->load(\Yii::$app->request->post());
        return ['success' => $model->update()];
    }
}