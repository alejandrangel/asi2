<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OrdenTrabajo */

$this->title = 'Update Orden Trabajo: ' . $model->id_orden_trabajo;
$this->params['breadcrumbs'][] = ['label' => 'Orden Trabajos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_orden_trabajo, 'url' => ['view', 'id' => $model->id_orden_trabajo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="orden-trabajo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
