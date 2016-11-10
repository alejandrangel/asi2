<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orden Actividads';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orden-actividad-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Orden Actividad', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_orden_actividad',
            'id_orden',
            'id_actividad',
            'dias',
            'fecha_inicio',
            // 'fecha_final',
            // 'periodicidad',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
