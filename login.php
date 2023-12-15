<?php
session_start(); 
 
require_once("conexion.php");
 
$conexion = new Conexion();
var_dump($_POST);
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["email"]) && isset($_POST["contrasenia"])) {
        $email = $_POST["email"];
        $contrasenia = $_POST["contrasenia"];
  
        if (!empty($email) && !empty($contrasenia)) {
            $consulta = $conexion->prepare('SELECT contrasenia FROM cliente WHERE email = :email');
            $consulta->bindParam(":email", $email);
            $consulta->execute();
 
            $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
 
            if ($resultado && password_verify($resultado['contrasenia'], $contrasenia)) {
                $_SESSION["contrasenia"] = $email; // Almacenar el email en lugar del nombre
                header("Location: bienvenido.php");
                exit();
				
            } else {
                $_SESSION['error_mensaje'] = 'Email o contraseña incorrectos';
                header("Location: bienvenido.php"); // Volver al formulario de inicio de sesión
                exit();
            }
        }
    }    
}
?>