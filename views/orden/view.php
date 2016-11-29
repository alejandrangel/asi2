<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\OrdenTrabajo */

$this->title = 'Orden de Trabajo ';
$tipo = array("E"=>"Eventual","P"=>"Programada");


$this->registerJs("var OrdenLoad = ".$model->id_orden_trabajo.";", \yii\web\View::POS_HEAD);
?>
<div class="orden-trabajo-view">

       <div class="row">
           <div class="col-md-8">
               <h1><?= Html::encode($this->title) ?></h1>
           </div>
           <div class="col-md-1" style="margin-top: 12px;">
               <?php if(util\Acf::hasRol(\util\Acf::SUPER)){
                   switch ($model->id_estado) {
                       case 1:
                   ?>
                       <button class="btn btn-info" id="ejecutar">Ejecutar</button>
                   <?php break;
                   }
               }
               ?>
           </div>
       </div>


    <p>
        <?php // Html::a('Update', ['update', 'id' => $model->id_orden_trabajo], ['class' => 'btn btn-primary']) ?>
    </p>

    <div class="row">
        <div class="col-md-2">
            <label>Código: </label>
        </div>
        <div class="col-md-4">
               <span><?= str_pad($model->id_orden_trabajo,5,0,STR_PAD_LEFT) ?></span>
        </div>
        <div class="col-md-2">
            <label>Estado:</label>
        </div>
        <div class="col-md-4">
                <span class="text-success" style="font-size: 1.2em"><?= $model->getEstado() ?></span>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <label>Fecha Inicial: </label>
        </div>
        <div class="col-md-4">
            <span><?= date('d/m/Y',strtotime($model->fecha_inicio)) ?></span>
        </div>
        <div class="col-md-2">
            <label>Fecha Final:</label>
        </div>
        <div class="col-md-4">
            <span><?= date('d/m/Y',strtotime($model->fecha_final)) ?></span>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <label>Tipo: </label>
        </div>
        <div class="col-md-4">
            <span><?= @$tipo[$model->tipo]  ?></span>
        </div>
        <div class="col-md-1">
            <label>Actividad:</label>
        </div>
        <div class="col-md-1">
            <?php if(util\Acf::hasRol(\util\Acf::SUPER)){
                if($model->id_estado ==1 && $model->tipo =='E') {?>
                        <button  id="buscar-actividad" data-toggle="modal" data-target="#dlg-buscar-actividad">
                            <i class="glyphicon-search glyphicon"></i>
                        </button>
           <?php }
            }
            ?>
        </div>
        <div class="col-md-4" id="actividadLabel">
            <span >
             <?= @\app\models\Actividad::findOne($model->actividad)->actividad ?>
            </span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1">
            <label>Equipo:</label>
        </div>
        <div class="col-md-1">
            <?php if(util\Acf::hasRol(\util\Acf::SUPER)){
                if($model->id_estado == 1) {
                        ?>
                        <button  id="buscar-equipo" data-toggle="modal" data-target="#dlg-buscar-equipo">
                            <i class="glyphicon-search glyphicon"></i>
                        </button>
                <?php }
            }
            ?>
        </div>
        <div class="col-md-9" id="equipoLabel">
            <?= @\app\models\Equipo::findOne($model->id_equipo)->descripcion ?>
        </div>
    </div>


    <?php

    $this->registerJs("
             var Automotores = $('#automotor-datarow').DataTable( {
                \"info\":     false,
                \"ajax\":\"".\yii\helpers\Url::base() ."/orden-automotor/list-all?orden=\"+OrdenLoad,
                \"columns\":[
                    { \"data\": \"placa\" },
                    { \"data\": \"km_inicial\" },
                    { \"data\": \"km_final\" },
                    { \"data\": \"codigo_vale\" },
                    { \"data\": \"monto\" }
                ],
                 \"aoColumns\": [{
                  \"mData\": 'placa'
                }, {
                  \"mData\": 'km_inicial'
                }, {
                  \"mData\": 'km_final'
                }, {
                  \"mData\": 'codigo_vale'
                }, 
                {
                  \"mData\": 'monto'
                }, 
                {
                  \"mData\": null,
                  \"bSortable\": false,
                  \"render\": function ( data, type, full, meta ) {
                    var pk = data.id_automotor;
                    var links = '<a class=\"edit-action-automotor\" pk='+pk+' href=\"#\"><span class=\"glyphicon glyphicon-pencil\"></span> </a><a pk='+pk+' class=\"delete-action-automotor\" href=\"#\"><span class=\" glyphicon glyphicon-trash\"></span> </a>';
                    return  links;
                  }
                }],
                \"language\": {
                    \"url\":\"".\yii\helpers\Url::base() ."/js/locale/Spanish.json\"
                }
            });
            
            var Herramienta = $('#herramienta-datarow').DataTable( {
                \"info\":     false,
                \"ajax\":\"".\yii\helpers\Url::base() ."/orden-herramienta/list-all?orden=\"+OrdenLoad,
                \"columns\":[
                    { \"data\": \"id_herramienta\" },
                    { \"data\": \"descripcion\" },
                ],
                 \"aoColumns\": [{
                  \"mData\": 'descripcion'
                },
                {
                  \"mData\": null,
                  \"bSortable\": false,
                  \"mRender\": function(data, type, full) {
                    var pk = data.id_herramienta;
                    return '<a pk='+ pk +' class=\"delete-herramienta-action\" href=\"#\"><span class=\"glyphicon glyphicon-trash\"></span> </a>';
                  }
                }],
                \"language\": {
                    \"url\":\"".\yii\helpers\Url::base() ."/js/locale/Spanish.json\"
                }
            });
            var Personal = $('#personal-datarow').DataTable( {
                \"info\":     false,
                \"ajax\":\"".\yii\helpers\Url::base() ."/orden-personal/list-all?orden=\"+OrdenLoad,
                \"columns\":[
                    { \"data\": \"id_empleado\" },
                    { \"data\": \"nombres\" },
                    { \"data\": \"apellidos\" }
                ],
                 \"aoColumns\": [{
                  \"mData\": 'nombres'
                },
                {
                  \"mData\": 'apellidos'
                },
                {
                  \"mData\": null,
                  \"bSortable\": false,
                  \"mRender\": function(data, type, full) {
                    var pk = data.id_empleado;
                    return '<a class=\"delete-personal-action\" pk='+pk+' href=\"#\"><span class=\"glyphicon glyphicon-trash\"></span> </a>';
                  }
                }],
                \"language\": {
                    \"url\":\"".\yii\helpers\Url::base() ."/js/locale/Spanish.json\"
                }
            });
            
            var Entrega = $('#entrega-datarow').DataTable( {
                \"info\":     false,
                \"ajax\":\"".\yii\helpers\Url::base() ."/entrega/list-all?orden=\"+OrdenLoad,
                \"columns\":[
                    { \"data\": \"id_entrega\" },
                    { \"data\": \"tonelada\" },
                    { \"data\": \"fecha\" },
                    { \"data\": \"id_orden_trabajo\" }
                ],
                 \"aoColumns\": [{
                  \"mData\": 'tonelada'
                },
                {
                  \"mData\": 'fecha'
                },
                {
                  \"mData\": null,
                  \"bSortable\": false,
                  \"mRender\": function(data, type, full) {
                    return '<a class=\"\" href=\"#\"><span class=\"glyphicon glyphicon-pencil\"></span> </a><a class=\"\" href=\"#\"><span class=\"glyphicon glyphicon-trash\"></span> </a>';
                  }
                }],
                \"language\": {
                    \"url\":\"".\yii\helpers\Url::base() ."/js/locale/Spanish.json\"
                }
            });
            
    ", \yii\web\View::POS_END);

    ?>

    <br />
    <div class="row">
        <div class="col-md-12">
            <div>
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#Automotores">Automotores</a></li>
                    <li><a data-toggle="tab" href="#Herramientas">Herramientas</a></li>
                    <li><a data-toggle="tab" href="#Personal">Personal</a></li>
                    <li class="hide"><a data-toggle="tab" href="#Entrega">Entrega</a></li>
                </ul>

                <div class="tab-content">
                    <div id="Automotores" class="tab-pane  active">
                        <br />
                        <?php if($model->id_estado ==1){ ?>

                            <button class="btn btn-success" data-toggle="modal" data-target="#dlg-addautomotor">Agregar Automotor</button>


                        <br /><br />
                        <?php } ?>
                        <table id="automotor-datarow" class="table" width="100%">
                            <thead>
                                <tr>
                                    <td>Placa</td>
                                    <td>KM Inicial</td>
                                    <td>KM Final</td>
                                    <td>Vale</td>
                                    <td>Monto del Vale</td>
                                    <td></td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div id="Herramientas" class="tab-pane fade">
                        <br />
                        <?php if($model->id_estado ==1){ ?>


                            <button class="btn btn-success" data-toggle="modal" data-target="#dlg-buscar-addherramienta">Agregar Herramienta</button>

                        <br /><br />
                        <?php } ?>
                        <table id="herramienta-datarow" class="table" width="100%">
                            <thead>
                            <tr>
                                <td width="95%">Herramienta</td>
                                <td width="5%"></td>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <div id="Personal" class="tab-pane fade">
                        <br />
                        <?php if($model->id_estado ==1){ ?>


                            <button class="btn btn-success"  data-toggle="modal" data-target="#dlg-buscar-addpersonal" >Agregar Personal</button>

                        <br /><br />
                        <?php } ?>
                        <table id="personal-datarow" class="table" width="100%">
                            <thead>
                            <tr>
                                <td width="45%">Nombres</td>
                                <td width="50%">Apellidos</td>
                                <td width="5%"></td>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <div id="Entrega" class="tab-pane fade hide">
                        <br />

                        <button class="btn btn-success">Agregar Detalle de Entrega</button>
                        <br /><br />
                        <table id="entrega-datarow" class="table" width="100%">
                            <thead>
                            <tr>
                                <td width="50%">Toneladas</td>
                                <td width="45%">Fecha</td>
                                <td width="5%"></td>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

    <?php
    $this->registerJs("
           
           var eDtb = $('#equipo-datarow').DataTable( {
                \"info\":     false,
                \"ajax\":\"".\yii\helpers\Url::base() ."/equipo/list\",
                \"columns\":[
                    { \"data\": \"id_equipo\" },
                    { \"data\": \"descripcion\" }
                ],
                \"language\": {
                    \"url\":\"".\yii\helpers\Url::base() ."/js/locale/Spanish.json\"
                }
            });
            
            var eDtb = $('#actividad-datarow').DataTable( {
                \"info\":     false,
                \"ajax\":\"".\yii\helpers\Url::base() ."/actividad/list\",
                \"columns\":[
                    { \"data\": \"id_actividad\" },
                    { \"data\": \"actividad\" }
                ],
                \"language\": {
                    \"url\":\"".\yii\helpers\Url::base() ."/js/locale/Spanish.json\"
                }
            });
            
            var DtHerramientas = $('#heramienta-datarow-select').DataTable( {
                \"info\":     false,
                \"ajax\":\"".\yii\helpers\Url::base() ."/herramienta/list-all\",
                \"columns\":[
                    { \"data\": \"id_herramienta\" },
                    { \"data\": \"descripcion\" }
                ],
                \"language\": {
                    \"url\":\"".\yii\helpers\Url::base() ."/js/locale/Spanish.json\"
                }
            });
            
            var DtEmpleado = $('#empleado-datarow-select').DataTable( {
                \"info\":     false,
                \"ajax\":\"".\yii\helpers\Url::base() ."/empleado/list-all\",
                \"columns\":[
                    { \"data\": \"id_empleado\" },
                    { \"data\": \"nombres\" },
                    { \"data\": \"apellidos\" }
                ],
                \"language\": {
                    \"url\":\"".\yii\helpers\Url::base() ."/js/locale/Spanish.json\"
                }
            });
            
            var equipoId, equipoDes,herramientaId;
            var actividadId, actividadDes,empleadoId;
            
            $('#equipo-datarow tbody').on('dblclick', 'tr', function () {
                equipoId =  $(this).find('td').first().html();
                equipoDes = $(this).find('td').last().html();
                $.post( \"".\yii\helpers\Url::base()."/orden-empleado/load-team\", { team: equipoId , orden:OrdenLoad  } ).done(function(data){
                    $('#equipoLabel').html(equipoDes);
                    Automotores.ajax.reload();
                    Personal.ajax.reload();
                    $('#dlg-buscar-equipo').modal('hide');
                });
                //var upd = $('#datatables_equipo-dtable').DataTable();
                //upd.ajax.reload();
            });
            $('#actividad-datarow tbody').on('dblclick', 'tr', function () {
                
                actividadId =  $(this).find('td').first().html();
                actividadDes = $(this).find('td').last().html();
                $.post( \"".\yii\helpers\Url::base()."/orden/actividad\", { actividad: actividadId , orden:OrdenLoad  } ).done(function(data){
                    $('#actividadLabel').html(actividadDes);
                    $('#dlg-buscar-actividad').modal('hide');
                });
                //var upd = $('#datatables_actividad-dtable').DataTable();
                //upd.ajax.reload();
            });
            
            $('#heramienta-datarow-select tbody').on('dblclick', 'tr', function () {
                herramientaId =  $(this).find('td').first().html();
                $.post( \"".\yii\helpers\Url::base()."/orden-herramienta/create\", { herramienta: herramientaId , orden:OrdenLoad  } ).done(function(data){
                    if(data.success){
                        $('#dlg-buscar-addherramienta').modal('hide');
                        Herramienta.ajax.reload();
                    }
                });
            });
            
            $('#empleado-datarow-select tbody').on('dblclick', 'tr', function () {
                empleadoId =  $(this).find('td').first().html();
                $.post( \"".\yii\helpers\Url::base()."/orden-empleado/create\", { empleado: empleadoId , orden:OrdenLoad  } ).done(function(data){
                    if(data.success){
                        $('#dlg-buscar-addpersonal').modal('hide');
                        Personal.ajax.reload();
                    }
                });
            });

    ", \yii\web\View::POS_END);
    ?>
    <!-- Modal -->
    <div class="modal fade" id="dlg-buscar-equipo" tabindex="-1" role="dialog" aria-labelledby="Equipo">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="">Seleccione un equipo</h4>
                </div>
                <div class="modal-body">
                    <table class="table" id="equipo-datarow" style="width: 100%">
                        <thead>
                            <tr>
                                <td width="10%">Código</td>
                                <td>Equipo</td>
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

<div class="modal fade" id="dlg-buscar-actividad" tabindex="-1" role="dialog" aria-labelledby="Actividad">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="">Seleccione una Actividad</h4>
            </div>
            <div class="modal-body">
                <table class="table" id="actividad-datarow" style="width: 100%">
                    <thead>
                    <tr>
                        <td width="10%">Código</td>
                        <td>Actividad</td>
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

    <div class="modal fade" id="dlg-buscar-addherramienta" tabindex="-1" role="dialog" aria-labelledby="Herramienta">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="">Seleccione un Herramienta</h4>
                </div>
                <div class="modal-body">
                    <table class="table" id="heramienta-datarow-select" style="width: 100%">
                        <thead>
                        <tr>
                            <td width="10%">Código</td>
                            <td>Herramienta</td>
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



    <div class="modal fade" id="dlg-buscar-addpersonal" tabindex="-1" role="dialog" aria-labelledby="Empleados">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="">Seleccione un Empleado</h4>
                </div>
                <div class="modal-body">
                    <table class="table" id="empleado-datarow-select" style="width: 100%">
                        <thead>
                        <tr>
                            <td width="10%">Código</td>
                            <td>Nombres</td>
                            <td>Apellidos</td>
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



<div class="modal fade" id="dlg-addautomotor" tabindex="-1" role="dialog" aria-labelledby="Autormotor">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="">Agregar un Automotor</h4>
    </div>
    <div class="modal-body">
    <?php
        $automotor = new \app\models\OrdenAutomotor();
        $automotor->id_orden = $model->id_orden_trabajo;
        echo $this->render('../orden-automotor/create', [
            'model' => $automotor,
            'orden' => $model->id_orden_trabajo
        ]) ;
    ?>
    </div>
    </div>
    </div>
</div>

    <div class="modal fade" id="dlg-editautomotor" tabindex="-1" role="dialog" aria-labelledby="Autormotor">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="">Editar Automotor</h4>
                </div>
                <div class="modal-body">
                    <div id="editAutomotor-content">

                    </div>
                </div>
            </div>
        </div>
    </div>




<?php
$this->registerJsFile('@web/js/bootstrap.min.js', ['position'=>\yii\web\View::POS_END]);
$this->registerJs("
    
    $(document).on('click', '.edit-action-automotor', function() {
        var pk = $(this).attr('pk');
        $.post('".\yii\helpers\Url::base()."/orden-automotor/load-form',{
            orden: OrdenLoad,
            automotor: pk
        }).done(function(data){
            $('#editAutomotor-content').html(data); 
            $('#dlg-editautomotor').modal('show');
            
            
            $('form#OrdenAutomotor_edit_dlg').on('beforeSubmit',function(e){
            var \$form = $(this);
            $.post(
                \$form.attr('action'),
                \$form.serialize()
            ).done(function(data){
                if(data.success == true){
                    \$form.trigger('reset');
                    \$('#dlg-editautomotor').modal('hide');
                    Automotores.ajax.reload();
                }
            })
            return false;
        });
            
        });    
    });
    $(document).on('click', '.delete-action-automotor', function() {
        var pk = $(this).attr('pk');
        if(confirm('Desea eliminar el registro?')){
            $.post(
               \"".\yii\helpers\Url::base()."/orden-automotor/delete\",
                {
                    orden: OrdenLoad,
                    automotor: pk
                }
            ).done(function(data){
                   if(data.success){
                        Automotores.ajax.reload();
                   }
            });
        }       
    });  
    
    $(document).on('click', '.delete-herramienta-action', function() {
        var pk = $(this).attr('pk');
        if(confirm('Desea eliminar el registro?')){
            $.post(
               \"".\yii\helpers\Url::base()."/orden-herramienta/delete\",
                {
                    orden: OrdenLoad,
                    herrameinta: pk
                }
            ).done(function(data){
                   if(data.success){
                        Herramienta.ajax.reload();
                   }
            });
        }       
    });
    $(document).on('click', '.delete-personal-action', function() {
        var pk = $(this).attr('pk');
        if(confirm('Desea eliminar el registro?')){
            $.post(
               \"".\yii\helpers\Url::base()."/orden-empleado/delete\",
                {
                    orden: OrdenLoad,
                    empleado: pk
                }
            ).done(function(data){
                   if(data.success){
                        Personal.ajax.reload();
                   }
            });
        }       
    });
    
    $('#ejecutar').click(function(){
        if(confirm('Esta seguro de iniciar la ejecución?   No se podra editar la orden de trabajo')){
        $.post(
            \"".\yii\helpers\Url::base()."/orden/ejecutar\",
            {
                orden: OrdenLoad
            }
        ).done(function(data){
            if(data.success){
                location.reload();
            }
        });
        }
    });
    
    
",\yii\web\View::POS_END);
?>