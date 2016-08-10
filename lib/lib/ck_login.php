<html>
<head>
    <meta http-equiv="content-type" Content="text/html;charset=utf-8">
</head>
</html>
<?php
      include'config.php';
      session_start();
        $username=$_POST['username'];
        $password=$_POST['password'];
        $sql="SELECT * FROM userinfo WHERE username='{$username}'AND pwd='{$password}'";
        $res=mysql_query($sql);
        $row=mysql_fetch_array($res);
        if(mysql_num_rows($res)<1){
          echo"<script>alert('用户名或密码错误!');window.location.href='main.php';</script>";
        }
        else{
          $_SESSION['userid']=$row['userid'];
          $_SESSION['username']=$_POST['username'];
          $_SESSION['pwd']=$_POST['password'];
        echo "<script>alert('登录成功');window.location.href='main.php';</script>";
        }
?>