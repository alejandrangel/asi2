<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Modelo;
use app\models\Tipo;
use app\models\Estado;
use app\models\Color;
use app\models\Combustible;

/* @var $this yii\web\View */
/* @var $model app\models\Automotor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="automotor-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'placa')->textInput(['maxlength' => true]) ?>    
	<?= $form->field($model, 'modelo')->dropDownList(ArrayHelper::map(Modelo::find()->all(), 'id_modelo', 'modelo'))?>
    <?= $form->field($model, 'anio')->textInput() ?>
    <?= $form->field($model, 'capacidad')->textInput(['maxlength' => true]) ?>    
	<?= $form->field($model, 'tipo')->dropDownList(ArrayHelper::map(Tipo::find()->all(), 'id_tipo', 'tipo'))?>    
	<?= $form->field($model, 'estado')->dropDownList(ArrayHelper::map(Estado::find()->where(['id_tabla' => '5'])->all(), 'id_estado', 'estado'))?>
    <?= $form->field($model, 'chasis')->textInput(['maxlength' => true]) ?>    
	<?= $form->field($model, 'color')->dropDownList(ArrayHelper::map(Color::find()->all(), 'id_color', 'color'))?>
    <?= $form->field($model, 'numero_motor')->textInput(['maxlength' => true]) ?>    
	<?= $form->field($model, 'combustible')->dropDownList(ArrayHelper::map(Combustible::find()->all(), 'id_combustible', 'combustible'))?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		<?= \yii\helpers\Html::a('Volver', Yii::$app->request->referrer,['class'=>'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
