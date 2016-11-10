<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'clave')->input("password") // ['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_creacion')->textInput(['class'=>['datepicker','form-control']])


    ?>

    <?= $form->field($model, 'estado')->dropDownList([ 'A' => 'A', 'B' => 'B', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'id_empleado')->widget(
        \conquer\select2\Select2Widget::className(),
        [
            'ajax' => ['empleado/empleadosList']
        ]

    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
