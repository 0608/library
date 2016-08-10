<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" Content="text/html;charset=utf-8">
    <title>主页</title>
    <link type="text/css" href="bulm.css" rel="stylesheet"/>
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script  type="text/javascript">
        $(function(){
            $("li").hover(function(){
                $(this).css("background","#FFC79B").css("cursor","pointer");
                $(this).siblings().css("background","");})})
    </script>
</head>
<?php 
include'config.php';
session_start();
if(!isset($_SESSION['username']))
{
	echo"<div style='width:100%;height:40px;background:#99A70D;line-height: 40px;'><a href='login.php'><span style='margin-left:30px;'>登陆</span></a></div>";
}
else{
$username=$_SESSION['username'];
 echo "<p>欢迎<span style='color:red'>&nbsp;&nbsp;".$username."</span></p>";
 echo"<p><a href='exit.php'>注销</a></p>";
}
$bname=array("西游记","水浒传","三国演义","名人传","安徒生童话","格列佛游记","一千零一夜","复活");
?>
<body>
<div id="nav">
<ul>
  <li id="first"><a href="main.php">首页</a></li>
  <li><a href="selfinfo.php">个人信息</a></li>
  <li><a href="manage.php">管理图书</a></li>
  <li><a href="appoint.php">预约图书</a></li>
</ul>
</div>
<div id="borrow">
    <p>书籍借阅区:</p>
    <form method="get"  action="search.php">
    <select name="select">
      <option  value="author">作者名</option>
      <option  value="bname">作品名</option>
     </select>
 <input class="word" type="text" name="schinfo" size="40"/>
 <input class="submit"type="submit" name="search" value="查询"/>

</form>
</div>
<div id="list">
	<ul>
		<li ><a href="search.php?schinfo=<?php echo $bname[0];?>"><img src="img/西游记.jpg"/></a></li>
		<li ><a href="search.php?schinfo=<?php echo $bname[2];?>"><img src="img/三国演义.jpg"/></a></li>
		<li ><a href="search.php?schinfo=<?php echo $bname[1];?>"><img src="img/水浒传.jpg"/></a></li>
		<li ><a href="search.php?schinfo=<?php echo $bname[3];?>"><img src="img/名人传.jpg"/></a></li>
		<li ><a href="search.php?schinfo=<?php echo $bname[4];?>"><img src="img/安徒生童话.jpg"/></a></li>
		<li><a href="search.php?schinfo=<?php echo $bname[5];?>"><img src="img/格列佛游记.jpg"/></a></li>  
		<li><a href="search.php?schinfo=<?php echo $bname[6];?>"><img src="img/一千零一夜.jpg"/></a></li> 
		<li><a href="search.php?schinfo=<?php echo $bname[7];?>"><img src="img/复活.jpg"/></a></li>
	</ul>
</div>
</body>
</html>