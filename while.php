<?php
$a = 1004;
var_dump($a);                 // 1004
$b = $a = 1004;
var_dump($b);                 // 1004
var_dump($a = 1004);          // 1004
echo $a;                      // 1004
// 대입연산자

var_dump(NULL == false);
var_dump(NULL === false);
?>