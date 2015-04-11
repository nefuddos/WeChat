<?php
/*这里归纳常用的php操作函数
 */
header('Content-Type: text/html; charset=utf-8');
function AccountXML($name,$password,$ipifo,$time){
    //解析account.xml文件
     $filename = '../xml/account.xml';
    if( file_exists ( $filename) )
    {
        $xml = simplexml_load_file($filename);
        $temp_name = $xml->account->name;
        $temp_password = $xml->account->password;
        if($name == $temp_name[0] && $password == $temp_password[0])
        {
            $xml->account->ip[0] = $ipifo;
            $xml->account->time[0] = $time;
            $newXML = $xml->asXML();  
            $fp = fopen($filename, "w");  
            if(fwrite($fp, $newXML))
            {
               // echo 'yes'.'<br />' ;
            }else{
               // echo 'no' . '<br />' ;
            }
            fclose($fp); 
            return true;
        }else if($name == $temp_name[1] && $password == $temp_password[1])
        {
            $xml->account->ip[1] = $ipifo;
            $xml->account->time[1] = $time;
            $newXML = $xml->asXML();  
            $fp = fopen($filename, "w");  
            if(fwrite($fp, $newXML))
            {
               // echo '写入成功'.'<br />' ;
            }else{
               // echo '写入失败' . '<br />' ;
            }
            fclose($fp); 
            return true;
        }  else {
            return false;
        }     
    } else 
    {
        echo 'failed to access the account.xml' ;
    }
}

function getState($time ){
    $filename = '../xml/account.xml';
    $arr = array('rjg' => true,'dgf'=>true);
    if( file_exists ( $filename) )
    {
        $xml = simplexml_load_file($filename);
        $temp_time = $xml->account->time;
        $length =  sizeof ( $temp_time) ;
        for( $i =0;$i<$length;$i++) {
            if($time -$temp_time[$i]>100){
                $temp =$xml->account->name[$i];
                $arr["$temp"] = false;
            }
            else{
                $temp =$xml->account->name[$i];
                $arr["$temp"] = true;
            }
        }
        return $arr;
    }  else {
         echo 'failed to access the account.xml' ;
    }
}

function updateState($name,$time)
{
    $filename = '../xml/account.xml';
    if( file_exists ( $filename) )
    {
        $xml = simplexml_load_file($filename);
        $temp_name = $xml->account->name;
        $length =  sizeof ( $temp_name) ;
        for( $i =0;$i<$length;$i++) {
             if ( $temp_name[$i] == $name ) {
                $xml -> account -> time[ $i ] = $time ;
                break ;
            }
        }

        $newXML = $xml -> asXML () ;
        $fp = fopen ( $filename , "w" ) ;
        if ( fwrite ( $fp , $newXML ) ) {
            //echo '写入成功'.'<br />' ;
        } else {
            //echo '写入失败' . '<br />' ;
        }
        fclose ( $fp ) ;
    }else{
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
             echo '<li><b>@'.$dia[$i]->name.'</b>&nbsp;&nbsp;&nbsp;&nbsp;<i>'.$dia[$i]->time.'</i></li>' ;
             //echo '<li>时间:'.$dia[$i]->time.'</li>' ;
             echo '<li class="dialog">'.$dia[$i]->msg.'</li><br>' ;
         }
         
    }else
    {
        echo 'failed to write the msg.xml' ;
    }
}
/* 
 * 获取用户ip地址
 */
function getip()
{
        $ipinfo=$_SERVER["REMOTE_ADDR"];

         return $ipinfo;
}

?>
