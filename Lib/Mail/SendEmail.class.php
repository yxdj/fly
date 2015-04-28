<?php
// +----------------------------------------------------------------------
// | Fly:php-cli
// +----------------------------------------------------------------------
// | Copyright (c) 2014 xuyuan All rights reserved.
// +----------------------------------------------------------------------
// | Author: xuyuan
// +----------------------------------------------------------------------
//EMAIL-发送
class SendEmail{
	public $mail;


	//初始化邮箱信息
	public function __construct($config=null){
		$this->mail = new PHPMailer;
		if($config){
			$this->mail->Host = $config['host'];
			$this->mail->Username = $config['username'];
			$this->mail->Password = $config['password'];
			$this->mail->From = $config['from'];
		}else{
			$this->mail->Host = 'smtp.163.com';
			$this->mail->Username = 'xuyuan_me@163.com';
			$this->mail->Password = 'xuyuan';
			$this->mail->From = 'xuyuan_me@163.com';
		}
		
		
		
		//$this->mail->SMTPSecure = 'tls';                    	// Enable encryption, 'ssl' also accepted

		
		
		$this->mail->isSMTP();
		$this->mail->SMTPAuth = true;
		$this->mail->CharSet='UTF-8';
		$this->mail->FromName = 'Fly(php-cli)';
		$this->mail->WordWrap = 50;
		$this->mail->isHTML(true);
	}

	
	//邮件发送
	public function send($msg){
$str='<div style="margin-top:100px;background:#000;color:#fff;width:500px;height:150px;">
<div style="height:100px;font-size:30px;text-align:center;"><span style="font-size:80px;line-height:100px;">Fly</span>(php-cli)</div>
<div style="text-align:center;height:50px;line-height:50px;">Copyright (c) 2014 xuyuan All rights reserved.</div>
</div>';
	
		$this->mail->addAddress($msg['email']);//邮箱
		$this->mail->Subject=$msg['subject'];//主题
		$this->mail->Body=$msg['body'].$str;//内容
		
		if(!$this->mail->send()){
			$status='NG: '.$this->mail->ErrorInfo;
		}else{
			$status='OK';
		}	
		
		$info=date('Y-m-d H:i:s').'=>'.$msg['email'].'('.$status.')';
		
		$this->over($info);
		if($status=='OK'){
			return true;
		}else{
			return false;
		}
		
	}

	//清除收件人
	public function clear(){
		$this->mail->ClearAllRecipients();		
	}
	
	
	
	public function over($info){
		FlyLog::record($info,'mail.log');
	}

}

