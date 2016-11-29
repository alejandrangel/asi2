<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\DetailView;
use util\Util;
use app\models\Estado;
use app\models\Fuente;
use app\models\Usuario;
use app\models\Colonia;
use app\models\Solicitud;
use yii\helpers\Url;
use yii\bootstrap\Modal;    

/* @var $this yii\web\View */
/* @var $model app\models\Solicitud */

//$this->title = $model->id_solicitud;
$this->params['breadcrumbs'][] = ['label' => 'Solicitudes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitud-view">

    <h1><?= Html::encode($this->title) ?></h1>

        <?= Html::a('Volver', ['index'], ['class' => 'btn btn-success']) ?>


        <?php
                if(\util\Acf::hasRol(\util\Acf::ADMIN)) 
                {
                    if ($model->id_estado == 1){

                    Modal::begin([
                        'header' => '<h2>¿Desea aprobar la solicitud?</h2>',
                        'toggleButton' => ['label' => 'Aprobar','class'=>'btn btn-success'],
                    ]);
                    echo $this->render('_aprobar', ['model' => new Solicitud()]) ;
                    Modal::end();   
                     
                    Modal::begin([
                        'header' => '<h2>¿Desea rechazar la solicitud?</h2>',
                        'toggleButton' => ['label' => 'Rechazar','class'=>'btn btn-danger'],
                    ]);
                    echo $this->render('_rechazar', ['model' => new Solicitud()]) ;
                    Modal::end();                    
                }

            }
        ?>

    <p></p>
  

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_solicitud',
            [
                'attribute'=>'fecha',
                'format'   => ['date', 'php:d/m/Y']
            ],
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
            [
                'attribute'=>'id_usuario',
                'value'=>Usuario::findOne($model->id_usuario)->nombre
            ],
            'referencia',
            [
                'attribute'=>'id_colonia',
                'value'=>Colonia::findOne($model->id_colonia)->nombre
            ],
            'comentario:ntext',
        ],
    ]) ?>


</div>
