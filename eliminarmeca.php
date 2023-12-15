<?php
require_once "mecanico.php";

if (isset($_GET['id'])) {
    $id_mecanico = $_GET['id'];

    // Eliminar el cliente según su ID
    $eliminado = mecanico::eliminarMecanicoPorId($id_mecanico);

    if ($eliminado) {
        echo "Mecanico eliminado exitosamente.";
    } else {
        echo "Error al eliminar el Mecanico.";
    }

    // Redireccionar a la página mostrar.php o a donde desees después de eliminar
    header("Location: mostrarmeca.php");
    exit;
} else {
    echo "ID de Mecanico no proporcionado.";
    exit;
}

?>
