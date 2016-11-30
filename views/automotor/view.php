<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Modelo;
use app\models\Tipo;
use app\models\Estado;
use app\models\Color;
use app\models\Combustible;


/* @var $this yii\web\View */
/* @var $model app\models\Automotor */

$this->title = $model->id_automotor;
$this->params['breadcrumbs'][] = ['label' => 'Automotors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="automotor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_automotor], ['class' => 'btn btn-primary']) ?>    
		<?= \yii\helpers\Html::a('Volver', Yii::$app->request->referrer,['class'=>'btn btn-success']) ?>		
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_automotor',
            'placa',
            //'modelo',
			[
                'attribute'=>'modelo',
                'value'=>Modelo::findOne($model->modelo)->modelo
            ],
            'anio',
            'capacidad',
            //'tipo',
			[
                'attribute'=>'tipo',
                'value'=>Tipo::findOne($model->tipo)->tipo
            ],
            //'estado',
			[
                'attribute'=>'estado',
                'value'=>Estado::findOne($model->estado)->estado
            ],			
            'chasis',
            //'color',
			[
                'attribute'=>'color',
                'value'=>Color::findOne($model->color)->color
            ],
            'numero_motor',
            //'combustible',
			[
                'attribute'=>'combustible',
                'value'=>Combustible::findOne($model->combustible)->combustible
            ],
        ],
    ]) ?>

</div>
