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
                  \"render\": function ( data, type, full, meta ) {
                    var pk = data.id_equipo;
                    var links = '<a class=\"\" href=".\yii\helpers\Url::base()."/equipo/view?id=' + full['id_equipo'] + '><span class=\"glyphicon glyphicon-eye-open\"></span> </a><a class=\"edit-action-equipo\" pk='+pk+' href=\"#\"><span class=\"glyphicon glyphicon-pencil\"></span> </a><a pk='+pk+' class=\"delete-action-equipo\" href=\"#\"><span class=\" glyphicon glyphicon-trash\"></span> </a>';
                    return  links;
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


<?php
$this->registerJsFile('@web/js/bootstrap.min.js', ['position'=>\yii\web\View::POS_END]);
$this->registerJs("

$(document).on('click', '.delete-action-equipo', function() {
    var pk = $(this).attr('pk');
    if(confirm('Desea eliminar el registro?')){
        $.post(
            \"".\yii\helpers\Url::base()."/equipo/delete-ajax\",
            {
                id: pk
            }
        ).done(function(data){
            if(data.success){
                   eDtb.ajax.reload();
            }});
    }
});", \yii\web\View::POS_END);

        
?>