<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Agregar Mecánico</title>
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
            text-align: center;
            color: #000;
            margin-bottom: 30px;
            margin-top: 10px;
        }
        form {
            width: 60%;
            margin: auto;
            background-color: #fff;
            margin: 50px auto 0; /* Modifica este valor para ajustar la separación superior */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        label {
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: red;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #000;
        }
    </style>
</head>
<body>
    
    <form action="guardarMecanico.php" method="POST">
    <h1>Agregar Mecánico</h1>
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>

        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required>
        </div>

        <div class="form-group">
            <label for="celular">Celular:</label>
            <input type="text" id="celular" name="celular" required>
        </div>

        <div class="form-group">
            <label for="especializacion">Especialización:</label>
            <input type="text" id="especializacion" name="especializacion" required>
        </div>

        <input type="submit" value="Agregar Mecánico">
    </form>
</body>
</html>

