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
$topclients = mysql_query("SELECT c.fullname,SUM(j.amount) amount FROM clients c, job_order j WHERE j.client_id=c.id GROUP BY c.fullname ORDER BY amount DESC LIMIT 5");
$itempopularity = mysql_query("SELECT o.cloth_name, SUM(o.amount) amount FROM order_details o GROUP BY o.cloth_name ORDER BY amount DESC");
$categorypopularity = mysql_query("SELECT c.category_id, SUM(o.amount) amount FROM clothes c, order_details o WHERE c.name=o.cloth_name GROUP BY c.category_id ORDER BY amount DESC");
?>
<html lang="en">
    <head>
        <title>Laundry Management System</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="css/index.css" />
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/nv.d3.css">
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
        <script src="js/modernizr.custom.js"></script>
        <script src="js/d3.min.js"></script>
        <script src="js/nv.d3.min.js"></script>
        <script>
		     nv.addGraph(function() {
  var chart = nv.models.discreteBarChart()
      .x(function(d) { return d.label })    
      .y(function(d) { return d.value })
      .staggerLabels(true)    //Too many bars and not enough room? Try staggering labels.
      .tooltips(false)        //Don't show tooltips
      .showValues(true)       //...instead, show the bar value right on top of each bar.
      .transitionDuration(350)
      ;
 
  d3.select('#chart1 svg')
      .datum(exampleData1())
      .call(chart);
 
  nv.utils.windowResize(chart.update);
 
  return chart;
});
 
//Each bar represents a single discrete quantity.
function exampleData1() {
 return  [ 
    {	   
      key: "Cumulative Return",
      values: [
	  <?php  while ($row = mysql_fetch_array($topclients)) { 
         echo "{";
		 echo '"label" : "'.$row[0].'" ,';
		 echo '"value" :'.$row[1].'';
		 echo "},";
	  }?>
        
      ]
    }
  ]
 
}
 
//Donut chart1
nv.addGraph(function() {
  var chart = nv.models.pieChart()
      .x(function(d) { return d.label })
      .y(function(d) { return d.value })
      .showLabels(true)     //Display pie labels
      .labelThreshold(.10)  //Configure the minimum slice size for labels to show up
      .labelType("percent") //Configure what type of data to show in the label. Can be "key", "value" or "percent"
      .donut(true)          //Turn on Donut mode. Makes pie chart look tasty!
      .donutRatio(0.35)     //Configure how big you want the donut hole size to be.
      ;
 
    d3.select("#chart2 svg")
        .datum(exampleData2())
        .transition().duration(350)
        .call(chart);
 
  return chart;
});
 
function exampleData2() {
  return  [
     <?php  while ($row = mysql_fetch_array($itempopularity)) { 
	     echo "{";
		 echo '"label" : "'.$row[0].'" ,';
		 echo '"value" :'.$row[1].'';
		 echo "},";
	 }?>
    ];
}

//Donut chart2
nv.addGraph(function() {
  var chart = nv.models.pieChart()
      .x(function(d) { return d.label })
      .y(function(d) { return d.value })
      .showLabels(true)     //Display pie labels
      .labelThreshold(.10)  //Configure the minimum slice size for labels to show up
      .labelType("percent") //Configure what type of data to show in the label. Can be "key", "value" or "percent"
      .donut(true)          //Turn on Donut mode. Makes pie chart look tasty!
      .donutRatio(0.35)     //Configure how big you want the donut hole size to be.
      ;
 
    d3.select("#chart3 svg")
        .datum(exampleData3())
        .transition().duration(350)
        .call(chart);
 
  return chart;
});
 
//Pie chart example data. Note how there is only a single array of key-value pairs.
function exampleData3() {
  return  [
     <?php  while ($row = mysql_fetch_array($categorypopularity)) { 
	     echo "{";
		 if($row[0]==1)
		    echo '"label" : "Apparel - Men" ,';
		 elseif ($row[0]==2)
		    echo '"label" : "Apparel - Women" ,';	
		 else 
		    echo '"label" : "Household Items" ,';		
		 echo '"value" :'.$row[1].'';
		 echo "},";
	 }?>
    ];
}
		</script>
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
                  <h4 style="float:left; width:10%; margin-left:23px;">Dashboard</h4>
                  <form  action="newclientform.php" method="get"> <button type="submit" class="btn btn-primary" style="float:right; width:20%;margin-top:20px;margin-right:20px;">Register New Client</button> </form><br><br>
               <div id="insideblock">
             
               <h3>Top Clients Report</h3>
                  <div id="chart1" style="height:300px;">
                      <svg></svg>
                  </div>
                  <h3 style="float:left; width:50%;">Item Revenue Report</h3>
                  <h3 style="float:left; width:50%;">Category Revenue Report</h3>
                  <div id="chart2" style="height:300px; float:left; width:50%;">
                      <svg></svg>
                  </div>
                  <div id="chart3" style="height:300px; float:left; width:50%;">
                      <svg></svg>
                  </div>
               </div>
            </div>
        </div>
        
        <div id="footer"> <p id="leftContent">Laundry Management System</p>
        </div>
        <script src="js/ytmenu.js"></script>
    </body>
</html>