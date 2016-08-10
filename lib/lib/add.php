<html>
<head>
    <meta http-equiv="content-type" Content="text/html;charset=utf-8">
    </head>
    </html>
<?php 
   include"config.php";
   if(isset($_POST['ISBN'])){
    $sql1="SELECT * from bookinfo where bid='{$_POST['ISBN']}'";
    $res1=mysql_query($sql1);
    if(mysql_num_rows($res1)>1)
    {
        $sql="UPDATE bookinfo SET num=num+1 WHERE bid='{$_POST['ISBN']}'";
    }
    else{
    $bid=$_POST['ISBN'];
    $bookname = $_POST['bookname'];
    $kind=$_POST['kind'];
    $language=$_POST['language'];
    $author=$_POST['author'];
    $number=$_POST['number'];
    $yyyy=$_POST['yyyy'];
    $mon=$_POST['mm'];
    $day=$_POST['dd'];
    $pubtime=$yyyy."-".$mon."-".$day;
    echo $pubtime;
    $sql = "INSERT INTO bookinfo(bid,bookname,kind,language,author,num,pubtime)VALUES ('{$bid}','{$bookname}','{$kind}','{$language}','{$author}','{$number}','{$pubtime}')";
    $res=mysql_query($sql) or die(mysql_error());
    }
    }

    if(isset($_POST['username'])){
        $username=$_POST['username'];
        $pwd=$_POST['pwd'];
        $phone=$_POST['phone'];
        $major=$_POST['major'];
        $year=$_POST['yyyy'];
        $mon=$_POST['mm'];
        $day=$_POST['dd'];
        $birth=$year."-".$mon."-".$day;
        $sex=$_POST['sex'];
        $root=$_POST['root'];
        $sql="INSERT INTO userinfo(userid,username,pwd,phone,major,birth,sex,root) VALUES('','$username','$pwd','$phone','$major','$birth','$sex','0')";
        $res=mysql_query($sql) or die(mysql_error());
     }
    if($res)
    {
        echo"<script type='text/javascript'>alert('添加成功！');window.location.href='manage.php';</script>";
    }
?>