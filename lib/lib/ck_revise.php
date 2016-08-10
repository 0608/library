<html>
<head>
    <meta http-equiv="content-type" Content="text/html;charset=utf-8">
    </head>
</html>
<?php
include"config.php";
session_start();
if(isset($_SESSION['bid'])&&(isset($_GET['bname'])))
{
$bid=$_SESSION['bid'];
$bname=$_GET['bname'];
$kind=$_GET['kind'];
$language=$_GET['language'];
$author=$_GET['author'];
$number=$_GET['number'];
$sql="UPDATE bookinfo SET bookname='$bname',kind='$kind',language='$language',author='$author',num='$number' WHERE bid='$bid'";
$res=mysql_query($sql) or die(mysql_error());
unset($_SESSION['bid']);
}
if(isset($_SESSION['rid'])&&(isset($_GET['username'])))
{   
	$userid=$_SESSION['rid'];
	$username=$_GET['username'];
	$sex=$_GET['sex'];
	$phone=$_GET['phone'];
	$year=$_GET['yyyy'];
	$mon=$_GET['mm'];
	$day=$_GET['dd'];
	$birth=$year."-".$mon."-".$day;
   $sql="UPDATE userinfo SET username='$username',sex='$sex',birth='$birth',phone='$phone' WHERE userid='$userid'";
   $res=mysql_query($sql)or die(mysql_error());
   unset($_SESSION['rid']);
}
if($res)
{
  echo"<script>alert('修改成功!');window.history.back();</script>";
}

?>