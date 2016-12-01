<?php

namespace app\controllers;

use app\models\EquipoAutomotor;
use app\models\EquipoPersonal;
use Yii;
use app\models\Equipo;
use yii\data\ActiveDataProvider;
use yii\db\Exception;
use yii\db\IntegrityException;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;

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
                    'delete' => ['POST']
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


    public function actionSave()
    {
        $model = new Equipo();
        $model->load(Yii::$app->request->post());

        try{
            $new = $this->findModel(Yii::$app->request->post('Equipo')['id_equipo']);
            $new->descripcion = Yii::$app->request->post('Equipo')['descripcion'];
            $model = $new;
        }catch (NotFoundHttpException $e){

        }
        \Yii::$app->response->format = Response::FORMAT_JSON;
        echo json_encode(array('success'=>$model->save()));
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
                    'success'=>false,
                    'error'=>'No se puede eliminar el registro esta siendo usado'
            ),JSON_NUMERIC_CHECK);
        }
    }


    public function actionListEmpleadoEquipo(){

        Yii::$app->response->format = Response::FORMAT_JSON;
        $id = Yii::$app->request->get('equipo');

        $query = new Query;
        $data = $query->select(['equipo_personal.id_empleado','empleado.nombres','empleado.apellidos','cargo.descripcion'])
            ->from('equipo_personal')
            ->innerJoin('empleado', 'empleado.id_empleado = equipo_personal.id_empleado')
            ->innerJoin('cargo', 'cargo.id_cargo = empleado.cargo')
            ->where(['equipo_personal.id_equipo'=>$id])
            ->all();
        $data = array("data"=>
            $data
        );


        echo json_encode($data,JSON_NUMERIC_CHECK);
    }


    public function actionListAutomotorEquipo(){


        Yii::$app->response->format = Response::FORMAT_JSON;
        $id = Yii::$app->request->get('equipo');

        $query = new Query;
        $data = $query->select(['equipo_automotor.id_equipo','marca.marca','color.color','automotor.placa','equipo_automotor.id_automor'])
            ->from('equipo_automotor')
            ->innerJoin('automotor', 'equipo_automotor.id_automor = automotor.id_automotor')
            ->innerJoin('modelo', 'modelo.id_modelo = automotor.modelo')
            ->innerJoin('marca', 'modelo.marca = marca.id_marca')
            ->innerJoin('color', 'color.id_color = automotor.color')
            ->where(['equipo_automotor.id_equipo'=>$id])
            ->all();
        $data = array("data"=>
            $data
        );
        echo json_encode($data,JSON_NUMERIC_CHECK);
    }


    public function actionAddEmpleado(){

        Yii::$app->response->format = Response::FORMAT_JSON;

        $equipo   = Yii::$app->request->post('equipo');
        $empleado = Yii::$app->request->post('empleado');

        $equipoPersonal              = new EquipoPersonal();
        $equipoPersonal->estado      = 'A';
        $equipoPersonal->id_empleado = $empleado;
        $equipoPersonal->id_equipo   = $equipo;


        try {
            echo json_encode(array("success"=>$equipoPersonal->save()));
        }
        catch (IntegrityException $e){echo json_encode(array("success"=>false,'msj'=>'Ya fue agregado'));}
        catch (Exception $e){echo json_encode(array("success"=>false,'msj'=>'No se pudo agregar'));}
    }


    public function actionAddAutomotor(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $equipo   = Yii::$app->request->post('equipo');
        $automotor = Yii::$app->request->post('automotor');

        $equipoAutomotor              = new EquipoAutomotor();
        $equipoAutomotor->id_automor  = $automotor;
        $equipoAutomotor->id_equipo   = $equipo;

        try {
            echo json_encode(array("success"=>$equipoAutomotor->save()));
        }
        catch (IntegrityException $e){echo json_encode(array("success"=>false,'msj'=>'Ya fue agregado'));}
        catch (Exception $e){echo json_encode(array("success"=>false,'msj'=>'No se pudo agregar'));}
    }


    public function actionDeleteEmpleado(){
        $equipo = Yii::$app->request->post('equipo');
        $empleado =Yii::$app->request->post('empleado');
        Yii::$app->response->format = Response::FORMAT_JSON;
        try{
           $empleado = EquipoPersonal::find()->where(['id_equipo'=>$equipo,'id_empleado'=>$empleado])->one();
           echo json_encode(array('success'=>$empleado->delete()));
        }catch (IntegrityException $e){
            echo json_encode(array('success'=>false));
        }
    }



    public function actionDeleteAutomotor(){
        $equipo = Yii::$app->request->post('equipo');
        $automotor = Yii::$app->request->post('automotor');
        Yii::$app->response->format = Response::FORMAT_JSON;
        try{
            $automotor = EquipoAutomotor::find()->where(['id_equipo'=>$equipo,'id_automor'=>$automotor])->one();
            echo json_encode(array('success'=>$automotor->delete()));
        }catch (IntegrityException $e){
            echo json_encode(array('success'=>false));
        }

    }



    public function actionEquipoValidation() {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $model = new Equipo();
        $model->load(\Yii::$app->request->post());

        return ActiveForm::validate($model);
    }

}
