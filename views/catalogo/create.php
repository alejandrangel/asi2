<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CatalogoTabla */

$this->title = 'Create Catalogo Tabla';
$this->params['breadcrumbs'][] = ['label' => 'Catalogo Tablas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalogo-tabla-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
