<?php

namespace app\controllers;

use app\models\OrdenEmpleado;
use app\models\ViewOrdenes;
use conquer\select2\Select2Action;
use Yii;
use app\models\OrdenTrabajo;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * OrdenController implements the CRUD actions for OrdenTrabajo model.
 */
class OrdenController extends Controller
{
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


    public function actions()
    {
        return [
            'sols'=>[
                'class'=>Select2Action::className(),
                'dataCallback'=>[$this,'solCallback']
            ],
            'acts'=>[
                'class'=>Select2Action::className(),
                'dataCallback'=>[$this,'actCallback']
            ],
            'equipo'=>[
                'class'=>Select2Action::className(),
                'dataCallback'=>[$this,'equipoCallback']
            ]
        ];
    }

    /**
     * Lists all OrdenTrabajo models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionListAll(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $data = array("data"=>
            ViewOrdenes::find()
                ->asArray()
                ->all()
        );
        echo json_encode($data,JSON_NUMERIC_CHECK);
    }

    /**
     * Displays a single OrdenTrabajo model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $tools = new ActiveDataProvider([
            'query' => $model->getOrdenHerramientas(),
        ]);
        $automotor = new ActiveDataProvider([
            'query' => $model->getOrdenAutomotors(),
        ]);

        $personal = new ActiveDataProvider([
            'query' => $model->getOrdenEmpleados()
        ]);



        return $this->render('view', [
            'model' => $model,
            'tools' => $tools,
            'automotor' =>$automotor,
            'personal' =>$personal
        ]);
    }

    /**
     * Creates a new OrdenTrabajo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new OrdenTrabajo();
        $model->tipo = 'E';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_orden_trabajo]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing OrdenTrabajo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_orden_trabajo]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing OrdenTrabajo model.
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
     * Finds the OrdenTrabajo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return OrdenTrabajo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = OrdenTrabajo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function solCallback($q)
    {
        $query = new ActiveQuery(Solicitud::className());
        return [
            'results' =>  $query->select([
                'id_solicitud as id',
                'observacion as text',
            ])
                ->filterWhere(['like', 'observacion', $q])
                ->asArray()
                ->limit(20)
                ->all(),
        ];
    }

    public function actCallback($q){
        $query = new ActiveQuery(Actividad::className());
        return [
            'results' =>  $query->select([
                'id_actividad as id',
                'actividad as text',
            ])
                ->filterWhere(['like', 'actividad', $q])
                ->asArray()
                ->limit(20)
                ->all(),
        ];
    }

    public function equipoCallback($q){
        $query = new ActiveQuery(Equipo::className());
        return [
            'results' =>  $query->select([
                'id_equipo as id',
                'descripcion as text',
            ])
                ->filterWhere(['like', 'descripcion', $q])
                ->asArray()
                ->limit(20)
                ->all(),
        ];
    }

    public function actionActividad(){
        $params = \Yii::$app->request->post();
        $actividad   = $params['actividad'];
        $orden       = $params['orden'];
        $model = $this->findModel($orden);
        $model->actividad = $actividad;
        echo   $model->save();
    }


    public function actionEjecutar(){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $orden = \Yii::$app->request->post('orden');
        $model = $this->findModel($orden);
        $model->id_estado = 6;
        return ['success'=>$model->update()];
    }

}
