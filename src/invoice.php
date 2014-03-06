<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['username'])){
header("location:index.php");
}
include('db.php');
$query=mysql_query("SELECT * FROM job_order ORDER BY delivery_status asc, submission_date asc");


?>
<html lang="en">
    <head>
        <title>Laundry Management System</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="css/index.css" />
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
        <script src="js/modernizr.custom.js"></script>
    </head>
    <body>
    	<div id="header">
        </div>
        <div class="container">
            <div class="content">
               <nav class="dr-menu">
						<div class="dr-trigger"><span id="dr-icon" class="fa fa-bars"></span><a class="dr-label">Menu</a></div>
						<ul>
							<li><a id="dr-icon" class="fa fa-compass"  href="home.php">Dashboard</a></li>
							<li><a id="dr-icon" class="fa fa-check-square-o" href="job_order.php">Job Order</a></li>
							<li><a id="dr-icon" class="fa fa-bar-chart-o" href="reporting.php">Reporting</a></li>
							<li><a id="dr-icon" class="fa fa-pencil" href="invoice.php">Invoices</a></li>
                            <li><a id="dr-icon" class="fa fa-phone" href="contact.php">Contact Us</a></li>
							<li><a id="dr-icon" class="fa fa-power-off" href="logout.php">Logout</a></li>
						</ul>
					</nav>
            </div><!-- content -->
        
        <div id="block">
               <h4>Invoice History</h4>
               <div id="insideblock">
			<table class="table table-striped table-bordered table-hover">  
				<thead>  
					<tr>  
						<th>Job Id</th>  
						<th>Customer Name</th>  
						<th>Submission Date</th>  
						<th>Delivery Date</th>  
                        <th>Total Quantity</th>  
						<th>Amount</th>  
						<th>Delivery Status</th>  
					</tr>  
				</thead>  
				<tbody>  
                <?php
                      while ($row = mysql_fetch_array($query)) {
						  echo "<tr>";
						  echo '<td><a href="showinvoice.php?invoiceid='.$row[0].'">'.$row[0].'</a></td>';
						  $clientnamerow = mysql_fetch_array(mysql_query("SELECT fullname FROM clients WHERE id='$row[2]'"));
						  echo "<td>$clientnamerow[0]</td>";
						  echo "<td>$row[3]</td>";
						  echo "<td>$row[4]</td>";
						  echo "<td>$row[5]</td>";
						  echo "<td>$row[6]</td>";
						  if($row[7] == 0)
						     echo "<td>Processing</td>";
						  elseif($row[7] == 1)
						     echo "<td>Ready</td>";	 
						  else
						     echo "<td>Delivered</td>"; 
						  echo "</tr>";	 
                      }
                ?>  
				</tbody>  
			</table> 
        </div>
        </div>
        </div>
        <div id="footer"> <p id="leftContent">Laundry Management System</p>
        </div>
        <script src="js/ytmenu.js"></script>
    </body>
</html>