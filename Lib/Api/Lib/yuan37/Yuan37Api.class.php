<?php
class Yuan37Api extends SetApi{
	public $url='http://api.yuan37.com';	
	

	/*
	
	将client方法映射到server
	
	
	*/

	
	public function loginv(){
		$this->data['password']=789;
		return $this->_mapping();
	}

	
	
	public function bootstrap(){
		return $this->_mapping();
	}
	


	
}
