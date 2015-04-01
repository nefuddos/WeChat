<?php
header('Content-Type: text/html; charset=utf-8');
$filename = '/home/rjg/php/MyBlog/xml/base.xml';
    if( file_exists ( $filename) )
    {
        $xml = simplexml_load_file($filename);
        print '标题: <li>'.$xml->title.'</li>';
    } else 
    {
        echo 'failed to access the base.xml' ;
    }
?>