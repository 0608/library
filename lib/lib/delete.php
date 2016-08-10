<html>
<head>
    <meta http-equiv="content-type" Content="text/html;charset=utf-8">
    </head>
    </html>
<?php
include"config.php";
if(isset($_GET['userid']))
{
	$userid=$_GET['userid'];
	$sql="DELETE  FROM userinfo where userid='{$userid}'";
	$res=mysql_query($sql)or die(mysql_error());
	
}
else
if(isset($_GET['bid']))
{
   $bid=$_GET['bid'];
   $sql="DELETE FROM bookinfo where bid='{$bid}'";
   $res=mysql_query($sql)or die(mysql_error());
}
if($res)
	{
		echo"<script>alert('删除成功！');window.location.href='manage.php';</script>";

	}
?>