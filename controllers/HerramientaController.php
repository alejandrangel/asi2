<?php

namespace app\controllers;

use Yii;
use app\models\Herramienta;
use app\models\HerramientaSearch;
use yii\console\Response;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Estado;
use util\Report;
/**
 * HerramientaController implements the CRUD actions for Herramienta model.
 */
class HerramientaController extends Controller
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
     * Lists all Herramienta models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HerramientaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Herramienta model.
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
     * Creates a new Herramienta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Herramienta();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_herramienta]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Herramienta model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_herramienta]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Herramienta model.
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
     * Finds the Herramienta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Herramienta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Herramienta::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionListAll(){
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $data = array("data"=>
            Herramienta::find()->asArray()->all()
        );
        echo json_encode($data,JSON_NUMERIC_CHECK);
    }
	
	public function actionPdf(){

        $style = ".box{border-bottom:1px solid gray;border-top:1px solid gray;}";
        $style .= ".odd{background:#FEFEED}";
        $style .= ".edd{background:#FAFFFF}";

        $content = '<table width="100%" class="content" cellpadding="0" cellspacing="0">
                        <thead>
                                <tr>
                                    <td class="box">No Herramienta &nbsp;</td>
                                    <td class="box">Descripcion &nbsp;</td>
									<td class="box">Estado &nbsp;</td>
                                 </tr>
                        </thead>
                        <tbody>';

        $herramientas = Herramienta::find()->all();




        foreach ($herramientas as $herra){
            $content.='<tr class="'.(($herra->id_herramienta%2==0)?'odd':'edd').'"><td>'.$herra->id_herramienta.'</td>';
            $content.='<td>'.$herra->descripcion.'</td>';
			$palabra="";
			if($herra->activo=='A')
				$palabra='Activo';
			else
				$palabra='Inactivo';
			
			$content.='<td>'.$palabra.'</td></tr>';
        }


        $content .= '</tbody></table>';





        Report::PDF($style,'Reporte de Herramientas',$content);


    }

}
