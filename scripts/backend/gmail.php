<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'vendor/autoload.php';

$mail = new PHPMailer(true);
try{
    $mail->isSMTP();// Set mailer to use SMTP
    $mail->CharSet = "utf-8";// set charset to utf8
    $mail->SMTPAuth = true;// Enable SMTP authentication
    $mail->SMTPSecure = 'tls';// Enable TLS encryption, `ssl` also accepted

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

    $mail->Username = 'Sender Email';// SMTP username
    $mail->Password = 'Sender Email Password';// SMTP password

    $mail->setFrom('example@mail.com', 'John Smith');//Your application NAME and EMAIL
    $mail->Subject = 'Test';//Message subject
    $mail->MsgHTML('HTML code');// Message body
    $mail->addAddress('User Email', 'User Name');// Target email
    $mail->send();
    echo "success";
}catch (Exception $e){
    echo $e->getMessage();
} 