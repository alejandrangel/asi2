<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ActividadPlanificada */
?>
<div class="actividad-planificada-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'action' => '../actividad-planificada/update?id='.Yii::app()->request->getQuery('id')
    ]) ?>

</div>
