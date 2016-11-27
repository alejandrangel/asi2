<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Equipo */

$this->title = "Equipo";
?>
<div class="equipo-view">

    <div class="row">
        <div class="col-md-8">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="col-md-2">
            <?= \yii\helpers\Html::a('Volver', Yii::$app->request->referrer,['class'=>'btn btn-success']) ?>
        </div>
    </div>
    <br />
    <br />
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
            <?= $model->estado ?>
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
        </div>
        <div id="Personal" class="tab-pane ">
            <br />
            <button class="btn btn-success" data-toggle="modal" data-target="#dlg-buscar-personal">Agregar Automotor</button>
        </div>
    </div>
</div>




    <div class="modal fade" id="dlg-buscar-automotor" tabindex="-1" role="dialog" aria-labelledby="automotor">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="">Seleccione un Automotor</h4>
                </div>
                <div class="modal-body">
                    <table class="table" id="automotor-datarow-select" style="width: 100%">
                        <thead>
                        <tr>
                            <td>Placa-Automotor</td>
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
                    <table class="table" id="automotor-datarow-select" style="width: 100%">
                        <thead>
                        <tr>
                            <td>Empleado</td>
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
    
",\yii\web\View::POS_END);
