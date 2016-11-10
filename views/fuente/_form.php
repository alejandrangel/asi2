<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Fuente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fuente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_fuente')->textInput() ?>

    <?= $form->field($model, 'fuente')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
