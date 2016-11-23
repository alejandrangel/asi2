<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DiaAsueto */

$this->title = 'Update Dia Asueto: ' . $model->id_dia_asueto;
$this->params['breadcrumbs'][] = ['label' => 'Dia Asuetos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_dia_asueto, 'url' => ['view', 'id' => $model->id_dia_asueto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dia-asueto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
