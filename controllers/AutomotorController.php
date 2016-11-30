<?php

namespace app\controllers;
use util\Report;
use Yii;
use app\models\Automotor;
use app\models\AutomotorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Tipo;
use app\models\Estado;
use app\models\Modelo;
/**
 * AutomotorController implements the CRUD actions for Automotor model.
 */
class AutomotorController extends Controller
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
     * Lists all Automotor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AutomotorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Automotor model.
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
     * Creates a new Automotor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Automotor();

        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_automotor]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Automotor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_automotor]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Automotor model.
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
     * Finds the Automotor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Automotor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Automotor::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

	
	public function actionPdf(){

        $style = ".box{border-bottom:1px solid gray;border-top:1px solid gray;}";
        $style .= ".odd{background:#FEFEED}";
        $style .= ".edd{background:#FAFFFF}";

        $content = '<table width="100%" class="content" cellpadding="0" cellspacing="0">
                        <thead>
                                <tr>
                                    <td class="box">No Automotor &nbsp;</td>
                                    <td class="box">Modelo &nbsp;</td>
									<td class="box">Placa &nbsp;</td>
									<td class="box">Tipo &nbsp;</td>
									<td class="box">Estado </td>
                                 </tr>
                        </thead>
                        <tbody>';

        $automotores = Automotor::find()->all();




        foreach ($automotores as $auto){
            $content.='<tr class="'.(($auto->id_automotor%2==0)?'odd':'edd').'"><td>'.$auto->id_automotor.'</td>';
            $content.='<td>'.Modelo::findOne($auto->tipo)->modelo.'</td>';
			$content.='<td>'.$auto->placa.'</td>';
			$content.='<td>'.Tipo::findOne($auto->tipo)->tipo.'</td>';
			$content.='<td>'.Estado::findOne($auto->estado)->estado.'</td></tr>';
        }


        $content .= '</tbody></table>';





        Report::PDF($style,'Reporte de Automotores',$content);


    }

    public function actionListAll(){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $data = array("data"=>
            Automotor::find()->asArray()->all()
        );
        echo json_encode($data,JSON_NUMERIC_CHECK);
    }


}
