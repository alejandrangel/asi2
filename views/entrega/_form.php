<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Entrega */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="entrega-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'tonelada')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'fecha')->textInput(['class'=>['datepicker','form-control']]) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
