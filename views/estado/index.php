<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\CatalogoTabla;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EstadoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estado-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Estados', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_estado',
            'estado',
            'descripcion',
            //'id_tabla',
			[
                'attribute'=>'id_tabla',
                'value'=> function($model){
                    $estado = CatalogoTabla::findOne($model->id_tabla);
                    return $estado->nombre;
                },
                'filter'=>ArrayHelper::map(CatalogoTabla::find()->all(),'id_catalogo_tabla','nombre'),
            ],

            //['class' => 'yii\grid\ActionColumn'],
			[
				'class' => 'yii\grid\ActionColumn',
				'template' =>'{view}{update}{web}',
				'buttons' =>[ function ($url,$model,$key){
					return $model->web != ''? Html::a(
					'<span class="glyphicon glyphicon-globe"</span>',
					$model->web) : '';
					},
				],
			],
        ],
    ]); ?>
</div>
