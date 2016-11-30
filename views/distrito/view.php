<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Distrito */

$this->title = $model->id_distrito;
$this->params['breadcrumbs'][] = ['label' => 'Distritos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="distrito-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_distrito], ['class' => 'btn btn-primary']) ?>  
		<?= \yii\helpers\Html::a('Volver', Yii::$app->request->referrer,['class'=>'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_distrito',
            'nombre',
        ],
    ]) ?>

</div>
