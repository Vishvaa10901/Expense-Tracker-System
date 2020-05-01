<?php

	include 'connection.php';
	session_start();
	// echo $_SESSION['name'];

?>


<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="shortcut icon" type="image/x-icon" href="icon.jpg" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

	<style type="text/css">
		body{
			background-color: lightblue;
		}
		.sidenav {
			height: 100%;
  			width: 250px;
  			position: fixed;
  			z-index: 1;
  			top: 0px;
  			left: 0px;
  			background: #eee;
  			overflow-x: hidden;
  			padding: 8px 0;
  			margin-top: 50px;
		}

		.sidenav a , .dropdown-btn{
  			padding: 6px 20px 6px 16px;
  			text-decoration: none;
  			font-size: 25px;
  			color: #2196F3;
  			display: block;
		}
		.sidenav a:hover {
			background-color: #064579;
  			color: white;
		}

		#username{
			margin-left: 5px;
			margin-right: 5px;
			padding-top: 5px;
			border: 0;
			/*font-size: 10px;*/
			/*padding: 2.5px;*/
			padding-bottom: 20px; 
			padding-right: 10px;
			padding-left: 10px;
			font-weight: bold;
			color: #2196F3;
			background-color: white;
		}
		#username a:hover {
			color: #2196F3;
		}
		#username a:link {
			color: #ccc
		}
		#username a:visited {
			color: #ccc
		}

		.container{
			margin-left: 270px;
			margin-top: 40px;
			/*margin-right: 100px;*/
		}
		.card{
			height: 150px;
			width: 250px;
		}
		.card-body{
			text-align: center;
			background-color: white;
			/*align-items: center;*/
			border-radius: 10px;

		}
		#card{
			margin : 20px;
			float: left;


		}
		#dashboard{
			margin-left: 20px;
		}
		#title{
			background-color: black;
			color: lightblue;
			border-color: #eee;
			text-align: left;
			height: 50px;
		}
		#h2title{
			padding-top: 5px;
			padding-left: 20px;
		}
		h4{
			margin-left: 290px;
			padding-top: 15px;
		}
		#topbar{
			/*margin-left: 270px;*/
			margin-top: 20px;
			background-color: #eee;
			width: 100%;
			height: 50px;
		}
		.dropdown-container {
  			display: none;
  			background-color: #ddd;
  			padding-left: 8px;
  			font-size: 10px;
		}

/* Optional: Style the caret down icon */
		.fa-caret-down {
  			float: right;
  			padding-right: 8px;
  			color: black;
		}
	</style>


</head>
<body>
	
	<div id="title">
		<h2 id="h2title">Daily Expense Tracker</h2>
	</div>

	<div class="sidenav">
		<div id="username"><h3><?php echo $_SESSION['uname']; ?></h3><h6><?php echo $_SESSION['email'];?></h6></div>
  		<a href="dashboard.php">Home</a>
  		<a href="addexpense.php">Add Expenses</a>
  		<a class="dropdown-btn">View Expense
  			<i class="fa fa-caret-down"></i>
  		</a>
  		<div class="dropdown-container">
  			<a href="viewexpense.php">> Tabular</a>
  			<a href="BarGraph.php">> Bar Graph</a>
  			<a href="PieChart.php">> Pie Chart</a>
  		</div>
  		<a href="profile.php">Profile</a>
  		<a href="signup.php">Log Out</a>
	</div>

	<div id="topbar">
		<h4>Dashboard</h4>
	</div>

	<div class="container">
		<h2 id="dashboard">Dashboard</h2>
		<div id="card">
		<!-- <h2>Card 1</h2> -->
		<div class="card">
			<div id="today" class="card-body">Today's Expense<br><br>
		<center><p id="todate" style="color: red; font-size: 20px;"></p></center></div>
		</div>
		</div>
    	<div id="card">
    	<!-- <h2>Card 2</h2> -->
    	<div class="card">
    		<div class="card-body">Yesterday's Expense<br><br>
    		<center><p id="yesterdate" style="color: red; font-size: 20px;"></p></center></div>
    	</div>
    </div>
    	<div id="card">
    	<!-- <h2>Card 3</h2> -->
   		<div class="card">
    		<div class="card-body">Last 7 day's Expense<br><br>
    		<center><p id="last7days" style="color: red; font-size: 20px;"></p></center></div>
   		</div>
   	</div>
   		<div id="card">
    	<!-- <h2>Card 4</h2> -->
   		<div class="card">
    		<div class="card-body">Last 30 day's Expense<br><br>
    		<center><p id="last30days" style="color: red; font-size: 20px;"></p></center></div>
   		</div>
   	</div>
   	<div id="card">
   		<!-- <h2>Card 5</h2> -->
      	<div class="card">
    		<div class="card-body">Current Year Expense<br><br>
    		<center><p id="curryear" style="color: red; font-size: 20px;"></p></center></div>
		</div>
	</div>
	<div id="card">
   		<!-- <h2>Card 6</h2> -->
      	<div class="card">
    		<div class="card-body">Total Expenses<br><br>
    			<center><p id="total" style="color: red; font-size: 20px;"></p></center></div>
		</div>
	</div>
	</div>
<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}

 // $.datepicker.formatDate('yy/mm/dd', new Date()); 

 var d = new Date();

var month = d.getMonth()+1;
var day = d.getDate();

var output = d.getFullYear() + '-' +
    (month<10 ? '0' : '') + month + '-' +
    (day<10 ? '0' : '') + day;


 $.ajax({  
      url:"dashboardprocess.php",  
      method:"POST",  
      data:{todate:output},
      success:function(data)  
      {  
           $('#todate').html(data);  
      }  
 });

d = new Date();
month = d.getMonth()+1;
day = d.getDate();

output = d.getFullYear() + '-' +
    (month<10 ? '0' : '') + month + '-' +
    (day<10 ? '0' : '') + (day-1);
 $.ajax({  
      url:"dashboardprocess.php",  
      method:"POST",  
      data:{yesterdate:output},
      success:function(data)  
      {  
           $('#yesterdate').html(data);  
      }  
 });  

 var todate = d.getFullYear() + '-' +
    (month<10 ? '0' : '') + month + '-' +
    (day<10 ? '0' : '') + (day);

 var fromdate = d.getFullYear() + '-' +
    (month<10 ? '0' : '') + month + '-' +
    (day<10 ? '0' : '') + (day - 7);
 $.ajax({  
      url:"dashboardprocess.php",  
      method:"POST",  
      data:{fromdate:fromdate,todat:todate},
      success:function(data)  
      {  
           $('#last7days').html(data);  
      }  
 });

 var n = d.getFullYear() + '-' +
    (month<10 ? '0' : '') + month + '-' +
    (day<10 ? '0' : '') + (day);

 var m = d.getFullYear() + '-' +
    (month<10 ? '0' : '') + month + '-' +
    (day<10 ? '0' : '') + (day - 30);
 $.ajax({  
      url:"dashboardprocess.php",  
      method:"POST",  
      data:{m:m,n:n},
      success:function(data)  
      {  
           $('#last30days').html(data);  
      }  
 }); 

 var year = d.getFullYear();
 $.ajax({  
      url:"dashboardprocess.php",  
      method:"POST",  
      data:{year:year},
      success:function(data)  
      {  
           $('#curryear').html(data);  
      }  
 });

 var total='';
  $.ajax({  
      url:"dashboardprocess.php",  
      method:"POST",  
      data:{total:total},
      success:function(data)  
      {  
           $('#total').html(data);  
      }  
 });
</script>
</body>
</html>
