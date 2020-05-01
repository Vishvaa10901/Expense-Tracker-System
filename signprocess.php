<?php

include 'connection.php';
session_start();
$uname=$_POST['usernamesignup'];
$email=$_POST['emailsignup'];
$pass=$_POST['passwordsignup'];

$qury="SELECT * FROM login WHERE email='$email' AND pass='$pass'";
$qury="INSERT into login(username,email,pass) values ('$uname','$email','$pass') ";
$ab=mysqli_query($conn,$qury);

// if($ab){
// 	echo "scc";
// }
// else{
// 	echo "err";
// }

// if (mysqli_num_rows($ab) > 0) {
// 	echo "Login Successful";
// 	$abc = mysqli_fetch_assoc($ab);
	// $_SESSION['name']=$abc['fname'];
	// $_SESSION['uname']=$abc['username'];
	// $_SESSION['email']=$abc['email'];
	// $_SESSION['uid']=$abc['id'];
	// $_SESSION['pic']=$abc['image'];
$_SESSION['uname']=$uname;
$_SESSION['email']=$email;
// $_SESSION['uid']=
	header('location:index.php');


?>


