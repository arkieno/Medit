<?php

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'degaleracolegio@gmail.com'; // Your Gmail address
    $mail->Password   = 'pjbtxubrwcqkhqnk'; // Your Gmail password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    //Recipients
    $mail->setFrom('degaleracolegio@gmail.com', 'ColegiodePuertoGalera');
    $mail->addAddress('degaleracolegio@gmail.com'); // Receiver Email

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'New Contact Form Submission';

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
