<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrdenAutomotor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orden-automotor-form">

    <?php $form = ActiveForm::begin(

    ); ?>
    <div class="row">
        <div class="col-sm-12">
            <?= $form->field($model, 'id_automotor')->widget(
                \conquer\select2\Select2Widget::className(),
                [
                    'ajax' => ['orden-automotor/automotorList']
                ]
            ) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'km_inicial')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'km_final')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'codigo_vale')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'monto')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
