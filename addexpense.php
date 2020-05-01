<?php

	include 'connection.php';
	session_start();
	// echo $_SESSION['name'];
	$x=$_SESSION['uid'];
?>


<!DOCTYPE html>
<html>
<head>
	<title>Add Expense</title>
	<link rel="shortcut icon" type="image/x-icon" href="icon.jpg" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
			border: 0;
			/*font-size: 30px;*/
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
		.container{
			margin-top: 40px;
			background-color: white;
			width: 70%;
			border-color: black;
			border-radius: 20px;
			margin-left: 270px;
			padding-top: 20px;
			padding-bottom: 20px;
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
		#submit{
			text-shadow: 0 1px 1px rgba(0, 0, 0, 0.5);
  
  -webkit-box-shadow: 0px 1px 6px 4px rgba(0, 0, 0, 0.07) inset,
          0px 0px 0px 3px rgb(254, 254, 254),
          0px 5px 3px 3px rgb(210, 210, 210);
     -moz-box-shadow:0px 1px 6px 4px rgba(0, 0, 0, 0.07) inset,
          0px 0px 0px 3px rgb(254, 254, 254),
          0px 5px 3px 3px rgb(210, 210, 210);
          box-shadow:0px 1px 6px 4px rgba(0, 0, 0, 0.07) inset,
          0px 0px 0px 3px rgb(254, 254, 254),
          0px 5px 3px 3px rgb(210, 210, 210);
  -webkit-transition: all 0.2s linear;
     -moz-transition: all 0.2s linear;
       -o-transition: all 0.2s linear;
          transition: all 0.2s linear;
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
		<h4>New Expense</h4>

	</div>
	<div class="container">
		<h2>Expense</h2>
		<hr>
  <form action="expenseprocess.php" method="POST">
    <div class="form-group">
      <label for="date">Date of Expense:</label>
      <input type="text" id="date" class="form-control"  placeholder="Enter date" name="date">
    </div>
    <div class="form-group">
      <label for="name">Item:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
    </div>
    <div class="form-group">
      <label for="cost">Cost of Item:</label>
      <input type="text" class="form-control" id="cost" placeholder="Enter cost" name="cost">
    </div>
    <button type="submit" class="btn btn-primary" id="submit">Add</button>
  </form>

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
// $(function(){  
// 	$("#date").datepicker();  
// });

$.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd'   
           });  
           $(function(){  
                $("#date").datepicker();    
           }); 
</script>
</body>
</html>