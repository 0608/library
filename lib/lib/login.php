<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" Content="text/html;charset=utf-8">
	<title>login</title>
  <script type="text/javascript">
  function check(){
    if(document.login.username.value==''||document.login.password.value==''){
        window.alert("用户名或密码不能为空！");
      return false;
    }
  }
  </script>
	<style type="text/css">
	body{background:url("img/bg18.jpg") no-repeat;}
	#reg{margin:100px auto;font-size:20px;display:block;text-align:center;}
  .return{margin:10px 20px;font-size:15px;}
	input{width:200px;height:30px;margin:3px;}
	.submit{width:65px;height:35px;}
  a{text-decoration: none;}
	</style>
</head>
<body>

<div id="reg">
<h1> 欢迎登陆</h1>
<form name="login" method="post" action="ck_login.php" onsubmit="return check();">
<table align=center cellpadding="0px">
  <tr>
  <td>用户名:</td><td><input class="box"type="text" name="username"/></td>
  </tr>
  <tr>
  <td>密码:</td><td><input class="box" type="password" name="password"/></td>
  </tr>
  <tr>
  <td></td>
  <table align="center">
  <tr>
    <td width="60px"></td>
    <td ><input class="submit" type="submit" name="submit" value="登陆"/></td>
    <td ></td>
    <td width="130px"><a class="return" href="main.php">>>返回主页</a></td>
  </tr>
  <table>
  </tr>
  </table>
</form>
 </div>
</body>
</html>