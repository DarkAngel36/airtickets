<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
	    '/css/bootstrap-datepicker3.standalone.css',
	    '/css/style.css',
	    '/css/additional.css',
	    //        '/plugins/FormStyler/jquery.formstyler.css',

    ];
    public $js = [
	    //    	'/plugins/FormStyler/jquery.formstyler.min.js',
	    '/js/bootstrap-datepicker.js',
	    '/js/script.js',
    ];
    public $depends = [
	    'yii\web\YiiAsset',
	    'yii\bootstrap\BootstrapAsset',
	    'yii\web\JqueryAsset',
    ];
}
