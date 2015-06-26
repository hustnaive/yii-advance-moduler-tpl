<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace demo\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class SiteAsset extends AssetBundle
{
    public $basePath = '@webroot/demo';
    public $baseUrl = '@web/demo';
    
    public $css = [
        'css/site.css',
    ];
    
    public $js = [
    ];
    
    public $depends = [
        'backend\assets\BackendAsset',
    ];
}
