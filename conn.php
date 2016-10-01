<?php
$conn = mysql_connect("localhost","root","fengweisi");
if(!$conn){
	die("failed".mysql_error());
}
mysql_select_db("sys",$conn);
?>
