<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tipo */

$this->title = $model->id_tipo;
$this->params['breadcrumbs'][] = ['label' => 'Tipos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Guardar', ['update', 'id' => $model->id_tipo], ['class' => 'btn btn-primary']) ?>    
<?= \yii\helpers\Html::a('Volver', Yii::$app->request->referrer,['class'=>'btn btn-success']) ?>		
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_tipo',
            'tipo',
        ],
    ]) ?>

</div>
