<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/../util/Log.php');
require(__DIR__ . '/../util/Session.php');
require(__DIR__ . '/../util/MenuMaker.php');
require(__DIR__ . '/../util/Acf.php');
require(__DIR__ . '/../util/Util.php');
require(__DIR__ . '/../util/Report.php');
require(__DIR__ . '/../util/CustomDialog.php');

$config = require(__DIR__ . '/../config/web.php');

(new yii\web\Application($config))->run();
