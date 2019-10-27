<?php
require_once('require.php');
require_once('PHPMailerAutoload.php');
// Import PHPMailer classes into the global namespace
//! These must be at the top of your script, not inside a function
// use PHPMailer\SMTP;
// use PHPMailer\Exception;

function sendMail($emailAdd, $receiverName, $Subject ,$Body, $path, $cid ){
    // use PHPMailer;
    

    // Load Composer's autoloader
    //require 'PHPMailerAutoload.php';//?Moved it to the top

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = true; //SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'anthonyangatia@gmail.com';                     // SMTP username
        $mail->Password   = pass();                               // SMTP password
        $mail->SMTPSecure = 'tls';//PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;          //tls                          // TCP port to connect to

        // ?The following parameters need to be passed here
        // $emailAdd = Email address of the ticket buyer.
        // $name = name of the ticket byuer

        //Recipients
        $mail->setFrom('anthonyangatia@gmail.com', 'M-Ticket.com');//!Who is sending the email
        $mail->addAddress( $emailAdd, $receiverName);     //! Add a recipient
        //?We do not need this now
        /*
        // $mail->addAddress('ellen@example.com');               // Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        */

        // Content
        //?We need to pass the name of the event as the subject
        //$Subject
        //$Body******We will need the image of the ticket
        
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $Subject;//'Here is the subject';
        $mail->Body    = $Body;//'<div style = "border:1px solid red;">This is the HTML message body<img src="cid:poster9.jpg" alt="png"> <b>in bold!</b></div>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->AddEmbeddedImage(  $path, $cid );

        $mail->send();
        echo 'Message has been sent';
        //! We need to create an sfter page to redirect to after message has been sent page
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        // !We need to create a page to handle this error.
    }
}
