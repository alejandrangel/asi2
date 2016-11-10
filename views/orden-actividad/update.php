<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OrdenActividad */

$this->title = 'Update Orden Actividad: ' . $model->id_orden_actividad;
$this->params['breadcrumbs'][] = ['label' => 'Orden Actividads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_orden_actividad, 'url' => ['view', 'id' => $model->id_orden_actividad]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="orden-actividad-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
