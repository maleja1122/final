<?php
require_once("cliente.php");
//$objPersonaje = personaje::guardar();
//Crear un objeto (instancia de una clase)

//var_dump($_POST);

$contraseña = password_hash($_POST['contrasenia'], PASSWORD_DEFAULT);

$objCliente = new cliente($_POST["nombre"], $_POST["apellido"], $_POST["celular"], $_POST["email"], $contraseña);


$objCliente->guardar();

$usuario_creado = true;

if ($usuario_creado) {
    // Redirigir a la página de confirmación de usuario creado
    header('Location: usuario_creado.php');
    exit(); // Asegúrate de detener la ejecución del script después de la redirección
} else {
    // Manejo de errores u otros casos
    // Puedes redirigir a otra página si ocurre un error
    header('Location: otra_pagina.php');
    exit();
}


?>
