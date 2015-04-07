function ShowMes(msg)
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
	   		document.getElementById("chat").innerHTML=xmlhttp.responseText; //这里能不能改成直接向chat这个div里面直接添加呢?而不是每次都更新
	   }
	}
                  var param = "msg="+msg;
	xmlhttp.open("POST","../common/receiveTheMSG.php?",true);  //中间的URL是获取信息的位置，你根具信息的存储位置写一下
                  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send(param);
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
		ShowMes(Mes.value);        //聊天区域显示信息
	}

}


//在js中实现一个函数,功能为当窗体加载的时候,这个函数就会执行,,,,,通过ajax,访问后台的, ../common/state.php