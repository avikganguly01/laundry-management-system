<?php
	session_start();
	include('db.php');
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	$query=mysql_query("SELECT * FROM appusers WHERE username='$username' AND password='$password'");
	$num=mysql_num_rows($query);
	if($num==1){
        $_SESSION['username']=$username;
        header("location:login_success.php");
		}
	else{
		echo "Wrong Username or Password";
		} 
		
?>