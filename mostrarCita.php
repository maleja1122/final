<?php
require_once("cita.php");
require_once("cliente.php");
require_once("mecanico.php");
require_once("moto.php");

$citas = cita::mostrarCita();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Lista de citas</title>
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
        .header {
            background-color: #000;
            color: #fff;
            padding: 30px 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        form {
            display: flex;
            justify-content: center;
            margin-bottom: 15px;
        }
        button {
            background-color: red;
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 0 10px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color:black;
        }
    </style>
</head>
<body>
<div class="header">
        <div class="profile">
            <img src="https://via.placeholder.com/50" alt="Profile Icon">
            <span class="username">Hola, Pepito Perez</span>
        </div>
        <!-- Agrega aquí cualquier otro elemento del encabezado si es necesario -->
    <div class="btn-group" role="group" aria-label="Botones">
    <form action="cerrarSesion.php" method="POST">
        <button type="submit" class="btn btn-danger" name="logout">Cerrar sesión</button>
    </form>
    <form action="bienvenidoAdmin.php" method="POST">
        <button type="submit" class="btn btn-danger" name="logout">Volver al inicio</button>
    </form>
</div>
    </div>
<h1>Lista de Citas</h1>
<h2>Aquí encontrarás las citas registradas por nuestros clientes.</h2>
    <table id="myTable">
    
        <thead>
        
            <tr>
                <th>Hora</th>
                <th>Fecha</th>
                <th>Mecánico</th>
                <th>Cliente</th>
                <th>Moto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($citas as $cita): ?>
                <tr>
                    <td><?php echo $cita['hora']; ?></td>
                    <td><?php echo $cita['fecha']; ?></td>
                    <td><?php echo $cita['id_mecanico']; ?></td>
                    <td><?php echo $cita['id_cliente']; ?></td>
                    <td><?php echo $cita['moto']; ?></td>
                    <td><a href="<?php echo "editarcita.php?id=" . $cita['id_cita']?>">Editar</a> |
                    <a href="<?php echo "eliminarcita.php?id=" . $cita['id_cita']?>">Eliminar</a></td>
                    
                    
                </tr>
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
