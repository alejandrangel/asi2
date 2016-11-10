<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';

?>
<link href="<?php echo Yii::$app->request->baseUrl; ?>/css/login-register.css" rel="stylesheet" />
<script src="<?php echo Yii::$app->request->baseUrl; ?>/js/login-register.js"></script>
<div class="site-login">


    <!-- <p>Please fill out the following fields to login:</p> -->

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'action' => '@web/site/login'
    ]); ?>




    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="modal-body">
                <div style="text-align:center;">
                    <img src="http://arena.org.sv/imagenes/santatecla.png" style="width:200px;" />
                </div>
                <div class="box">
                    <div class="content registerBox" >
                        <div class="form">
                            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                            <?= $form->field($model, 'password')->passwordInput() ?>
                            <?= Html::submitButton('Entrar', ['class' => 'btn btn-default btn-register', 'name' => 'login-button']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

    <div class="col-lg-offset-1" style="color:#999;">
       <!-- You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>
        To modify the username/password, please check out the code <code>app\models\User::$users</code>.
        -->
    </div>
</div>
<style>
    @media(min-width:768px) {
        #wrapper {
            padding-left: 0;
        }
    }
</style>
