<?php
include_once "conn.php";
session_start();
$email = mysqli_real_escape_string($conn, $_POST['email']);
$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
$pwd = md5($pwd);
if(!empty($email)&&!empty($pwd)){
  $sql = "SELECT * from users WHERE email = '{$email}' AND password = '{$pwd}'";
  $check = $conn->query($sql);
  if($check->num_rows>0){
    $user = $check->fetch_assoc();
    $_SESSION['unique_id'] = $user['unique_id'];
    echo "success";
  }else{
    echo "Email or Password is incorrect!!";
  }
}else{
  echo "All inputs are required";
}