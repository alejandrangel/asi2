<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ColoniaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Colonias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="colonia-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Colonia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_colonia',
            'nombre',
            'id_distrito',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
