<html>
<head>
    <meta http-equiv="content-type" Content="text/html;charset=utf-8">
</head>
</html>
<?php
include"config.php";
session_start();
header("Content-Type=text/html;charset=utf-8");
$rid=$_SESSION['userid'];
$rec=$_POST['sug'];
$sql="INSERT INTO recom(id,rid,rec)VALUES('','{$rid}','{$rec}')";
 $res=mysql_query($sql,$conn);
if($res)
{
	echo"感谢您的推荐！";
	echo "<p><a href='main.php'>返回主页</a></p>";
}
?>