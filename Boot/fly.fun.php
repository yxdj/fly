<?php
// +----------------------------------------------------------------------
// | Fly:php-cli
// +----------------------------------------------------------------------
// | Copyright (c) 2014 xuyuan All rights reserved.
// +----------------------------------------------------------------------
// | Author: xuyuan
// +----------------------------------------------------------------------
//Fly:boot funciton
function C($name=null,$value=null,$default=null){
    static $_config = array(); 
    if(empty($name)){return $_config;}
    if(is_string($name)){
		$name=explode('.', $name);	
        if(count($name)==1){
            if(is_null($value)){
                $value=isset($_config[$name[0]]) ? $_config[$name[0]] : $default;
			}else{
				$_config[$name[0]] = $value;
			}
            return $value;
        }
        if(count($name)==2){
			if(is_null($value)){
				$value=isset($_config[$name[0]][$name[1]]) ? $_config[$name[0]][$name[1]] : $default;
			}else{
				$_config[$name[0]][$name[1]] = $value;
			}
			return $value;
		}
        if(count($name)==3){
			if(is_null($value)){
				$value=isset($_config[$name[0]][$name[1]][$name[2]]) ? $_config[$name[0]][$name[1]][$name[2]] : $default;
			}else{
				$_config[$name[0]][$name[1]][$name[2]] = $value;
			}
			return $value;
		}		
    }
    if(is_array($name)){	
        $_config = array_merge($_config,$name);
        return $name;
    }
    return null;
}

function fly($info='',$return=false){
	$logo=file_get_contents(FLY_TPL.'logo.fly');
	if(empty($info)) $info=C('copyright');
	$v=C('version');
	$w=str_pad($info,28,' ',STR_PAD_BOTH);
	$logo=str_replace(array('0','1','i','l','v','w'),array(' ','_','/',"\r\n",$v,$w),$logo);
	$logo="\r\n".$logo."\r\n";
	if($return){return $logo;}else{echo $logo;}
}

function br(){
	echo "\r\n";
}

function echos($data='',$return=false){
	if(OUTPUT_GBK) $data=FlyTool::iconvFilter('utf-8','gbk//IGNORE',$data);
	if($return){
		return $data;
	}else{
		print_r($data);
	}
}

function echogbk($data='',$return=false){
	return echos($data,$return);
}




/**
 * 记录和统计时间（微秒）和内存使用情况
 * 使用方法:
 * <code>
 * G('begin'); // 记录开始标记位
 * // ... 区间运行代码
 * G('end'); // 记录结束标签位
 * echo G('begin','end',6); // 统计区间运行时间 精确到小数后6位
 * echo G('begin','end','m'); // 统计区间内存使用情况
 * 如果end标记位没有定义，则会自动以当前作为标记位
 * 其中统计内存使用需要 MEMORY_LIMIT_ON 常量为true才有效
 * </code>
 * @param string $start 开始标签
 * @param string $end 结束标签
 * @param integer|string $dec 小数位或者m
 * @return mixed
 */
function G($start,$end='',$dec=4) {
    static $_info       =   array();
    static $_mem        =   array();
    if(is_float($end)) { // 记录时间
        $_info[$start]  =   $end;
    }elseif(!empty($end)){ // 统计时间和内存使用
        if(!isset($_info[$end])) $_info[$end]       =  microtime(TRUE);
        if(MEMORY_LIMIT_ON && $dec=='m'){
            if(!isset($_mem[$end])) $_mem[$end]     =  memory_get_usage();
            return number_format(($_mem[$end]-$_mem[$start])/1024);
        }else{
            return number_format(($_info[$end]-$_info[$start]),$dec);
        }

    }else{ // 记录时间和内存使用
        $_info[$start]  =  microtime(TRUE);
        if(MEMORY_LIMIT_ON) $_mem[$start]           =  memory_get_usage();
    }
}