<?php
require_once("cita.php");



$objCita = new cita($_POST["hora"], $_POST["fecha"], $_POST["id_mecanico"], $_POST["id_cliente"], $_POST["id_moto"]);


$citaCreada = $objCita->guardarCita();


if ($citaCreada) {
    header('Location: citaCreada.php');
    exit(); 
} else {
    header('Location:  solicitarCita.php');
    exit();
}
?>