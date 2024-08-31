<?php
include_once 'conn.php';
$email = mysqli_real_escape_string($conn, $_POST['email']);
if(!empty($email)){
  if(filter_var($email,FILTER_VALIDATE_EMAIL)){
    $check = $conn->query("SELECT * from users WHERE email ='$email'")->num_rows;
    if($check){
        $token = bin2hex(random_bytes(32));
        $expires_at = date('Y-m-d H:i:s', strtotime('+3 hour'));
        //store token in db
        $stmt = $conn->prepare("INSERT INTO password_resets (email, token, expires_at) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $email, $token, $expires_at);
        $stmt->execute();
        //send email
        $to = $email;
        $subject = "Password Reset";
        $msg = "Click the link below to reset your password: http://localhost/re-agency/pages/reset.php?token=$token";
        $headers = 'From: no-reply@ztravel.com';
        if(mail($to, $subject, $msg, $headers)){
          echo "success";    
        }else{
        echo "something Happenned!!";
        }
    }else{
      echo "$email - is not registered";
    }
  }else{
    echo "$email - is not a valid email!!";
  }
}else{
  echo "Please enter your email!";
}