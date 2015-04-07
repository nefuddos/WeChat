<?php
/*这里归纳常用的php操作函数
 */
include_once '../private/constant.php' ;
function AccountXML($name,$password){
    //解析account.xml文件
     $filename = '../xml/account.xml';
    if( file_exists ( $filename) )
    {
        $xml = simplexml_load_file($filename);
        $temp_name = $xml->account->name;
        $temp_password = $xml->account->password;
        if($name == $temp_name[0] && $password == $temp_password[0])
        {
            return true;
        }else if($name == $temp_name[1] && $password == $temp_password[1])
        {
            return true;
        }  else {
            return false;
        }     
    } else 
    {
        echo 'failed to access the account.xml' ;
    }
}
?>
