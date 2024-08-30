<?php
include_once 'conn.php';
$token = mysqli_real_escape_string($conn,$_POST['token']);
$sql = "SELECT * from password_resets WHERE token = '$token'";
$check = $conn->query($sql)->fetch_assoc();
if($check){
  $expires_at = $check['expires_at'];
  $now = date('Y-m-d H:m:s',strtotime('+2 hours'));
  $email = $check['email'];
  
  // token validation
  if ($now < $expires_at) {
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    $cpwd = mysqli_real_escape_string($conn, $_POST['cpwd']);
    
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
  }else{
    echo "Token expired!!";
  }
}else{
  echo "Invalid token";
}


// if(isset($_GET['token'])){
//   $token = $_GET['token'];
//   $res = $conn->prepare($sql);
//   $res->bind_param('s',$token);
//   $res->execute();
//   $res = $res->get_result()->fetch_assoc();
  
//   if($res){
//      
//      
//     }else{
//       header("Location:recover.php?error=Token expired resend link");
//       exit();
//     }   
//   }else{
//     header('Location:recover.php?error=Invalid token! enter email to receive a new token');
//     exit();
//   }
// }elseif (isset($_POST['pwd'])){
//   $email = $_POST['email'];
//   $pwd = md5($_POST['pwd']);
//   $sql = "UPDATE users SET password = ? WHERE email =?";
//   $res = $conn->prepare($sql);
//   $res->bind_param('ss', $pwd, $email);
//   $res->execute();
//   if($res){
//     echo "<script>alert('Password Changed')</script>";
//     header("Location:login.php");
//   }
// }