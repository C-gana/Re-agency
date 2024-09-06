<?php

use function PHPSTORM_META\type;

include_once "conn.php";
$ref = mysqli_real_escape_string($conn, $_POST['ref']);
$sql = "DELETE from bookings WHERE ref_no = '$ref'";
$response = $conn->query($sql);
if($response){
  echo "success";
}else{
  echo "OOPS, something happened!";
}