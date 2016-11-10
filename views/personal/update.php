<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Personal */

$this->title = 'Update Personal: ' . $model->id_equipo;
$this->params['breadcrumbs'][] = ['label' => 'Personals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_equipo, 'url' => ['view', 'id_equipo' => $model->id_equipo, 'id_empleado' => $model->id_empleado]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="personal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
