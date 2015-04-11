<?php
include_once 'functions.php' ;
session_start();
//更新用户在线时间
$id = session_id();
$name = $_SESSION[ $id];
updateState($name , time());
/* 
 * 显示哪个用户在线,哪个用户不在线
 */
$arr = getState(time());
echo '在线用户:<br />' ;
foreach ( $arr as $key => $value ) {
    if($value){
        echo '&nbsp;&nbsp;<li style="color:#2f2">&nbsp;'.$key.'</li>';
    }
}
echo '离线用户:<br />' ;
foreach ( $arr as $key => $value ) {
    if(!$value){
        echo '&nbsp;&nbsp;<li style="color:red">&nbsp;'.$key.'</li>';
    }
}
?>