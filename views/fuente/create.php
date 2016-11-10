<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Fuente */

$this->title = 'Create Fuente';
$this->params['breadcrumbs'][] = ['label' => 'Fuentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fuente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
