<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Fuente */

$this->title = 'Update Fuente: ' . $model->id_fuente;
$this->params['breadcrumbs'][] = ['label' => 'Fuentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_fuente, 'url' => ['view', 'id' => $model->id_fuente]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fuente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
