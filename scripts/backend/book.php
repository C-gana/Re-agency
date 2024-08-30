<?php
session_start();
include_once "conn.php";
$from = mysqli_real_escape_string($conn,$_POST['from']);
$to = mysqli_real_escape_string($conn,$_POST['to']);
$nop = mysqli_real_escape_string($conn,$_POST['number_of_ppl']);
$dest = mysqli_real_escape_string($conn,$_POST['dest']);
$fee = mysqli_real_escape_string($conn,$_POST['fee']);
$additional_info = mysqli_real_escape_string($conn,$_POST['additional_info']);
$unique_id = $_SESSION['unique_id'];

if(!empty($from)&&!empty($to)&&!empty($nop)){
  if($nop>0){

    $book_sql = "INSERT into bookings(unique_id,from_date,to_date,number_of_people,fee,site,add_info)
      values('$unique_id','$from','$to','$nop','$fee','$dest','$additional_info')";
    $response = $conn->query($book_sql);
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