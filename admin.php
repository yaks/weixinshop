<?php
define('DOMAIN','bismai.com');
ini_set('session.cookie_path', '/');
ini_set('session.cookie_domain', DOMAIN);
header("Access-Control-Allow-Origin", "*"); 
/* 当前PinPHP程序版本 */
define('THINK_PATH','./ThinkPHP/');
define('PIN_VERSION', '3.0');
/* 当前PinPHP程序Release */
define('PIN_RELEASE', '20121127');
/* 应用名称*/
define('APP_NAME', 'Admin');
/* 应用目录*/
define('APP_PATH', './Admin/');
/* 扩展目录*/
define('EXTEND_PATH', APP_PATH . 'Extend/');
/* DEBUG开关*/
define('APP_DEBUG', true);

define('ENGINE_NAME','sae');


require THINK_PATH.'ThinkPHP.php';