<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DiaAsueto */

$this->title = $model->id_dia_asueto;
$this->params['breadcrumbs'][] = ['label' => 'Dias Asueto', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dia-asueto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_dia_asueto], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_dia_asueto], [
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
            'id_dia_asueto',
            'fecha',
            'plan',
        ],
    ]) ?>

</div>
