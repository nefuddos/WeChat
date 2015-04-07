<?php
/* 连接数据库
 * 尽可能支持各种数据库的操作
 * MysqlConn
 */
header('Content-Type: text/html; charset=utf-8');
function MysqlConn ( $words ) {
$host = "localhost";
$user = "root";
$password = "nefu_ddos";
$database = "Myblog";
    try {
         $conn =new mysqli($host , $user , $password , $database );
         $result = $conn->query($words);
         $row =$result->fetch_assoc();
        // echo htmlentities($row['name']) ;
         return true;
    } catch ( Exception $exc ) {
        //echo $exc -> getTraceAsString () ;
        return false;
    }
}
//$se = "select * from writer";
//MysqlConn($se);
?>