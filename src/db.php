<?php
$link = mysql_connect('localhost','root','mysql');
if (!$link) {
	die('Could not connect: ' . mysql_error());
}
	mysql_select_db("lms");
?>