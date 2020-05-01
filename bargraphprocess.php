<?php
include 'connection.php';
session_start();
//filter.php  
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {   
      $output = '';
      $x = '' ;
      $dataPoints = array();  
      $query = " 
           SELECT * FROM expensetable  
           WHERE ExpenseDate BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' AND uid='".$_SESSION['uid']."' " ;
      $result = mysqli_query($conn, $query);  
      
      
        if(mysqli_num_rows($result) >= 0){
           while($row = mysqli_fetch_assoc($result))  
           {  
               array_push($dataPoints, array("label"=>$row['ExpenseItem'], "y"=>$row['ExpenseCost'], "indexLabel"=>"{y}")); 
           }
           $x .= json_encode($dataPoints, JSON_NUMERIC_CHECK);
           // echo $x;  
        }
      else  
      {  
           $output .= '  
                  <div id="chartContainer" style="height: 370px; width: 50%;"><p>No order found</p></div>
           ';  
      }  
      $output .= '
      <div id="chartContainer" style="height: 370px; width: 50%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
           <script>
window.onload = function () {

CanvasJS.addColorSet("blueShades",
               ["#c3dfe3",
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
  // zoomEnabled: true,
  dataPointMaxWidth: 20,
  axisY:{
        gridColor: "#f2f9fa"
     },
  /
  theme: "light1", // "light1", "light2", "dark1", "dark2"
  title:{
    text: "Your Expense"
  },
  data: [
  {
    type: "line", //change type to column, bar, line, area, pie, etc
    //indexLabel: "{y}", //Shows y value on all Data Points
    color: "#2b808a",
    indexLabelFontColor: "#f2f9fa",
    indexLabelPlacement: "outside",   
    dataPoints:'. $x .'
  },
  {
    type: "column", //change type to column, bar, line, area, pie, etc
    //indexLabel: "{y}", //Shows y value on all Data Points
    color: "#2b808a",
    indexLabelFontColor: "#5A5757",
    indexLabelPlacement: "outside",   
    dataPoints:'. $x .'
  }]
});

chart.render();
 
}
</script>
  
        
      ';    
      echo $output;  
 }  

?>