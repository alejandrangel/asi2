<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Herramienta */

$this->title = 'Update Herramienta: ' . $model->id_herramienta;
$this->params['breadcrumbs'][] = ['label' => 'Herramientas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_herramienta, 'url' => ['view', 'id' => $model->id_herramienta]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="herramienta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
