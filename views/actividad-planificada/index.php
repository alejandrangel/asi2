<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Actividad Planificadas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="actividad-planificada-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Actividad Planificada', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_actividad_planificacion',
            'tipo',
            'fecha_inicio',
            'fecha_final',
            'periodicidad',
            // 'dias',
            // 'id_plan',
            // 'id_ruta',
            // 'actividad',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
