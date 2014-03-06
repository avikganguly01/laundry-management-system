<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['username'])){
header("location:index.php");
}
include('db.php');
$gentquery=mysql_query("SELECT * FROM clothes  WHERE category_id=1");
$ladyquery=mysql_query("SELECT * FROM clothes  WHERE category_id=2");
$householdquery=mysql_query("SELECT * FROM clothes  WHERE category_id=3");

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
         <h4 style="float:left; width:14%; margin-left:23px;">Job Order</h4>
               <form style="float:left; width:18%;margin-top:20px;" action="ratechart.php" method="get"> <button type="submit" class="btn btn-primary">View Rate Chart</button> </form>
               <form action="placeorder.php" method="post">
               <label for="name"  style="float:left; width:10%;margin-top:25px;">Client Name</label>
               <input type="text" class="form-control" id="name" placeholder="Name" name="name" style="float:left; width:20%;margin-top:20px;">
               <button type="submit" class="btn btn-primary" style="float:right; width:10%; margin-top:20px; margin-right:20px;">Submit</button>
               <br/><br/><br/>
               
               <div id="insideblock">
              <table class="table table-striped table-bordered table-hover" width="30%">  
                <colgroup span="3"></colgroup>
                <colgroup span="3"></colgroup>
                <colgroup span="3"></colgroup>
                
				<thead>  
					<tr><th colspan="3">Gent's Items</th><th colspan="3">Lady's Items</th><th colspan="3">Household Items</th></tr> 
                    <tr><th>Quantity</th><th>Item Name</th><th>Dryclean?</th><th>Quantity</th><th>Item Name</th><th>Dryclean?</th><th>Quantity</th><th>Item Name</th><th>Dryclean?</th></tr>  
				</thead>  
				<tbody>  
                
				<?php
				 while ($row = mysql_fetch_array($gentquery)) {
					  echo "<tr>";
					  echo '<td><input type="text" maxlength="2" size="2" name="quantity'.$row[2].'" /></td>';
					  echo "<td>$row[2]</td>";
					  echo '<td><select name="dryclean'.$row[2].'"><option value="1">Yes</option><option value="0" selected="selected">No</option></select></td>';
					  $row2 = mysql_fetch_array($ladyquery);
					  if($row2 != false) {
						  echo '<td><input type="text" maxlength="2" size="2" name="quantity'.$row2[2].'" /></td>';
					      echo "<td>$row2[2]</td>";
					      echo '<td><select name="dryclean'.$row2[2].'"><option value="1">Yes</option><option value="0" selected="selected">No</option></select></td>';
					  }
					  $row3 = mysql_fetch_array($householdquery);
					   if($row3 != false) {
						  echo '<td><input type="text" maxlength="2" size="2" name="quantity'.$row3[2].'" /></td>';
					      echo "<td>$row3[2]</td>";
					      echo '<td><select name="dryclean'.$row3[2].'"><option value="1">Yes</option><option value="0" selected="selected">No</option></select></td>';
					   }
					  echo "</tr>";
				 }
				?>
                
                </tbody>  
			</table> 
           </div>
           
           </form>
        </div>
        </div>
        <div id="footer"> <p id="leftContent">Laundry Management System</p>
        </div>
        <script src="js/ytmenu.js"></script>
    </body>
</html>