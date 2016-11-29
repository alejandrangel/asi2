<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Solicitud */

$this->title = 'Update Solicitud: ' . $model->id_solicitud;
$this->params['breadcrumbs'][] = ['label' => 'Solicituds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_solicitud, 'url' => ['view', 'id' => $model->id_solicitud]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="solicitud-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
