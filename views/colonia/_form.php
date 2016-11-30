<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Distrito;
/* @var $this yii\web\View */
/* @var $model app\models\Colonia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="colonia-form">
    <?php $form = ActiveForm::begin(); ?>
      <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>  
	  <?= $form->field($model, 'id_distrito')->dropDownList(ArrayHelper::map(Distrito::find()->all(), 'id_distrito', 'nombre'))?>
      <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
