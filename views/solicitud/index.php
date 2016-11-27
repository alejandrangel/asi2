<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use util\Acf;
use yii\widgets\Pjax;
use app\models\Solicitud;
use app\models\Estado;
use app\models\Colonia;
use fedemotta\datatables\DataTables;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SolicitudSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Solicitudes';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="solicitud-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Solicitud', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

        <?= DataTables::widget([
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
                    [
                        'attribute'=>'fecha',
                        'format'   => ['date', 'php:d/m/Y']
                    ],
                    'observacion',
                     [
                        'attribute'=>'id_colonia',
                        'value'=> function($model){
                            $nombre = Colonia::findOne($model->id_colonia);
                            return $nombre->nombre;
                        }
                    ],                    
                     [
                        'attribute'=>'id_estado',
                        'value'=> function($model){
                            $estado = Estado::findOne($model->id_estado);
                            return $estado->estado;
                        },
                        'filter'=>ArrayHelper::map(Estado::find()->all(),'id_estado','estado'),
                    ],
                ['class' => 'yii\grid\ActionColumn','template' => '{view}'],
            ],
        ]);?>




