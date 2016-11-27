<?php


/* @var $this yii\web\View */
/* @var $model app\models\Plan */

?>
<div class="plan-update">

    <?= $this->render('_formNewPlan', [
        'model' => $model,
    	'action'=> '@web/plan/update?id='.Yii::app()->request->getQuery('id')
    ]) ?>

</div>
