<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AutomotorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="automotor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_automotor') ?>

    <?= $form->field($model, 'placa') ?>

    <?= $form->field($model, 'modelo') ?>

    <?= $form->field($model, 'anio') ?>

    <?= $form->field($model, 'capacidad') ?>

    <?php // echo $form->field($model, 'tipo') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'chasis') ?>

    <?php // echo $form->field($model, 'color') ?>

    <?php // echo $form->field($model, 'numero_motor') ?>

    <?php // echo $form->field($model, 'combustible') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
