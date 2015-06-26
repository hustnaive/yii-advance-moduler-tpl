<?php
 /**
  * Module.php
  *
  * @author        fangliang
  * @create_time	   2015-06-16
  */

namespace modules\demo;
use Yii;

class Module extends \yii\base\Module
{
    public $layout = "main";
    public $controllerNamespace = 'demo\controllers';

    public function init()
    {
        parent::init();
        \Yii::setAlias("demo", __DIR__);
    }
} 