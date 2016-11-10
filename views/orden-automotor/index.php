<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orden Automotors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orden-automotor-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Orden Automotor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'km_inicial',
            'km_final',
            'codigo_vale',
            'monto',
            'id_orden',
            // 'id_automotor',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
