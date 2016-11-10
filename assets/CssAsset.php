<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12/9/16
 * Time: 9:38 PM
 */

namespace app\assets;


use yii\web\AssetBundle;

class CssAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'css/animate.min.css',
        'css/paper-dashboard.css',
        'css/demo.css',
        '//fonts.googleapis.com/css?family=Muli:400,300',
        'css/themify-icons.css',
        'css/datepicker.css',
    ];
    public $js = [];
}