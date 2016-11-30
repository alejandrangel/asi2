<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orden Trabajos';



?>
<?php
$this->registerJs("
           var eDtb = $('#ordenes-datarow').DataTable( {
             
                \"ajax\":\"".\yii\helpers\Url::base() ."/orden/list-all\",
                \"columns\":[
                    { \"data\": \"id\"   },
                    { \"data\": \"orden\" },
                    { \"data\": \"estado\" },
                    { \"data\": \"fecha\" }
                ],
                \"aoColumns\": [{
                  \"mData\": 'id'
                }, {
                  \"sWidth\": \"20%\",
                  \"mData\": 'orden'
                }, {
                  \"sWidth\": \"20%\",
                  \"mData\": 'estado'
                }, {
                  \"sWidth\": \"20%\",
                  \"mData\": 'fecha'
                }, 
                {
                  \"mData\": null,
                  \"bSortable\": false,
                  \"mRender\": function(data, type, full) {
                  
                    return '<a class=\"\" href=".\yii\helpers\Url::base()."/orden/view?id=' + full['id'] + '><span class=\"glyphicon glyphicon-eye-open\"></span> </a>';
                  }
                }]
                ,
                \"language\": {
                    \"url\":\"".\yii\helpers\Url::base() ."/js/locale/Spanish.json\"
                }
            });
    ", \yii\web\View::POS_END);
?>
<div class="orden-trabajo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <table class="table table-striped table-bordered dataTable" id="ordenes-datarow" style="width: 100%">
        <thead>
        <tr>
            <td width="10%">Código</td>
            <td width="40%">Orden Trabajo</td>
            <td width="25%">Estado</td>
            <td width="15%">Fecha</td>
            <td width="10%"></td>
        </tr>
        </thead>
    </table>
    </p>
</div>
