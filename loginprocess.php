<?php

include 'connection.php';
session_start();
$email=$_POST['username'];
$pass=$_POST['password'];

$qury="SELECT * FROM login WHERE email='$email' AND pass='$pass'";
$ab=mysqli_query($conn,$qury);

// if($ab){
// 	echo "scc";
// }
// else{
// 	echo "err";
// }

if (mysqli_num_rows($ab) > 0) {
	echo "Login Successful";
	$abc = mysqli_fetch_assoc($ab);
	// $_SESSION['name']=$abc['fname'];
	$_SESSION['uname']=$abc['username'];
	$_SESSION['email']=$abc['email'];
	$_SESSION['uid']=$abc['id'];
	$_SESSION['pic']=$abc['image'];
	header('location:dashboard.php');
}
else{
	echo "Invalid Username or password";
}
?>


 