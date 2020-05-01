

<?php
include 'connection.php';

	session_start();
	// echo $_SESSION['name'];
$x=$_SESSION['uid'];
$dataPoints = array();
$qury="SELECT ExpenseItem,ExpenseCost from expensetable where uid='$x'";
$ab=mysqli_query($conn,$qury);

while ($abc = mysqli_fetch_assoc($ab)) {
	array_push($dataPoints, array("label"=>$abc['ExpenseItem'], "y"=>$abc['ExpenseCost'], "indexLabel"=>"{y}"));
}
 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Pie Chart</title>
	<link rel="shortcut icon" type="image/x-icon" href="icon.jpg" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <style type="text/css">
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
		#myChart{
			margin-left: 270px;
		}
		#chartContainer{
			margin-left: 350px;
			margin-top: 50px;
		}
  </style>
  <script>
window.onload = function () {

CanvasJS.addColorSet("blueShades",
                [//colorSet Array

                "#c3dfe3",
                "#79a9b0",
                "#558786",
                "#315b61",
                "#22474d"                
                ]);
 
var chart = new CanvasJS.Chart("chartContainer", {
	colorSet: "blueShades",
	animationEnabled: true,
	exportEnabled: false,
	backgroundColor: "#f2f9fa",
	zoomEnabled: true,
	dataPointMaxWidth: 20,
	// axisY:{
 //        gridColor: "#f2f9fa"
 //     },
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Your Expense"
	},
	data: [
	{
		type: "pie", //change type to column, bar, line, area, pie, etc
		//indexLabel: "{y}", //Shows y value on all Data Points
		//color: "#2b808a",
		indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",   
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
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
		<h4>Pie Chart View</h4>

	</div>
	<div id="chartContainer" style="height: 370px; width: 50%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


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
</script>

</body>
</html>