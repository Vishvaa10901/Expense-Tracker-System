

<?php
include("connection.php");
session_start();
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>common</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/x-icon" href="icon.jpg" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
  			/*text-shadow: 0 1px 1px rgba(0, 0, 0, 0.5);*/
  
  
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
			/*text-shadow: 0 1px 1px rgba(0, 0, 0, 0.5);*/
  
  
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
		#profileCards{
			margin-left: 300px;
			margin-top: 60px;
		}
		.card-img-top{
			height: 25%;
			width: 25%;
			margin-top: 15px; 
			margin-left: 15px;
			border-radius: 50%;
			float: left;
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
		#cameraicon{
			height: 20%;
			width: 20%;
			border-radius: 50%;
			overflow: hidden;

			margin-top: 15px;
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
			/*margin-left: 10px;*/
		}
		#cameraicon:hover{
			cursor: pointer;
		}
		/*#file { 
			/*visibility: hidden;*/
			/*background: url(camera.jpg);
			border-radius: 50%;
			font-size: 20px; 
			overflow: hidden;
			color: transparent;*/
		/*}*/
		
		label{
    		padding: 10px;
    		/*background: url(camera.jpg);*/
    		display: table;
    		color: black;
     	}



		input[type="file"] {
    		display: none;
		}
		

  		#submit{
  			 width: 30%;
  cursor: pointer;  
  background: rgb(61, 157, 179);
  padding: 8px 2px;
  /*font-family: 'BebasNeueRegular','Arial Narrow',Arial,sans-serif;*/
  color: #fff;
  font-size: 15px;  
  border: 1px solid rgb(28, 108, 122);  
  margin-bottom: 10px;  
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.5);
  -webkit-border-radius: 3px;
     -moz-border-radius: 3px;
          border-radius: 3px; 
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
  		#submit:hover{
  			background: rgb(74, 179, 198);
  		}
      #submit:active,focus{
      	background: rgb(40, 137, 154);
  position: relative;
  top: 1px;
  border: 1px solid rgb(12, 76, 87);  
  -webkit-box-shadow: 0px 1px 6px 4px rgba(0, 0, 0, 0.2) inset;
     -moz-box-shadow: 0px 1px 6px 4px rgba(0, 0, 0, 0.2) inset;
          box-shadow: 0px 1px 6px 4px rgba(0, 0, 0, 0.2) inset;
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

	<div class="container" id="profileCards">

<form action="upload.php" method="POST" enctype="multipart/form-data">
  <div class="card" style="width:50%">
  	
   <?php 

   ?>
   	<div><?php 	$image=$_SESSION['pic'];
   				echo "<img id='' class='card-img-top' src='$image' >";?>
	<label><img src="camera.jpg" name="" id="cameraicon"><input type="file" id="file" name="file">
    </label></div>
    <div class="card-body">
      <h3 class="card-title"><?php echo $_SESSION['uname']?></h3>
      <p class="card-text">Email ID : <?php echo $_SESSION['email']?> </p>
      <p class="card-text">Mobile No : XXXXXXXXXX</p>
      <p class="card-text">Registration Date : mm/dd/yyyy</p>
      <p class="card-text"><input type="submit" name="submit" id="submit" class="btn btn-info" value="Save Changes"></p>
    </div>
  </div>
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

$('#cameraicon').click(function(){
    $('#file').click();
});

</script>

</body>
</html>