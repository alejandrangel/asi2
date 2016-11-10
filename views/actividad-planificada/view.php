<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ActividadPlanificada */

$this->title = $model->id_actividad_planificacion;
$this->params['breadcrumbs'][] = ['label' => 'Actividad Planificadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="actividad-planificada-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_actividad_planificacion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_actividad_planificacion], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_actividad_planificacion',
            'tipo',
            'fecha_inicio',
            'fecha_final',
            'periodicidad',
            'dias',
            'id_plan',
            'id_ruta',
            'actividad',
        ],
    ]) ?>

</div>
