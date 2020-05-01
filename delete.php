<?php
 
 include 'connection.php';

 $id=$_GET['id'];

 echo $id;

 $qury="DELETE FROM expensetable WHERE id=".$id;
 $ab=mysqli_query($conn,$qury);

 if($ab){
 	echo "successfully deleted";
 	header('Location:viewexpense.php');
 }
 else{
 	echo "err";
 }

 ?>