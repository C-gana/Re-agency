<?php
session_start();
include_once "conn.php";
$from = mysqli_real_escape_string($conn,$_POST['from']);
$to = mysqli_real_escape_string($conn,$_POST['to']);
$nop = mysqli_real_escape_string($conn,$_POST['number_of_ppl']);
$dest = mysqli_real_escape_string($conn,$_POST['dest']);
$fee = mysqli_real_escape_string($conn,$_POST['fee']);
$additional_info = mysqli_real_escape_string($conn,$_POST['additional_info']);
$ref = $_SESSION['unique_id'];

if(!empty($from)&&!empty($to)&&!empty($nop)){
  if($nop>0){
    $upd_sql = "UPDATE bookings SET from_date = '$from', to_date = '$to', number_of_people = $nop, fee = '$fee', add_info = '$additional_info' WHERE ref_no = '$ref'";
    $response = $conn->query($upd_sql);
    if($response){
      echo "success";
    }else{
      echo "OOPS!, Something happened";
    }
  }else{
    echo "Please enter a minimum of 1 person for the trip!";
  }
}else{
  echo "fill all the required fields";
}