<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Modelo;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AutomotorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Automotores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="automotor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Automotor', ['create'], ['class' => 'btn btn-success']) ?>
		<?= Html::a('Listado Automotor', ['pdf'], ['class' => 'btn btn-info']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_automotor',
            'placa',
            //'modelo',
			[
                'attribute'=>'modelo',
                'value'=> function($model){
                    $estado = Modelo::findOne($model->modelo);
                    return $estado->modelo;
                },
                'filter'=>ArrayHelper::map(Modelo::find()->all(),'id_modelo','modelo'),
            ],
            'anio',
            'capacidad',
            // 'tipo',
            // 'estado',
            // 'chasis',
            // 'color',
            // 'numero_motor',
            // 'combustible',

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
