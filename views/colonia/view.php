<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Distrito;

/* @var $this yii\web\View */
/* @var $model app\models\Colonia */

$this->title = $model->id_colonia;
$this->params['breadcrumbs'][] = ['label' => 'Colonias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="colonia-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_colonia], ['class' => 'btn btn-primary']) ?>
		<?= \yii\helpers\Html::a('Volver', Yii::$app->request->referrer,['class'=>'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_colonia',
            'nombre',
            [
                'attribute'=>'id_distrito',
                'value'=>Distrito::findOne($model->id_distrito)->nombre
            ],
        ],
    ]) ?>

</div>
