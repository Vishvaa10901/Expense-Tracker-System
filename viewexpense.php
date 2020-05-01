

<?php
	
	include 'connection.php';
	session_start();
	// echo $_SESSION['name'];
	$x=$_SESSION['uid'];
	$qury="SELECT * FROM expensetable where uid='$x'";
	$ab=mysqli_query($conn,$qury);
  
 	
	 //$query = mysql_query("select fname,lname,email,city,gender from register where id=10", $conn);
?>

<!DOCTYPE html>
<html>
<head>
	<title>view expense</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
	<link rel="shortcut icon" type="image/x-icon" href="icon.jpg" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <style type="text/css">
  		#title{
			background-color: black;
			color: lightblue;
			border-color: #eee;
			text-align: left;
			height: 50px;
			width: 100%;
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
		table{
			margin-right: 200px;
		}
		td{
			width: 100px;
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
		#filter{
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
		/*td{
			width: 20%;
		}*/
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
		<h4>Tabular View</h4>

	</div>
	<div class="container">
	<div>
		<input type="radio" name="radio" id="" value="today"><label for="today">Today</label>
		<input type="radio" name="radio" id="" value="yesterday"><label for="yesterday">Yesterday</label>
		<input type="radio" name="radio" id="" value="thisweek"><label for="thisweek">This Week</label>
		<input type="radio" name="radio" id="" value="lastweek"><label for="lastweek">Last Week</label>
		<input type="radio" name="radio" id="" value="thismonth"><label for="thismonth">This Month</label>
		<input type="radio" name="radio" id="" value="thisyear"><label for="thisyear">This Year</label>
		
		<p>From Date :
		<input type="text" id="from_date">
		To Date :
		<input type="text" id="to_date">
		<button id="filter" class="btn btn-info" style="float: right">Filter</button></p>
	</div>
	<div style="clear : both"></div>
	<div id="expense">
		<h2>Your Expense</h2><br>
	<table class="table table-hover" id="order_table" width="400">
    <thead>
      <tr>
        <th>S.No</th>
        <th>Expense Item</th>
        <th>Expense Cost</th>
        <th>Expense Date</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
    	<?php 
    	$sq = 1;
    	while ($abc = mysqli_fetch_assoc($ab)) {
 	?>
	<tr>
		<td><?php echo $sq ?></td>
		<td><?php echo $abc['ExpenseItem']; ?></td>
		<td><?php echo $abc['ExpenseCost']; ?></td>
		<td><?php echo $abc['ExpenseDate']; ?></td>
		<td><a href="edit.php?id=<?php echo $abc['id']; ?>">Edit</a></td>
		<td><a href="delete.php?id=<?php echo $abc['id']; ?>">Delete</a></td>
	</tr>
	<?php
	$sq = $sq + 1;
	}
	?>
      <!-- <tr>
        <td>1</td>
        <td>Biscuit</td>
        <td>12.00</td>
         <td>12/12/2019</td>
          <td><a href="#">Edit</a> <a href="#">Delete</a></td>
      </tr>
      <tr>
        <td>2</td>
        <td>Bread</td>
        <td>20.25</td>
        <td>12/12/2019</td>
        <td><a href="#">Edit</a> <a href="#">Delete</a></td>
      </tr>
      <tr>
        <td>3</td>
        <td>Milk</td>
        <td>300.00</td>
        <td>12/12/2019</td>
        <td><a href="#">Edit</a> <a href="#">Delete</a></td>
      </tr> -->
    </tbody>
  </table>
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


 //  	$("#show").click(function(){
 //  		$("#expense").hide();
	// });

	// $("#show").click(function(){
 //  		$("#expense").show();
	// });

	$(document).ready(function(){  
           $.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd'   
           });  
           $(function(){  
                $("#from_date").datepicker();  
                $("#to_date").datepicker();  
           });  
           $('#filter').click(function(){  
                var from_date = $('#from_date').val();  
                var to_date = $('#to_date').val();  
                if(from_date != '' && to_date != '')  
                {  
                     $.ajax({  
                          url:"filter.php",  
                          method:"POST",  
                          data:{from_date:from_date, to_date:to_date},
                          success:function(data)  
                          {  
                               $('#order_table').html(data);  
                          }  
                     });  
                }  
                else  
                {  
                     alert("Please Select Date");  
                }  
           });  
      });  
}
</script>
</body>
</html>