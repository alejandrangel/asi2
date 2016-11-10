<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use util\MenuMaker;

$this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags();
        AppAsset::register($this);
    ?>
    <title><?= Html::encode($this->title) ?></title>
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
                    <a href="#" class="simple-text">
                        Departamento de Desechos Sólidos
                    </a>
                </div>
                <ul class="nav">
                    <li>
                       Aqui se va generar el menu
                    </li>
                </ul>
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
                        <a class="navbar-brand" href="#">Sistema</a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            Aqui se genera el menu
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


        <div class="site-index" style="display:none;">

            <div class="jumbotron"></div>

            <div class="body-content">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <div class="caption text-onbox">
                                <h4>Tonelaje Recolectado</h4>
                                <p>
                                    <canvas id="tonelaje-chart" width="400" height="250"></canvas>
                                </p>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <div class="caption text-onbox">
                                <h4>Gasto de Conbustible</h4>
                                <p>
                                    <canvas id="combustible-chart" width="400" height="250"></canvas>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <div class="caption text-onbox">
                                <h4>Solicitudes</h4>
                                <div>
                                    <ul class="list-group">
                                        <li class="list-group-item"><a href="#">00001- Arbol ostaculizando calle Col. Luisa</a></li>
                                        <li class="list-group-item"><a href="#">00002- Tragante tapado, mal olor entrada del mercado</a></li>
                                        <li class="list-group-item"><a href="#">00003- Derrumbe impide paso de peatones</a></li>
                                        <li class="list-group-item"><a href="#">00004- Col Santa Maria, sin agua por 2 semanas</a></li>
                                        <li class="list-group-item"><a href="#">00005- Fumigación en Col. Apulca</a></li>
                                        <li class="list-group-item"><a href="#">00006- Limpieza de Cunetas calle principal</a></li>
                                    </ul>
                                    <a href="#">Más</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <div class="caption text-onbox">
                                <h4>Ordenes de Trabajo</h4>
                                <p>

                                </p>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <div class="caption text-onbox">
                                <h4>Planificación Semana</h4>
                                <p>

                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <div class="caption text-onbox">
                                <h4>Otras cosas</h4>
                                <p>

                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();

        });
    </script>
</body>
<?php $this->endBody() ?>

</html>
<?php $this->endPage() ?>