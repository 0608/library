<?php
  include'config.php';
  session_start();
  ?>
<!doctype html>
<html>
<head>
    <meta http-equiv="content-type" Content="text/html;charset=utf-8">
    <title>管理</title>
    <style type="text/css">
        *{margin:0px;padding:0px;}
        #header{height:80px;background: #d9dfed;font-size:20px;}
        #header ul{margin-left:200px;line-height:50px;}
        #header ul li {width: 130px;height: 40px;float: left;list-style-type: none;margin-top:20px;margin-left:10px;}
       /*li:hover,li:visited,li:active {background: #ED7B4E;cursor:pointer;}
        li:active {display:block;background: #ED7B4E;cursor:pointer;}
        li:visited {display:block;background: #ED7B4E;cursor:pointer;}*/
        #userinfo,#bookinfo,#recom,#adduser,#borr,#appointt {display:none;}
        input{height:30px;}
        table{margin:0px auto;text-align:center;}
        td{height:40px;}
        a{float:right;margin-top:30px;text-decoration:none;}
        #td1{width:100px;}
    </style>
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script  type="text/javascript">
        $(function(){
            $("li").hover(function(){
                $(this).css("background","#ED7B4E").css("cursor","pointer");
                $(this).siblings().css("background"," #d9dfed");})
        })
        function addbook(){
          document.getElementById('addbook').style.display='block';
          document.getElementById('adduser').style.display='none';
          document.getElementById('bookinfo').style.display='none';
          document.getElementById('userinfo').style.display='none';
          document.getElementById('recom').style.display='none';
          document.getElementById('borr').style.display='none';
            document.getElementById('appointt').style.display='none';

      }
      function adduser(){
        document.getElementById('adduser').style.display='block';
        document.getElementById('bookinfo').style.display='none';
        document.getElementById('userinfo').style.display='none';
        document.getElementById('recom').style.display='none';
        document.getElementById('addbook').style.display='none';
        document.getElementById('borr').style.display='none';
        document.getElementById('appointt').style.display='none';
      }
      function userinfo(){
        document.getElementById('userinfo').style.display='block';
        document.getElementById('addbook').style.display='none';
        document.getElementById('adduser').style.display='none';
        document.getElementById('bookinfo').style.display='none';
        document.getElementById('recom').style.display='none';
        document.getElementById('appointt').style.display='none';
        document.getElementById('borr').style.display='none';
      }
      function bookinfo(){
        document.getElementById('bookinfo').style.display='block';
        document.getElementById('addbook').style.display='none';
        document.getElementById('adduser').style.display='none';
        document.getElementById('userinfo').style.display='none';
        document.getElementById('recom').style.display='none';
          document.getElementById('borr').style.display='none';
          document.getElementById('appointt').style.display='none';
      }
      function recom(){
        document.getElementById('recom').style.display='block';
        document.getElementById('addbook').style.display='none';
        document.getElementById('adduser').style.display='none';
        document.getElementById('bookinfo').style.display='none';
        document.getElementById('userinfo').style.display='none';
        document.getElementById('borr').style.display='none';
        document.getElementById('appointt').style.display='none';
      }
      function borrow(){
        document.getElementById('recom').style.display='none';
        document.getElementById('addbook').style.display='none';
        document.getElementById('adduser').style.display='none';
        document.getElementById('bookinfo').style.display='none';
        document.getElementById('userinfo').style.display='none';
        document.getElementById('borr').style.display='block';
        document.getElementById('appointt').style.display='none';
      }
      function appoint(){
        document.getElementById('recom').style.display='none';
        document.getElementById('addbook').style.display='none';
        document.getElementById('adduser').style.display='none';
        document.getElementById('bookinfo').style.display='none';
        document.getElementById('userinfo').style.display='none';
        document.getElementById('appointt').style.display='block';
        document.getElementById('borr').style.display='none';
      }
    </script>
</head>
<?php
  if(!isset($_SESSION['userid']))
   {
    echo "<script type='text/javascript'>alert('请先登录！');window.location.href='main.php';</script>";
   }
  else{
   $userid = $_SESSION['userid'];
   $sql = "SELECT * FROM userinfo where userid='{$userid}'";
   $res = mysql_query($sql);
   $row = mysql_fetch_array($res);
if ($row['root'] < 1) {
    echo "<script type='text/javascript'>alert('非管理员！'); window.location.href='main.php';</script>";
}
else{
?>
<body>
<div id="header">
    <ul>
        <li onclick="addbook()">录入书籍信息</li>
        <li onclick="adduser()">录入会员信息</li>
        <li onclick="userinfo()">查看会员信息</li>
        <li onclick="bookinfo()">查看图书信息</li>
        <li onclick="borrow()">查看借阅信息</li>
        <li onclick="recom()">查看推荐书籍</li>
        <li onclick="appoint()">查看预约信息</li>
    </ul>
    <a href='main.php'>返回主页</a>
</div>
<div id="adduser">
    <form method="post" action="add.php">
        <table>
            <tr>
                <td>会员名:</td>
                <td><input type="text" name="username"/></td>
            </tr>
            <tr>
                <td>密码:</td>
                <td><input type="text" name="pwd"/></td>
            </tr>
            <tr>
                <td>联系方式:</td>
                <td><input type="text" name="phone"/></td>
            </tr>
            <tr>
                <td>专业:</td>
                <td><input type="text" name="major"/></td>
            </tr>
            <tr>
                <td>性别:</td>
                <td><input type="text" name="sex"/></td>
            </tr>
            <tr>
                <td>出生日期：</td>
                <td>
                    <select name="yyyy">
                        <?php
                        for ($i = 2012; $i > 1000; $i--) {
                            echo "<option value='{$i}'>$i</option>";
                        }
                        ?>
                    </select>年
                    <select name="mm">
                        <?php
                        for ($i = 1; $i <= 12; $i++) {
                            echo "<option value='{$i}'>$i</option>";
                        }
                        ?>
                    </select>月
                    <select name="dd">
                        <?php
                        for ($i = 1; $i <= 31; $i++) {
                            echo "<option value='{$i}'>$i</option>";
                        }
                        ?>
                    </select>日
                </td>
            </tr>

            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" name="adduser" value="添加"/></td>
            </tr>
        </table>
    </form>
</div>
<div id="addbook">
    <form method="post" action="add.php">
        <table>
            <tr>
                <td>ISBN:</td>
                <td><input type="text" name="ISBN"/></td>
            </tr>
            <tr>
                <td>书名:</td>
                <td><input type="text" name="bookname"/></td>
            </tr>
            <tr>
                <td>类型:</td>
                <td><input type="text" name="kind"/></td>
            </tr>
            <tr>
                <td>语言:</td>
                <td><input type="text" name="language"/></td>
            </tr>
            <tr>
                <td>作者:</td>
                <td><input type="text" name="author"/></td>
            </tr>
            <tr>
                <td>数量:</td>
                <td><input type="text" name="number"/></td>
            </tr>
            <tr>
                <td>出版日期：</td>
                <td>
                    <select name="yyyy">
                        <?php
                        for ($i = 2012; $i > 1000; $i--) {
                            echo "<option value='{$i}'>$i</option>";
                        }
                        ?>
                    </select>年
                    <select name="mm">
                        <?php
                        for ($i = 1; $i <= 12; $i++) {
                            echo "<option value='{$i}'>$i</option>";
                        }
                        ?>
                    </select>月
                    <select name="dd">
                        <?php
                        for ($i = 1; $i <= 31; $i++) {
                            echo "<option value='{$i}'>$i</option>";
                        }
                        ?>
                    </select>日
                </td>
            </tr>
            <tr>
                <td id="td1"><input type="submit" name="addbook" value="添加"></td>
            </tr>
        </table>
        </table>
    </form>
</div>
<div id="userinfo">
    <?php
    $sql = "select * from userinfo";
    $res = mysql_query($sql);
    echo "<table border='1' cellspacing='1'>";
    echo "<tr><td>序号</td><td>用户名</td><td>手机号</td><td>出生日期</td><td>专业</td><td>性别</td></tr>";
    while ($row = mysql_fetch_array($res)) {
        echo "<tr style='font-color:#EBED63;'><td>" . $row['userid'] . "</td><td>" . $row['username'] . "</td><td>" . $row['phone'] . "</td><td>" . $row['birth'] . "</td><td>"
            . $row['major'] . "</td><td>" . $row['sex'] . "</td><td><a href='revise.php?userid=" . $row['userid'] . "'>修改信息</td><td><a href='delete.php?userid=" . $row['userid'] . "'>删除信息</td></tr>";
    }
    echo "</table>";

    ?>
</div>
<div id="bookinfo">
    <?php
    $sql1 = "select * from bookinfo";
    $res1 = mysql_query($sql1);
    echo "<table border='1' cellspacing='1'>";
    echo "<tr><td>ISBN</td><td>书名</td><td>类型</td><td>语言类型</td><td>作者</td><td>数量</td></tr>";
    while ($row1 = mysql_fetch_array($res1)) {
        echo "<tr><td>" . $row1['bid'] . "</td><td>" . $row1['bookname'] . "</td><td>" . $row1['kind'] . "</td><td>" . $row1['language'] . "</td><td>"
            . $row1['author'] . "</td><td>" . $row1['num'] . "</td><td><a href='revise.php? bid=" . $row1['bid'] . "'>修改信息</td><td><a href='delete.php?bid=" . $row1['bid'] . "'>删除信息</td></tr>";
    }
    echo "</table>";

    ?>
</div>
<div id="recom">
    <?php
    $sql2 = "select * from recom";
    $res2 = mysql_query($sql2);
    echo "<table border='1' cellspacing='1'>";
    echo "<tr><td>推荐会员号</td><td>推荐书名</td></tr>";
    while ($row2 = mysql_fetch_array($res2)) {
        echo "<tr><td>" . $row2['rid'] . "</td><td>" . $row2['rec'] . "</td></tr>";
    }
    echo"</table>";
    ?>
</div>
<div id="borr">
    <?php
    $sql3 = "select * from borrowinfo";
    $res3 = mysql_query($sql3);
    echo "<table border='1' cellspacing='1'>";
    echo "<tr><td>借阅者</td><td>借阅书号</td><td>借阅书名</td><td>应还日期</td></tr>";
    while ($row3 = mysql_fetch_array($res3)) {
        echo "<tr><td>" . $row3['rid'] . "</td><td>" . $row3['bid'] . "</td><td>" . $row3['bname'] . "</td><td>" . $row3['deadline'] . "</td></tr>";
    }
    echo"</table>";
    ?>
</div>
<div id="appointt">
    <?php
    $sql4 = "SELECT * from bookinfo WHERE appoint=1";
    $res4 = mysql_query($sql4);
    echo "<table border='1' cellspacing='1'>";
    echo "<tr><td>用户</td><td>预约书号</td><td>预约书名</td></tr>";
    while ($row4 = mysql_fetch_array($res4)) {
        echo "<tr><td>" . $row4['appointer'] . "</td><td>" . $row4['bid'] . "</td><td>" . $row4['bookname'] . "</td></tr>";
    }
    echo"<table>";
    ?>
</div>
<?php
   }
 }
    ?>
</body>
</html>