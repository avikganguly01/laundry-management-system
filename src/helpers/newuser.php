<?php
$link = mysql_connect('localhost', 'root', 'mysql');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
	mysql_select_db("lms");
	
echo 'Connected successfully';

	$email=$_POST['email'];
	echo $email;
	$name=$_POST['name'];
	echo $name;
	$address=$_POST['address'];
	echo $address;
	$mobile=$_POST['mobile'];
	echo $mobile;
	$password=md5($_POST['password']);
	echo $password;
        echo date('Y-m-d');
        $reg_date=date('Y-m-d');
	$sql="INSERT INTO appusers(username,password,email,mobile_no,address,registration_date) VALUES('$name','$password','$email','$mobile','$address','$reg_date')";
	mysql_query($sql);

?>