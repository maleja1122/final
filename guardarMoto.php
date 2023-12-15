<?php
require_once("moto.php");
//$objPersonaje = personaje::guardar();
//Crear un objeto (instancia de una clase)

//var_dump($_POST);

$objMoto = new moto($_POST["placa"], $_POST["marca"], $_POST["año"], $_POST["id_cliente"] );




$usuario_creado = true;

if ($objMoto->guardarMoto()) {
    // Redirigir a la página de confirmación de usuario creado
    header('Location: motocreada.html');
    exit(); // Asegúrate de detener la ejecución del script después de la redirección

}


?>