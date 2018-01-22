<?php

/*
1、异常抛出后会直接终止程序了；
2、E_ERROR这种错误的类型也会抛出异常  
以上情况出现则程序终止执行  调用appException()
 */
throw new \Exception("这是我抛出的异常", 1024);
// test();
require_once 'error_test3.php';