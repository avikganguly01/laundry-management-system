<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['username'])){
header("location:index.php");
}
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
                  <h4 >Register New Client</h4>
                  <div id="formblock">
           <form action="clientregister.php" method="post">
                 <div class="form-group">
                 <label for="name">Name</label>
                 <input type="text" class="form-control" id="name" placeholder="Name" name="name" style="width:200px;">
                 </div>
                 <div class="form-group">
                 <label for="mobile_no">Contact No.</label>
                 <input type="text" class="form-control" id="mobile_no" placeholder="Mobile No." name="mobile_no" style="width:200px;">
                 </div>
                 <div class="form-group">
                 <label for="agerange">Age Range</label>
                 <select class="form-control" name="agerange" style="width:200px;"><option value="0">Under 22</option><option value="1" selected="selected">22-45</option><option value="2">Over 45</option></select>
                 </div>
                 <div class="form-group">
                 <label for="sex">Sex</label>
                 <select class="form-control" name="sex" style="width:200px;"><option value="0">Male</option><option value="1" selected="selected">Female</option></select>
                 </div>
   				 <button type="submit" class="btn btn-primary">Register</button>
		</form>
         </div>
            </div>
        </div>
        
        <div id="footer"> <p id="leftContent">Laundry Management System</p>
        </div>
        <script src="js/ytmenu.js"></script>
    </body>
</html>