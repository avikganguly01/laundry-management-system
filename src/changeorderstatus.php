<?php
session_start();
$link = mysql_connect('localhost', 'root', 'mysql');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
	mysql_select_db("lms");
    $invoiceid = $_GET["invoiceid"];
	$status = $_GET["status"];
	mysql_query('UPDATE job_order SET delivery_status='.$status.' WHERE id="'.$invoiceid.'"');
	header('Location: showinvoice.php?invoiceid='.$invoiceid);

?>