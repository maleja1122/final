<?php
require_once "cliente.php";

if (isset($_GET['id'])) {
    $id_cliente= $_GET['id'];

    // Obtener los datos del cliente según su ID
    $cliente = cliente :: obtenerClientePorId($id_cliente);

    if (!$cliente) {
        echo "Cliente no encontrado";
        exit;
    }
} else {
    echo "ID de cliente no proporcionado";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Manejar la actualización del cliente
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $celular = $_POST['celular'];
    $email = $_POST['email'];

    $cliente_actualizado = new cliente($nombre, $apellido, $celular, $email, '', $id_cliente);
    $cliente_actualizado->guardar(); // Llamar al método guardar para actualizar

    header("Location: mostrar.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Editar Cliente</title>
    <!-- Enlaces a estilos y scripts -->
    <!-- ... Tu código de estilos y scripts ... -->
</head>
<body>
    <h1>Editar Cliente</h1>
    <form method="POST">
        
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $cliente['nombre']; ?>"><br><br>

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" value="<?php echo $cliente['apellido']; ?>"><br><br>

        <label for="celular">Celular:</label>
        <input type="text" name="celular" value="<?php echo $cliente['celular']; ?>"><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $cliente['email']; ?>"><br><br>

        <input type="submit" value="Actualizar">
    </form>
</body>
</body>
</html>
