<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use conquer\select2\Select2Widget;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Solicitud */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solicitud-form">

    <?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'telefono')->widget(\yii\widgets\MaskedInput::className(), [
    'mask' => '9999-9999',
]) ?>

    <?= $form->field($model, 'email')->textInput() ?>

    <?= $form->field($model, 'nombre')->textInput() ?>

    <?= $form->field($model, 'direccion')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'observacion')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'referencia')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'id_colonia')->widget(
        \conquer\select2\Select2Widget::className(),
        [
            'ajax' => ['colonia/coloniasList']
        ]

    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Volver', ['index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
