<html>
<head>
    <meta http-equiv="content-type" Content="text/html;charset=utf-8">
    <style>
        body{background:url("img/bg15.jpg") no-repeat;}
        td{width:200px;height:40px;}
        #origin,#new{margin:50px 40px;}
    </style>
    </script>
    </head>
    <body>
    	<a href='main.php'>返回</a>
    </body>
</html>
<?php
include"config.php";
session_start();
if(!isset($_SESSION['userid']))
{
	header("Location:login.php");
}
if(isset($_GET['bid'])){
  $bid=$_GET['bid'];
  $_SESSION['bid']=$bid;
$sql="SELECT * from bookinfo where bid='$bid';";
$res=mysql_query($sql);
$row=mysql_fetch_array($res);
?>
<div id="origin">
<table border=1>
<tr><td>书名</td><td>类型</td><td>语言</td><td>作者</td><td>数量</td></tr>
<?php
echo"<tr><td>".$row['bookname']."</td><td>".$row['kind']."</td><td>".$row['language']."</td><td>".$row['author']."</td><td>".$row['num']."</td></tr>";
 ?>
</table>
</div>
<form action="ck_revise.php" method="get">
<table cellspacing="1">
<tr><td>书名</td><td><input type="text" name="bname"/></td></tr>
<tr><td>类型</td><td><input type="text" name="kind"/></td></tr>
<tr><td>语言</td><td><input type="text" name="language"/></td></tr>
<tr><td>作者</td><td><input type="text" name="author"/></td></tr>
<tr><td>数量</td><td><input type="text" name="number"/></td></tr>
<tr><td></td><td><input type="submit" value="修改"/></td></tr>
</table>
</form>
<?php
}
else
if(isset($_GET['userid'])){
 
  $userid=$_GET['userid'];
   $_SESSION['rid']=$userid;
  $sql="SELECT * from userinfo where userid='$userid'";
  $res=mysql_query($sql);
  $row=mysql_fetch_array($res);
  ?>
  <div id='new'>
 <table cellspacing='1' border=1>
  <tr><td>用户名</td><td>手机号</td><td>专业</td><td>性别</td><td>身份</td></tr>
  <?php
  if($row['root']==1)
  {
  	$ident="管理员";
  }
  else{
  	$ident="普通借阅者";
  }
  echo"<tr><td>".$row['username']."</td><td>".$row['phone']."</td><td>".$row['major']."</td><td>".$row['sex']."</td><td>".$ident."</td></tr>";
  ?>
<form action="ck_revise.php" method="get">
<table cellspacing="1">
<tr><td>姓名：</td><td><input type="text" name="username"/></td></tr>
<tr><td>性别：</td><td><input type="text" name="sex"/></td></tr>
<tr><td>手机号：</td><td><input type="text" name="phone"/></td></tr>
<tr><td>专业：</td><td><input type="text" name="major"/></td></tr>
<tr>
                <td >出生日期：</td>
                <td>
                    <select name="yyyy">
                        <?php
                        for($i=2012;$i>1000;$i--){
                            echo "<option value='{$i}'>$i</option>";
                        }
                        ?>
                    </select>年
                    <select name="mm">
                        <?php
                        for($i=1;$i<=12;$i++){
                            echo "<option value='{$i}'>$i</option>";
                        }
                        ?>
                    </select>月
                    <select name="dd">
                        <?php
                        for($i=1;$i<=31;$i++){
                            echo "<option value='{$i}'>$i</option>";
                        }
                        ?>
                    </select>日
                </td>
            </tr>
<tr><td></td><td><input type="submit" value="修改"/></td></tr>
</table>
</form>
<?php
}
?>

