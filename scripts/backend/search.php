<?php
include_once "conn.php";
$term = mysqli_real_escape_string($conn, $_POST['term']);
$output = "";
$sql = "SELECT * from packages where destination LIKE '%{$term}%'";
$result = $conn->query($sql);
if($term != ""){
  if($result->num_rows>0){
      foreach($result as $place){
      $output .= "<a><div>{$place['destination']}</div><div>Offer: {$place['offer']}%</div></a>";
      }
  }else{
    $output= "no search results related to your search term \"$term\" !";
  }
  echo $output;
}