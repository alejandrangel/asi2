<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RolSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rols';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rol-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Rol', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id_rol',
            'rol',
            //'activo',
			[
                'attribute'=>'activo',
                'value'=> function($model){
                    if ($model->activo == '1') {
                            return 'Activo';
                        } 
						else{
                                return 'Inactivo';
                            }
                },
                'filter' => ['1'=>'Activo', '0'=>'Inactivo'],
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
