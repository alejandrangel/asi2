<?php

namespace app\controllers;

use Yii;
use app\models\Rol;
use app\models\RolSearch;
use yii\db\IntegrityException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Accesos;
/**
 * RolController implements the CRUD actions for Rol model.
 */
class RolController extends Controller
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
     * Lists all Rol models.
     * @return mixed
     */
    public function actionIndex()
    {
		
		if (!\Yii::$app->user->isGuest) 
		{			
			if (Accesos::HasAccess(Yii::$app->user->identity->id,"/rol"))
			{
								  $searchModel = new RolSearch();
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
     * Displays a single Rol model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		
		if (!\Yii::$app->user->isGuest) 
		{			
			if (Accesos::HasAccess(Yii::$app->user->identity->id,"/rol"))
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
     * Creates a new Rol model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		
		if (!\Yii::$app->user->isGuest) 
		{			
			if (Accesos::HasAccess(Yii::$app->user->identity->id,"/rol"))
			{
				       $model = new Rol();

						if ($model->load(Yii::$app->request->post()) && $model->save()) {
							return $this->redirect(['view', 'id' => $model->id_rol]);
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
     * Updates an existing Rol model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		
		if (!\Yii::$app->user->isGuest) 
		{			
			if (Accesos::HasAccess(Yii::$app->user->identity->id,"/rol"))
			{
				     $model = $this->findModel($id);

					if ($model->load(Yii::$app->request->post()) && $model->save()) {
						return $this->redirect(['view', 'id' => $model->id_rol]);
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
     * Deletes an existing Rol model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
		
		if (!\Yii::$app->user->isGuest) 
		{			
			if (Accesos::HasAccess(Yii::$app->user->identity->id,"/rol"))
			{
				        try {
							$this->findModel($id)->delete();
						}catch (IntegrityException $e){
							Yii::$app->session->setFlash('error','El registro esta siendo usado');
						}
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
     * Finds the Rol model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Rol the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Rol::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
