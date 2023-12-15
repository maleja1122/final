<?php
    require_once("cliente.php");
    require_once("mecanico.php");
    $clientes = cliente::mostrar();
    $mecanicos = mecanico::mostrarMeca();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Moto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

        .container {
            margin-top: 50px;
        }

        h2 {
            font-size: 2em;
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .btn-secondary {
            background-color: #555;
            color: #fff;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #333;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
        .mt-5{
            text-align: center;
            
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="guardarMoto.php">
                    <h2 class="mt-5 mb-4">Registrar Moto</h2>

                    <div class="form-group">
                        <input type="text" class="form-control" name="placa" placeholder="Placa" required>
                    </div>
                    <hr>

                    <div class="form-group">
    <label for="marca">Selecciona la marca:</label>
    <select class="form-control" name="marca" id="marca" required>
        <option value="">Selecciona una marca</option>
        <option value="BMW">BMW</option>
        <option value="DUCATI">DUCATI</option>
    </select>
</div>
<hr>

                    <div class="form-group">
                        <input type="number" class="form-control" name="año" placeholder="Año" required>
                    </div>
                    <hr>

                    <div class="form-group">
                        <h2 class="h4 mb-3 text-gray-800">Cliente</h2>
                        <select class="form-select form-select mb-3" name="id_cliente" required>
                            <option selected>Seleccione</option>
                            <?php
                            foreach ($clientes as $cliente) {
                                echo "<option value='" . $cliente['id_cliente'] . "'>" . $cliente['nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Registrar Moto</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
