<?php
$global=dirname(__FILE__).'/global.php';
$yii=dirname(__FILE__).'/protected/packages/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following line when in production mode
// defined('YII_DEBUG') or define('YII_DEBUG',true);

require_once($yii);
Yii::createWebApplication($config)->run();
