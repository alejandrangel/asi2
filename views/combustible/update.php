<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Combustible */

$this->title = 'Update Combustible: ' . $model->id_combustible;
$this->params['breadcrumbs'][] = ['label' => 'Combustibles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_combustible, 'url' => ['view', 'id' => $model->id_combustible]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="combustible-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
