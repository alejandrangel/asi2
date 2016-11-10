<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
//use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<link href="<?php echo Yii::$app->request->baseUrl; ?>/css/login-register.css" rel="stylesheet" />
<script src="<?php echo Yii::$app->request->baseUrl; ?>/js/login-register.js"></script>

         <div class="container">
            <div class="col-md-8 col-md-offset-2">
                    <div class="modal-body">  
                        <div style="text-align:center;">
                            <img src="http://arena.org.sv/imagenes/santatecla.png" style="width:200px;" />
                        </div>
                        <div class="box">
                            <div class="content registerBox" >
                             <div class="form">
                                <form method="post" html="{:multipart=>true}" data-remote="true" action="/register" accept-charset="UTF-8">
                                <input id="email" class="form-control" type="text" placeholder="Email" name="email">
                                <input id="password" class="form-control" type="password" placeholder="Password" name="password">
                                

                                <a href="main" class="btn btn-default btn-register" type="submit" value="Entrar" name="commit">Entrar</a>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</div>

<style>
    @media(min-width:768px) {
        #wrapper {
            padding-left: 0;
        }
    }
</style>
