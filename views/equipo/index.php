<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Equipos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Nuevo Equipo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php
    $this->registerJs("
           var eDtb = $('#equipo-datarow').DataTable( {
                \"ordering\": false,
                \"ajax\":\"".\yii\helpers\Url::base() ."/equipo/list\",
                \"columns\":[
                    { \"data\": \"id_equipo\"   },
                    { \"data\": \"descripcion\" }
                ],
                \"aoColumns\": [{
                  \"mData\": 'id_equipo'
                }, {
                  \"sWidth\": \"80%\",
                  \"mData\": 'descripcion'
                }, 
                {
                  \"mData\": null,
                  \"bSortable\": false,
                  \"mRender\": function(data, type, full) {
                  
                    return '<a class=\"\" href=".\yii\helpers\Url::base()."/equipo/view?id=' + full['id_equipo'] + '><span class=\"glyphicon glyphicon-eye-open\"></span> </a>';
                  }
                }]
                ,
                \"language\": {
                    \"url\":\"".\yii\helpers\Url::base() ."/js/locale/Spanish.json\"
                }
            });
    ", \yii\web\View::POS_END);
    ?>

    <table class="table table-striped table-bordered dataTable" id="equipo-datarow" style="width: 100%">
        <thead>
        <tr>
            <td width="10%">Código</td>
            <td width="80%">Equipo</td>
            <td width="10%"></td>
        </tr>
        </thead>
    </table>

</div>
