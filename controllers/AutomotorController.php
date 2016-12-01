<?php

namespace app\controllers;
use util\Report;
use Yii;
use app\models\Automotor;
use app\models\AutomotorSearch;
use yii\db\Query;
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

        $query = new Query();
        $data = $query->select([
            'id_automotor'=>'automotor.id_automotor',
            'placa'=>'automotor.placa',
            'marca'=>'marca.marca',
            'color'=>'color.color',
            'modelo'=>'modelo.modelo'
        ])->from('automotor')
            ->innerJoin('modelo','modelo.id_modelo = automotor.modelo')
            ->innerJoin('marca','marca.id_marca = modelo.marca')
            ->innerJoin('color','automotor.color = color.id_color')
          ->all();

        $data = array("data"=>
                $data
        );
        echo json_encode($data,JSON_NUMERIC_CHECK);
    }
	
	
	public function actionPdf2($id){
	
	
	   $params = \Yii::$app->request->get();
        if(\Yii::$app->request->isPost){
            $params = \Yii::$app->request->post();
        }

		$query = new Query;
		$query->select([
            'automotor.id_automotor',
            'automotor.placa',
            'orden_automotor.km_inicial',
            'orden_automotor.km_final',
            'orden_automotor.codigo_vale',
            'orden_automotor.monto',
            'orden_trabajo.id_orden_trabajo',
            'orden_trabajo.fecha_inicio',
            'orden_trabajo.fecha_final'
        ])->from('automotor')
          ->innerJoin('orden_automotor', 'orden_automotor.id_automotor = automotor.id_automotor')
          ->innerJoin('orden_trabajo', 'orden_automotor.id_orden = orden_trabajo.id_orden_trabajo')
          ->where(['automotor.id_automotor'=>$id]);
				
        //var_dump($query->all());
        //$data = array("data"=>
           // $query->all()
        //);
		
		$command = $query->createCommand();
		// Ejecutar el comando:
		$data = $command->queryAll();

	
        $style = ".box{border-bottom:1px solid gray;border-top:1px solid gray;}";
        $style .= ".odd{background:#FEFEED}";
        $style .= ".edd{background:#FAFFFF}";

        $content = '<table width="100%" class="content" cellpadding="0" cellspacing="0">
                        <thead>
                                <tr>
                                    <td class="box">No Automotor &nbsp;</td>
									<td class="box">Placa &nbsp;</td>
									<td class="box">KM Inicial &nbsp;</td>
									<td class="box">KM Final &nbsp;</td>
									<td class="box">Codigo de Vale &nbsp;</td>
									<td class="box">Monto Vale &nbsp;</td>
									<td class="box">Recorrido Total &nbsp;</td>
									<td class="box">Orden de Trabajo &nbsp;</td>
									<td class="box">Fecha Inicio &nbsp;</td>
									<td class="box">Fecha Final &nbsp;</td>
                                 </tr>
                        </thead>
                        <tbody>';
		$totalKM=0;
      /*  foreach ($data as $fila){
			
            $content.='<tr class="'.(($fila->id_automotor%2==0)?'odd':'edd').'"><td>'.$fila->id_automotor.'</td>';
			$content.='<td>'.$fila->placa.'</td>';
			$content.='<td>'.$fila->km_inicial.'</td>';
			$content.='<td>'.$fila->km_final.'</td>';
			$content.='<td>'.$fila->codigo_vale.'</td>';
			$content.='<td>'.$fila->monto.'</td>';
			$content.='<td>'.$totalKM.'</td>';
			$content.='<td>'.$fila->id_orden_trabajo.'</td>';
			$content.='<td>'.$fila->fecha_inicio.'</td>';
			$content.='<td>'.$fila->fecha_final.'</td></tr>';
        }*/
		
		 foreach ($data as $fila){
		$totalKM =$fila['km_final'] - $fila['km_inicial'];
		$content.='<tr class="'.(($fila['id_automotor']%2==0)?'odd':'edd').'"><td>'.$fila['id_automotor'].'</td>';
		$content.='<td>'.$fila['placa'].'</td>';
		$content.='<td>'.$fila['km_inicial'].'</td>';
		$content.='<td>'.$fila['km_final'].'</td>';
		$content.='<td>'.$fila['codigo_vale'].'</td>';
		$content.='<td>'.$fila['monto'].'</td>';
		$content.='<td>'.$totalKM.'</td>';
		$content.='<td>'.$fila['id_orden_trabajo'].'</td>';
		$content.='<td>'.$fila['fecha_inicio'].'</td>';
		$content.='<td>'.$fila['fecha_final'].'</td>';
        }
     
			
        $content .= '</tbody></table>';





        Report::PDF($style,'Reporte de Automotores',$content);


    }


}
