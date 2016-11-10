<?php
/* @var $this yii\web\View */
/* @var $model app\models\ActividadPlanificada */


?>

    <?= $this->render('_form', [
        'model' => $model,
        'id_plan' => $id_plan,
        'action' => "@web/actividad-planificada/create"
    ]) ?>


