<?php
// +----------------------------------------------------------------------
// | Fly:php-cli
// +----------------------------------------------------------------------
// | Copyright (c) 2014 xuyuan All rights reserved.
// +----------------------------------------------------------------------
// | Author: xuyuan
// +----------------------------------------------------------------------
//应用引导文件，系统生成请勿改动！
//define('FLY',str_replace('\\','/',rtrim(__DIR__,'/').'/')) && require(FLY.'Fly/fly.php');

define('FLY',str_replace('\\','/',rtrim(__DIR__,'/').'/'));
$dirs=scandir(FLY);
foreach($dirs as $dir){if(strncmp('Fly',$dir,3)==0){define('FLY_NAME',$dir);break;}}
if(!defined('FLY_NAME')) exit('Fly is not exists!');	
require(FLY.FLY_NAME.'/fly.php');