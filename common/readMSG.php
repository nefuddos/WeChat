<?php

/* 
 * 显示消息
 */
include_once 'functions.php' ;
session_start();
readDialog();
//更新在线时间
$id = session_id();
$name = $_SESSION[ $id];
updateState($name , time());
