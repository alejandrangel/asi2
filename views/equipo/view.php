<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Equipo */

$this->title = "Equipo";
$estado = array("A"=>'Activo',"I"=>'Inactivo');
$this->registerJs("
    var EQUIPO = ".$model->id_equipo.";
",\yii\web\View::POS_HEAD);
?>
<div class="equipo-view">

    <div class="row">
        <div class="col-md-8">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="col-md-2">

        </div>
    </div>
    <div class="row">
        <div class="col-md-10">
            <?= \yii\helpers\Html::a('Volver', \yii\helpers\Url::to('@web/equipo'),['class'=>'btn btn-success']) ?>
            <?php if(util\Acf::hasRol(\util\Acf::SUPER) || util\Acf::hasRol(util\Acf::ADMIN)){
                echo \yii\helpers\Html::a('Inactivo/Activo','#',['class'=>'btn btn-success']);
            } ?>
        </div>
        <br />
        <br />
    </div>
    <div class="row">
        <div class="col-md-1">
            <label>Código</label>
        </div>
        <div class="col-md-4">
            <?= $model->id_equipo ?>
        </div>
        <div class="col-md-1">
            <label>Estado</label>
        </div>
        <div class="col-md-4">
            <?= @$estado[$model->estado] ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1">
            <label>Descripción</label>
        </div>
        <div class="col-md-10">
            <?= $model->descripcion ?>
        </div>
    </div>
</div>

<div>
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#Automotor">Automotor</a></li>
        <li><a data-toggle="tab" href="#Personal">Personal</a></li>
    </ul>
    <div class="tab-content">
        <div id="Automotor" class="tab-pane  active">
            <br />
            <button class="btn btn-success" data-toggle="modal" data-target="#dlg-buscar-automotor">Agregar Automotor</button>
            <div class="row">
              <div class="col-md-12">
                  <table class="table dataTable table-striped table-bordered" id="automotor-datarow" width="100%">
                      <thead>
                        <tr>
                            <td width="3%" style="min-width: 30px;">Código</td>
                            <td>Placa</td>
                            <td>Marca</td>
                            <td>Color</td>
                            <td width="10%" ></td>
                        </tr>
                      </thead>
                  </table>
              </div>
            </div>
        </div>
        <div id="Personal" class="tab-pane">
            <br />
            <button class="btn btn-success" data-toggle="modal" data-target="#dlg-buscar-personal">Agregar Empleado</button>
            <div class="row">
                <div class="col-md-12">
                    <table class="table dataTable table-striped table-bordered" id="personal-datarow" width="100%">
                        <thead>
                            <tr>
                                <td width="3%" style="min-width: 30px;">Código</td>
                                <td>Nombre</td>
                                <td>Apellido</td>
                                <td>Cargo</td>
                                <td width="10%" ></td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    $this->registerJs("
        var Automotores = $('#automotor-datarow').DataTable( {
                \"info\":     false,
                
                \"ajax\":\"".\yii\helpers\Url::base() ."/equipo/list-automotor-equipo?equipo=".$model->id_equipo."\",
                \"columns\":[
                    { \"data\": \"id_equipo\" },
                    { \"data\": \"marca\" },
                    { \"data\": \"color\" },
                    { \"data\": \"placa\" },
                    { \"data\": \"id_automor\" }
                ],
                \"columnDefs\": [
                  { \"width\": \"50px\", \"targets\": 0 }
                ],
                 \"aoColumns\": [{
                  \"mData\": 'id_automor'
                }, {
                  \"mData\": 'placa'
                }, {
                  \"mData\": 'marca'
                }, {
                  \"mData\": 'color'
                },  
                {
                  \"mData\": null,
                  \"bSortable\": false,
                  \"render\": function ( data, type, full, meta ) {
                    var pk = data.id_automor;
                    var links = '<a pk='+pk+' class=\"delete-action-automotor\" href=\"#\"><span class=\" glyphicon glyphicon-trash\"></span> </a>';
                    return  links;
                  }
                }],
                \"language\": {
                    \"url\":\"".\yii\helpers\Url::base() ."/js/locale/Spanish.json\"
                }
            });
            var Personal = $('#personal-datarow').DataTable( {
                \"info\":     false,
                
                \"ajax\":\"".\yii\helpers\Url::base() ."/equipo/list-empleado-equipo?equipo=".$model->id_equipo."\",
                \"columns\":[
                    { \"data\": \"id_empleado\" },
                    { \"data\": \"nombres\" },
                    { \"data\": \"apellidos\" },
                    { \"data\": \"descripcion\" }
                ],
                \"columnDefs\": [
                  { \"width\": \"50px\", \"targets\": 0 }
                ],
                 \"aoColumns\": [{
                  \"mData\": 'id_empleado'
                }, {
                  \"mData\": 'nombres'
                }, {
                  \"mData\": 'apellidos'
                }, {
                  \"mData\": 'descripcion'
                },  
                {
                  \"mData\": null,
                  \"bSortable\": false,
                  \"render\": function ( data, type, full, meta ) {
                    var pk = data.id_empleado;
                    var links = '<a pk='+pk+'  class=\"delete-action-empleado\" href=\"#\"><span class=\" glyphicon glyphicon-trash\"></span> </a>';
                    return  links;
                  }
                }],
                \"language\": {
                    \"url\":\"".\yii\helpers\Url::base() ."/js/locale/Spanish.json\"
                }
            });
            var autAdd = $('#automotor-datarow-select').DataTable( {
                \"info\":     false,
                
                \"ajax\":\"".\yii\helpers\Url::base() ."/automotor/list-all\",
                \"columns\":[
                    { \"data\": \"id_automotor\" },
                    { \"data\": \"placa\" },
                    { \"data\": \"marca\" },
                    { \"data\": \"modelo\" },
                    { \"data\": \"color\" }
                ],
                \"columnDefs\": [
                  { \"width\": \"50px\", \"targets\": 0 }
                ],
                 \"aoColumns\": [
                 {
                  \"mData\": 'id_automotor'
                },
                {
                  \"mData\": 'placa'
                },{
                  \"mData\": 'marca'
                },{
                  \"mData\": 'modelo'
                },{
                  \"mData\": 'color'
                }],
                \"language\": {
                    \"url\":\"".\yii\helpers\Url::base() ."/js/locale/Spanish.json\"
                }
            });
            var persAdd = $('#personal-datarow-select').DataTable( {
                \"info\":     false,
                
                \"ajax\":\"".\yii\helpers\Url::base() ."/empleado/list-all\",
                \"columns\":[
                    { \"data\": \"id_empleado\" },
                    { \"data\": \"nombres\" },
                    { \"data\": \"apellidos\" }
                ],
                \"columnDefs\": [
                  { \"width\": \"50px\", \"targets\": 0 }
                ],
                 \"aoColumns\": [
                 {
                  \"mData\": 'id_empleado'
                }
                ,{
                  \"mData\": 'nombres'
                },{
                  \"mData\": 'apellidos'
                }],
                \"language\": {
                    \"url\":\"".\yii\helpers\Url::base() ."/js/locale/Spanish.json\"
                }
            });
            $('#personal-datarow-select tbody').on('dblclick', 'tr', function () {
                var emp =  $(this).find('td').first().html();
                $.post( \"".\yii\helpers\Url::base()."/equipo/add-empleado\", { equipo: EQUIPO , empleado:emp  } ).done(function(data){
                    if(data.success){
                        Personal.ajax.reload();
                        $('#dlg-buscar-personal').modal('hide');
                        $('#err-p').html('');
                    }else{
                        $('#err-p').html(data.msj);
                    }
                });
            });
            $('#automotor-datarow-select tbody').on('dblclick', 'tr', function () {
                var aut =  $(this).find('td').first().html();
                $.post( \"".\yii\helpers\Url::base()."/equipo/add-automotor\", { equipo: EQUIPO , automotor:aut  } ).done(function(data){
                    if(data.success){
                        Automotores.ajax.reload();
                        $('#dlg-buscar-automotor').modal('hide');
                        $('#err-a').html('');
                    }else{
                        $('#err-a').html(data.msj);
                    }
                });
            });
    ",\yii\web\View::POS_END);
?>
    <div class="modal fade" id="dlg-buscar-automotor" tabindex="-1" role="dialog" aria-labelledby="automotor">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="">Seleccione un Automotor</h4>
                </div>
                <div class="modal-body">
                    <span id="err-a" style="color: red; font-size: 0.9em"></span>
                    <table class="table" id="automotor-datarow-select" style="width: 100%">
                        <thead>
                            <tr>
                                <td width="3%">Código</td>
                                <td width="3%">Placa</td>
                                <td>Marca</td>
                                <td>Modelo</td>
                                <td>Color</td>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>





    <div class="modal fade" id="dlg-buscar-personal" tabindex="-1" role="dialog" aria-labelledby="personal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="">Seleccione un Empleado</h4>
                </div>
                <div class="modal-body">
                    <span id="err-p" style="color: red; font-size: 0.9em"></span>
                    <table class="table" id="personal-datarow-select" style="width: 100%">
                        <thead>
                        <tr>
                            <td>Código</td>
                            <td>Nombre</td>
                            <td>Apellido</td>
                        </tr>
                        </thead>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>



<?php
$this->registerJsFile('@web/js/bootstrap.min.js', ['position'=>\yii\web\View::POS_END]);
$this->registerJs("
    $(document).on('click', '.delete-action-automotor', function() {
        var pk = $(this).attr('pk');
        if(confirm('Desea Eliminar el Registro?')){
            $.post('".\yii\helpers\Url::base()."/equipo/delete-automotor',{
                automotor: pk,
                equipo:EQUIPO
            }).done(function(data){
                Automotores.ajax.reload();
                return false;
            });
        }
    });    
    $(document).on('click', '.delete-action-empleado', function() {
        var pk = $(this).attr('pk');
        if(confirm('Desea Eliminar el Registro?')){        
            $.post('".\yii\helpers\Url::base()."/equipo/delete-empleado',{
                empleado: pk,
                equipo:EQUIPO
            }).done(function(data){
                Personal.ajax.reload();
                return false;
            });
        }
    });    
",\yii\web\View::POS_END);

$this->registerCss("#personal-datarow-select tbody tr:hover, #automotor-datarow-select tbody tr:hover{
    background:#337ab7;
    cursor:pointer;
    color:white;
}");