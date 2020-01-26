<?php

$nombre = $_POST["nombre"];
$telefono = $_POST["telefono"];
$correo = $_POST["correo"];
$mensaje = $_POST["mensaje"];

$body = "Nombre: " . $nombre . "<br>Correo: " .$correo . "<br>Telefono: " .$telefono . "<br>Mensaje: " .$mensaje;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server with Gmail
    
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'jairolaguna@gmail.com';                // SMTP username
    $mail->Password   = 'jlaguna28';                            // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($correo, $nombre);
    $mail->addAddress('jairolaguna@gmail.com');                 // Add a recipient
    
    // Content
    $mail->isHTML(true);                                        // Set email format to HTML
    $mail->Subject = 'Correo de Restaurante';
    $mail->Body    = $body;
    $mail->charSet = 'UTF-8';

    $mail->send();
    echo '<script>
        alert("El mensaje se envio correctamente");
        window.history.go(-1);
        </script>';
} catch (Exception $e) {
    echo "El mensaje no se pudo enviar: <br> Prueba desactivar tu Antivirus <br> {$mail->ErrorInfo}";
}