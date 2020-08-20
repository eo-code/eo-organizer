<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../config/src/Exception.php';
require '../config/src/PHPMailer.php';
require '../config/src/SMTP.php';

$nama = $_POST["nama"];
$email = $_POST["email"];
$message = $_POST["message"];
$no_hp = $_POST["no_hp"];

$mail = new PHPMailer(true);

try {

    //Server settings
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'mbara4321@gmail.com';                     // SMTP username
    $mail->Password   = 'baraaksayeth123';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;    
    
    //Recipients
    $mail->setFrom('mbara4321@gmail.com', 'Naya Event Organizer');
    $mail->addAddress('fikihamar05@gmail.com', "Fikih");     // Add a recipient

    // Message
    $mail->isHTML(true);
    $mail->Subject = 'Pesan Baru Dari Member Event Organizer';
    $mail->Body = "Kepada Nara Art Mendapatkan Pesan Dari <br/>
    <h3>PENGIRIM</h3>
     <span style='color:#8675a9;font-size:18px'>Dari</span>: <span>$nama</span> , <br/> 
     <span style='color:#8675a9;font-size:18px'>Email</span>: <span>$email</span>, <br/> 
     <span style='color:#8675a9;font-size:18px'>No Telepon</span>: <span>$no_hp</span> <br/> <br/> 
     <hr />
     <h3>PESAN</h3> <br/>
     $message.
     ";

    $mail->send();

        header("Location: ../../frontend/user/home.php#kontak?pesan=sukses");


} catch (\Throwable $th) {
    //throw $th;
    // header("Location: ../../frontend/user/home.php#kontak?pesan=gagal");
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}