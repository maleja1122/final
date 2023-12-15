<?php
// Se utiliza para llamar al archivo que contiene la conexión a la base de datos
require 'conexion.php';
$conexion = new Conexion();

// Validamos que el formulario y que el botón de registro hayan sido presionados
if(isset($_POST['registroAdmin'])) {

    // Validar y obtener los valores enviados por el formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $celular = $_POST['celular'];
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];

    // Realizar validaciones
    if(empty($nombre) || empty($apellido) || empty($celular) || empty($email) || empty($contraseña)) {
        // Verificar si algún campo está vacío
        echo "Por favor, completa todos los campos.";
        // Detener la ejecución del script
    }

    // Validar el formato del email
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "El formato del email no es válido.";
    }
    // Validar el formato del email
if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "El formato del email no es válido.";
    
}

// Verificar si el correo electrónico ya existe en la base de datos
$consulta_verificar = $conexion->prepare("SELECT COUNT(*) FROM cliente WHERE email = ?");
$consulta_verificar->bindParam(1, $email);
$consulta_verificar->execute();
$existe = $consulta_verificar->fetchColumn();

if ($existe) {
    echo "El correo electrónico ya está registrado, Por favor ingrese uno nuevo.";
    
} else {
}

    // Hash de la contraseña
    $contraseña_hash = password_hash($contraseña, PASSWORD_DEFAULT);

    // Insertar datos en la base de datos después de validarlos
    $consulta = $conexion->prepare("INSERT INTO administrador (nombre, apellido, celular, email, contraseña) VALUES (?, ?, ?, ?, ?)");
    $consulta->bindParam(1, $nombre);
    $consulta->bindParam(2, $apellido);
    $consulta->bindParam(3, $celular);
    $consulta->bindParam(4, $email);
    $consulta->bindParam(5, $contraseña_hash);

    if($consulta->execute()) {
        // Inserción exitosa
        echo "¡Usuario Creado correctamente!";
        // Redirigir a la página de mostrar datos
    
    } else {
        // Inserción fallida
        echo "¡No se puede insertar la información!";
    }
}
?>