<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ColorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Colores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="color-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php
        $this->registerJs("$('.modal-backdrop').removeClass('modal-backdrop');", \yii\web\View::POS_END);
        echo \util\CustomDialog::widget(['options'=>[
            'id'=>'createColor',
        ],
            'header' => '<h2>'.Yii::t('app','New Color').'</h2>',
            'toggleButton' => ['label' => Yii::t('app','New Color') ,'class'=>'btn btn-success'],
            'content'=>
                $this->render('../color/create',['model'=>$model])
        ])
        ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_color',
            'color',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
