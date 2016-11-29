<?php

namespace app\controllers;

use util\Report;
use conquer\select2\Select2Action;
use Yii;
use app\models\Empleado;
use app\models\EmpleadoSearch;
use yii\db\ActiveQuery;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EmpleadoController implements the CRUD actions for Empleado model.
 */
class EmpleadoController extends Controller
{



    public function actions()
    {
        return [
            'empleadosList'=>[
                'class'=>Select2Action::className(),
                'dataCallback'=>[$this,'empleadoCallback']
            ]
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
     * Lists all Empleado models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmpleadoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Empleado model.
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
     * Creates a new Empleado model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Empleado();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_empleado]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Empleado model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_empleado]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Empleado model.
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
     * Finds the Empleado model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Empleado the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Empleado::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }





    public function empleadoCallback($q){
        $query = new ActiveQuery(Empleado::className());
        return [
            'results' =>  $query->select([
                'id_empleado as id',
                'nombres as text',
            ])
                ->filterWhere(['like', 'nombres', $q])
                ->asArray()
                ->limit(20)
                ->all(),
        ];
    }


    public function actionListAll(){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $data = array("data"=>
            Empleado::find()->asArray()->all()
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
                                    <td class="box">No Empleado &nbsp;</td>
                                    <td class="box">Nombre &nbsp;</td>
									<td class="box">Apellido &nbsp;</td>
									<td class="box">Direccion &nbsp;</td>
									<td class="box">Telefono </td>
                                 </tr>
                        </thead>
                        <tbody>';

        $empleado = Empleado::find()->all();




        foreach ($empleado as $emp){
            $content.='<tr class="'.(($emp->id_empleado%2==0)?'odd':'edd').'"><td>'.$emp->id_empleado.'</td>';
            $content.='<td>'.$emp->nombres.'</td>';
			$content.='<td>'.$emp->apellidos.'</td>';
			$content.='<td>'.$emp->direccion.'</td>';
			$content.='<td>'.$emp->telefono.'</td></tr>';
        }


        $content .= '</tbody></table>';





        Report::PDF($style,'Reporte de Empleado',$content);


    }


}
