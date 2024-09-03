<?php
include_once "conn.php";

$otp = mysqli_real_escape_string($conn, $_POST['otp']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$sql = "SELECT * FROM users WHERE email = '{$email}' AND otp = $otp";
$check = $conn->query($sql);
if($check->num_rows>0){
  $sql = "UPDATE users SET otp=0 WHERE email = '{$email}'";
  $res = $conn->query($sql);
  if($res){
    echo "success";
  }
}else{
  echo "You've entered an incorrect verification code!";
}