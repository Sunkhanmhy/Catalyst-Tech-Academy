<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


// Include PHPMailer autoloader (update path if needed)
	require 'vendor/autoload.php'; // Or path to PHPMailer

// Enable error reporting for debugging
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);


// Dummy variables — replace with real form data or test data
	$Fullname = $_POST['Fullname'];
	$Address = $_POST['Address'];
	$Email = $_POST['Email'];
	$Date = $_POST['Date'];
	$Message = $_POST['Message'];


	try {
    $mail = new PHPMailer(true);

    // Server settings
    $mail->SMTPDebug = 0; // Set to 0 for production
	$mail->Debugoutput = 'html'; // Output nicely in browser
    $mail->isSMTP();
    $mail->SMTPAuth   = true;
	
    $mail->Host       = 'smtp.maileroo.com';
    $mail->Username   = 'smtp@onenetservers.net';
    $mail->Password   = '2c45edfdb85422375bc24c11';
    $mail->SMTPSecure = 'STARTTLS';
    $mail->Port       = 465; 

    // Recipients
    $mail->setFrom('info@catalysttech.tech', 'Contact Admin');
    $mail->addAddress('paul@catalysttech.tech', 'Form Request');

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'New Users Enquiry – Catalyst Tech Academy';
    $mail->Body    = "
        <h3>Hello, You have a new enquiry</h3>
        <h4>Fullname: {$Fullname}</h4>
        <h4>Address: {$Address}</h4>
        <h4>Email: {$Email}</h4>
        <h4>Date: {$Date}</h4>
        <h4>Message: {$Message}</h4>
    ";

    $mail->send();
    echo 'Message has been sent successfully.';
		} catch (Exception $e) {
    echo "Mailer Error: {$mail->ErrorInfo}";

}

?>