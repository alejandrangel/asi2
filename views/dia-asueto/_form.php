<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DiaAsueto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dia-asueto-form">
    <?php $form = ActiveForm::begin([
        'enableAjaxValidation' => true,
        'validationUrl'=> \yii\helpers\Url::to("@web/dia-asueto/validator"),
        'options' => ['id' => $id],
    ]); ?>
    <?= $form->field($model, 'fecha')->textInput(['class'=>['datepicker','form-control'],'maxlength' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
