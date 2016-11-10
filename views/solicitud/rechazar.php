<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Solicitud */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solicitud-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'comentario')->textarea(['rows' => 3]) ?>

    <div class="form-group">
        <?= Html::a('Rechazar', ['rechazar', 'id' => $model->id_solicitud,'comentario' =>$model->comentario], [
                    'class' => 'btn btn-danger',
                    'data' => [
                    'method' => 'post',
                ],
                ]) ?>
   
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>

    </div>

    <?php ActiveForm::end(); ?>

</div>

