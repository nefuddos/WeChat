function ShowMes()
{
	var xmlhttp;
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
	   if (xmlhttp.readyState==4 && xmlhttp.status==200)
	   {
	   		document.getElementById("chat").innerHTML=xmlhttp.responseText;
	   }
	}
	xmlhttp.open("GET","",true);  //中间的URL是获取信息的位置，你根具信息的存储位置写一下
	xmlhttp.send();
}

function send_Mes(){
	var Mes=document.getElementById("message");
	//var send=document.getElementById("send");
	//var chat=document.getElementById("chat");
	//var user=document.getElementById("user");
	if (Mes.value=="") {
		alert("发送信息不能为空！");
	}
	else
	{
	                      //这一部分如何将数据发送到服务器，以及存在什么文件中方便ajax获取,你写一下
		ShowMes();        //聊天区域显示信息
	}

}