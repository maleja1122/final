<?php
require_once "mecanico.php";

if (isset($_GET['id'])) {
    $id_mecanico= $_GET['id'];

    // Obtener los datos del cliente según su ID
    $mecanico = mecanico :: obtenerMecanicoPorId($id_mecanico);

    if (!$mecanico) {
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
    $especializacion = $_POST['especializacion'];

    $mecanico_actualizado = new mecanico($nombre, $apellido, $celular, $especializacion, $id_mecanico);
    $mecanico_actualizado->guardarMecanico(); // Llamar al método guardar para actualizar

    header("Location: mostrar.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Editar Mecánico</title>
    <!-- Enlaces a estilos y scripts -->
    <!-- ... Tu código de estilos y scripts ... -->
</head>
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
            color: #ffff; /* Rojo */
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

        input[type="text"] {
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
<body>

    <h1>Editar Mecánico</h1>
    <form method="POST">

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $mecanico['nombre']; ?>"><br><br>

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" value="<?php echo $mecanico['apellido']; ?>"><br><br>

        <label for="celular">Teléfono:</label>
        <input type="text" name="celular" value="<?php echo $mecanico['celular']; ?>"><br><br>

        <label for="especializacion">Especialización:</label> <!-- Corrección en el nombre del campo -->
        <input type="text" name="especializacion" value="<?php echo $mecanico['especializacion']; ?>"><br><br>

        <input type="submit" value="Actualizar">
    </form>
</body>
</html>
