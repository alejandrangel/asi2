<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <script src="<?php echo Yii::$app->request->baseUrl; ?>/js/jquery-1.10.2.js" type="text/javascript"></script>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <script>
        var _URL_ = "<?= Url::to("@web/menu-tree")  ?>";
    </script>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">
        <!--
            Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
            Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
        -->
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="<?= Url::to("@web/site/") ?>" class="simple-text">
                   <img src="http://santatecla.gob.sv/images/logo-blanco.png" title="Desechos Solidos" />
                </a>
            </div>
            <div class="nav nav-list" id="menu_">

            </div>
        </div>
    </div>
    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#"> 
                    	<?=   Yii::$app->params['sys-name']  ?>
                    </a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <!-- -->
                        <li>
                            <a href="<?= Url::to("@web/site/logout") ?>">
                                <i class="ti-user"></i>
                                <p style="font-size: 1.1em;">Salir (<?= @Yii::$app->user->identity->nombre ?>)</p>
                            </a>
                        </li>
                        <!-- -->
                    </ul>
                </div>
            </div>
        </nav>
        <div class="content">
            <?= $content ?>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            Proyecto Análisis de Sistemas 2 - UFG
                        </li>
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>
                </div>
            </div>
        </footer>
    </div>

</body>

<?php $this->endBody() ?>
</html>
<?php $this->endPage() ?>
