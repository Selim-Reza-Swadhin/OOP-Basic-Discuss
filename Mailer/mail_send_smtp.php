<?php
use phpmailer\PHPMailer\PHPMailer;
use phpmailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$mail = new PHPMailer(TRUE);

try{
    $mail->setFrom('debi@debi.com', 'Debi');
    $mail->addAddress('angel@angel.com', 'Angel');
    $mail->Subject = 'Debi';
    $mail->Body = 'Angels are there !';

    $mail->isSMTP();
    $mail->Host = 'smtp.debi.com';
    $mail->SMTPAuth = TRUE;
    $mail->SMTPSecure = 'tls';

    $mail->Username = 'smtp@debi.com';
    $mail->Password = 'iamyourfather';
    $mail->Port = 587;

    $mail->send();
}catch(Exception $e){
    echo $e->errorMessage();
}catch(\Exception $e){
    echo $e->getMessage();
}