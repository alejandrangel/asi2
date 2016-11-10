<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Plan */
/* @var $form yii\widgets\ActiveForm */

//$form->field($model, 'id_plan')->hiddenInput()->label(false);

?>

<div class="plan-form">

    <?php $form = ActiveForm::begin([
	    		'id' 		=> 'plan_form',
	    		'action' 	=> $action,
	    		'enableAjaxValidation' => true
    		]);
    ?>

    <?= $form->field($model, 'fecha_inicia')->textInput(['class'=>['datepicker','form-control']]) ?>
    <?= $form->field($model, 'fecha_final')->textInput(['class'=>['datepicker','form-control']]) ?>
    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
