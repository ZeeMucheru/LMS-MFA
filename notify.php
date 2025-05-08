<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'message.php';
// Instantiation and passing [ICODE]true[/ICODE] enables exceptions
$mail = new PHPMailer;

try {
 //Server settings
 $mail->SMTPDebug = 0; // Enable verbose debug output
 $mail->isSMTP(); // Set mailer to use SMTP
 $mail->Host = 'litwebtech.com; menadvocates.co.ke'; // Specify main and backup SMTP servers
 $mail->SMTPAuth = true; // Enable SMTP authentication
 $mail->Username = 'autoreply@litwebtech.com'; // SMTP username
 $mail->Password = 'V_aGvmwTE(Ua'; // SMTP password
 $mail->SMTPSecure = 'tls'; // Enable TLS encryption, [ICODE]ssl[/ICODE] also accepted
 $mail->Port = 587; // TCP port to connect to

//Recipients
 $mail->setFrom('autoreply@litwebtech.com', 'Autoreply');
 $mail->addAddress($email, $username); // Add a recipient
 //$mail->addAddress('recipient2@example.com'); // Name is optional
 //$mail->addReplyTo('info@example.com', 'Information');
 //$mail->addCC('cc@example.com');
 //$mail->addBCC('bcc@example.com');

// Attachments
// $mail->addAttachment('/home/cpanelusername/attachment.txt'); // Add attachments
// $mail->addAttachment('/home/cpanelusername/image.jpg', 'new.jpg'); // Optional name

// Content
 $mail->isHTML(true); // Set email format to HTML
 $mail->Subject = 'Password Change Notification';
 $mail->Body = '<h1>OTP Verification code - <strong>'.$otp.'</strong></h1>';
 $mail->AltBody = $message;

$mail->send();
 $sent = true;

} catch (Exception $e) {
 $sent = false;
}

?>