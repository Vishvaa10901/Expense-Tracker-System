<?php
include 'connection.php';
session_start();
//filter.php  
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {   
      $output = '';  
      $query = " 
           SELECT * FROM expensetable  
           WHERE ExpenseDate BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' AND uid='".$_SESSION['uid']."' " ;
      $result = mysqli_query($conn, $query);  
      $output .= '  
           <table class="table table-bordered">  
                <tr>  
                     <th >S. NO</th>  
                     <th >Expense Item </th>  
                     <th >Expense Cost </th>  
                     <th >Expense Date </th> 
                     <th colspan="2">Action</th>  
                </tr>  
      ';  
      $sq = 1;
        if(mysqli_num_rows($result) >= 0){
           while($row = mysqli_fetch_assoc($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>'. $sq .'</td>  
                          <td>'. $row["ExpenseItem"] .'</td>  
                          <td>'. $row["ExpenseCost"] .'</td>  
                          <td>'. $row["ExpenseDate"] .'</td>
                          <td><a href="edit.php">Edit</a></td>
						  <td><a href="delete.php">Delete</a></td>   
                     </tr>  
                '; 
                $sq = $sq + 1; 
           }  
        }
      else  
      {  
           $output .= '  
                <tr>  
                     <td colspan="5">No Order Found</td>  
                </tr>  
           ';  
      }  
      $output .= '</table>';  
      echo $output;  
 }  

?>