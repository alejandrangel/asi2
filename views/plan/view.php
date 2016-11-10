<?php

use yii\helpers\Html;
use yii\grid\GridView;
use util\CustomDialog;
use yii\web\View;
use app\models\plan;
use app\models\ActividadPlanificada;

/* @var $this yii\web\View */
/* @var $model app\models\Plan */

//LISTA DE LAS ACTIVIDADES QUE PERTENECEN AL PLAN

$this->title = "Plan de Trabajo";
$this->params['breadcrumbs'][] = ['label' => 'Plans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$estaus = array(
    "A"=>"Aprobado",
    "R"=>"Registrado",
    "C"=>"Cancelado"
);



?>
<style>
    .plan-view{
        padding-left: 20px;
    }
</style>
<div class="plan-view">

    <h3><?= Html::encode($this->title) ?></h3>
    <div class="row">
        <div class="col-md-1">
            <label>Nombre:</label>
        </div>
        <div class="col-md-8">
            <span><?= $model->descripcion ?></span>
        </div>
        <div class="col-md-3">
            <label>Estado:</label>
            <span><?= $estaus[$model->estado] ?></span>
        </div>
    </div>

    <div class="row">
        <div class="col-md-1">
            <label>Periodo:</label>
        </div>
        <div class="col-md-8">
            <?= date_format(date_create($model->fecha_inicia),'d/m/Y') .' - '. date_format(date_create($model->fecha_final),'d/m/Y') ?>
        </div>
    </div>

<?php 

	
	$this->registerJs("$('.modal-backdrop').removeClass('modal-backdrop');", View::POS_END);
	echo  yii\bootstrap\Tabs::widget([
    'items' => [
		        [
		            'label' => Yii::t('app','Activities'),
		            'content' =>
		        		'<BR />'.

		        		CustomDialog::widget(['options'=>[
		        				'id'=>'newAct',
		        		],
		        				'header' => '<h2>'.Yii::t('app','New Activity').'</h2>',
		        				'toggleButton' => ['label' => Yii::t('app','New Activity') ,'class'=>'btn btn-success'],
		        				'content'=> 
				        				$this->render('../actividad-planificada/create',['model'=>$newact, 'id_plan'=>$model->id_plan])
		        		])

                        . Html::button('Volver', array(
                                'name' => 'btnBack',
                                'class' => 'btn btn-success',
                                'style' => 'width:75px; margin-left: 1000px; margin-top: -60px;',
                                'onclick' => "window.location = 'index'",
                            )
                        )

		        		.'<BR /> <BR />'
                        .GridView::widget([
				        'dataProvider' => $actividades,
				        'columns' => [
				            ['class' => 'yii\grid\SerialColumn'],
				
				               [
				                    'attribute' => 'fecha_inicio',
				                    'format' => ['date', 'php:d/m/Y'],
				               		'label'=>'Fecha Inicial',
				               ]
				            ,
				            [
				                'attribute' => 'fecha_final',
				                'format' => ['date', 'php:d/m/Y'],
                                'label'=>'Fecha Final',
				            ],
				        	[
				        		'attribute' => 'tipo',
                                'value' => function ($model){
                                    $tA = array(
                                        "U" => "Unica",
                                        "P" => "Periodica"
                                    );
                                    return $tA[$model->tipo];
                                }
				        	],
				        		[
				        		'attribute' => 'actividad',
				        		],
				            ['class' => 'yii\grid\ActionColumn'],
				        ],
				    ]),
		            'active' => true,
		        ]/*,
		        [
		        		'label' => Yii::t('app','Team'),
		        		'content' => '<BR />'.Html::a('Crear Equipo', ['equipo/create'], ['class' => 'btn btn-success']).'<BR /><BR />'. GridView::widget([
				        'dataProvider' => $equipo,
				        'columns' => [
				            ['class' => 'yii\grid\SerialColumn'],
				
				               [
				                    'attribute' => 'descripcion',
				               		'label'=>'Descripción',
				               ]
				            ,
				            [
				                'attribute' => 'estado',
				            	'label'=>'estado',
				            ],
							['class' => 'yii\grid\ActionColumn',
								'template' => '{view}{update}{delete}',
								'buttons' => [
									'view' => function ($url, $model) {
										return Html::a('<span class="glyphicon glyphicon-eye-open"></span>','@web/equipo/view?id='.$model->id_equipo);
									}
								],
							],
				        ],
				    ])
		        ]*/
			],
	]);
?>



</div>
