<?php
require_once("administrador.php");
//$objPersonaje = personaje::guardar();
//Crear un objeto (instancia de una clase)

//var_dump($_POST);

$contraseña = password_hash($_POST['contrasenia'], PASSWORD_DEFAULT);

$objAdmin = new administrador($_POST["nombre"], $_POST["apellido"], $_POST["celular"], $_POST["email"], $contraseña);


$objAdmin->guardarAdmin();

$administradorCreado = true;

if ($administradorCreado ) {
    // Redirigir a la página de confirmación de usuario creado
    header('Location: administradorCreado.php');
    exit(); // Asegúrate de detener la ejecución del script después de la redirección
} else {
    // Manejo de errores u otros casos
    // Puedes redirigir a otra página si ocurre un error
    header('Location: otra_pagina.php');
    exit();
}

?>
