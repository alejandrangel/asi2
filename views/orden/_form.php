<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrdenTrabajo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orden-trabajo-form">

    <?php $form = ActiveForm::begin(
        [
            'action' 	=> @$action,
            'enableAjaxValidation' => true
        ]
    ); ?>


    <div class="row">
        <div class="col-md-6 col-sm-6">
            <?= $form->field($model, 'orden_trabajo')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 col-sm-3">
            <?= $form->field($model, 'fecha_inicio')->textInput(['class'=>['datepicker','form-control'],'maxlength'=>20]) ?>
        </div>
        <div class="col-md-3 col-sm-3">
            <?= $form->field($model, 'fecha_final')->textInput(['class'=>['datepicker','form-control'],'maxlength'=>20]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-6">
            <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true])->label("Descripción") ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-6">
            <?= $form->field($model, 'solicitud')->widget(
                \conquer\select2\Select2Widget::className(),
                [
                    'ajax' => ['orden/sols']
                ]
            ) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <?= $form->field($model, 'actividad')->widget(
                \conquer\select2\Select2Widget::className(),
                [
                    'ajax' => ['orden/acts']
                ]
            ) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <?= $form->field($model, 'id_equipo')->widget(
                \conquer\select2\Select2Widget::className(),
                [
                    'ajax' => ['orden/equipo']
                ]
            )->label("Equipo") ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
