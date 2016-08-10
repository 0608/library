<html>
<head>
    <meta http-equiv="content-type" Content="text/html;charset=utf-8">
    </head>
 </html>
<?php
include"config.php";
  $bid=$_GET['bid'];
  $sql="UPDATE bookinfo SET appoint=0,appointer=null where bid='$bid'";
  $res=mysql_query($sql);
  if($res)
  {
  	echo "<script>alert('解约成功');window.location.href='selfinfo.php';</script>";
  }

?>