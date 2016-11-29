<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Solicitud */

?> 

<?php $form = ActiveForm::begin([
                            "method" => "post",
                            "action" => Url::toRoute("solicitud/aprobar"),
                            "enableClientValidation" => true,
                        ]);
?>

<?= $form->field($model, 'id_solicitud')->hiddenInput([
										'readonly' => true, 
										'value' => Yii::$app->request->get('id')
									   ])->label(false) ?>

<?= $form->field($model, 'comentario')->hiddenInput(['value' => 'Aprobada el ' . date('d/m/y H:i:s'),'rows' => 3])->label(false) ?>  

<?= Html::submitButton("Aprobar", ["class" => "btn btn-success"]) ?>
                
<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

<?php $form->end() ?>