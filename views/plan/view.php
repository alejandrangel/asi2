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

$this->registerJsFile('@web/js/plan.js',[\yii\web\View::POS_END]);

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
?>

	<ul class="nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#Actividades">Actividades</a></li>
	</ul>
	<div>
		<div class="tab-content">
			<div id="Actividades" class="tab-pane  active">
				<div class="row">
					<div class="col-md-8">
						<br />
						<?php
							\yii\bootstrap\Modal::begin(
								[
									'header' => '<h2>'.Yii::t('app','New Activity').'</h2>',
									'toggleButton' => ['label' => Yii::t('app','New Activity') ,'class'=>'btn btn-success']
								]
							);
							echo $this->render('../actividad-planificada/create',['model'=>$newact, 'id_plan'=>$model->id_plan]);
							\yii\bootstrap\Modal::end();
						?>
						<br />
					</div>
					<div class="col-md-2" style='margin-left:150px'>
						<br />
						<?= \yii\helpers\Html::a('Volver', Yii::$app->request->referrer,['class'=>'btn btn-success']) ?>
						<br />
					</div>
				</div>
				<div class="row">
						<?php
						echo GridView::widget([
							'dataProvider' => $actividades,
							'columns' => [
								['class' => 'yii\grid\SerialColumn'],

								[
									'attribute' => 'fecha_inicio',
									'format' => ['date', 'php:d/m/Y'],
									'label'=>'Fecha Inicial',
								],

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
									'attribute' => 'actividad.actividad',
								],

								['class' => 'yii\grid\ActionColumn',
                                'template' => '{update}{delete}',
                                'buttons' => [
            			    	'update' => function ($url,$newact) {
            								return Html::a('<span class="glyphicon glyphicon-pencil"></span>', 'javascript:edit('.$newact->id_actividad_planificacion.', "actividad-planificada", '.$newact->id_plan.')',
            										[]);
            				}
            	],
            ],
							],
						]);
						?>
				</div>
			</div>
		</div>
	</div>
</div>

<style>
    .modal-backdrop {background: none;}
</style>
 <?php
			\yii\bootstrap\Modal::begin([
				'id'=>'modaledit',
			    'header' => '<h2>Editar Actividada</h2>',
			]);
?>
<div id="updateContent"></div>
<?php
			\yii\bootstrap\Modal::end();
?>
