<?php
/*
 * Created on 2011/12/12
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */ 
//require_once("config/config.php"); 
$path_base = '/home/users/0/lolipop.jp-7964ee8c1b130275/';
$path1 = $path_base . 'applications';
$path2 = $path_base . 'zf/library';

set_include_path($path1 . PATH_SEPARATOR . $path2);

require_once("config/config.php");
require_once("models/InitCron.class.php");
require_once("models/cron/CRnews.class.php");
$class = new CRnews();

?>
