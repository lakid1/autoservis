
<?php

$subject = "Registrace v Autoservise";
$message = "<p>Dobrý den, </p> <p>zasíláme vám vaše přihlašovací údaje k aplikaci Váš Autoservis.</p> <p>Přihlašovací jméno: $email </p> <p> Heslo: $heslo </p><p>Přejeme hezký zbytek dne.</p>";

// Message lines should not exceed 70 characters (PHP rule), so wrap it
$message = wordwrap($message, 70);
// Send Mail By PHP Mail Function
require 'PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 1;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'm.smidl.st@spseiostrava.cz';                 // SMTP username
$mail->Password = 'Lokomotiva+99';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port =465;                                    // TCP port to connect to

$mail->setFrom('m.smidl.st@spseiostrava.cz',"Registrace");
$mail->addAddress($email);     // Add a recipient

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $subject;
$mail->Body    = $message;
$mail->AltBody = $message;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} 
    
?>