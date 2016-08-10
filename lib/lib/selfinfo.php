<!doctype html>
<html>
<head>
    <meta http-equiv="content-type" Content="text/html;charset=utf-8">
    <title>个人信息</title>
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script  type="text/javascript">
    $(function(){
    $("li").hover(function(){ 
      $(this).css("background","blue").css("cursor","pointer");
      $(this).siblings().css("background","#f5d1a3");})})
    function div1()
    {
      document.getElementById('div1').style.display='block';
      document.getElementById('div2').style.display='none';
      document.getElementById('div3').style.display='none';
      document.getElementById('div4').style.display='none';
    }
    function div2()
    {
      document.getElementById('div1').style.display='none';
      document.getElementById('div2').style.display='block';
      document.getElementById('div3').style.display='none';
      document.getElementById('div4').style.display='none';
    }
    function div3()
    {
      document.getElementById('div3').style.display='block';
      document.getElementById('div1').style.display='none';
      document.getElementById('div2').style.display='none';
      document.getElementById('div4').style.display='none';
    }
    function div4(){
      document.getElementById('div4').style.display='block';
      document.getElementById('div1').style.display='none';
      document.getElementById('div2').style.display='none';
      document.getElementById('div3').style.display='none';


    }
    </script>
    <style type="text/css">
       *{margin:0px;padding:0px;}
       body{background:url("img/bg3.jpg") no-repeat;margin:0px auto;font-size:30px;}
       ul{width:300px;height:370px;margin:30px 30px;float:left;background:#efe9c0; }
       li{width:200px;height:60px;line-height:60px;background:#f5d1a3;margin:30px auto;font-family:幼圆;font-size:25px;
       padding-left:30px;list-style:none;}
       #div1,#div2,#div3,#div4{width:700px;height:140px;float:left;margin:50px 20px;font-size:26px; }
       #div1{display:block;}
       #div2,#div3,#div4{display:none;}
       td{width:420px;}
       table{text-align:center;}
   </style>
</head>
<body>
  <?php
 include 'config.php';
 session_start();
 header("Content-Type=text/html;charset=utf8");
  echo "<a href='main.php'>《《返回主页</a>";
  if(empty($_SESSION['username']))
    {
      echo"<a href='login.php'>还未登陆</a>";
    }
  else
   {
      $username=$_SESSION['username'];
      $userid=$_SESSION['userid'];
      $sql="select * from userinfo where username='{$username}'";
      $res=mysql_query($sql,$conn);
      $row=mysql_fetch_array($res);
  ?>

  <ul>
    <li onclick="div1()">个人信息:</li>
    <li onclick="div2()">当前借阅:</li>
    <li onclick="div3()">借阅历史:</li>
    <li onclick="div4()">预约图书：</li>
  </ul>

  <div id="div1">
      <table border=1 cellspacing=1>
       <?php
       echo "<tr><td>用户名:</td><td>".$row['username']."</td></tr><tr><td>出生日期:</td><td>"
      .$row['birth']."</td></tr><tr><td>专业:</td><td>" .$row['major']."</td></tr><tr><td>联系方式:</td><td>"
      .$row['phone'] ."</td></tr>";
      ?>
      </table>
      <?php
        echo "<a href='revise.php?userid=".$userid."' style='color:red'>修改个人信息》》</a>";
      ?>
  </div>

  <div id="div2">
     <?php
      $sql1="select * from borrowinfo where rid= '{$userid}'and mloop=0;";
      $res1=mysql_query($sql1);
      ?>
      <table border=1 cellspacing=1>
        <tr><td>ISBN</td><td>书名</td><td>借书日期</td><td>应还日期</td></tr>
      <?php
        while($row1=mysql_fetch_array($res1))
       {
       $return=$row1['mloop'];
       $return = "还书";
       $bname=$row1['bname'];
       $bid=$row1['bid'];
       $time=date("Y-m-d");
       echo " <tr><td>" . $bid . "</td><td>" . $bname . "</td><td>" . $row1['borrowtime'] . "</td><td>" .
       $row1['deadline'] . "</td><td><a href='return.php?bname=".$bname."'>" . $return . "</a></td>";
        list($year,$mon,$day)=explode('-',$row1['deadline']);
        list($year1,$mon1,$day1)=explode('-',$time);
       if(($mon1>$mon)||(($mon1=$mon) && ($day1>$day)))
        {
        echo"<td>超期</td></tr>";
        }
       else{
        echo"<tr>";
       }
      }
      ?>
      </table>
    </div>

    <div id="div3">
      <?
      $sql2="select * from borrowinfo where rid= '{$userid}'and mloop=1;";
      $res2=mysql_query($sql2);
     ?>
     <table border=1 cellspacing=1>
     <tr><td>书名</td><td>借书日期</td><td>还书日期</td></tr>
     <?php
      while($row2=mysql_fetch_array($res2))
      {
      $bname=$row2['bname'];
      echo " <tr><td><a href='search.php?bname=".$bname . "'>".$bname."</a></td><td>".$row2['borrowtime']."</td><td>".$row2['returntime'] ."</td></tr>";
     }
    ?>
    </table>
    <?php
    }
    ?>
  </div>

  <div id="div4">
    <?php
      $sql3="SELECT * FROM bookinfo WHERE appointer='{$userid}' and appoint=1";
      $res3=mysql_query($sql3) or die(mysql_error());
    ?>
    <table border=1 cellspacing=1>
    <tr><td>预约书号</td><td>预约书名</td><td>失效日期</td></tr>
      <?php 
        $inval=date("Y-m-d",strtotime("+3 days"));
        if(mysql_num_rows($res3)>0)
          while($row3=mysql_fetch_array($res3))
           echo"<tr><td>".$row3['bid']."</td><td>".$row3['bookname']."</td><td>".$inval."</td><td><a href='del_app.php?bid=".$row3['bid']."'>解除预约</a></td><td><a href='borrow.php?schinfo=".$row3['bookname']."'>去借书</a></td></tr>";
      ?>
    </table>
  </div>
</body>
</html>