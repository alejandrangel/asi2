<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Automotor */

$this->title = 'Actualizar Automotor: ' . $model->id_automotor;
$this->params['breadcrumbs'][] = ['label' => 'Automotors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_automotor, 'url' => ['view', 'id' => $model->id_automotor]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="automotor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
