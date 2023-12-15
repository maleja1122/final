<?php
// Se utiliza para llamar al archivo que contiene la conexión a la base de datos
require 'conexion.php';
$conexion = new Conexion();

// Validamos que el formulario y que el botón de registro hayan sido presionados
if(isset($_POST['registro'])) {

    // Validar y obtener los valores enviados por el formulario
    $nombre = $_POST['nombre'] ?? '';
    $apellido = $_POST['apellido'] ?? '';
    $celular = $_POST['celular'] ?? '';
    $email = $_POST['email'] ?? '';
    $contraseña = $_POST['contraseña'] ?? '';

    // Realizar validaciones
    if(empty($nombre) || empty($apellido) || empty($celular) || empty($email) || empty($contraseña)) {
        
        echo "Por favor, completa todos los campos.";
        exit(); 
    }

    // Validar el formato del email
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "El formato del email no es válido.";
        exit(); 
    }

    
    $consulta_verificar = $conexion->prepare("SELECT COUNT(*) FROM cliente WHERE email = ?");
    $consulta_verificar->bindParam(1, $email);
    $consulta_verificar->execute();
    $existe = $consulta_verificar->fetchColumn();

    if ($existe) {
        echo "El correo electrónico ya está registrado. Por favor, utiliza otro.";
        exit(); 
    }


    $contraseña_hash = password_hash($contraseña, PASSWORD_DEFAULT);

   
    $consulta = $conexion->prepare("INSERT INTO cliente (nombre, apellido, celular, email, contrasenia) VALUES (?, ?, ?, ?, ?)");
    $consulta->bindParam(1, $nombre);
    $consulta->bindParam(2, $apellido);
    $consulta->bindParam(3, $celular);
    $consulta->bindParam(4, $email);
    $consulta->bindParam(5, $contraseña_hash);

    if($consulta->execute()) {
        
        echo "¡Usuario creado correctamente!";
        
        header('Location: usuario_creado.php');
        exit(); 
    } else {
        
        echo "¡No se puede insertar la información!";
    }
}
?>


