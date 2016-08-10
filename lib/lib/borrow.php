<html>
<head>
    <meta http-equiv="content-type" Content="text/html;charset=utf-8">
    </head>
    </html>
<?php
   include'config.php';
    session_start();
    if(!isset($_SESSION['username']))
    {
        echo "<script>alert('请先登录！');window.location.href='login.php';</script>";
    }
    $time=date("Y-m-d");
    $userid=$_SESSION['userid'];
    $schinfo=$_GET['schinfo'];
    $sql0="SELECT * FROM borrowinfo WHERE rid='$userid'and mloop=0";
    $res0=mysql_query($sql0);
    $delay=array(0,0,0);
    if(mysql_num_rows($res0)>0){
     $row0=mysql_fetch_array($res0);
     list($year,$mon,$day)=explode('-',$row0['deadline']);
     list($year1,$mon1,$day1)=explode('-',$time);
     
      if($mon=$mon1){
        if($day1>$day){$delay[1]=1;}  
      }
      elseif($mon1>$mon){$delay[2]=1;}
    }
     if( $delay[1]==1||$delay[2]==1)
     {
      echo"<script>alert('有超期图书，无法借书！');window.location.href='selfinfo.php';</script>";
     }
   else{
    $sql="SELECT * from bookinfo where bookname='{$schinfo}' or author='$schinfo'and appoint=0 and appointer !='$userid'";
    $res=mysql_query($sql);
    $row=mysql_fetch_array($res);
    if($row['num']>0){
    $sql1="update bookinfo set num=num-1,appoint=0,appointer=null where bookname= '{$schinfo}'";
    $res1=mysql_query($sql1);
    $deadline = date("Y-m-d",strtotime("+3 days"));
    $datetime = date("Y-m-d");
    $bookname=$row['bookname'];
    $bid=$row['bid'];
    $sql2="INSERT INTO borrowinfo(rid,bid,bname,borrowtime,deadline,mloop)VALUES('$userid','$bid','$bookname','$datetime','$deadline','0')";
    $res2=mysql_query($sql2) or die(mysql_error());

    if($res1 && $res2 )
    {
   	echo "<script>alert('借阅成功！返回个人主页');window.location.href='selfinfo.php';</script></script>";
    }
  }
 else{
  echo"<script>alert('已经借光！返回个人主页');window.location.href='selfinfo.php';</script>";
 }
}
   echo"<a href='selfinfo.php'>返回个人中心</a>";
?>