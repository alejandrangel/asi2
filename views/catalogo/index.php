<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CatalogoTablaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Catalogo Tablas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalogo-tabla-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Catalogo Tabla', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_catalogo_tabla',
            'nombre',

            //['class' => 'yii\grid\ActionColumn'],
			[
				'class' => 'yii\grid\ActionColumn',
				'template' =>'{view}{update}{web}',
				'buttons' =>[ function ($url,$model,$key){
					return $model->web != ''? Html::a(
					'<span class="glyphicon glyphicon-globe"</span>',
					$model->web) : '';
					},
				],
			],
        ],
    ]); ?>
</div>
