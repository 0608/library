<?php

$conn = @mysql_connect("localhost","root","") or die("没有链接！");
mysql_select_db("library");
mysql_query("set names utf8");
//mysql_query("set character set 'utf8'");
?>