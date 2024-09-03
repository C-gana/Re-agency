<?php
include_once 'conn.php';
session_start();
$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
$cpwd = mysqli_real_escape_string($conn, $_POST['cpwd']);
$email = mysqli_real_escape_string($conn, $_SESSION['email']);

// Password validation
if(!empty($pwd) && !empty($cpwd)){
  if(strlen($pwd)>=8){
    if($pwd === $cpwd){
      $pwd = md5($pwd);
      $sql = "UPDATE users SET password = '$pwd' where email = '$email'";
      $response = $conn->query($sql);
      if($response){
        echo "success";
      }else{
        echo "OOPS! Something happened!";
      }
    }else{
      echo "Password and confirm password do not match!";
    }
  }else{
    echo "Password Must be atleast 8 characters long!";
  }
}else{
  echo "All fields are required!";
}


