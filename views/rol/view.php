<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Rol */

$this->title = $model->id_rol;
$this->params['breadcrumbs'][] = ['label' => 'Rols', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rol-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_rol], ['class' => 'btn btn-primary']) ?>     
		<?= \yii\helpers\Html::a('Volver', Yii::$app->request->referrer,['class'=>'btn btn-success']) ?>		
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_rol',
            'rol',
            //'activo',
			[
                'attribute'=>'activo',
                'value'=>(($model->activo =="1") ? "Activo":"Inactivo"),
            ],
        ],
    ]) ?>

</div>
