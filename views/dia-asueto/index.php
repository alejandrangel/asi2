<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DiaAsuetoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Diás Asueto';
\app\assets\FullCalendarAsset::register($this);
?>
<div class="dia-asueto-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <div id="asuetos"></div>
</div>

<?php
    $this->registerJs("
        $('#asuetos').fullCalendar({
                 editable:false,
                 lang: 'es',
                 customButtons: {
                    create: {
                        text: 'Nuevo',
                        click: function() {
                                $('#dlg-asueto').modal('show');
                        }
                    }
                 },
                 header:{
                    left:'create',
                    center:'title',
                    right:'prev,next today'
                 },
                 eventSources:'".\yii\helpers\Url::to("@web/dia-asueto/load-events")."',
                 eventRender: function(event, element) {
                            element.prepend('<span style=\"float:right\" class=\"ti-close\"></span>');
                            element.find('.ti-close').click(function() {
                                 //console.log(event);
                                 if(confirm('Desea eliminar el registro?')){
                                     $.post('".\yii\helpers\Url::to("@web/dia-asueto/delete-event")."',{id:event.id}).done(function(data){
                                        if(data.success){
                                            $('#asuetos').fullCalendar('removeEvents',event._id);
                                        }
                                     });
                                 }
                            });
                }
        });
    ",\yii\web\View::POS_READY);
?>



<div class="modal fade" id="dlg-asueto" tabindex="-1" role="dialog" aria-labelledby="Asueto">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="">Nuevo Día de Asueto</h4>
            </div>
            <div class="modal-body">
                <?php
                echo $this->render('create', [
                    'model'=> new \app\models\DiaAsueto()
                ]) ;
                ?>
            </div>
        </div>
    </div>
</div>

<?php
$this->registerJsFile('@web/js/bootstrap.min.js', ['position'=>\yii\web\View::POS_END]);
$this->registerJs("$(document).on('beforeSubmit','#create-dia-asueto',function(){
            var form = $(this);                                 
            if(form.find('.has-error').length) {
                return false;
            }  
            $.post('".\yii\helpers\Url::to("@web/dia-asueto/create-event")."',form.serialize()).done(function(data){
                  if(data.success){  
                        $('#asuetos').fullCalendar('refetchEvents');
                        $('#dlg-asueto').modal('hide');
                        form.find(\"input[type=text], textarea\").val(\"\");
                   }
            });            
            return false;
});",\yii\web\View::POS_END);
?>
