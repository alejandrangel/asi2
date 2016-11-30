<?php

namespace app\controllers;

use conquer\select2\Select2Action;
use Yii;
use app\models\Colonia;
use app\models\ColoniaSearch;
use yii\db\ActiveQuery;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Empleado;
use app\models\Accesos;

/**
 * ColoniaController implements the CRUD actions for Colonia model.
 */
class ColoniaController extends Controller
{

    public function actions()
    {
        return [
            'coloniasList'=>[
                'class'=>Select2Action::className(),
                'dataCallback'=>[$this,'dataCallback']
            ]
        ];
    }

    public function dataCallback($q){
        $query = new ActiveQuery(Colonia::className());
        return [
            'results' =>  $query->select([
                'id_colonia as id',
                'nombre as text',
            ])
                ->filterWhere(['like', 'nombre', $q])
                ->asArray()
                ->limit(20)
                ->all(),
        ];
    }

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
     * Lists all Colonia models.
     * @return mixed
     */
    public function actionIndex()	
    {
			if (!\Yii::$app->user->isGuest) 
			{	
			
				if (Accesos::HasAccess(Yii::$app->user->identity->id,"/colonia"))
				{
					   $searchModel = new ColoniaSearch();
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
     * Displays a single Colonia model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		
			if (!\Yii::$app->user->isGuest) 
			{	
			
				if (Accesos::HasAccess(Yii::$app->user->identity->id,"/colonia"))
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
     * Creates a new Colonia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		
			if (!\Yii::$app->user->isGuest) 
			{	
			
				if (Accesos::HasAccess(Yii::$app->user->identity->id,"/colonia"))
				{
					    $model = new Colonia();

						if ($model->load(Yii::$app->request->post()) && $model->save()) {
							return $this->redirect(['view', 'id' => $model->id_colonia]);
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
     * Updates an existing Colonia model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		
		
			if (!\Yii::$app->user->isGuest) 
			{	
			
				if (Accesos::HasAccess(Yii::$app->user->identity->id,"/colonia"))
				{
					   $model = $this->findModel($id);

						if ($model->load(Yii::$app->request->post()) && $model->save()) {
							return $this->redirect(['view', 'id' => $model->id_colonia]);
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
     * Deletes an existing Colonia model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
		
		
			if (!\Yii::$app->user->isGuest) 
			{	
			
				if (Accesos::HasAccess(Yii::$app->user->identity->id,"/colonia"))
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
     * Finds the Colonia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Colonia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Colonia::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
