<?php
require_once "cliente.php";
$clientes = cliente::mostrar();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
    <style>
           body {
             /* Agregar imagen de fondo */
    background-image: url('./assets/css/img//mecanico.jpg'); /* Reemplaza 'ruta/de/la/imagen.jpg' con la ruta de tu imagen */
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
            color: #fff; /* Color del título */
            margin-bottom: 30px;
            margin-top: 20px; /* Agrega margen superior */
        }
        h2{
            text-align: center;
            color: #fff;
            
        }
        table {
            width: 90%;
            margin: auto;
            border-collapse: collapse;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 8px;
        }
        th, td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: red; /* Color del encabezado de la tabla */
            color: #fff;
            text-align: center;
        }
        tr:nth-child(even) {
            background-color: #ffd4cc; /* Color de fondo para filas pares */
        }
        tr:hover {
            background-color: #ff9d80; /* Color de fondo al pasar el ratón por encima */
        }
    </style>
</head>
<body>
    <h1>Lista de Clientes</h1>
    <table id="myTable">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Celular</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente): ?>
                <tr>
                    <td><?php echo $cliente['nombre']; ?></td>
                    <td><?php echo $cliente['apellido']; ?></td>
                    <td><?php echo $cliente['celular']; ?></td>
                    <td><?php echo $cliente['email']; ?></td>
                    <td><a href="<?php echo "editar.php?id=" . $cliente['id_cliente']?>">Editar</a> |
                    <a href="<?php echo "eliminar.php?id=" . $cliente['id_cliente']?>">Eliminar</a></td>
                    
                    
                </tr>
                
            <?php endforeach; ?>
        </tbody>
    </table>
    
    
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>
</html>
