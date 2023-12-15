<?php
require_once "cita.php";

if (isset($_GET['id'])) {
    $id_cita= $_GET['id'];

    // Obtener los datos del cliente según su ID
    $cita = cita :: obtenerCitaPorId($id_cita);

    if (!$cita) {
        echo "Cita no encontrado";
        exit;
    }
} else {
    echo "ID de cliente no proporcionado";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Manejar la actualización del cliente
    $hora = $_POST['hora'];
    $fecha = $_POST['fecha'];
    $id_mecanico = $_POST['id_mecanico'];
    $id_cliente = $_POST['id_cliente'];

    $cita_actualizada = new cita($hora, $fecha, $id_mecanico, $id_cliente, $id_cita);
    $cita_actualizada->guardarCita(); // Llamar al método guardar para actualizar

    header("Location: mostrarCita.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Editar cita</title>
    <style>
        body {
            /* Agregar imagen de fondo */
    background-image: url('./assets/css/img/mecanico.jpg'); /* Reemplaza 'ruta/de/la/imagen.jpg' con la ruta de tu imagen */
    background-size: cover; /* Ajusta el tamaño de la imagen para cubrir todo el body */
    background-repeat: no-repeat; /* Evita que la imagen se repita */
    /* Opcional: puedes agregar otros estilos como color de fondo si la imagen no se carga */
    background-color: #f2f2f2; /* Color de fondo por si la imagen no se carga */
    /* Otros estilos para el body si es necesario */
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
        }

        h1 {
            color: #fff; /* Rojo */
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #ff0000; /* Rojo */
        }

        input[type="text"],
        input[type="submit"] {
            width: calc(100% - 12px);
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ff0000; /* Rojo */
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #ff0000; /* Rojo */
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #cc0000; /* Rojo más oscuro al pasar el cursor */
        }
    </style>
</head>
<body>
    <h1>Editar Cliente</h1>
    <form method="POST">

<label for="hora">Hora:</label>
<input type="text" name="hora" value="<?php echo $cita['hora']; ?>">

<label for="fecha">Fecha:</label>
<input type="text" name="fecha" value="<?php echo $cita['fecha']; ?>">

<label for="id_mecanico">ID Mecánico:</label>
<input type="text" name="id_mecanico" value="<?php echo $cita['id_mecanico']; ?>">

<label for="id_cliente">ID Cliente:</label>
<input type="text" name="id_cliente" value="<?php echo $cita['id_cliente']; ?>">

<input type="submit" value="Actualizar">
</form>
</body>
</html>
