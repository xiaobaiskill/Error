<?php
// notice   run_time 出现问题
echo $k; 


//warning   run_time 出现问题
$m = 'jmz';
settype($m, 'king');



//warning。 run_time 出现问题
function test($num = 0)
{
	echo 5/$num;
}
test();



//fatal error. 会阻止程序继续往下执行 run_time 出现问题
mm();
echo 'no';

//perse error 语法解析 程序终端。perse_time 出现问题
// echo 'ok'

