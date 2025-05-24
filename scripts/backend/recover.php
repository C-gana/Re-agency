<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once 'conn.php';
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once '../../vendor/autoload.php';
session_start();

$mail = new PHPMailer(true);
if(isset($_POST['email'])){
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  if(!empty($email)){
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
      $check = $conn->query("SELECT * from users WHERE email ='$email'")->num_rows;
      if($check){
        $otp = rand(100000,999999);
        //storing otp in db
        $upd_sql = "UPDATE users set otp =$otp WHERE email = '$email'";
        $res = $conn->query($upd_sql);
        if($res){
          //send email
          try {
            $msg = "Your verification code is\n<h1>{$otp}</h1>";
            $mail->isSMTP();// Set mailer to use SMTP
            $mail->CharSet = "utf-8";// set charset to utf8
            $mail->SMTPAuth = true;// Enable SMTP authentication
            $mail->SMTPSecure = 'tls';// Enable TLS encryption, `ssl` also accepted
            // configuring the smtp server-----------------------------------------------------
            $mail->Host = 'smtp.gmail.com';// Specify main and backup SMTP servers
            $mail->Port = 587;// TCP port to connect to
            $mail->SMTPOptions = array(
              'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
              )
            );
            $mail->isHTML(true);// Set email format to HTML
    
            $mail->Username = 'patiencebanda91@gmail.com';// SMTP username
            $mail->Password = 'sbah edls xwks yvdv';// SMTP password
    
            $mail->setFrom('noreply@z-travel.com', 'Z-travel');//setting application NAME and EMAIL
            $mail->Subject = 'Password Reset';//Message subject
            $mail->MsgHTML($msg);// Message body
            $mail->addAddress($email);// Target email
            $mail->send();
            echo "success";
            $_SESSION['email'] = $email;
          }catch (Exception $e){
            // echo $e->getMessage();
            echo "Connection failed - Check your internet connection!";
          }     
        }
      }else{
        echo "$email - is not registered";
      }
    }else{
      echo "$email - is not a valid email!!";
    }
  }else{
    echo "Please enter you email";
  }
}

