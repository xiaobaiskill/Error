<?php

//是否显示错误 boolean
ini_set('display_errors',TRUE);


//设置显示错误级别. 
// -1. 显示所有级别错误  0不显示级别错误
// E_ALL & ~E_NOTICE & ~E_USER_WARNING.    显示所有非E_NOTICE、E_USER_WARNING级别的错误
//E_NOTICE|E_USER_WARNING 只显示 E_NOTICE 和E_USER_WARNING 级别的错误
error_reporting(E_NOTICE|E_USER_WARNING);


// 发送错误信息到某个地方
error_log();



//rigger_error(errormsg,errortype);  产生一个用户级别的 error/warning/notice 信息
//E_USER_NOTICE , E_USER_WARNING, E_USER_ERROR
//当报错类型为error 时,程序终止往下执行
trigger_error('lalal',E_USER_WARNING);
echo 11;

//notice
echo $k;

//error
test();


