<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['username'])){
header("location:index.php");
}
$link = mysql_connect('localhost', 'root', 'mysql');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
	mysql_select_db("lms");
	$ordercountquery = mysql_query('select count(id) orders from job_order where submission_date="'.date('Y-m-d').'"');
	$pendingorders = mysql_query('select count(id) from job_order where delivery_status=0');
	$pendingcollection = mysql_query('select count(id) from job_order where delivery_status=1');
	$quantityorderedtoday = mysql_query('select SUM(total_quantity) from job_order where submission_date="'.date('Y-m-d').'"');
	$quantityorderedmen = mysql_query('select SUM(o.quantity) from order_details o, job_order j, clothes c where c.category_id=1 AND j.submission_date="'.date('Y-m-d').'" AND o.job_order_id=j.id AND o.cloth_name=c.name');
	$quantityorderwomen = mysql_query('select SUM(o.quantity) from job_order j,order_details o, clothes c where c.category_id=2 AND c.name=o.cloth_name AND j.submission_date="'.date('Y-m-d').'" AND j.id=o.job_order_id');
	$quantityorderhousehold = mysql_query('select SUM(o.quantity) from job_order j,order_details o, clothes c where c.category_id=3 AND c.name=o.cloth_name AND j.submission_date="'.date('Y-m-d').'" AND j.id=o.job_order_id');
	$totalamount = mysql_query('select SUM(j.amount) from job_order j where j.submission_date="'.date('Y-m-d').'"');
	$totalclients = mysql_query('select COUNT(j.client_id) from job_order j where j.submission_date="'.date('Y-m-d').'"');
	$new_reg = mysql_query('select COUNT(j.client_id) from job_order j, clients c where j.submission_date="'.date('Y-m-d').'" AND c.id=j.client_id AND c.reg_date="'.date('Y-m-d').'"');
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
        <script type="text/javascript" src="js/modernizr.custom.js"></script>
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
        </div>
        <div id="block">
        
        <div id="insideblock">
        <h3>Daily Day-End Report</h3> <br>
        <div style="text-align:left;">
        <table class="table table-striped table-bordered table-hover">
                  <col width="70%">
                  <col width="30%">
                  <thead>  
					<tr>  
						<th>Report Parameter</th>  
						<th>Value</th>   
					</tr>  
				</thead> 
                <tbody>
                   <tr>
                     <td> Date  </td>
                     <td> <?php echo date('Y-m-d'); ?> </td>
                   </tr>
                    <tr>
                     <td> No. of orders  </td>
                     <td> <?php while ($row = mysql_fetch_array($ordercountquery)) { echo $row[0]; } ?> </td>
                   </tr>
                    <tr>
                     <td> No. of orders pending work as of today  </td>
                     <td> <?php  while ($row = mysql_fetch_array($pendingorders)) { echo $row[0]; }  ?>  </td>
                   </tr>
                    <tr>
                     <td> No. of orders pending collection by customers  </td>
                     <td> <?php  while ($row = mysql_fetch_array($pendingcollection)) { echo $row[0]; }  ?> </td>
                   </tr>
                    <tr>
                     <td> Total quantity received today  </td>
                     <td>  <?php  while ($row = mysql_fetch_array($quantityorderedtoday)) { echo $row[0]; } ?></td>
                   </tr>
                    <tr>
                     <td> No. of men's apparel received today  </td>
                     <td>  <?php  while ($row = mysql_fetch_array($quantityorderedmen)) { echo $row[0]; } ?> </td>
                   </tr>
                   <tr>
                     <td> No. of women's apparel received today  </td>
                     <td>   <?php  while ($row = mysql_fetch_array($quantityorderwomen)) { echo $row[0]; } ?> </td>
                   </tr>
                   <tr>
                     <td> No. of household items received today  </td>
                     <td>  <?php  while ($row = mysql_fetch_array($quantityorderhousehold)) { echo $row[0]; } ?>  </td>
                   </tr>
                   <tr>
                     <td> Total revenue generated today  </td>
                     <td> <?php  while ($row = mysql_fetch_array($totalamount)) { echo $row[0]; } ?>  </td>
                   </tr>
                   <tr>
                     <td> No. of clients generating revenue today  </td>
                     <td> <?php  while ($row = mysql_fetch_array($totalclients)) { echo $row[0]; } ?> </td>
                   </tr>
                   <tr>
                     <td>No. of new clients generating revenue today  </td>
                     <td> <?php  while ($row = mysql_fetch_array($new_reg)) { echo $row[0]; } ?>  </td>
                   </tr>
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