<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
</html>
<?php
    include'config.php';  
    session_start();  
    if(!isset($_GET['bid']))
       {
          header("Location:main.php");
       }
      if(!isset($_SESSION['userid']))
        {
	    header("Location:login.php");
        }
       $bid=$_GET['bid'];
       $userid=$_SESSION['userid'];
       $sql1="UPDATE bookinfo SET appoint=1,appointer='$userid' WHERE bid='$bid'";
       $res1=mysql_query($sql1);
       if($res1)
       echo "<script>alert('预约成功');window.location.href='appoint.php';</script>";
?>