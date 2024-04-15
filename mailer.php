<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;   
use PHPMailer\PHPMailer\Exception;

require __DIR__. "/vendor/autoload.php";

$mail = new PHPMailer(true);

$mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.mailersend.net";
$mail->SMTPSecure = "tls";
$mail->Port = 587;
$mail->Username = "MS_k5FuWx@trial-jy7zpl937rrl5vx6.mlsender.net";
$mail->Password = "b2E08QQoj2Nfart5";

$mail->isHTML(true);

return $mail;

?>