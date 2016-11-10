<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DiaAsueto */

$this->title = 'Create Dia Asueto';
$this->params['breadcrumbs'][] = ['label' => 'Dia Asuetos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dia-asueto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
