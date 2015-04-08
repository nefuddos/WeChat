<?php
/*这里归纳常用的php操作函数
 */
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

function state(){
    $filename = '../xml/account.xml';
    if( file_exists ( $filename) )
    {
        $xml = simplexml_load_file($filename);
        $temp_name = $xml->account->name;
        return $temp_name;
    }  else {
         echo 'failed to access the account.xml' ;
    }
}

function addDialog($name,$msg,$time)
{
    //写入xml文件,一种是通过DOM写入,一种是通过sampleXML写入,注意文件的权限
    $filename = '../xml/msg.xml';
    if( file_exists ( $filename) )
    {
        /*
        $xml = new DOMDocument("1.0");
        $xml->  load($filename);
        $user = $xml->documentElement;
        $newnode1 = $xml->  createElement('name', $name);
        $user->appendChild($newnode1);
        $newnode2 = $xml->  createElement("msg", $msg);
        $user->appendChild($newnode2);
        $newnode = $xml->  createElement("time", $time);
        $user->appendChild($newnode);
        $fp = fopen($filename , "w");
        if(fwrite($fp,$xml->  saveXML()))
        {
            echo '写入成功'.'<br />' ;
        }else{
            echo '写入失败' . '<br />' ;
        }
        fclose($fp);
        */
         $xml = simplexml_load_file($filename);
         $dia = $xml->dialog;
         $ifo = $dia->addChild("ifo");
         $ifo->addChild("name",$name);
         $ifo->addChild("msg",$msg);
         $ifo->addChild("time",$time);
        $newXML = $xml->asXML();  
        $fp = fopen($filename, "w");  
        if(fwrite($fp, $newXML))
        {
            //echo '写入成功'.'<br />' ;
        }else{
            //echo '写入失败' . '<br />' ;
        }
        fclose($fp); 
    }else
    {
        echo 'failed to write the msg.xml' ;
    }
}

function readDialog()
{
    $filename = '../xml/msg.xml';
    if( file_exists ( $filename) )
    {
         $xml = simplexml_load_file($filename);
         $dia = $xml->dialog->ifo;
         $length = sizeof($dia);
         for($i=0;$i<$length;$i++)
         {
             echo '<li>姓名:'.$dia[$i]->name.'</li>' ;
             echo '<li>时间:'.$dia[$i]->time.'</li>' ;
             echo '<li>对话:'.$dia[$i]->msg.'</li><br />' ;
         }
         
    }else
    {
        echo 'failed to write the msg.xml' ;
    }
}
?>
