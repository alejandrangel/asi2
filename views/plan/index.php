<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Plan;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

//LISTA DE LOS PLANES DE TRABAJO EXISTENTES

$this->title = 'Planes de Trabajo';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile('@web/js/plan.js',[\yii\web\View::POS_END]);

?>
<div class="plan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <?php
			\yii\bootstrap\Modal::begin([
			    'header' => '<h2>Nuevo Plan de Trabajo</h2>',
			    'toggleButton' => ['label' => 'Nuevo Plan','class'=>'btn btn-success'],
			]);
			echo $this->render('createPlan', [
					'model' => new Plan(),
			]) ;
			\yii\bootstrap\Modal::end();
	?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

               [
                    'attribute' => 'fecha_inicia',
                    'format' => ['date', 'php:d/m/Y'],
                    'label' => 'Fecha Inicial',
               ]
            ,
            [
                'attribute' => 'fecha_final',
                'format' => ['date', 'php:d/m/Y'],
                'label' => 'Fecha Final',
            ],
            'descripcion',
            [
                'attribute'=>'estado',
                'value'=>function ($model){
                    $st = array('A'=>'Aprobado','R'=>'Registrado','C'=>'Cancelado');
                    return $st[$model->estado];
                }
            ],
            ['class' => 'yii\grid\ActionColumn',
             'template' => '{view}{update}{delete}',
            'buttons' => [
            				'update' => function ($url, $model) {
            								return Html::a('<span class="glyphicon glyphicon-pencil"></span>', 'javascript:edit('.$model->id_plan.', "plan",""
                                            )',
            										[]);
            				}
            	],
            ],
        ],
    ]);
?>
</div>
<style>
    .modal-backdrop {background: none;}
</style>
 <?php
			\yii\bootstrap\Modal::begin([
				'id'=>'modaledit',
			    'header' => '<h2>Editar Plan de Trabajo</h2>',
			]);
?>
<div id="updateContent"></div>
<?php
			\yii\bootstrap\Modal::end();
?>





