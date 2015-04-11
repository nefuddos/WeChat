window.onload=function(){
    //第一次加载的时候,显示聊天信息,和在线人员的状态
      bridge("","../common/readMSG.php","chat","POST");
      document.getElementById("message").focus();
      onlinePeople();
};
function onlinePeople()
{
           bridge("","../common/state.php","user","POST");
}
function bridge(msg,url,tag,method)//这个函数为公共函数
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
	   		document.getElementById(tag).innerHTML=xmlhttp.responseText; 
	   }
	}
                  var param = "msg="+msg;
	xmlhttp.open(method,url,true); 
                  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send(param);
}

function send_Mes(){
	var Mes=document.getElementById("message");
                  var url ="../common/receiveTheMSG.php";
	//var send=document.getElementById("send");
	//var chat=document.getElementById("chat");
	//var user=document.getElementById("user");
	if (Mes.value=="") {
		alert("发送信息不能为空！");
	}
	else
	{
		bridge(Mes.value,url,"chat","POST");        //将聊天信息写入msg.xml文件
        bridge("","../common/readMSG.php","chat","POST");//显示msg.xml文件的信息
        clear();
        onlinePeople(); //更新在线的显示人数
	}

}
function clear()
{
	document.getElementById("message").value="";
}