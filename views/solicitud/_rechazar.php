<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Solicitud */

?> 

<?php $form = ActiveForm::begin([
                            "method" => "post",
                            "action" => Url::toRoute("solicitud/rechazar"),
                            "enableClientValidation" => true,
                        ]);
?>

<?= $form->field($model, 'id_solicitud')->hiddenInput([
										'readonly' => true, 
										'value' => Yii::$app->request->get('id')
									   ])->label(false) ?>

<?= $form->field($model, 'comentario')->textarea(['rows' => 3]) ?>  

<?= Html::submitButton("Rechazar", ["class" => "btn btn-primary"]) ?>
                
<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>

<?php $form->end() ?>