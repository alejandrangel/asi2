<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12/9/16
 * Time: 9:38 PM
 */

namespace app\assets;


use fedemotta\datatables\DataTables;
use fedemotta\datatables\DataTablesAsset;
use yii\web\AssetBundle;

class JsAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [];
    public $js = [
        '//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js',
        'js/bootstrap-checkbox-radio.js',
        'js/bootstrap-treeview.min.js',
        'js/chartist.min.js',
        'js/bootstrap-notify.js',
        '//maps.googleapis.com/maps/api/js?key=AIzaSyDVWdEiucbG2ij5EFbtsWPCGIqhgLr_ETg',
        'js/paper-dashboard.js',
        'js/demo.js',
        'js/dataTables.bootstrap.js'
    ];
    public $depends = [
        'fedemotta\datatables\DataTablesAsset'
    ];
}