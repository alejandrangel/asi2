<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\OrdenAutomotor */
?>
<div class="orden-automotor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'orden' => @$orden,
        'action' => "@web/orden-automotor/create"
    ]) ?>

</div>
