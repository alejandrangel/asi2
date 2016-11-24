<?php

/* @var $this yii\web\View */
/* @var $model app\models\Plan */
?>
<div class="plan-create">
    <?= $this->render('_formNewPlan', [
        'model' => $model,
    	'action'=> '@web/plan/create',
    ]) ?>

</div>
