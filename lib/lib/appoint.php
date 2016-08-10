<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" Content="text/html;charset=utf-8">
	<title>预约书籍</title>
	<style type="text/css">
	body{background:url("img/bg20.jpg") no-repeat;margin:0px auto;font-size:25px;color:white;}
	table{margin-top:40px;}
	</style>
	
</head>
<body>
	<a href='main.php'>返回主页</a>
</body>
</html>
<?php
  include'config.php';  
    $sql="SELECT * FROM bookinfo where appoint=0";
    $res= mysql_query($sql);
    echo "<table border='1' cellspacing='1' align='center'>";
    echo"<th></th><th>在馆书籍</th>";
    echo "<tr><td>ISBN</td><td>书名</td><td>类型</td><td>语言类型</td><td>作者</td><td>数量</td></tr>";
    while ($row = mysql_fetch_array($res)) {
        echo "<tr><td>" . $row['bid'] . "</td><td>" . $row['bookname'] . "</td><td>" . $row['kind'] . "</td><td>" . $row['language'] . "</td><td>"
        . $row['author'] . "</td><td>" . $row['num'] . "</td><td><a href='ck_appoint.php?bid=".$row['bid']."'>预约</td></tr>";
    }
    echo "</table>";
    
?>