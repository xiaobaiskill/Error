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

header('content-type:text/html;charset=UTF-8');

function dd($data)
{
	echo '<pre>';
	print_r($data);
}

//错误异常时调用，如 notice warning  和trigger_error() 这些错误会调用此函数
set_error_handler('app_error');

// 程序终止执行后调用
register_shutdown_function('fatal_error');

//throw new \Exception("Error Processing Request", 1); 使用此抛出的异常
set_exception_handler('app_exception');

//不影响终止执行的错误报错
/**
 * 自定义错误处理
 * @access public
 * @param int $errno 错误类型
 * @param string $errstr 错误信息
 * @param string $errfile 错误文件
 * @param int $errline 错误行数
 * @return void
 */
function app_error($errno, $errstr, $errfile, $errline)
{

	// echo '错误级别:' . $errno . '<br>';
	// echo '错误内容:' . $errstr . '<br>';
	echo "[$errno] $errstr ".$errfile."  第 $errline 行.";
	// echo '错误行数:' . $errline .'<br>';

	echo '<hr>';
}

//影响终止执行的错误报错
function fatal_error()
{
	echo 'fatal_error'.'<br>';
	$e = error_get_last();
	// echo $e['type'];
	dd($e);
}

//异常错误抛出
function app_exception($e)
{
		echo 'app_exception'.'<br>';
        $error = array();
        $error['errno'] 	=   $e->getCode();
        $error['message']   =   $e->getMessage();
        $trace              =   $e->getTrace();
        if('E'==$trace[0]['function']) {
            $error['file']  =   $trace[0]['file'];
            $error['line']  =   $trace[0]['line'];
        }else{
            $error['file']  =   $e->getFile();
            $error['line']  =   $e->getLine();
        }
        $error['trace']     =   $e->getTraceAsString();
        dd($error);
        echo '<br>';
        echo "[{$error['errno']}] {$error['message']} ".$error['file']."  第 {$error['line']} 行.".'<br>';

       
}

function error_handle($error)
{

}

require_once 'error_test.php';
