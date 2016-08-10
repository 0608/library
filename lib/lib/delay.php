 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta http-equiv="content-type" Content="text/html;charset=utf-8">
     <title>Document</title>
 </head>
 <body>
     

 <?php
   include"config.php";
    session_start();
    $userid=$_SESSION['userid'];
    $time=date("Y-m-d");
    $sql="SELECT * FROM borrowinfo WHERE rid='$userid'and mloop=0";
    $res=mysql_query($sql);
    $row=mysql_fetch_array($res);
    list($year,$mon,$day)=explode('-',$row['deadline']);
    list($year1,$mon1,$day1)=explode('-',$time);
      if(($mon1>$mon)||(($mon1=$mon) && ($day1>$day)))
      {   
        $sql1="UPDATE borrowinfo SET delay=1 WHERE rid='$userid' and mloop=0";
        $res1=mysql_query($sql1);
        $sql2="SELECT * FROM borrowinfo WHERE rid='$userid' and delay=1";
        $res2=mysql_query($sql2);
       while(mysql_fetch_array($res2)){
        echo"超期图书:";
        echo"<table>";
        echo"<tr><td>书号</td><td>书名</td><td>应还日期</td><td>罚款额度</td></tr>";
        echo"<tr><td>".$row2['bid']."</td><td>".$row2['bookname']."</td><td>".$row2['deadline']."</td><td>10</td><td>还书/交罚款</td></tr>";
      }
    }
    else{
        echo "<script>alert('没有超期图书');window.location.href='main.php';</script>";
        }
 ?>
  </body>
 </html>