<?php

include 'connection.php';
// session_start();
session_start();
// echo $_SESSION['name'];
$x=$_SESSION['uid'];
$date=$_POST['date'];
$name=$_POST['name'];
$cost=$_POST['cost'];
// $email=$_POST['email'];
// $pass=$_POST['pwd'];

$qury="INSERT into expensetable (ExpenseItem,ExpenseCost,ExpenseDate,uid) values ('$name','$cost','$date','$x')";
$ab=mysqli_query($conn,$qury);

// if($ab){
// 	echo "scc";
// }
// else{
// 	echo "err";
// }

// if (mysqli_num_rows($ab) > 0) {
// 	echo "Expense Added Successful";
	// $abc = mysqli_fetch_assoc($ab);
	// $_SESSION['name']=$abc['fname'];
	// $_SESSION['mail']=$abc['email'];
	header('location:addexpense.php');
// }
// else{
// 	echo "Please enter all details.";
// }
?>