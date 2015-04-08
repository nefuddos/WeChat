<?php
include_once 'functions.php' ;
session_start();
/* 
 * 显示哪个用户在线,哪个用户不在线
 */
$arr = $_SESSION;
foreach ( $arr as $value ) {
    echo '<li>姓名:&nbsp'.$value .'</li>';
}
?>