<?php
// Establece la conexión a tu base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tallermotos";

// Crea la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener la cantidad de clientes registrados por mes
$sql = "SELECT COUNT(*) as total_cliente, MONTH(fecha_registro) as mes FROM cliente GROUP BY MONTH(fecha_registro)";
$result = $conn->query($sql);

// Array para almacenar los datos de clientes por mes
$data = array();

// Obtén los datos de la consulta y almacénalos en el array
while ($row = $result->fetch_assoc()) {
    $mes = obtenerNombreMes($row['mes']); // Función para obtener el nombre del mes
    $total_cliente = $row['total_cliente'];
    $data[$mes] = $total_cliente;
}

// Función para obtener el nombre del mes a partir de su número
function obtenerNombreMes($mesNumero) {
    $meses = [
        1 => "Enero",
        2 => "Febrero",
        3 => "Marzo",
        4 => "Abril",
        5 => "Mayo",
        6 => "Junio",
        7 => "Julio",
        8 => "Agosto",
        9 => "Septiembre",
        10 => "Octubre",
        11 => "Noviembre",
        12 => "Diciembre"
    ];
    return $meses[$mesNumero];
}
// Cierra la conexión a la base de datos
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <!-- Incluir la biblioteca de Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Estilos para el gráfico */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            
        }
        canvas {
            max-width: 800px;
            margin: 20px auto;
            display: block;
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
            padding: 10px 10px;
            margin: 10px ;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            
        }
        button:hover {
            background-color:red;
        }
        


h1 {
    font-size: 28px;
    color: #333;
    margin-bottom: 20px;
    transition: color 0.3s;
    text-align: center;
   
}

h2 {
    font-size: 18px;
    color: #666;
    line-height: 1.5;
    transition: color 0.3s;
    text-align: center;
    
}
.btn-container {
            text-align: center;
            margin-top: 20px;
        }
        .btn-container form {
            display: inline-block;
            margin: 0 5px;
        }
        .btn-container .btn {
            padding: 10px 20px;
            background-color: #ff6347;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-container .btn:hover {
            background-color: #ff7f50;
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
        <div class="btn-container">
        <form action="cerrarSesion.php" method="POST">
            <button type="submit" class="btn" name="logout">Cerrar sesión</button>
        </form>
        <form action="mostrarCita.php" method="POST">
            <button type="submit" class="btn" name="logout">Citas</button>
        </form>
        <form action="mostrarAdmin.php" method="POST">
            <button type="submit" class="btn" name="logout">Administradores</button>
        </form>
        <form action="agregarMeca.php" method="POST">
            <button type="submit" class="btn" name="logout">Registrar Mecánico</button>
        </form>
        <form action="mostrarMeca.php" method="POST">
            <button type="submit" class="btn" name="logout">Lista Mecánicos</button>
        </form>
    </div>
    </div>
    <div class="section">
    <h1>Esta sección ofrece una visión detallada de nuestros clientes, representada a través de datos estadísticos mensuales.</h1>
    <h2> Estas visualizaciones permiten comprender mejor el flujo de nuevos registros y proporcionan una visión general de la cantidad de clientes que se han unido a nuestra plataforma o servicio en diferentes períodos. </h2>
    </div>
    <canvas id="clientesChart" width="800" height="400"></canvas>
    <script>
        // Datos obtenidos desde PHP
        var data = <?php echo json_encode($data); ?>;

        // Preparar los datos para el gráfico
        var meses = Object.keys(data);
        var cantidades = Object.values(data);

        // Configurar el gráfico
        var ctx = document.getElementById('clientesChart').getContext('2d');
var chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: meses,
        datasets: [{
            label: 'Clientes Registrados por Mes',
            data: cantidades,
            backgroundColor: 'rgba(255, 99, 132, 0.5)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    precision: 0, // Mostrar números enteros sin decimales
                    stepSize: 1 // Opcional: ajusta el tamaño del paso del eje Y
                }
            }
        }
    }
});
    </script>
    <!-- Segundo gráfico para Mecánicos Contratados por Mes -->
    <canvas id="mecanicosChart" width="800" height="400"></canvas>
<script>
        // Código JavaScript para el segundo gráfico (Mecánicos Contratados por Mes)
        // Datos obtenidos desde PHP para el segundo gráfico
        var dataMecanicos = <?php echo json_encode($dataMecanicos); ?>;
    var mesesMecanicos = Object.keys(dataMecanicos);
    var cantidadesMecanicos = Object.values(dataMecanicos);

        // Configurar el segundo gráfico
        var ctxMecanicos = document.getElementById('mecanicosChart').getContext('2d');
    var chartMecanicos = new Chart(ctxMecanicos, {
        type: 'bar',
        data: {
            labels: mesesMecanicos,
            datasets: [{
                label: 'Mecánicos Contratados por Mes',
                data: cantidades,
            backgroundColor: 'rgba(255, 99, 132, 0.5)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    precision: 0, // Mostrar números enteros sin decimales
                    stepSize: 1 // Opcional: ajusta el tamaño del paso del eje Y
                }
            }
        }
    }
});
</script>
    </script>
</body>
</html>


<?php
// Establece la conexión a tu base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tallermotos";

// Crea la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener la cantidad de mecánicos contratados por mes
$sql = "SELECT COUNT(*) as total_mecanico, MONTH(fecha_contratacion) as mes FROM mecanico GROUP BY MONTH(fecha_contratacion)";
$result = $conn->query($sql);

// Array para almacenar los datos de mecánicos por mes
$data = array();

// Obtén los datos de la consulta y almacénalos en el array
while ($rowMecanico = $result->fetch_assoc()) {
    $mes = obtenerNombresMes($rowMecanico['mes']); // <-- Corrección aquí
    $total_mecanicos = $rowMecanico['total_mecanico'];
    $data[$mes] = $total_mecanicos;
}

// Función para obtener el nombre del mes a partir de su número
function obtenerNombresMes($mesNumero) {
    $meses = [
        1 => "Enero",
        2 => "Febrero",
        3 => "Marzo",
        4 => "Abril",
        5 => "Mayo",
        6 => "Junio",
        7 => "Julio",
        8 => "Agosto",
        9 => "Septiembre",
        10 => "Octubre",
        11 => "Noviembre",
        12 => "Diciembre"
    ];

    // Verificar si el número de mes existe en el array antes de acceder a la clave
    if (isset($meses[$mesNumero])) {
        return $meses[$mesNumero];
    } else {
        return "Mes no válido";
    }
}


// Cierra la conexión a la base de datos
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    
    <title>Dashboard</title>
    <!-- Incluir la biblioteca de Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Estilos para el gráfico */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        canvas {
            max-width: 800px;
            margin: 20px auto;
            display: block;
        }
        
    </style>
</head>
<body>

    <canvas id="mecanicosChart" width="800" height="400"></canvas>
    <script>
        // Datos obtenidos desde PHP
        var data = <?php echo json_encode($data); ?>;

        // Preparar los datos para el gráfico
        var meses = Object.keys(data);
        var cantidades = Object.values(data);

        // Configurar el gráfico
        var ctx = document.getElementById('mecanicosChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: meses,
                datasets: [{
                    label: 'Mecánicos Contratados por Mes',
                    data: cantidades,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)', // Color de las barras
                    borderColor: 'rgba(54, 162, 235, 1)', // Color del borde de las barras
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                beginAtZero: true,
                ticks: {
                    precision: 0, // Mostrar números enteros sin decimales
                    stepSize: 1 // Opcional: ajusta el tamaño del paso del eje Y
                }
            }
        }
    }
});
    </script>
</body>
</html>
