<?php

namespace app\controllers;

use Yii;
use app\models\Equipo;
use yii\data\ActiveDataProvider;
use yii\db\IntegrityException;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * EquipoController implements the CRUD actions for Equipo model.
 */
class EquipoController extends Controller
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

    /**
     * Lists all Equipo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Equipo::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Equipo model.
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
     * Creates a new Equipo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Equipo();
        $model->estado = 'A';
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_equipo]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Equipo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_equipo]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Equipo model.
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
     * Finds the Equipo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Equipo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Equipo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionList(){
            Yii::$app->response->format = Response::FORMAT_JSON;
            $data = array("data"=>
                Equipo::find()->where(['estado'=>'A'])->asArray()->all()
            );
        echo json_encode($data,JSON_NUMERIC_CHECK);
    }


    public function actionDeleteAjax(){
        try{
            Yii::$app->response->format = Response::FORMAT_JSON;
            $id = Yii::$app->request->post('id');
            $model = $this->findModel($id);
            echo json_encode(array('success'=>$model->delete()),JSON_NUMERIC_CHECK);
        }catch (IntegrityException $e){
            echo json_encode(
                array(
                    'success'=>'No',
                    'error'=>'No se puede eliminar el registro esta siendo usado'
            ),JSON_NUMERIC_CHECK);
        }
    }


    public function actionListEmpleadoEquipo(){

        Yii::$app->response->format = Response::FORMAT_JSON;
        $id = Yii::$app->request->post('equipo');

        $query = new Query;
        $data = $query->select(['equipo_automotor.id_equipo'])
              ->from('equipo_automotor')
              ->innerJoin('automotor', 'equipo_automotor.id_automor = automotor.id_automotor')
              ->innerJoin('modelo', 'modelo.id_modelo = automotor.modelo')
              ->innerJoin('marca', 'modelo.marca = marca.id_marca')
              ->innerJoin('color', 'color.id_color = automotor.color')
              ->where(['equipo_automotor.id_equipo'=>$id])
              ->all();
        echo json_encode($data,JSON_NUMERIC_CHECK);
    }


    public function actionListAutomotorEquipo(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $id = Yii::$app->request->post('equipo');
        $data = array("data"=>
            Equipo::find()->where(['id_equipo'=>$id])->asArray()->all()
        );
        echo json_encode($data,JSON_NUMERIC_CHECK);
    }


}
