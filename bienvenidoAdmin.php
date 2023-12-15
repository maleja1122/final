<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Bienvenido Admin</title>
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
            color: #fff;
            margin-bottom: 30px;
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

        .profile {
    display: flex;
    align-items: center;
    /* Ajusta según sea necesario */
}

.username {
    margin-left: 10px; /* Ajusta según sea necesario */
}

.logout-buttons {
    display: flex;
    gap: 10px; /* Espacio entre los botones */
    margin-top: 10px; /* Ajusta según sea necesario */
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
        <form action="cerrarAdmin.php" method="POST">
                <button type="submit" class="btn btn-danger" name="logout">Cerrar sesión</button>
            </form>

    </div>
    <h1>Bienvenido, Administrador!</h1>
   <div class="btn-container">
    <form action="mostrarCita.php" method="POST">
        <button type="submit" name="logout">Ver citas</button>
    </form>
 
    <form action="mostrarAdmin.php" method="POST">
        <button type="submit" name="logout">Mostrar Administradores</button>
    </form>

    <form action="mostrar.php" method="POST">
        <button type="submit" name="logout">Lista de Clientes Registrados</button>
    </form>

    <form action="agregarMeca.php" method="POST">
        <button type="submit" name="logout">Agregar Mecánicos</button>
    </form>

    <form action="mostrarMeca.php" method="POST">
        <button type="submit" name="logout">Lista de Mecánicos</button>
    </form>
    
    <form action="dashboard.php" method="POST">
        <button type="submit" name="logout">DASHBOARD</button>
    </form>
    
    </div>
</body>
</html>
