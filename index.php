<?php
/*
1     	E_ERROR           		致命的运行错误。错误无法恢复，暂停执行脚本。
2     	E_WARNING         		运行时警告(非致命性错误)。非致命的运行错误，脚本执行不会停止。
4     	E_PARSE           		编译时解析错误。解析错误只由分析器产生。
8     	E_NOTICE          		运行时提醒(这些经常是你代码中的bug引起的，也可能是有意的行为造成的。)
16    	E_CORE_ERROR PHP  		启动时初始化过程中的致命错误。
32    	E_CORE_WARNING    		PHP启动时初始化过程中的警告(非致命性错)。
64    	E_COMPILE_ERROR   		编译时致命性错。这就像由Zend脚本引擎生成了一个E_ERROR。
128   	E_COMPILE_WARNING 		编译时警告(非致性错)。这就像由Zend脚本引擎生成了E_WARNING警告。
256   	E_USER_ERROR      		自定义错误消息。像用PHP函数trigger_error（程序员设置E_ERROR）
1512  	E_USER_WARNING    		自定义警告消息。像用PHP函数trigger_error（程序员设的E_WARNING警告）
11024 	E_USER_NOTICE     		自定义的提醒消息。像由使用PHP函数trigger_error（程序员E_NOTICE集
12048 	E_STRICT          		编码标准化警告。允许PHP建议修改代码以确保最佳的互操作性向前兼容性。
4096  	E_RECOVERABLE_ERROR   	开捕致命错误。像E_ERROR，但可以通过用户定义的处理捕获（又见set_error_handler（））
18191 	E_ALL             		所有的错误和警告(不包括 E_STRICT) (E_STRICT will be part of E_ALL as of PHP 6.0)
116384	E_USER_DEPRECATED
130719	E_ALL
 */




// 请保证这两个有在php.ini中设置，如果没有，则直接则如下设置即可
ini_set('log_errors','On');   
ini_set('error_log',__DIR__ . '/error/error.log');    //绝对路径

//引用并启动报错类   （必须）
define('APP_DEBUG', true);    //是否开启报错
require_once 'Error/Error.class.php';     // 写引用路径即可
Error\Error::start();






//测试  可删除
require_once 'test/error_test.php';     