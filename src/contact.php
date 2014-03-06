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
        </div>
        <div id="block">
           <h4 >Contact Us</h4>
           <div id="formblock">
           <form action="sendmail.php" method="post">
                 <div class="form-group">
                 <label for="name">Name</label>
                 <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                 </div>
                 <div class="form-group">
                 <label for="email">Email</label>
                 <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                 </div>
                 <div class="form-group">
                 <label for="message">Message</label>
                 <textarea class="form-control" id="message" placeholder="Enter your message here..." name="message" cols="60" rows="7"></textarea>
                 </div>
   				 <button type="submit" class="btn btn-primary">Send Email</button>
		</form>
         </div>
        </div>
        <div id="footer"> <p id="leftContent">Laundry Management System</p>
        </div>
        <script src="js/ytmenu.js"></script>
    </body>
</html>