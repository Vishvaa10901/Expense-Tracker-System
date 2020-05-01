


<?php
include 'connection.php';
session_start();
$email = $_SESSION['email'];
if (isset($_FILES["file"] ))
  {

     $error= array();
     $file_name =$_FILES['file']['name'];
 }

$qury="UPDATE login set image='$file_name' where email='$email';";
$ab=mysqli_query($conn,$qury);


header('location:profile.php');
?>