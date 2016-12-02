<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\CatalogoTabla;

/* @var $this yii\web\View */
/* @var $model app\models\Estado */

$this->title = $model->id_estado;
$this->params['breadcrumbs'][] = ['label' => 'Estados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estado-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_estado], ['class' => 'btn btn-primary']) ?>    
<?= \yii\helpers\Html::a('Volver', Yii::$app->request->referrer,['class'=>'btn btn-success']) ?>		
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_estado',
            'estado',
            'descripcion',
            //'id_tabla',
			[
                'attribute'=>'id_tabla',
                'value'=>CatalogoTabla::findOne($model->id_tabla)->nombre
            ],
        ],
    ]) ?>

</div>
