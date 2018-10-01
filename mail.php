<?php

require "PHPMailer.php";
require "SMTP.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

function emailConfirmation($sendAddress)
{


    $mail = new PHPMailer();

    $mail->isSMTP();                            // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                     // Enable SMTP authentication
    $mail->Username = 'teagenkiel@gmail.com';          // SMTP username
    $mail->Password = 'Gitcha31'; // SMTP password
    $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                          // TCP port to connect to


    $mail->setFrom('teagenkiel@gmail.com', "Teagen Kiel");
    $mail->addReplyTo('teagenkiel@gmail.com', 'Teagen Kiel');
    $mail->addAddress("$sendAddress");   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

    $mail->isHTML(true);  // Set email format to HTML

    $bodyContent = '<h1>Registration Confirmation</h1>';
    $bodyContent .= '<p>Congratulations, you are now a registered user of the Online Voting System!</p>';

    $mail->Subject = 'Online Voting System Registration Confirmation';
    $mail->Body = $bodyContent;


    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
}

function forgotPassword($sendAddress){

    $mail = new PHPMailer();

    $mail->isSMTP();                            // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                     // Enable SMTP authentication
    $mail->Username = 'teagenkiel@gmail.com';          // SMTP username
    $mail->Password = 'Gitcha31'; // SMTP password
    $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                          // TCP port to connect to


    $mail->setFrom('teagenkiel@gmail.com', "Online Voting System");
    $mail->addReplyTo('teagenkiel@gmail.com', 'Online Voting System');
    $mail->addAddress("$sendAddress");   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

    $mail->isHTML(true);  // Set email format to HTML

    $bodyContent = '<h1>Online Voting System - Forgot Password</h1>';
    $bodyContent .= '<p>It seems like you forgot your password! Please follow this link to recover: </p>';
    $bodyContent .= '<a href="http://localhost:63342/FSEProj/Login/passReset.php" target="">Recover Password</a>';

    $mail->Subject = 'Online Voting System Registration Confirmation';
    $mail->Body = $bodyContent;


    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }



}


?>