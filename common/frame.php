<?php
/*解析xml文件的例子
 * 传入的参数为文件的绝对路径
 * 使用<li></li>列出xml文件的信息
 */
//$filename = '/home/rjg/php/MyBlog/xml/base.xml';
function AnalysisXML( $filename ) {
     if( file_exists ( $filename) )
    {
        $xml = simplexml_load_file($filename);
        print '标题: <li>'.$xml->title.'</li>';
        
        $length = sizeof($xml->menu->a);
        for($i =0 ;$i<$length;$i++)
        {
           print '<li>'.$xml->menu->a[$i].'</li>'; 
        }

    } else 
    {
        echo 'failed to access the base.xml' ;
    }
}

function AccountXML($filename){
         if( file_exists ( $filename) )
    {
        $xml = simplexml_load_file($filename);
        print '标题: <li>'.$xml->title.'</li>';
        
        $length = sizeof($xml->menu->a);
        for($i =0 ;$i<$length;$i++)
        {
           print '<li>'.$xml->menu->a[$i].'</li>'; 
        }

    } else 
    {
        echo 'failed to access the base.xml' ;
    }
}
?>