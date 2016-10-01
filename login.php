<?php
if($_GET['action']=='logout'){
	unset($_SESSION['userid']);
	unset($_SESSION['username']);
	echo "logout click<a href='login.html'>login</a>";
	exit;
}

if(!isset($_POST['submit'])){
	exit('invalid');
}
$username = htmlspecialchars($_POST['username']);
$password = MD5($_POST['password']);


include('conn.php');
$check_query = mysql_query("select * from user where username='$uesrname and password='$password' limit 1");
if($check_query){
	if($result=mysql_fetch_array($check_array)){
		$_SESSION['username'] = $username;
		$_SESSION['userid'] = $result['id'];
		echo $username."welcome<a href='myphp'>user centor</a><br />";
		
	}
}else{
		exit("login filed.click<a href='javascript:history.back(-1);'>return</a>");
}
?>
