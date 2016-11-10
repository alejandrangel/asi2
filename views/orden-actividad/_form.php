<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrdenActividad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orden-actividad-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_orden_actividad')->textInput() ?>

    <?= $form->field($model, 'id_orden')->textInput() ?>

    <?= $form->field($model, 'id_actividad')->textInput() ?>

    <?= $form->field($model, 'dias')->dropDownList([ 'LU' => 'LU', 'MA' => 'MA', 'MI' => 'MI', 'JU' => 'JU', 'VI' => 'VI', 'SA' => 'SA', 'DO' => 'DO', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'fecha_inicio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_final')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'periodicidad')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
