<?php
include 'connection.php';
session_start();
//filter.php  
 if(isset($_POST["todate"]))  
 {   
      $output = '';  
      $query = " 
           SELECT * FROM expensetable  
           WHERE ExpenseDate='".$_POST["todate"]."' AND uid='".$_SESSION['uid']."' " ;
      $result = mysqli_query($conn, $query); 
      $output .= '<p id="todate">'; 
      $x = 0;
      if(mysqli_num_rows($result) >= 0){
           while($row = mysqli_fetch_assoc($result))  
           {  
                $x = $x + $row["ExpenseCost"]; 
           }
           $output.=$x;  
        }
        else{
        	$output .= 'no output found';
        }
        $output.='</p>';
        echo $output; 
  }

  if(isset($_POST["yesterdate"]))  
 {   
      $output = '';  
      $query = " 
           SELECT * FROM expensetable  
           WHERE ExpenseDate='".$_POST["yesterdate"]."' AND uid='".$_SESSION['uid']."' " ;
      $result = mysqli_query($conn, $query); 
      $output .= '<p id="yesterdate">'; 
      $x = 0;
      if(mysqli_num_rows($result) >= 0){
           while($row = mysqli_fetch_assoc($result))  
           {  
                $x = $x + $row["ExpenseCost"]; 
           }
           $output.=$x;  
        }
        else{
        	$output .= 'no output found';
        }
        $output.='</p>';
        echo $output; 
  }
  
  if(isset($_POST["fromdate"],$_POST["todat"]))  
 {   
      $output = '';  
      $query = " 
           SELECT * FROM expensetable  
           WHERE ExpenseDate BETWEEN '".$_POST["fromdate"]."' AND '".$_POST["todat"]."' AND uid='".$_SESSION['uid']."' " ;
      $result = mysqli_query($conn, $query); 
      $output .= '<p id="last7days">'; 
      $x = 0;
      if(mysqli_num_rows($result) >= 0){
           while($row = mysqli_fetch_assoc($result))  
           {  
                $x = $x + $row["ExpenseCost"]; 
           }
           $output.=$x;  
        }
        else{
        	$output .= 'no output found';
        }
        $output.='</p>';
        echo $output; 
  }

  if(isset($_POST["m"],$_POST["n"]))  
 {   
      $output = '';  
      $query = " 
           SELECT * FROM expensetable  
           WHERE ExpenseDate BETWEEN '".$_POST["m"]."' AND '".$_POST["n"]."' AND uid='".$_SESSION['uid']."' " ;
      $result = mysqli_query($conn, $query); 
      $output .= '<p id="last30days">'; 
      $x = 0;
      if(mysqli_num_rows($result) >= 0){
           while($row = mysqli_fetch_assoc($result))  
           {  
                $x = $x + $row["ExpenseCost"]; 
           }
           $output.=$x;  
        }
        else{
        	$output .= 'no output found';
        }
        $output.='</p>';
        echo $output; 
  }

  if(isset($_POST["year"]))  
 {   
      $output = '';  
      $query = " 
           SELECT * FROM expensetable  
           WHERE year(ExpenseDate) = '".$_POST['year']."' AND uid='".$_SESSION['uid']."' " ;
      $result = mysqli_query($conn, $query); 
      $output .= '<p id="curryear">'; 
      $x = 0;
      if(mysqli_num_rows($result) >= 0){
           while($row = mysqli_fetch_assoc($result))  
           {  
                $x = $x + $row["ExpenseCost"]; 
           }
           $output.=$x;  
        }
        else{
        	$output .= 'no output found';
        }
        $output.='</p>';
        echo $output; 
  }

  if(isset($_POST["total"]))  
 {   
      $output = '';  
      $query = " 
           SELECT * FROM expensetable  
           WHERE uid='".$_SESSION['uid']."' " ;
      $result = mysqli_query($conn, $query); 
      $output .= '<p id="curryear">'; 
      $x = 0;
      if(mysqli_num_rows($result) >= 0){
           while($row = mysqli_fetch_assoc($result))  
           {  
                $x = $x + $row["ExpenseCost"]; 
           }
           $output.=$x;  
        }
        else{
        	$output .= 'no output found';
        }
        $output.='</p>';
        echo $output; 
  }


?>

