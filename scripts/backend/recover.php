<?php
include_once 'conn.php';
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once '../../vendor/autoload.php';

$mail = new PHPMailer(true);

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
      try {
        $msg = "Click the link below to reset your password:\n http://localhost/re-agency/pages/reset.php?token=$token";
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
      }catch (Exception $e){
        echo $e->getMessage();
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