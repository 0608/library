<!doctype html>
<html lang="en">
<html>
<head>
    <meta http-equiv="content-type" Content="text/html;charset=utf-8">
    <title>还书</title>
</head>
</html>
<?php
include"config.php";
session_start();
$bname=$_GET['bname'];
$rid=$_SESSION['userid'];
$datetime=date("Y-m-d");
$sql="UPDATE borrowinfo SET mloop='1' WHERE bname='$bname'and rid='$rid'";
$sql1="UPDATE borrowinfo SET returntime='$datetime' WHERE bname='$bname'and rid='$rid'";
$res=mysql_query($sql)or die(mysql_error());
$res1=mysql_query($sql1) or die(mysql_error());
if($res && $res1)
{
	echo"<script>alert('还书成功！');window.location.href='selfinfo.php';</script>";
	echo"<p><a href='selfinfo.php'>返回个人中心</a></p>";
}
?>