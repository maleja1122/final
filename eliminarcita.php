<?php
require_once "cita.php";

if (isset($_GET['id'])) {
    $id_cita = $_GET['id'];

    // Eliminar el cliente según su ID
    $eliminado = cita::eliminarCitaPorId($id_cita);

    if ($eliminado) {
        echo "cita eliminada exitosamente.";
    } else {
        echo "Error al eliminar cita.";
    }

    // Redireccionar a la página mostrar.php o a donde desees después de eliminar
    header("Location: mostrarCita.php");
    exit;
} else {
    echo "ID de cita no proporcionado.";
    exit;
}

?>