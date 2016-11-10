<?php

namespace app\controllers;

use Yii;
use app\models\Personal;
use app\models\PersonalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PersonalController implements the CRUD actions for Personal model.
 */
class PersonalController extends Controller
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
     * Lists all Personal models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PersonalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Personal model.
     * @param integer $id_equipo
     * @param integer $id_empleado
     * @return mixed
     */
    public function actionView($id_equipo, $id_empleado)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_equipo, $id_empleado),
        ]);
    }

    /**
     * Creates a new Personal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Personal();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_equipo' => $model->id_equipo, 'id_empleado' => $model->id_empleado]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Personal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_equipo
     * @param integer $id_empleado
     * @return mixed
     */
    public function actionUpdate($id_equipo, $id_empleado)
    {
        $model = $this->findModel($id_equipo, $id_empleado);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_equipo' => $model->id_equipo, 'id_empleado' => $model->id_empleado]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Personal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_equipo
     * @param integer $id_empleado
     * @return mixed
     */
    public function actionDelete($id_equipo, $id_empleado)
    {
        $this->findModel($id_equipo, $id_empleado)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Personal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_equipo
     * @param integer $id_empleado
     * @return Personal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_equipo, $id_empleado)
    {
        if (($model = Personal::findOne(['id_equipo' => $id_equipo, 'id_empleado' => $id_empleado])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
