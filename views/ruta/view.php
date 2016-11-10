<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $model app\models\Ruta */

$this->title = $model->id_ruta;
$this->params['breadcrumbs'][] = ['label' => 'Rutas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ruta-view">


    <div class="row">
            <div class="col-md-12"><h2><?= $model->nombre ?></h2></div>
    </div>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_ruta], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_ruta], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro de elinimar?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <h4 style="text-align: center">Detalle</h4>
    <div class="row">
        <div>



            <?= GridView::widget([
                'dataProvider' => $colonias,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'id_ruta',
                    'id_colonia',
                    'orden',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>

        </div>
    </div>
</div>
