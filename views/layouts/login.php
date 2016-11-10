<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
//use app\assets\AppAsset;
use util\MenuMaker;

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo Yii::$app->request->baseUrl; ?>/css/reset.css" rel="stylesheet" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>


     <!-- Bootstrap core CSS     -->
    <link href="<?php echo Yii::$app->request->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="<?php echo Yii::$app->request->baseUrl; ?>/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="<?php echo Yii::$app->request->baseUrl; ?>/css/paper-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo Yii::$app->request->baseUrl; ?>/css/demo.css" rel="stylesheet" />


    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="<?php echo Yii::$app->request->baseUrl; ?>/css/themify-icons.css" rel="stylesheet">



    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


<div class="wrapper">

    <?= $content ?>

</div>


</body>

    <?php
//AppAsset::register($this);
  //  $this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => '/img/favicon.png']);
   // $this->registerJsFile(Yii::$app->request->baseUrl.'/js/Chart.min.js',['depends' => [\yii\web\JqueryAsset::className()],'position'=>\yii\web\View::POS_END]);
    //$this->registerJsFile(Yii::$app->request->baseUrl.'/js/index.js',['depends' => [\yii\web\JqueryAsset::className()],'position'=>\yii\web\View::POS_END]);
    
    ?>

    <!--   Core JS Files   -->
    <script src="<?php echo Yii::$app->request->baseUrl; ?>/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="<?php echo Yii::$app->request->baseUrl; ?>/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="<?php echo Yii::$app->request->baseUrl; ?>/js/bootstrap-checkbox-radio.js"></script>

    <!--  Charts Plugin -->
    <script src="<?php echo Yii::$app->request->baseUrl; ?>/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="<?php echo Yii::$app->request->baseUrl; ?>/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
    <script src="<?php echo Yii::$app->request->baseUrl; ?>/js/paper-dashboard.js"></script>

    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="<?php echo Yii::$app->request->baseUrl; ?>/js/demo.js"></script>

    

    <script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();

            /*$.notify({
                icon: 'ti-gift',
                message: "Welcome to <b>Paper Dashboard</b> - a beautiful Bootstrap freebie for your next project."

            },{
                type: 'success',
                timer: 4000
            });*/

        });
    </script>

</html>

                
            

<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
