<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Color */

$this->title = 'Update Color: ' . $model->id_color;
$this->params['breadcrumbs'][] = ['label' => 'Colors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_color, 'url' => ['view', 'id' => $model->id_color]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="color-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
