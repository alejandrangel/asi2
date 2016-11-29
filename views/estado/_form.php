<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\CatalogoTabla;
/* @var $this yii\web\View */
/* @var $model app\models\Estado */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estado-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'estado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_tabla')->dropDownList(ArrayHelper::map(CatalogoTabla::find()->all(), 'id_catalogo_tabla', 'nombre'))?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
