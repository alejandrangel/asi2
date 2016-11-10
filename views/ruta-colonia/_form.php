<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RutaColonia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ruta-colonia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_ruta_colonia')->textInput() ?>

    <?= $form->field($model, 'id_ruta')->textInput() ?>

    <?= $form->field($model, 'id_colonia')->textInput() ?>

    <?= $form->field($model, 'orden')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
