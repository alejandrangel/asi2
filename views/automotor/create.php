<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Automotor */

$this->title = 'Create Automotor';
$this->params['breadcrumbs'][] = ['label' => 'Automotors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="automotor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
