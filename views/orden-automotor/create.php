<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\OrdenAutomotor */
?>
<div class="orden-automotor-create">

    <?= $this->render('_form', [
        'model' => $model,
        'orden' => @$orden,
        'action' => "@web/orden-automotor/create"
    ]) ?>

</div>
