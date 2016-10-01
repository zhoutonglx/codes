<?php
session_start();
if(!isset($_SESSION['userid'])){
	header("Location:login.html");
	exit();
}
include('conn.php');
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];
$res = mysql_query("select * from user where uid=$userid limit 1");
echo "user information<br />";
echo "userid$uesrid<br />";
echo "uesrname$username<br />";
echo "email:".$row['email']."<br />";
echo "regdate".date("Y-m-d",row['regdate'])."<br />";
echo "<a href='login.php?action=logut'>logout</a>login<br />";
?>
