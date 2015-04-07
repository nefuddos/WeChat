<?php
/*
 * 接受用户发来的信息,然后将用户发来的信息存储到MSG.xml文件中
 */
header('Content-type: text/html');
include_once 'functions.php' ;
session_start();
$id = session_id();
$name = $_SESSION[ $id];
$dialog = $_POST["msg"];
$time = date('Y-m-d H:i:s',time());
addDialog($name , $dialog , $time);//写入xml文件一直写不进去
echo '<li>时间:'.$time.'</li>' ;
echo '<li>姓名:'.$name.'</li>&nbsp;' ;
echo '<li>对话:'.$dialog.'</li>' ;

