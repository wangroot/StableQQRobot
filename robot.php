<?php
function checkString($str,$substr){
        $kk= strrpos($str,$substr); 
        if(!($kk===false)){
            return true;         
        }else{
            return false;
        }
    }
function checkStringArray($str,$substrarray)
{
	foreach($substrarray as $substr)
	{
		if(checkString($str,$substr))
		{
			return true;
		}
	}
	return false;
}
if($_POST)
{
	if($_POST['Event']=="ReceiveClusterIM")
	{
		$d=strtotime("+8 hour");
		$d2 = date("Y-m-d h:i:sa", $d);
		if(checkString($_POST['Message'],"翻墙"))
		{
			$qqnum=$_POST['QQ'];
			$groupID=$_POST['ExternalId'];
			echo("<&&>SendClusterMessage<&>$groupID<&>事件时间： $d2 . 当事人账号：$qqnum . 可能包含禁止词汇：谩骂类词汇 请管理员尽快处理");
		}
		if(checkStringArray($_POST['Message'],["兼职","艹","奸","玛","妈","蛋"]))
		{
			$qqnum=$_POST['QQ'];
			$groupID=$_POST['ExternalId'];
			echo("<&&>SendClusterMessage<&>$groupID<&>事件时间： $d2 . 当事人账号：$qqnum . 包含禁止词汇：f_a#n^qiang 请管理员尽快处理");
		}
		if(checkStringArray($_POST['Message'],["老p","p神","philo"]))
		{
			$qqnum=$_POST['QQ'];
			$groupID=$_POST['ExternalId'];
			echo("<&&>SendClusterMessage<&>$groupID<&>philo 才是最帅！");
		}
		//echo "<&&>SendClusterMessage<&>154551097<&>事件时间： $d2 == "
		if($_POST['Message']=="#时间")
		{
			$qqnum=$_POST['QQ'];
			$groupID=$_POST['ExternalId'];
			echo("<&&>SendClusterMessage<&>$groupID<&>当前时间： $d2 ");
		}
		if($_POST['Message']=="#机器人")
		{
			$qqnum=$_POST['QQ'];
			$groupID=$_POST['ExternalId'];
			echo("<&&>SendClusterMessage<&>$groupID<&>哈哈我是机器人怎么！！！不服，有管理员权限就t了你");
		}
		if($_POST['Message']=="#我晕")
		{
			$qqnum=$_POST['QQ'];
			$groupID=$_POST['ExternalId'];
			echo("<&&>SendClusterMessage<&>$groupID<&>不过是个机器人罢了晕什么？");
		}
	}
}
?>