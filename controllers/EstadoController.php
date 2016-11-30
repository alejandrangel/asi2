<?php

namespace app\controllers;

use Yii;
use app\models\Estado;
use app\models\EstadoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Accesos;

/**
 * EstadoController implements the CRUD actions for Estado model.
 */
class EstadoController extends Controller
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
     * Lists all Estado models.
     * @return mixed
     */
    public function actionIndex()
    {
		
		if (!\Yii::$app->user->isGuest) 
		{			
			if (Accesos::HasAccess(Yii::$app->user->identity->id,"/estado"))
			{
				         $searchModel = new EstadoSearch();
						$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

						return $this->render('index', [
							'searchModel' => $searchModel,
							'dataProvider' => $dataProvider,
						]);       
			}else
			{
			return $this->redirect(["site/main"]);				
			}
		}else
		{
			return $this->redirect(["site/login"]);				
		}
    
    }

    /**
     * Displays a single Estado model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		
		if (!\Yii::$app->user->isGuest) 
		{			
			if (Accesos::HasAccess(Yii::$app->user->identity->id,"/estado"))
			{
				   return $this->render('view', [
					'model' => $this->findModel($id),
					]);
									
			}else
			{
			return $this->redirect(["site/main"]);				
			}
		}else
		{
			return $this->redirect(["site/login"]);				
		}
     
    }

    /**
     * Creates a new Estado model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		if (!\Yii::$app->user->isGuest) 
		{			
			if (Accesos::HasAccess(Yii::$app->user->identity->id,"/estado"))
			{
				   $model = new Estado();

					if ($model->load(Yii::$app->request->post()) && $model->save()) {
						return $this->redirect(['view', 'id' => $model->id_estado]);
					} else {
						return $this->render('create', [
							'model' => $model,
						]);
					}				            
			}else
			{
			return $this->redirect(["site/main"]);				
			}
		}else
		{
			return $this->redirect(["site/login"]);				
		}		
     
    }

    /**
     * Updates an existing Estado model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		
		if (!\Yii::$app->user->isGuest) 
		{			
			if (Accesos::HasAccess(Yii::$app->user->identity->id,"/estado"))
			{
					$model = $this->findModel($id);
					if ($model->load(Yii::$app->request->post()) && $model->save()) {
						return $this->redirect(['view', 'id' => $model->id_estado]);
					} else {
						return $this->render('update', [
							'model' => $model,
						]);
					}
			}else
			{
			return $this->redirect(["site/main"]);				
			}
		}else
		{
			return $this->redirect(["site/login"]);				
		} 		
        
    }

    /**
     * Deletes an existing Estado model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
		if (!\Yii::$app->user->isGuest) 
		{			
			if (Accesos::HasAccess(Yii::$app->user->identity->id,"/estado"))
			{
				     $this->findModel($id)->delete();

					return $this->redirect(['index']);          
			}else
			{
			return $this->redirect(["site/main"]);				
			}
		}else
		{
			return $this->redirect(["site/login"]);				
		} 
		
     
    }

    /**
     * Finds the Estado model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Estado the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Estado::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
