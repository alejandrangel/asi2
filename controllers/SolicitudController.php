<?php

namespace app\controllers;


use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\Solicitud;
use app\models\SolicitudSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SolicitudController implements the CRUD actions for Solicitud model.
 */
class SolicitudController extends Controller
{

    /**
     * @inheritdoc
     */
/*    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }*/

public function behaviors() {
    return ArrayHelper::merge(parent::behaviors(), [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['post'],
                    ],
                ],
    ]);
}

    /**
     * Lists all Solicitud models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new SolicitudSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);        

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Solicitud model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', ['model' => $this->findModel($id),

            ]);
    }

    /**
     * Creates a new Solicitud model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Solicitud();
        $model->id_estado = 1;
        $model->id_fuente = 1;
        $model->id_ruta = 1;
        $model->id_usuario = Yii::$app->user->id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_solicitud]);
        } else {
            return $model->getErrors();
        }
    }

    /**
     * Updates an existing Solicitud model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_solicitud]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionAprobar(){

        //var_dump($_POST);
        //Yii::$app->end();

        //solo si es un nuevo registro
        //$model = new Solicitud();

        if(isset($_POST['Solicitud']))
        {
            //para no uno por uno, recorre un array
            //$model->load(Yii::$app->request->post());

            $id=$_POST['Solicitud']['id_solicitud'];
            $coment= $_POST['Solicitud']['comentario'];

            $model = $this->findModel($id);
            $model->id_estado = '2';
            $model->comentario=$coment;
            $model->save();
        }else{
            return $model->getErrors();
        }


        return $this->render('view', ['model' => $this->findModel($id)]);

    }

    public function actionRechazar(){

        //var_dump($_POST);
        //Yii::$app->end();

        //solo si es un nuevo registro
        //$model = new Solicitud();

        if(isset($_POST['Solicitud']))
        {
            //para no uno por uno, recorre un array
            //$model->load(Yii::$app->request->post());

            $id=$_POST['Solicitud']['id_solicitud'];
            $coment= $_POST['Solicitud']['comentario'];

            $model = $this->findModel($id);
            $model->id_estado = '3';
            $model->comentario=$coment;
            $model->save();
        }else{
            return $model->getErrors();
        }


        return $this->render('view', ['model' => $this->findModel($id)]);

    }

    /**
     * Deletes an existing Solicitud model.
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
     * Finds the Solicitud model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Solicitud the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Solicitud::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

  
}



