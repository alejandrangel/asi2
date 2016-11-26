<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CatalogoTabla */

$this->title = $model->id_catalogo_tabla;
$this->params['breadcrumbs'][] = ['label' => 'Catalogo Tablas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalogo-tabla-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_catalogo_tabla], ['class' => 'btn btn-primary']) ?>        
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_catalogo_tabla',
            'nombre',
        ],
    ]) ?>

</div>
