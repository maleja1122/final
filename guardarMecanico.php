<?php
require_once("mecanico.php");
//$objPersonaje = personaje::guardar();
//Crear un objeto (instancia de una clase)

//var_dump($_POST);

$objMeca = new mecanico($_POST["nombre"], $_POST["apellido"], $_POST["celular"], $_POST["especializacion"]);


$objMeca->guardarMecanico();

$agregarMeca = true;

if ($agregarMeca ) {
    // Redirigir a la página de confirmación de usuario creado
    header('Location: agregarMeca.php');
    exit(); // Asegúrate de detener la ejecución del script después de la redirección
} else {
    // Manejo de errores u otros casos
    // Puedes redirigir a otra página si ocurre un error
    header('Location: otra_pagina.php');
    exit();
}

?>