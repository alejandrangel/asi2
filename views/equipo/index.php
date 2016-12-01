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

        <button type="button" id="dlg-nuevo" class="btn btn-success"  >Nuevo Equipo</button>
    </p>
    <div class="row">
        <div class="col-md-12">
            <span style="color: red; font-size: 0.9em" id="err"></span>
        </div>
    </div>
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
                    var ds = data.descripcion;
                    var links = '<a class=\"\" href=".\yii\helpers\Url::base()."/equipo/view?id=' + full['id_equipo'] + '><span class=\"glyphicon glyphicon-eye-open\"></span> </a><a class=\"edit-action-equipo\" pk='+pk+' data=\"'+ds+'\" ><span class=\"glyphicon glyphicon-pencil\"></span> </a><a pk='+pk+' class=\"delete-action-equipo\" href=\"#\"><span class=\" glyphicon glyphicon-trash\"></span> </a>';
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




    <div class="modal fade" id="dlg-edit-equipo" tabindex="-1" role="dialog" aria-labelledby="personal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="">Equipo</h4>
                </div>
                <?php $form = \yii\widgets\ActiveForm::begin(
                    [
                        'action'=>'@web/equipo/save',
                        'id'=> 'editForm',
                        'enableAjaxValidation' => true,
                        'validationUrl' => \yii\helpers\Url::to('@web/equipo/equipo-validation')

                    ]
                );
                ?>
                <div class="modal-body">
                    <span id="err-e" style="color: red; font-size: 0.9em"></span>

                        <?php  $equipoEdit = new \app\models\Equipo(); ?>
                        <?= $form->field($equipoEdit, 'descripcion')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($equipoEdit, 'id_equipo')->hiddenInput()->label(false); ?>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" >Guardar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
                <?php \yii\widgets\ActiveForm::end(); ?>
            </div>
        </div>
    </div>



<?php
$this->registerJsFile('@web/js/bootstrap.min.js', ['position'=>\yii\web\View::POS_END]);

$this->registerJs("



$(document).on('click', '.delete-action-equipo', function() {
    $('#err').html('');
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
            }else{
                $('#err').html(data.error);
            }
       });
    }
});

$(document).on('click', '.edit-action-equipo', function() {
    $('#err').html('');
    var pk = $(this).attr('pk');
    var ds = $(this).attr('data');
    
    $('#equipo-id_equipo').val(pk);
    $('#equipo-descripcion').val(ds);
    
    $('#dlg-edit-equipo').modal('show');
});


$(document).on('beforeSubmit','#editForm',function(){
            $('#err-e').html('');
            var form = $(this);                                 
            if(form.find('.has-error').length) {
                return false;
            }  
            $.post('".\yii\helpers\Url::to('@web/equipo/save')."',form.serialize()).done(function(data){
                  if(data.success){  
                        eDtb.ajax.reload();
                        $('#dlg-edit-equipo').modal('hide');
                        form.find('input[type = text], textarea').val('');
                   }else{
                        $('#err-e').html(data.error);
                   }
            });            
            return false;
});
$('#dlg-nuevo').click(function(){
$('#equipo-id_equipo').val('');
    $('#equipo-descripcion').val('');
    $('#dlg-edit-equipo').modal('show');
});
", \yii\web\View::POS_END);

        
?>