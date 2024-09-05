<?php
include_once "conn.php";
$term = mysqli_real_escape_string($conn, $_POST['term']);
$output = "";
$re = [];
$sql = "SELECT * from packages where destination LIKE '%{$term}%'";
$result = $conn->query($sql);
if($term != ""){
  if($result->num_rows>0){        #if the search term is found
      foreach($result as $place){
      $set = $place['destination'];
      array_push($re, $set);     #appending the result into the array
      }
  }else{
    $output= "not found";   
  }
  
}

#responding to the ajax call
if($output){
  echo json_encode($output);
}else{
  echo json_encode($re);
}