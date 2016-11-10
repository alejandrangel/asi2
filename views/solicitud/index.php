<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use util\Acf;
use yii\widgets\Pjax;
use app\models\Solicitud;
use app\models\Estado;
use fedemotta\datatables\DataTables;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SolicitudSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Solicitudes';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="solicitud-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Solicitud', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function ($model, $index, $widget, $grid) {
                            if ($model->id_estado == 3) {
                                return ['class' => 'danger'];
                            } else if($model->id_estado == 2) { 
                                return ['class' => 'success'];
                            }else{
                                return ['class' => ''];
                            }
                         },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_solicitud',
            'fecha:date',
            'telefono',
            'email:email',
            'nombre',
            // 'direccion:ntext',
            // 'observacion:ntext',
            //id_estado',
            [
                'attribute'=>'id_estado',
                'value'=> function($model){
                    $estado = Estado::findOne($model->id_estado);
                    return $estado->estado;
                },
                'filter'=>ArrayHelper::map(Estado::find()->all(),'id_estado','estado'),
            ],
            // 'id_fuente',
            // 'id_usuario',
            // 'referencia',
            // 'id_ruta',
               // solo consultar  {view}
            ['class' =>'yii\grid\ActionColumn', 'template' => '{view}'],
        ],
    ]); ?>



       <?php
    //$searchModel = new SolicitudSearch();
   // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
?>
<?= DataTables::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
 
        //columns
        'id_solicitud',
        'fecha' ,
        'telefono',
        'email:email',
        'nombre',
        'direccion:ntext',
        'observacion:ntext',        
 
        ['class' => 'yii\grid\ActionColumn'],
    ],
]);?>

</div>
