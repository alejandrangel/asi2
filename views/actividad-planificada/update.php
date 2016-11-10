<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ActividadPlanificada */

$this->title = 'Update Actividad Planificada: ' . $model->id_actividad_planificacion;
$this->params['breadcrumbs'][] = ['label' => 'Actividad Planificadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_actividad_planificacion, 'url' => ['view', 'id' => $model->id_actividad_planificacion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="actividad-planificada-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'action' => '@web/actividad-planificada/update?id='.Yii::app()->request->getQuery('id')
    ]) ?>

</div>
