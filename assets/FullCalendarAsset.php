<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 22/11/16
 * Time: 8:02 PM
 */

namespace app\assets;


use yii\web\AssetBundle;

class FullCalendarAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/fullcalendar.min.css'
    ];
    public $js = [
        'js/moment.js',
        'js/fullcalendar.min.js',
        'js/locale/f_es.js',
    ];

    public $depends = [
        'app\assets\AppAsset',
        'app\assets\JsAsset',
        'app\assets\CssAsset',
    ];
}