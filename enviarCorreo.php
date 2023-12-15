<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

if (isset($_POST['send'])) {
    $email = htmlentities($_POST['email']);

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'pruebag389@gmail.com'; // Reemplaza con tu dirección de correo
    $mail->Password = 'obrcjccomfeycftn'; // Reemplaza con tu contraseña
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';
    $mail->isHTML(true);
    $mail->setFrom($email);
    $mail->addAddress('mediaipack@gmail.com'); // Reemplaza con la dirección a la que quieres enviar el correo
    $mail->Subject = "Hola, necesito más informacion";
    $mail->Body = "Buenos dias, necesito mas informacion";
    
    try {
        $mail->send();
        header("Location: index.html?email_sent");
        exit;
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }
} else {
    echo "Acceso no autorizado";
}
?>
