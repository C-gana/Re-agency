<?php
include_once "conn.php";
$term = mysqli_real_escape_string($conn, $_POST['term']);
$output = "";
$sql = "SELECT * from packages where destination LIKE '%{$term}%'";
$result = $conn->query($sql);
if($term != ""){
  if($result->num_rows>0){
      foreach($result as $place){
      $output .= "<div class='item'><a>{$place['destination']}</a></div>";
      }
  }else{
    $output= "<p>No results matching \"$term\" !</p>";
  }
  echo $output;
}