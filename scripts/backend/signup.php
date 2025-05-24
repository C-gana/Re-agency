<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once "conn.php";
$username = mysqli_real_escape_string($conn, $_POST['username']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
$cpwd = mysqli_real_escape_string($conn, $_POST['cpwd']);

if(!empty($username)&&!empty($email)&&!empty($pwd)&&!empty($cpwd)){
  // checking if username already exists
  $in_db = $conn->query("SELECT * FROM users WHERE username = '$username'")->num_rows;
  if(!$in_db){
    // email validation
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
      $in_db = $conn->query("SELECT * FROM users WHERE email = '$email'")->num_rows;
      if(!$in_db){
        // password validation
        if($pwd === $cpwd){
          if(strlen($pwd)>7){
            $pwd = md5($pwd);
            $unique_id = rand(time(), 10000000000);
            $sql = "INSERT INTO `users` (username, email, password, unique_id) VALUES ('{$username}','{$email}','{$pwd}','{$unique_id}')";
            $response = $conn->query($sql);
            if($response){
              echo "success";
            }else{
              echo "OOPS, Something Happened!!";
            }
          }else{
            echo "Password has to be atleast 8 characters long!!";
          }
        }else{
          echo "Password and confirm password do not match!";
        }
      }else{
        echo "$email - is already registered!!";
      }
    }else{
      echo "$email - is not a valid email";
    }
  }else{
    echo "The username \"$username\" is already taken";
  }
}else{
  echo "All inputs are required";
}