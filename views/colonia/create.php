<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Colonia */

$this->title = 'Create Colonia';
$this->params['breadcrumbs'][] = ['label' => 'Colonias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="colonia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
