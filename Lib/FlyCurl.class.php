<?php
// +----------------------------------------------------------------------
// | Fly:php-cli
// +----------------------------------------------------------------------
// | Copyright (c) 2014 xuyuan All rights reserved.
// +----------------------------------------------------------------------
// | Author: xuyuan
// +----------------------------------------------------------------------
/*
include:hostToIp<fun>,
HTTP控制类
$code=$http->getUrl()/postUrl()/headUrl();
if($code=='200'){
	$this->request/response/content;
	$this->getCharset()/getKeyword()/getDebug()
}



*/
class FlyCurl{	


	public function getUrl(){
	
	
	}
	
	public function postUrl(){
	
	
	
	}

	public function test(){
		$ch=curl_init();
		$post=array('test'=>'aaaaaaaa');
		curl_setopt($ch, CURLOPT_URL,'http://api.yuan37.com/test.php');//设定请求的url
		curl_setopt($ch, CURLOPT_HEADER,0);//是否返回头部
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//将结果返回
		curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);//提交的参数	
		echo curl_exec($ch);
		curl_close($ch);

		
	}
/*
$ch = curl_init();//初始化curl
curl_setopt($ch,CURLOPT_URL,'http://sms.api.bz/fetion.php');//抓取指定网页
curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
$data = curl_exec($ch);//运行curl
curl_close($ch);
print_r($data);//输出结果
*/



}//class over



