<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Distrito;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ColoniaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Colonias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="colonia-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Colonia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_colonia',
            'nombre',            		
			[
                'attribute'=>'id_distrito',
                'value'=> function($model){
                    $estado = Distrito::findOne($model->id_distrito);
                    return $estado->nombre;
                },
                'filter'=>ArrayHelper::map(Distrito::find()->all(),'id_distrito','nombre'),
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
