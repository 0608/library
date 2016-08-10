<?php
   include"config.php";
  if($_SERVER["REQUEST_METHOD"]=="POST")
   {
	$username=$_POST['username'];
  	$pwd=$_POST['pwd'];
  	$phone=$_POST['phone'];
  	$birth=$_POST['yyyy']."-".$_POST['mm']."-".$_POST['dd'];
  	$major=$_POST['major'];
  	$sex=$_POST['sex'];

     $sql="UPDATE userinfo SET username='{$username}', pwd='{$pwd}',sex='{$sex}', phone='{$phone}',birth='{$birth}',major='{major}'";
     $res=mysql_query($sql,$conn);
    if(!$res)
    {
    	echo"更新失败！";
    }
     else
     {
       echo"<script type='text/javascript'> alert('更新成功!');window.location.href='selfinfo.php';</script>";
     }
  
}
     
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" Content="text/html;charset=utf-8">
	<title>register</title>
	<script type="text/javascript">
     function check()
     {
       	if(document.regist.username.value==''||document.regist.pwd==''||document.regist.password2=='')
     	{
     		window.alert("带'*'号的后缀的框必填！！");
     		return false;
     	}
     	if(document.regist.pwd.value != document.regist.password2.value)
     	{
     		window.alert("两次密码不一致！");
     		return false;
     	}
     }
	</script>
  <style>
      body{background:url("img/bg16.jpg") no-repeat;}
   .td1{width:100px;height:30px;}
  </style>
</head>
<body>
<form action="reg.php" method="post" name="regist" onsubmit="return check();">
<table id="table1" align="center">
	<tr>
		<td>用户名：</td>
		<td><input type="text"  name="username" /> *</td>
	</tr>
	<tr>
		<td>密码：</td>
		<td><input type="password" name="pwd" /> *</td>
	</tr>

    <tr>
		<td>确认密码：</td>
		<td><input type="password" name="password2" /> * </td>
	</tr>
	<tr>
		<td>性别：</td>
		<td><input type="radio" value='男' name="sex" checked="checked" />男  <input type="radio" value='女' name="sex" />女</td>
	</tr>
	<tr>
		<td>出生日期:</td>
		<td>
		<select name="yyyy">
		<?php
			for($i=2012;$i>1912;$i--){
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
	<tr>
	<td>专业：</td>
	<td><input type="text" name="major"></td>
	</tr>
	<tr>
	<td>手机号：</td>
	<td><input type="text" name="phone"></td>
	</tr>
	<tr>
	<td></td>
		<td><input type="submit" value=" 提交 " id="submit" /></td>
		<td><a href="main.php">返回主页>></td>
	</tr> 
</table>
</form>
</body>
</html>