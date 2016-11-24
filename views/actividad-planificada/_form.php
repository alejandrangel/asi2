<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ActividadPlanificada */
/* @var $form yii\widgets\ActiveForm */

$this->registerJs("
		
		function showhidecontrols(){
        
		var tipo = $('#actividadplanificada-tipo').val();
			switch(tipo){
				case 'U':{
					$('.periodo').hide();
					break;
				}
				case 'P':{
					$('.periodo').show().removeClass('hide');;
					break;
				}
			}
} showhidecontrols();", yii\web\View::POS_END);

?>

<?php $form = ActiveForm::begin(
    [
        "enableAjaxValidation"=>true,
        "action" => $action
    ]
); ?>
<div class="actividad-planificada-form">

    <div class="row">
        <div class="col-md-7">

        </div>
        <div class="col-md-5">
            <?= $form->field($model, 'tipo')->dropDownList([ 'U' => 'Actividad Unica', 'P' => 'Actividad Periodica',], ['prompt' => 'Seleccione','onchange'=>'showhidecontrols()']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <?= $form->field($model, 'fecha_inicio')->textInput(['class'=>['datepicker','form-control'],'maxlength' => true]) ?>
        </div>
        <di class="col-md-2">

        </di>
        <div class="col-md-5">
            <?= $form->field($model, 'fecha_final')->textInput(['class'=>['datepicker','form-control'],'maxlength' => true]) ?>
        </div>
    </div>

    <div class="row periodo hide">
        <div class="col-md-12">
            <?= $form->field($model, 'periodicidad')->dropDownList(['D'=>'Diario', 'S'=>'Semanal', 'Q'=>'Quincenal', 'M'=>'Mensual', 'TRI'=>'Trimestral', 'SEM'=>'Semestral']) ?>
        </div>
    </div>

     <div class="row periodo hide">
        <div class="col-md-3">
            <?= "<B>Dias:</B>"?>
        </div>
    </div>

    <div class="row periodo hide">
        <div class="col-md-3">
            <?= $form->field($model, 'lu')->checkbox(['label'=>'Lunes'])?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'ma')->checkbox(['label'=>'Martes']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'mi')->checkbox(['label'=>'Miercoles']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'ju')->checkbox(['label'=>'Jueves']) ?>
        </div>
    </div>

    <div class="row periodo hide">
        <div class="col-md-3">
            <?= $form->field($model, 'vi')->checkbox(['label'=>'Viernes']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'sa')->checkbox(['label'=>'Sabado']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'do')->checkbox(['label'=>'Domingo']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'to')->checkbox(['label'=>'Todos']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'id_plan')->textInput(["value"=>$id_plan, "readonly"=>"readonly"]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'id_ruta')->widget(\conquer\select2\Select2Widget::className(),
                                                            ['ajax' => ['ruta/rutasList']]) ?>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'id_actividad')->widget(\conquer\select2\Select2Widget::className(),
                                                            ['ajax' => ['actividad/actividadesList']]) ?>

        </div>
    </div>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>



</div>
<?php ActiveForm::end(); ?>
