<?php
#phpclass的新用法
class ShopProduct{
public
$title = "apple"; #php中的属性
		function getTitle()
		{
			return $this->title; #成员函数
		}
		function __construct($title)  #构造函数
		{
			$this -> title = $title;
		}
		function resizeTitle(string $string ) #强制规定参数类型必须为string
		{
			$this->title = string;
		}
}

$product1 = new ShopProduct();
$product2 = new ShopProduct("orange");

var_dump($product1);
echo "<br/>";
var_dump($product2);
print $product1->title;
echo "<br/>";
print "\n". $product2->getTitle();

echo "<br/>";


?>
