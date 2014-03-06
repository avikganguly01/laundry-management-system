<?php
session_start();
$link = mysql_connect('localhost', 'root', 'mysql');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
	mysql_select_db("lms");
	$id = uniqid();
	$username = $_SESSION['username'];
	$useridquery=mysql_query("SELECT id FROM appusers WHERE username='$username'");
	$num=mysql_num_rows($useridquery);
	if($num==1){
		$userrow = mysql_fetch_array($useridquery);
		$user_id = $userrow[0];
	}
	$clientname=$_POST['name'];
	$clientidquery=mysql_query("SELECT id FROM clients WHERE fullname='$clientname'");
	$num2=mysql_num_rows($clientidquery);
	if($num2==1){
		$clientrow = mysql_fetch_array($clientidquery);
		$client_id = $clientrow[0];
	}
    $submission_date=date('Y-m-d');
	$expected_delivery_date=date('Y-m-d', strtotime($submission_date. ' + 2 days'));
	$query=mysql_query("SELECT * FROM clothes");
	$total_quantity = 0; $amount = 0; $tempquant = 0; $tempamount = 0; $dryclean = 0;
	$clothtypes = array(); $quantities = array(); $amounts = array(); $ordertypes = array();
	while ($row = mysql_fetch_array($query)) {
	   if(isset($_POST['quantity' . $row[2]]))	{
		if($_POST['quantity' . $row[2]] != '') {
			$dryclean = $_POST['dryclean' . $row[2]];
			$ordertypes[] = $dryclean;
			$clothtypes[] = $row[2];
			$tempquant = $_POST['quantity' . $row[2]];
			$quantities[] = $tempquant;
			if($dryclean == 0)
			   $tempamount = $row[3] * $tempquant;
			else
			   $tempamount = $row[4] * $tempquant;  
			$amounts[] = $tempamount;
		$total_quantity = $total_quantity + $tempquant;
		$amount = $amount + $tempamount;
		}
	   }
	}
	mysql_query("INSERT INTO job_order(id,user_id,client_id,submission_date,expected_delivery_date,total_quantity,amount,delivery_status) VALUES('$id','$user_id','$client_id','$submission_date','$expected_delivery_date','$total_quantity','$amount',0)");
	$length = count($clothtypes);
	for($i = 0; $i<$length; $i++) {
		mysql_query("INSERT INTO order_details(job_order_id,cloth_name,quantity,amount,order_type) VALUES('$id','$clothtypes[$i]','$quantities[$i]','$amounts[$i]','$ordertypes[$i]')");
	}
	header('Location: showinvoice.php?invoiceid='.$id);

?>