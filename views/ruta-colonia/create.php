<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RutaColonia */

$this->title = 'Create Ruta Colonia';
$this->params['breadcrumbs'][] = ['label' => 'Ruta Colonias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ruta-colonia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
