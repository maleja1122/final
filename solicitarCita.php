<?php
    require_once("cliente.php");
    require_once("mecanico.php");
    require_once("moto.php");
    $clientes = cliente::mostrar();
    $mecanicos = mecanico::mostrarMeca();
    $motos = moto::mostrarMoto();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Solicitar Cita</title>
    <style>
        body {
            /* Agregar imagen de fondo */
    background-image: url('./assets/css/img/moto.jpg'); /* Reemplaza 'ruta/de/la/imagen.jpg' con la ruta de tu imagen */
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
            color: #000;
    
    text-align: center;
        }

        form {
            max-width: 600px;
    margin: 50px auto 0; /* Modifica este valor para ajustar la separación superior */
    background-color: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            
        }

        label {
            font-weight: bold;
            color: #555;
        }

        input[type="date"],
        input[type="time"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

  

    <form action="guardarCita.php" method="POST">
    <h1>Solicitar Cita</h1>
        <label for="fecha">Fecha de la cita:</label>
        <input type="date" id="fecha" name="fecha" required>

        <label for="hora">Hora de la cita:</label>
        <input type="time" id="hora" name="hora" required>

        <label for="id_mecanico">Mecánico:</label>
        <select class="form-select" name="id_mecanico" required>
            <option value="" selected disabled>Seleccione</option>
            <?php
            foreach ($mecanicos as $mecanico) {
                echo "<option value='" . $mecanico['id_mecanico'] . "'>" . $mecanico['nombre'] . "</option>";
            }
            ?>
        </select>

        <label for="id_cliente">Cliente:</label>
        <select class="form-select" name="id_cliente" required>
            <option value="" selected disabled>Seleccione</option>
            <?php
            foreach ($clientes as $cliente) {
                echo "<option value='" . $cliente['id_cliente'] . "'>" . $cliente['nombre'] . "</option>";
            }
            ?>
        </select>

        <label for="id_moto">Moto:</label>
        <select class="form-select" name="id_moto" required>
            <option value="" selected disabled>Seleccione</option>
            <?php
            foreach ($motos as $moto) {
                echo "<option value='" . $moto['id_moto'] . "'>" . $moto['placa'] . "</option>";
            }
            ?>
        </select>

        <input type="submit" value="Solicitar Cita">
    </form>

</body>
</html>

