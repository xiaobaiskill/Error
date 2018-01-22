<?php

echo $k;

settype($v, 'inta');

trigger_error('error这是一个错误',E_USER_ERROR);
trigger_error('warning这是一个错误',E_USER_WARNING);
trigger_error('notice这是一个错误',E_USER_NOTICE);
trigger_error('pase这是一个错误',E_PARSE);


require_once 'error_test2.php';
