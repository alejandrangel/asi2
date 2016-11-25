<?php

namespace app\controllers;

use util\Util;
use Yii;
use app\models\ActividadPlanificada;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;

/**
 * ActividadPlanificadaController implements the CRUD actions for ActividadPlanificada model.
 */
class ActividadPlanificadaController extends Controller
{
    public  $model;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ActividadPlanificada models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ActividadPlanificada::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ActividadPlanificada model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ActividadPlanificada model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ActividadPlanificada();

        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = 'json';
            $this->before($model);
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && (!Yii::$app->request->isAjax)) {
            $this->before($model);
            if($model->save()){
                return $this->redirect(array('plan/view?id='.$model->id_plan."#w3-tab0"));
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ActividadPlanificada model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $this->before($model);
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id_actividad_planificacion]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ActividadPlanificada model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ActividadPlanificada model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ActividadPlanificada the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ActividadPlanificada::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    


    public function actionUpdateForm($id){
    	$model = $this->findModel($id);
    	return $this->renderAjax('_form', [
    			'model' => $model,
    			'action'=> '@web/actividad-planificada/update?id='.$id
    	]);
    }


    function before($model){
        $model->fecha_inicio = Util::dateFormat($model->fecha_inicio);
        $model->fecha_final = Util::dateFormat($model->fecha_final);
    }
    
    
}
