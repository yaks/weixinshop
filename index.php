<?php
header("Access-Control-Allow-Origin: *");
/* 当前PinPHP程序版本 */
define('THINK_PATH','./ThinkPHP/');
define('PIN_VERSION', '3.0');
/* 当前PinPHP程序Release */
define('PIN_RELEASE', '20121127');
/* 应用名称*/
define('APP_NAME', 'Index');
/* 应用目录*/
define('APP_PATH', './Index/');
/* 扩展目录*/
define('EXTEND_PATH', APP_PATH . 'Extend/');
/* DEBUG开关*/
define('APP_DEBUG', false);
define ( "GZIP_ENABLE", function_exists ( 'ob_gzhandler') ); 

ob_start ( GZIP_ENABLE ? 'ob_gzhandler': null );

define('ENGINE_NAME','sae');
define('img_path','http://listest01-data.stor.sinaapp.com');


require THINK_PATH.'ThinkPHP.php';

