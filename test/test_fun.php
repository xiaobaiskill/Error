<?php

//是否显示错误 boolean
ini_set('display_errors',TRUE);


//设置显示错误级别. 
// -1. 显示所有级别错误  0不显示级别错误
// E_ALL & ~E_NOTICE & ~E_USER_WARNING.    显示所有非E_NOTICE、E_USER_WARNING级别的错误
//E_NOTICE|E_USER_WARNING 只显示 E_NOTICE 和E_USER_WARNING 级别的错误
error_reporting(E_NOTICE|E_USER_WARNING);




// 发送错误信息到某个地方
// log_errors  是否开启错误日志记录
// error_log  错误日记直接
ini_set('log_errors', 'On');
ini_set('error_log','/home/error/error.log');
// bool error_log ( string $message [, int $message_type = 0 [, string $destination [, string $extra_headers ]]] )
// $message 发送信息
// $message_type   0 默认0 ,错误信息发送至 log_errors 指定的错误地址   1发送至$destination邮箱   3发送至$destination文件
/*error_log('这是一个错误呀！！！不要过来呀');*/
/*error_log('这是一个错误呀！！！不要过来呀',3, __DIR__ . '/error.log');*/

//邮箱发送需要特殊处理 linux 暂不知如何使用
// error_log('这是一个错误呀！！！不要过来呀',1,'jmz@egeyed.com');




//rigger_error(errormsg,errortype);  产生一个用户级别的 error/warning/notice 信息
//E_USER_NOTICE , E_USER_WARNING, E_USER_ERROR
//当报错类型为error 时,程序终止往下执行
trigger_error('lalal',E_USER_WARNING);

echo 11;

//notice
echo $k;

//error
test();


