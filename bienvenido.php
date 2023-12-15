<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
            max-width: 600px;
            margin: 50px auto;
            text-align: center;
        }

        h1 {
            color: #fff;
            margin-bottom: 30px;
        }

        .btn-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
            max-width: 600px;
    margin: 50px auto;
    text-align: center;
   
    
    justify-content: flex-start; /* Alinea los elementos al principio (izquierda en el eje principal) */
    align-items: flex-start; 
        }

        .btn {
            padding: 15px 30px;
            font-size: 1.2em;
            border-radius: 8px;
            text-transform: uppercase;
            transition: all 0.3s ease;
        }

        .btn-danger {
            background-color: #ff5a5f;
            color: #fff;
            border: none;
        }

        .btn-danger:hover {
            background-color: #ff3338;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-success {
            background-color: #28a745;
            color: #fff;
            border: none;
        }

        .btn-success:hover {
            background-color: #1e7e34;
        }
        .header {
            background-color: #000;
            color: #fff;
            padding: 30px 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .profile {
            display: flex;
            align-items: center;
        }

        .profile img {
            width: 50px; /* Ajusta el tamaño del ícono de perfil */
            margin-right: 10px;
        }

        .username {
            color: #fff;
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
        <form action="cerrarSesion.php" method="POST">
                <button type="submit" class="btn btn-danger" name="logout">Cerrar sesión</button>
            </form>
    </div>

    
    <div class="container">
        <h1>Bienvenido a tu perfil</h1>

        <div class="btn-container">
            <form action="solicitarCita.php" method="POST">
                <button type="submit" class="btn btn-primary" name="requestAppointment">Agendar Cita</button>
            </form>

            <form action="registroMoto.php" method="POST">
                <button type="submit" class="btn btn-success" name="registerMotorcycle">Registrar Tu Moto</button>
            </form>
        </div>
    </div>
</body>
</html>

