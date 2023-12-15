<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login'])) {
        require 'conexion.php'; // Asegúrate de tener aquí la conexión a la base de datos

        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $contraseña = $_POST['contrasenia'];

        if (empty($email) || empty($contraseña)) {
            echo "Por favor, completa todos los campos.";
        } else {
            try {
                $sql = "SELECT * FROM cliente WHERE email = :email";
                $stmt = $conexion->prepare($sql);
                $stmt->bindParam(':email', $email);
                $stmt->execute();
                $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($resultado) {
                    if (password_verify($contraseña, $resultado['contrasenia'] ?? '')) {
                        echo "Inicio de sesión exitoso. Bienvenido, " . $email . "!";
                        
                        header("Location: bienvenidoAdmin.php");
                        exit();
                    } else {
                        echo "Credenciales inválidas. Por favor, verifica tu correo electrónico y/o contraseña.";
                    }
                } else {
                    echo "Usuario no encontrado.";
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }
}
?>




