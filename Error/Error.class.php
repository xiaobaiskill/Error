<?php
/**
 * 简单的报错类写法。
 * 
 */
namespace Error;

class Error
{
	public static function start()
	{
		// 程序终止执行后调用
		register_shutdown_function('Error\Error::fatalError');

		//错误异常时调用，如 notice warning  和trigger_error() 这些错误会调用此函数
		set_error_handler('Error\Error::appError');

		//throw new \Exception("Error Processing Request", 1); 使用此抛出的异常
		set_exception_handler('Error\Error::appException');
	}

	/**
	 * 判断错误的严重类型 只分为三种 error warning notice
	 * @param  [type] $errno [description]
	 * @return [type]        [description]
	 */
	private static function error_type($errno)
	{
		switch ($errno) {
			case E_PARSE:
			case E_ERROR:
			case E_USER_ERROR:
			case 0:
				$type = 'error';
				break;
			case E_WARNING:
			case E_USER_WARNING:
				$type = 'warning';
				break;
			case E_NOTICE:
			case E_USER_NOTICE:
				$type = 'notice';
				break;
			default:
				$type = 'notice';
				break;
		}
		return $type;
	}

	/**
	 * 程序终止是执行
	 * @return [type] [description]
	 */
	public static function fatalError()
	{
		if ($e = error_get_last()) {
			$type          = self::error_type($e['type']);
			$trace_content = explode('Stack trace:', $e['message']);
			$content       = "FILE: " . $e['file'] . "&#12288;LINE: {$e['line']}.";
			$message       = $trace_content[0];
			$trace         = '';

			if ($mag_trace = explode(' in ', $trace_content[0]) && isset($mag_trace[1])) {
				$message = $mag_trace[0];
				$trace   = $mag_trace[1];
			}
			self::error_handle($type, $message, $content, $trace);
		}
	}
	/**
	 * 错误异常时调用
	 * @param  [type] $errno   [错误的序列号]
	 * @param  [type] $errstr  [错误内容]
	 * @param  [type] $errfile [错误文件]
	 * @param  [type] $errline [错误行号]
	 * @return [type]          [description]
	 */
	public static function appError($errno, $errstr, $errfile, $errline)
	{
		$type    = self::error_type($errno);
		$message = $errstr;
		$content = "FILE: " . $errfile . "&#12288;LINE: $errline.";

		$trace_content = debug_backtrace();
		$trace         = '';
		foreach ($trace_content as $k => $v) {
			if (isset($v['file'])) {
				$trace .= '#' . $k . $v['file'] . ' ( ' . $v['line'] . ' ): ' . $v['function'] . '<br>';
			}
		}
		self::error_handle($type, $message, $content, $trace);
	}
	/**
	 * 抛出异常时的处理
	 * @param  [type] $e [Exception]
	 * @return [type]    [description]
	 */
	public static function appException($e)
	{
		$errno = $e->getCode();
		$type  = self::error_type($errno);

		$trace_content = $e->getTrace();
		if ('E' == $trace_content[0]['function']) {
			$file = $trace_content[0]['file'];
			$line = $trace_content[0]['line'];
		} else {
			$file = $e->getFile();
			$line = $e->getLine();
		}
		$message = $e->getMessage();
		$content = "FILE: " . $file . "&#12288;LINE: {$line}.";

		$trace = '';
		foreach ($trace_content as $k => $v) {
			if (isset($v['file'])) {
				$trace .= '#' . $k . $v['file'] . ' ( ' . $v['line'] . ' ): ' . $v['function'] . '<br>';
			}
		}
		self::error_handle($type, $message, $content, $trace);
	}

	public static function error_handle($type, $message, $content, $trace = null)
	{
		error_log($message . "\r\n" . $content . "\r\n" . $trace . "\r\n\r\n");   //错误日志保存
		if(APP_DEBUG){
			ob_start();
			include __DIR__ . '/error.php';
			$buffer = ob_get_clean();
			echo $buffer;
		}
		// exit;
	}
}
