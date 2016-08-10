<html>
<head>
    <meta http-equiv="content-type" Content="text/html;charset=utf-8">
    <style type="text/css">
        body{background:url("img/bg7.jpg")no-repeat;font-family:楷体;font-size:30px;}
        input{height:40px;}
        a{float:left;}
        #content{width:300px;margin-top:80px;float:left;}
        #recom {width:250px;height:50px;display:block;margin-top:30px;float:right;margin-right:100px;}
       td{font-size:30px;color:white;}
    </style>
</head>
<body>
<a href='main.php'>返回主页</a>
<?php
include'config.php';
header("Content-Type=text/html;charset=UTF-8");
session_start();
 if(isset($_GET['select'])){
    $var = $_GET['select'];
    $schinfo=$_GET['schinfo'];
    
    if($var =='author')
    {
     $sql="SELECT * FROM bookinfo WHERE author like '%{$schinfo}%'";
    }
    else
      if($var=='bname'){
     $sql="SELECT * FROM bookinfo WHERE bookname like '%{$schinfo}%'";
      }
    }
  else
  {
   $schinfo=$_GET['schinfo'];
   $sql="SELECT * FROM bookinfo WHERE bookname = '$schinfo'";
  }
   $res=mysql_query($sql);
   $num=mysql_num_rows($res);
   if($num<1)
   {
   	echo"没有该图书信息！可以向我们推荐";
   }
   else
   {
   $row=mysql_fetch_array($res);
       ?>
   <div id="content">
   <?php
   echo"<table align='center'><tr><td cols='2'>查询信息:</td></tr>";	
   echo "<tr><td>书号:</td><td>".$row['bid']."</td></tr><tr><td>书名:</td><td>".$row['bookname']."</td></tr><tr><td>类别:</td><td>".$row['kind']."</td></tr><tr><td>作者:</td><td>".$row['author']."</td></tr><tr><td>语言:</td><td>".$row['language']."</td></tr>"; 
   echo"<tr><td><a href='borrow.php?schinfo=".$schinfo."'>借阅</a></td></tr></table>";
   }
   ?>
   </div>

    <div id="recom">
      <form method="post" action="recom.php">
      <table>
          <tr>
      <td><input type="text" name="sug" size="40"/></td>
      <td><input type="submit" value="推荐" size="30" /></td>
          </tr>
      </table>
      </form>
    </div>
 </body>
</html>