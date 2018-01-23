<?php

class testException extends Exception{
	public function getDetails()
	{
		switch ($this->code) {
			case E_ERROR:
				return '这是一个测试';
				break;
			
			default:
				return '这是不是测试';
				break;
		}
	}
}

class logException extends Exception{
	public function __construct($message=null, $code=0)
	{
		parent::__construct($message,$code);
		error_log($this->getMessage(),3,__DIR__.'/Exception.log');
	}
}


/*

try {
	throw new \testException("不知道可不可以", 2);
} catch (Exception $e) {
	echo $e->getDetails();
}
*/

try {
	$line = @mysqli_connect('127.0.0.1','vagrant','vagrant1');
	if(!$line){
		throw new \logException("数据库连接失败");
	}
} catch (Exception $e) {
	echo $e->getMessage();
}