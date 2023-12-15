<?php
require_once "moto.php";
$motos = moto::mostrarMoto();
?>
<html>
<head>
    <title>Lista de Motos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
</head>
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
        .btn-container{
            display: flex;
    flex-direction: column;
    gap: 20px;
    max-width: 600px;
    margin: 0 auto; /* Centra horizontalmente */
    align-items: center; /* Centra verticalmente */
    
   
        }
        </style>
<body> 
    <table id="myTable" class="table table-striped table-bordered" style="width:90%">
        <thead>
            <tr>
                <th>Placa</th>
                <th>Marca</th>
                <th>Año</th>
                <th>cliente</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($motos as $moto): ?>
                <tr>
                    <td><?php echo $moto['placa']; ?></td>
                    <td><?php echo $moto['marca']; ?></td>
                    <td><?php echo $moto['año']; ?></td>
                    <td><?php echo $moto['id_cliente']; ?></td>
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
