<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\OrdenAutomotor */

$this->title = $model->id_orden;
$this->params['breadcrumbs'][] = ['label' => 'Orden Automotors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orden-automotor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_orden' => $model->id_orden, 'id_automotor' => $model->id_automotor], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_orden' => $model->id_orden, 'id_automotor' => $model->id_automotor], [
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
            'km_inicial',
            'km_final',
            'codigo_vale',
            'monto',
            'id_orden',
            'id_automotor',
        ],
    ]) ?>

</div>
