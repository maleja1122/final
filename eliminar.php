<?php
require_once "cliente.php";

if (isset($_GET['id'])) {
    $id_cliente = $_GET['id'];

    // Eliminar el cliente según su ID
    $eliminado = cliente::eliminarClientePorId($id_cliente);

    if ($eliminado) {
        echo "Cliente eliminado exitosamente.";
    } else {
        echo "Error al eliminar el cliente.";
    }

    // Redireccionar a la página mostrar.php o a donde desees después de eliminar
    header("Location: mostrar.php");
    exit;
} else {
    echo "ID de cliente no proporcionado.";
    exit;
}
?>
