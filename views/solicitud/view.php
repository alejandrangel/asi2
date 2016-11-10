<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\DetailView;
use util\Util;
use app\models\Estado;
use app\models\Fuente;
use app\models\Usuario;
use app\models\Ruta;


/* @var $this yii\web\View */
/* @var $model app\models\Solicitud */

//$this->title = $model->id_solicitud;
$this->params['breadcrumbs'][] = ['label' => 'Solicitudes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitud-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Volver', ['index'], ['class' => 'btn btn-success']) ?>

        <?php
                if(\util\Acf::hasRol(\util\Acf::ADMIN)) 
                {
                    if ($model->id_estado == 1){
                    echo Html::a('Aprobar', ['aprobar', 'id' => $model->id_solicitud], [
                        'class' => 'btn btn-success',
                        'data' => [
                        'confirm' => 'Seguro que desea aprobar la solicitud?',
                        'method' => 'post',
                    ],
                    ]);
                }
                if ($model->id_estado == 1)
                {
                    \yii\bootstrap\Modal::begin([
                        'header' => '<h2>Rechazar solicitud</h2>',
                        'toggleButton' => ['label' => 'Rechazar','class'=>'btn btn-danger'],
                    ]);
                    echo   $this->render('rechazar', ['model' => $model,'action'=> 'solicitud/rechazar',   

                    ]) ;
                    \yii\bootstrap\Modal::end();
                }
            }
        ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_solicitud',
            'fecha',
            'telefono',
            'email:email',
            'nombre',
            'direccion:ntext',
            'observacion:ntext',
            [
                'attribute'=>'id_estado',
                'value'=>Estado::findOne($model->id_estado)->estado
            ],
            [
                'attribute'=>'id_fuente',
                'value'=>Fuente::findOne($model->id_fuente)->fuente
            ],
            'id_usuario',
            'referencia',
            [
                'attribute'=>'id_ruta',
                'value'=>Ruta::findOne($model->id_ruta)->nombre
            ],
        ],
    ]) ?>

</div>
