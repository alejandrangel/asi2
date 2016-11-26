<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatalogoTabla */

$this->title = 'Update Catalogo Tabla: ' . $model->id_catalogo_tabla;
$this->params['breadcrumbs'][] = ['label' => 'Catalogo Tablas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_catalogo_tabla, 'url' => ['view', 'id' => $model->id_catalogo_tabla]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="catalogo-tabla-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
