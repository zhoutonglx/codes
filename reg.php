<?php

	if(!isset($_POST['submit'])){
		exit('invalid visit');
	}
	$username=$_POST['username'];
	$password=$_POST['password'];
	$email = $_POST['email'];
	if(!preg_match('/^[\w\x80-\xff]{3,15}$/',$username)){
		exit("error:username not valid.<a href='javascript:history.back(-1);'>return</a>");
	}
	include('conn.php');
	$check_query = mysql_query("select * from user where username='$uesrname' limit 1");
	if(mysql_fetch_array($check_query)){
		echo "error:user exists <a href='javascript:history.back(-1);'>return</a>";
		exit();
	}
	$password = MD5($password);
	$regdate = time();
	$sql = "Insert into user(username,password,email,regdate) values('$username','$password','$email','$regdate')";
	if(mysql_query($sql,$conn)){
		exit("succeed!.click to login<a href='login.html'>login</a>");	
	}else{
		exit("failed click<a href='javascript:history.back(-1);'>return</a>");
	}	
?>
